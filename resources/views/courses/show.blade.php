<x-layout>
    <div class="courses">
        <x-form-box class="courses-form-box">
            <h1>Course: {{ $course->title }}</h1>

            <div>
                <div>
                    {{ $course->tags }}
                </div>
                <div>
                    {{ $course->description }}
                </div>
                <div>
                    {{ $course->duration }}
                </div>
                <div>
                    {{ $course->price }}
                </div>
            </div>

            <div class="items">
                @foreach ($course->quizzes as $quiz)
                <a href="/quiz/{{ $quiz->id }}" class="item">
                    Quiz {{ $quiz->id }}
                </a>
                @endforeach
            </div>

            <form method="GET" action="/quiz/create/{{ $course->id }}">
                <div class="button-container">
                    <button class="button" type="submit">Add quiz</button>
                </div>
            </form>

        </x-form-box>
    </div>
</x-layout>