@extends('layouts.main')
@php
$headerImageData = get_field('header_image');
$headline = get_field('headline');
$headerImage = $headerImageData != '' ? 'background-image: url(' . $headerImageData['url'] . ')' : '';
@endphp
@section('content')

    
@if (have_posts())
    @while (have_posts())
        {{ the_post() }}
        <div class="projects-header header-image support" style="{{ $headerImage }}">
            <div class="container d-none d-xl-block">
                <h1 class="text-center text-uppercase text-white text-outlined">{{ $headline != '' ? $headline : the_title() }}</h1>
            </div>
        </div>
        <main role="main">
            <div class="container">
                <article>
                    <header class="d-xl-none text-primary">
                        <h1>{{ $headline != '' ? $headline : the_title() }}</h1>
                    </header>
                    {{ the_content() }}
                </article>
            </div>
        </main>
    @endwhile
@else
    <div class="projects-header header-image support">
        <div class="container d-none d-xl-block">
            <h1 class="text-center text-uppercase text-white text-outlined">Page Not Found</h1>
        </div>
    </div>
    <main role="main">
        <div class="container">
            <article>
                <header class="d-xl-none text-primary">
                    <h1>Page Not Found</h1>
                </header>
                <p>The page you've requested does not exist.</p>
            </article>
        </div>
    </main>
@endif
    
</main>
@endsection