<?php

use Illuminate\Support\Facades\Storage;

$files = Storage::files('public/documents/' . $course->id);
$filenames = array_map('basename', $files);

$enrolled = $course->enrolledUsers->contains(auth()->user());
$isCourseOwner = $course->user == auth()->user();
$isAdmin = auth()->user()?->role == 'admin';
?>

<x-layout>
    <div class="courses">
        <x-form-box class="courses-form-box">
            <h1>Course: {{ $course->title }}</h1>

            <div class="course-info">
                @auth
                @if ($isCourseOwner || $isAdmin)
                <a class="abutton remove-course-button" href="/course/delete/{{ $course->id }}">
                    <button class="button">Delete course</button>
                </a>
                @endif
                @endauth

                <div class="leave-enroll-button">
                    @if ($enrolled)
                    <a href="/course/leave/{{ $course->id }}">
                        <button class="button" type="submit">Leave</button>
                    </a>
                    @else
                    <a href="/course/enroll/{{ $course->id }}">
                        <button class="button" type="submit">Enroll</button>
                    </a>
                    @endif
                </div>
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
                @if ($enrolled)
                @auth
                <div class="course-info-group">
                    <div>
                        <p>Course Materials</p>
                        <div>
                            @foreach ($filenames as $filename)
                            <div class="course-file">
                                <a href="{{ url('/documents/' . $course->id . '/' . $filename) }}" target="_blank">{{ $filename }}</a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endauth
                @endif
            </div>

            @if ($enrolled)
            @auth
            <div class="items">
                @foreach ($course->quizzes as $quiz)
                <a href="/quiz/{{ $quiz->id }}" class="item">
                    Quiz {{ $quiz->id }}
                </a>
                @endforeach
            </div>
            @endauth
            @endif

            @auth
            @if ($isCourseOwner || $isAdmin)
            <form method="POST" action="/course/pdf" enctype="multipart/form-data">
                <input type="hidden" name="course_id" value="{{ $course->id }}">
                @csrf
                <div class="group-group">
                    <label>Add File:</label>
                    <div class="form-group">
                        <input type="file" name="file">
                        @error('pdf')
                        <p class="error">{{ $message }}</p>
                        @enderror
                    </div>
                    <button class="button" type="submit">Upload</button>
                    <a class="abutton" href="/quiz/create/{{ $course->id }}">
                        <div class="button">Add quiz</div>
                    </a>
                </div>
            </form>
            @endif
            @endauth

        </x-form-box>
    </div>
</x-layout>