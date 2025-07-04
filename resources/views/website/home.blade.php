@extends('layouts.website')

@section('content')
<!-- Hero Section -->
@foreach ($headers as $header)
    <section id="hero" class="hero section">

    <img src="{{ $header->photo ? $header->photo->getUrl() : '' }}" alt="" data-aos="fade-in">

    <div class="container text-center" data-aos="zoom-out" data-aos-delay="100">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2>{{ $header->title ?? '' }}</h2>
                <p>{{ $header->subtitle ?? '' }}</p>
                @if ($header->link && $header->button)
                    <a href="{{ $header->link ?? '#' }}" class="btn-get-started">{{ $header->button ?? '' }}</a>
                @endif
            </div>
        </div>
    </div>

</section><!-- /Hero Section -->
@endforeach

@endsection
