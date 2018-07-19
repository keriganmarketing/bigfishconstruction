@extends('layouts.main')

@section('content')

@if (have_posts())
    @while (have_posts())
        {{ the_post() }}
        @include('partials.mast')
        <main role="main">
            <div class="container">
                <article class="support">
                    <header class="d-xl-none text-primary">
                        <h1>{{ the_title() }}</h1>
                    </header>
                    {{ the_content() }}
                    <pre>{{ print_r($project) }}</pre>
                </article>
            </div>
        </main>
    @endwhile
@else
    @include('pages.404')
@endif

@endsection