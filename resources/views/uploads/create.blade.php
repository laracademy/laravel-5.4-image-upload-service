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
                    <form action="{{ route('upload.store') }}" method="POST" class="dropzone" enctype="multipart/form-data">
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
@endpush