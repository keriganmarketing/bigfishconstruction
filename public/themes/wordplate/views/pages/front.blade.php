@extends('layouts.main')

@section('content')
<kma-slider class="slider-container"></kma-slider>
<main role="main">
    <div class="container">
        @if (have_posts())
            @while (have_posts())
                {{ the_post() }}

                <div class="row no-gutters">
                    <div class="col-lg-6">
                        <article class="front">
                            <header>
                                <h1 class="example">{{ the_title() }}</h1>
                            </header>

                            {{ the_content() }}

                            <a href="/about-us/" class="btn btn-outline-primary" >Meet Our Team &nbsp; <i class="fa fa-angle-right" aria-hidden="true"></i></a>

                        </article>
                    </div>
                    <div class="col-lg-6">
                    </div>
                </div>

            @endwhile
        @else
            <article>
                <p>Nothing to see.</p>
            </article>
        @endif
    </div>
</main>
@include('partials.map')
<div class="projects-header header-image" style="background-image: url('{{ $projectsHeader['url'] }}')">
    <h2 class="text-center text-uppercase text-white text-outlined">Projects</h2>
</div>
<div class="container">
    <portfolio-gallery :limit="6" :locations="{{ $locations }}" :construction-types="{{ $types }}"></portfolio-gallery>
</div>
<div class="testimonial-section">

</div>
<div class="feature-box-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>{{ $featureBox1['title'] }}</h3>
                {{ $featureBox1['text'] }}
                <a href="{{ $featureBox1['link'] }}" ></a>
            </div>
        </div>
    </div>
</div>
@endsection