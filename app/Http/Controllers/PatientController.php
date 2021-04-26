<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function patients()  
    {
        $patients = Patient::all();
        return view('pages.patient.index',compact('patients'));
    }

    public function create()
    {
        return view('pages.patient.create');
    }

    public function edit(Request $request)
    {
        $patient = Patient::find($request->id);

        $genders = [
                    "Male"=> 0,
                    "Female"=> 1
        ];
        return view('pages.patient.edit',compact('patient','genders'));
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

    Patient::find($request->id)->update($request->all());

    return redirect()->back()->with(['message'=>'Successfully update the patient record.']);   
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

        Patient::create($request->all());
        return redirect()->back()->with(['message'=>'Successfully added a new patient record.']);    
    }

    public function delete(Request $request)
    {
        Patient::find($request->id)->delete();

        return redirect()->route('patient.index');
    }
}
