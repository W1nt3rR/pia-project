<x-layout>
    <div class="courses">
        <x-form-box class="courses-form-box">
            <h1>Course: {{ $course->title }}</h1>

            <div class="course-info">
                <div class="tags">
                    @foreach (explode(", ", $course->tags) as $tag)
                    <div class="tag">
                        {{ $tag }}
                    </div>
                    @endforeach
                </div>
                <div class="course-info-group">
                    <div>
                        <p>Description:</p>
                        <div>
                            {{ $course->description }}
                        </div>
                    </div>
                </div>
                <div class="course-info-group">
                    <div>
                        <p>Duration</p>
                        <div>
                            {{ $course->duration }} hours
                        </div>
                    </div>
                    <div>
                        <p>Price</p>
                        <div>
                            {{ $course->price }} dollars
                        </div>
                    </div>
                </div>
            </div>

            <div class="items">
                @foreach ($course->quizzes as $quiz)
                <a href="/quiz/{{ $quiz->id }}" class="item">
                    Quiz {{ $quiz->id }}
                </a>
                @endforeach
            </div>

            @auth
            @if (auth()->user()->role == 'teacher' || auth()->user()->role == 'admin')
            <a href="/quiz/create/{{ $course->id }}">
                <button class="button" type="submit">Add quiz</button>
            </a>
            @endif
            @endauth

        </x-form-box>
    </div>
</x-layout>