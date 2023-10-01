<x-layout>
    <div class="courses">
        <x-form-box class="courses-form-box">
            <h1>Courses</h1>

            <div class="items">
                @foreach ($courses as $course)
                <a href="courses/{{$course['id']}}" class="item">
                    <div>{{ $course->title }}</div>
                    <div class="filler"></div>
                    <div>{{ $course->tags }}</div>
                    <div>{{ $course->duration }}</div>
                    <div>{{ $course->price }}</div>
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
        </x-form-box>
    </div>


</x-layout>