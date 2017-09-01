@extends('layouts.app')

@section('content')

    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3>
                        Viewing {{ $image->original_name }}
                    </h3>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <img src="{{ $image->imagePath() }}" alt="{{ $image->original_name }}" class="img-fluid">
                    <p>
                        Viewed {{ $image->views }} {{ trans_choice('{0}times|{1}time|[2,*]times', $image->views) }}
                    </p>
                </div>
            </div>
        </div>
    </section>

@endsection