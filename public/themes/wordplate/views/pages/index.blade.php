@extends('layouts.main')
@section('content')

@if (have_posts())
    @while (have_posts())
        {{ the_post() }}
        <div class="projects-header header-image support" style="{{ $headerImageData != '' ? 'background-image: url(' . $headerImageData['url'] . ')' : '' }}">
            <div class="container d-none d-xl-block">
                <h1 class="text-center text-uppercase text-white text-outlined">{{ $headline != '' ? $headline : the_title() }}</h1>
            </div>
        </div>
        <main role="main">
            <div class="container">
                <article class="support">
                    <header class="d-xl-none text-primary">
                        <h1>{{ $headline != '' ? $headline : the_title() }}</h1>
                    </header>
                    {{ the_content() }}
                </article>
            </div>
        </main>
    @endwhile
@else
    @include('pages.404')
@endif

@endsection