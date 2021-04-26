<?php

namespace App\Http\Controllers;

use App\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function doctors()  
    {
        $doctors = Doctor::all();
        return view('pages.doctor.index',compact('doctors'));
    }

    public function create()
    {
        return view('pages.doctor.create');
    }

    public function edit(Request $request)
    {
        $doctor = Doctor::find($request->id);

        $genders = [
                    "Male"=> 0,
                    "Female"=> 1
        ];
        return view('pages.doctor.edit',compact('doctor','genders'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'middle_name'=>'required',
            'last_name'=>'required',
            'gender'=>'required',
            'address'=>'required',
            'date_of_birth'=>'required|date',
            'contact_number'=>'required'
    ]);

    Doctor::find($request->id)->update($request->all());

    return redirect()->back()->with(['message'=>'Successfully update the doctor record.']);   
    }

    public function store(Request $request)
    {
        $request->validate([
                'first_name'=>'required',
                'middle_name'=>'required',
                'last_name'=>'required',
                'gender'=>'required',
                'address'=>'required',
                'date_of_birth'=>'required|date',
                'contact_number'=>'required'
        ]);

        Doctor::create($request->all());
        return redirect()->back()->with(['message'=>'Successfully added a new doctor record.']);    
    }

    public function delete(Request $request)
    {
        Doctor::find($request->id)->delete();

        return redirect()->route('doctor.index');
    }
}
