<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $userEmail = auth()->user()->email;
    $courses = Course::where('user_email', $userEmail)->paginate(5);
    return view('courses.courseList', compact('courses'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('courses.createCourse');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

    $newCourse = new Course();
    $userEmail = auth()->user()->email;

    $newCourse->name_course = $request->name_course;
    $newCourse->description_course = $request->description_course;
    $newCourse->user_email = $userEmail;

    $newCourse->save();

    return back()->with('msg', 'Course add complete!!');

  }

  /**
   * Display the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $course = Course::findOrFail($id);
    return view('courses.editCourse', compact('course'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {

    $request->validate([
      'name_course'=>'required',
      'description_course'=>'required ',
    ]);

    $courseDB = Course::findOrFail($id);

    $courseDB->name_course = $request->name_course;
    $courseDB->description_course = $request->description_course;

    $courseDB->save();

    return back()->with('msg','Course edit complete!!.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $courseDB = Course::findOrFail($id);
    $courseDB->delete();

    return back()->with('msg','Course delete complete!!.');
  }
}
