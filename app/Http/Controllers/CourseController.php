<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return view('courses.index', [
            'courses' => Course::latest()
                ->filter(request(['tag', 'search']))
                ->paginate(10)
        ]);
    }

    public function show(Course $course)
    {
        return view('courses.show', [
            'course' => $course
        ]);
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'price' => 'required',
        ]);

        $course = new Course();
        $course->title = $request->title;
        $course->tags = $request->tags;
        $course->description = $request->description;
        $course->duration = $request->duration;
        $course->price = $request->price;
        $course->user_id = auth()->user()->id;
        $course->save();

        return CourseController::show($course);
    }
}
