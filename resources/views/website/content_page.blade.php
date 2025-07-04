@extends('layouts.website')

@section('content')
<!-- About Section -->
<section id="about" class="about section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>{{ $content_page->title }}</h2>
        <p>{{ $content_page->excerpt ?? '' }}</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 justify-content-center">
            @if ($content_page->featured_image)
            <div class="col-lg-4">
                <img src="{{ $content_page->featured_image->getUrl() }}" class="img-fluid" alt="">
            </div>
            @endif
            <div class="col-lg-{{ $content_page->featured_image ? '8' : '12' }} content">
                {!! $content_page->page_text ?? '' !!}
            </div>
        </div>

    </div>

</section><!-- /About Section -->
@endsection
<script>
    console.log({!!$content_page!!})

</script>
