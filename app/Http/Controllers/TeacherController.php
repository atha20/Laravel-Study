<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\TeacherCreateRequest;

class TeacherController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $teacher = Teacher::where('name', 'LIKE', '%'.$keyword.'%')
                        ->paginate(20);
        return view('teacher', ['teacherList' => $teacher]);
    }

    public function show($id)
    {
        $teacher = Teacher::with('class.students')
            ->findOrFail($id);
        return view('teacher-detail', ['teacher' => $teacher]);
    }

    public function create()
    {
        // $teacher = Teacher::select('id', 'name')->get();
        return view('teacher-add', 
        // ['teacher' => $teacher]
        );
    }

    public function store(TeacherCreateRequest $request)
    {
        $newName = '';
        if ($request->file('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->name.'-'.now()->timestamp.'.'.$extension;
            $request->file('photo')->storeAs('photo', $newName);
        }

        $request['image'] = $newName;
        $teacher = Teacher::create($request->all());

        if($teacher) {
            Session::flash('status', 'success');
            Session::flash('message', 'Add Teacher Success !!!');
        }

        return redirect('/teachers');
    }

    public function edit(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teacher-edit', ['teacher' => $teacher]);
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        $newName = '';
        if ($request->file('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->name.'-'.now()->timestamp.'.'.$extension;
            $request->file('photo')->storeAs('photo', $newName);
        }

        $request['image'] = $newName;
        $teacher->update($request->all());
        return redirect('/teachers');
    }

    public function delete($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teacher-delete', ['teacher' => $teacher]);
    }

    public function destroy($id)
    {
        $deletedTeacher = Teacher::findOrFail($id);
        $deletedTeacher->delete();

        if($deletedTeacher) {
            Session::flash('status', 'success');
            Session::flash('message', 'Teacher Deleted !!!');
        }

        return redirect('/teachers');
    }

    public function deletedTeacher()
    {
        $deletedTeacher = Teacher::onlyTrashed()->paginate(10);
        return view('teacher-deleted-list', ['teacher' => $deletedTeacher]);
    }

    public function restore($id)
    {
        $deletedTeacher = Teacher::withTrashed()->where('id', $id)->restore();
        
        if($deletedTeacher) {
            Session::flash('status', 'success');
            Session::flash('message', 'Teacher Restored !!!');
        }

        return redirect('/teachers');
    }
}
