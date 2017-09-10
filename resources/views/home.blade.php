@extends('layouts.app')

@section('content')

    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3>
                        Today's
                        <small class="text-muted">Images</small>
                    </h3>
                </div>
            </div>

            <div class="row">
                @foreach($imagesToday as $image)
                    <div class="col-6 col-sm-3 mb-3">
                        <a href="{{ route('image.view', $image) }}">
                            <img src="{{ $image->thumbnailPath() }}" alt="{{ $image->original_name }}" class="img-thumbnail">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection