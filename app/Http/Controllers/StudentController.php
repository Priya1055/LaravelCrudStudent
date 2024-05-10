<?php

namespace App\Http\Controllers;

use App\Models\StudInfo;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function funStudList()
    {
        // dd('pok');
        $StudInfos = StudInfo::all();
        $StudInfos = StudInfo::paginate(4); // 10 items per page, adjust as needed

        return view('welcome', compact('StudInfos'));
    }

    public function funSubmitStudInfo(Request $request)
    {
        //dd($request);
      // Create a new instance of the StudInfo model
    $StudInfo = new StudInfo();

    // Set the model attributes with values from the request
    $StudInfo->name = $request->input('name');
    $StudInfo->class = $request->input('class');
    $StudInfo->roll_no = $request->input('roll_no');
    $StudInfo->marks = $request->input('grade');
    $StudInfo->email = $request->input('email');

    $StudInfo->gender = $request->input('gender');

    // Convert subjects array to string and store in database
    $StudInfo->subject = implode(',', $request->input('subjects'));

    $StudInfo->country = $request->input('country');

    // Save the model to the database
    $StudInfo->save();
    // dd('saved');
    // $StudInfos = StudInfo::all();
    $StudInfos = StudInfo::paginate(4); // 10 items per page, adjust as needed

    return view('welcome',compact('StudInfos'));
    }

    public function edit($id)
    {
        $student = StudInfo::findOrFail($id);
        return view('edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        //dd($request);
        $student = StudInfo::findOrFail($id);
        $student->where('id',$id)->update(['name'=>$request->name,
                        'class'=>$request->class,
                        'roll_no'=>$request->roll_no,
                        'marks'=>$request->marks,
                        'email'=>$request->email,
                        'gender'=>$request->gender,
                        'country'=>$request->country,
                        'subject' => implode(',', $request->subjects), // Convert array to comma-separated string
                    ]);

        // $StudInfos = StudInfo::all();
        $StudInfos = StudInfo::paginate(4); // 10 items per page, adjust as needed
        return view('welcome', compact('StudInfos'))->with('success', 'Student record updated successfully.');
 }

    public function destroy($id)
    {
        $student = StudInfo::findOrFail($id);
        $student->delete();
        $StudInfos = StudInfo::paginate(4);
        return view('welcome', compact('StudInfos'))->with('success', 'Student record deleted successfully.');
    }

    // Controller method for search operation
public function funsearch(Request $request) {
    // dd($request);
    $searchQuery = $request->input('searchQuery');
    $filteredData = StudInfo::where('name', 'like', '%' . $searchQuery . '%')->paginate(4);

    return view('welcome', ['StudInfos' => $filteredData]);
}

// // Controller method for sort operation
public function funsort(Request $request) {
    //dd($request);
    $sortBy = $request->input('sortBy');
    $sortedData = StudInfo::orderBy($sortBy)->paginate(4);

    return view('welcome', ['StudInfos' => $sortedData]);
}

    // public function destroy($id)
//     {
//         $student = Student::findOrFail($id);
//         $student->delete();
//         return redirect()->back()->with('success', 'Student record deleted successfully.');
//     }
 }
