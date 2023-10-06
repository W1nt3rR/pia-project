<x-layout>
    <div class="courses">
        <x-form-box class="courses-form-box">

            @if ($courses->count() == 0)
            <h1>No courses found</h1>
            @else

            <h1>Courses</h1>

            <div class="items">
                @foreach ($courses as $course)
                <a href="courses/{{$course['id']}}" class="item">
                    <div>{{ $course->title }}</div>
                    <div class="tags">
                        @foreach (explode(", ", $course->tags) as $tag)
                        <div class="tag">
                            {{ $tag }}
                        </div>
                        @endforeach
                    </div>
                    <div class="filler"></div>
                    <div>{{ $course->duration }}h</div>
                    <div>{{ $course->price }}$</div>
                </a>
                @endforeach
            </div>

            <div class="button-container">
                @auth
                @if (auth()->user()->role == 'teacher' || auth()->user()->role == 'admin')
                <a href="/course/create">
                    <button class="button" type="submit">Create new course</button>
                </a>
                @endif
                @endauth
            </div>

            @endif
        </x-form-box>
    </div>
</x-layout>