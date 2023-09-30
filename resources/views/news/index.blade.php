<x-layout>
    @include('partials._news')
    
    @foreach ($news as $newsItem)
    <article>
        <h1>
            {{ $newsItem->title }}
        </h1>
        <div>
            {{ $newsItem->content }}
        </div>
    </article>
    @endforeach
</x-layout>