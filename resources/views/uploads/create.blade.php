@extends('layouts.app')

@section('content')

    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3>
                        Upload Image
                    </h3>
                </div>
            </div>

            <div class="row">
                <div class="col">

                    <div id="error" class="alert alert-danger" style="display: none;">
                        <span id="errorMessage"></span>
                    </div>

                    <form id="frmFile" action="{{ route('upload.store') }}" method="POST" class="dropzone" enctype="multipart/form-data">
                        {!! csrf_field() !!}

                        <div class="form-group fallback">
                            <label>Image</label>
                            <input type="file" name="file">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('style')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/basic.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/dropzone.css">
@endpush

@push('script')
    <script src="//cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/dropzone.js"></script>
    <script>
        Dropzone.options.frmFile = {
            maxFiles: 1,
            init: function() {
                this.on('addedFile', function(file) {
                    $('#error').hide();
                });

                this.on('error', function(file, errorMessage) {
                    $('#errorMessage').html(errorMessage.file[0]);
                    $('#error').show();

                    $(file.previewElement).find('.dz-error-message').text(errorMessage.file[0]);
                });

                this.on('success', function(file, response) {
                    location.href = '/view/' + response.id;
                });
            }
        };

        document.onpaste = function(event) {
            var items = (event.clipboardData || event.originalEvent.clipboardData).items;

            for(index in items) {
                var item = items[index];

                if(item.kind == 'file') {
                    Dropzone.forElement('#frmFile').addFile(item.getAsFile());
                }
            }
        }
    </script>
@endpush