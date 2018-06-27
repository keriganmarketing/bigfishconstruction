@extends('layouts.main')

@section('content')
<main role="main">
    <div class="container">
        @if (have_posts())
            @while (have_posts())
                
                @include('partials.article')

            @endwhile
        @else
            <article>
                <p>Nothing to see.</p>
            </article>
        @endif
    </div>
</main>
@endsection