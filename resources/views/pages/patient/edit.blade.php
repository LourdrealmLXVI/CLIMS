@extends('layouts.app')
@section('content')

@if(session()->has('message'))
    <div class="alert alert-success">{{ session('message')}}</div>
@endif

<div class="row my-4">
    <div class="col-md-4 offset-md-8 text-right">
        <a href="{{ route('patient.index') }}">
            <button class="btn btn-primary">Back to Patient List</button>
        </a>
    </div>
</div>

    <form action="{{route('patient.update')}}" method="POST">
    @csrf
    <input type="hidden"   name="id" value="{{ $patient->id }}">
    <div class="form-group">
        <label for="exampleInputEmail1">First Name</label>
        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First name" value="{{ $patient->first_name }}">

        @error('first_name')
        <small class="text-danger">{{ $message }}</small>
        @enderror    
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Middle name</label>
        <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Middle Name" value="{{ $patient->middle_name }}">

        @error('middle_name')
        <small class="text-danger">{{ $message }}</small>
        @enderror    
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Last name</label>
        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="{{ $patient->last_name }}">

        @error('last_name')
        <small class="text-danger">{{ $message }}</small>
        @enderror    
    </div>
    <div class="form-group">
        <label for="inputDateOfBirth">Date of Birth</label>
        <input type="text" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Date of Birth" value="{{ $patient->date_of_birth }}">

        @error('date_of_birth')
        <small class="text-danger">{{ $message }}</small>
        @enderror    
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Address</label>
        <textarea class="form-control" id="address" name="address" placeholder="Address" rows="3">{{ $patient->address }}
        </textarea>
        @error('address')
        <small class="text-danger">{{ $message }}</small>
        @enderror    
    </div>
    <div class="form-group">
        <label for="SelectGender">Gender</label>
        <select class="form-control" id="gender" name="gender">
        @foreach($genders as $key => $gender)
            <option value = "{{ $gender }}" {{ $gender==$patient->gender ? 'selected="selected"': '' }}>{{ $key }}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="inputContactNumber">Contact Number</label>
        <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Contact Number" value = "{{ $patient->contact_number }}">

        @error('contact_number')
        <small class="text-danger">{{ $message }}</small>
        @enderror    
    </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>   
@endsection
