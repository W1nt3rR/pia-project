<x-layout>

    <div class="news">
        <h2>News Feed</h2>

        @auth
        @if (auth()->user()->role === 'admin')
        <div class="add-news-feed-form">
            <form method="POST" action="/news">
                @csrf
                <label for="title">News Title:</label>
                <input type="text" name="title" />
                @error('title')
                <p style="color: red">{{$message}}</p>
                @enderror
                <label for="content">News Content:</label>
                <textarea name="content" rows="4" cols="50"></textarea>
                @error('content')
                <p style="color: red">{{$message}}</p>
                @enderror
                <button type="submit"><i class="fa-solid fa-circle-plus"></i> Add News</button>
            </form>


        </div>
        @endif
        @endauth

        @foreach ($news as $newsItem)
        <div>
            <h1>
                {{ $newsItem->title }}
            </h1>
            <div>
                {{ $newsItem->content }}
            </div>
        </div>
        @endforeach
    </div>

</x-layout>