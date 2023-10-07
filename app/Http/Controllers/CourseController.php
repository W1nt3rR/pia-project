<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function enrolled()
    {
        return view('courses.index', [
            'courses' => auth()->user()->enrolledCourses()->paginate(10)
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

        $news = new News();
        $news->title = "New course just dropped";
        $news->content = auth()->user()['first-name'] . ' just created a new course: ' . $course->title;
        $news->save();

        return CourseController::show($course);
    }

    public function delete(Course $course)
    {
        $course->delete();

        return redirect('/courses');
    }

    public function uploadPDF(Request $request)
    {
        $request->validate([
            'file' => 'required',
            'course_id' => 'required'
        ]);

        $course = Course::find($request->course_id);
        $course->uploadFile($request->file('file'));

        return back();
    }

    public function showFile($course, $filename)
    {
        $path = 'public/documents/' . $course . '/' . $filename;

        if (!Storage::exists($path)) {
            abort(404);
        }
    
        $file = Storage::get($path);
        $type = Storage::mimeType($path);
    
        return response($file, 200)
            ->header('Content-Type', $type);
    }

    public function enroll($course)
    {
        if (auth()->user()->enrolledCourses->contains($course)) {
            return back();
        }

        $courseObject = Course::find($course);
        auth()->user()->enrolledCourses()->attach($courseObject->id);

        return back();
    }

    public function leave($course)
    {
        if (!auth()->user()->enrolledCourses->contains($course)) {
            return back();
        }

        $courseObject = Course::find($course);
        auth()->user()->enrolledCourses()->detach($courseObject->id);

        return back();
    }
}
