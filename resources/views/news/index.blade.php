<?php
$isAdmin = auth()->user()?->role == 'admin';
?>

<x-layout>

    <div class="news">
        <h1>News Feed</h1>

        @auth
        @if ($isAdmin)
        <div id="add-news-feed-form" style="display: none;">
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
                <button class="button" type="submit">Add News</button>
            </form>
        </div>
        <div class="add-news-feed-button">
            <button class="button" onclick="toggleAddNewsForm()">Add News</button>
        </div>
        @endif
        @endauth

        <div class="news-list">
            @foreach ($news as $newsItem)
            <div class="news-item">
                <p>{{ $newsItem->created_at->diffForHumans() }}</p>
                <h1>{{ $newsItem->title }}</h1>
                <p>{{ $newsItem->content }}</p>
            </div>
            @endforeach
        </div>
    </div>

</x-layout>

<script>
    function toggleAddNewsForm() {
        var x = document.getElementById("add-news-feed-form");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>