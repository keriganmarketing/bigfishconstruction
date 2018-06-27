@extends('layouts.main')

@section('content')
<main role="main">
    <div class="container">
        @if (have_posts())
            @while (have_posts())
                {{ the_post() }}

                <article>
                    <header>
                        <h1>{{ the_title() }}</h1>
                    </header>

                    {{ the_content() }}
                </article>

            @endwhile
        @else
            <article>
                <p>Nothing to see.</p>
            </article>
        @endif
    </div>
</main>
@endsection