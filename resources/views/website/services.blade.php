@extends('layouts.website')

@section('content')
<!-- Services Section -->
<section id="services" class="services section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Serviços</h2>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row gy-4">

            @foreach ($services as $service)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item item-cyan position-relative">
                    <div class="icon">
                        {!! $service->icon ?? '' !!}
                    </div>
                    <a href="{{ $service->link ?? '#' }}" class="stretched-link">
                        <h3>{{ $service->title ?? '' }}</h3>
                    </a>
                    <p>{{ $service->text ?? '' }}</p>
                </div>
            </div><!-- End Service Item -->    
            @endforeach

        </div>

    </div>

</section><!-- /Services Section -->

@endsection
@section('styles')
    <style>
        .icon {
    background: #eeeeee;
    border-radius: 50%;
        border: solid #cccccc;
}
    </style>
@endsection