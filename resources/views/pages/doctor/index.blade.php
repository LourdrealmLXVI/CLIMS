@extends('layouts.app')
@section('content')
<br>
<a href="{{ route('doctor.create') }}">
    <button class="btn btn-primary">Create Doctor Record</button>
</a>
    <h2>List of Doctors</h2>    
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Doctor Name</th>
        <th scope="col">Birth Date</th>
        <th scope="col">Address</th>
        <th scope="col">Contact Number</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($doctors as $doctor)
        <tr>
            <td>{{ $doctor->last_name .', ' . $doctor->first_name . ' ' .substr($doctor->middle_name,0,1) . '.' }}</td>
            <td>{{ $doctor->date_of_birth }}</td>
            <td>{{ $doctor->address }}</td>
            <td>{{ $doctor->contact_number }}</td>
            <td>
                <a href="{{ route('doctor.edit',['id' => $doctor->id]) }}">
                <button class="btn btn-primary">Edit </button>
                </a>
                <form action="{{ route('doctor.delete',['id' => $doctor->id]) }}" method="POST">
                    @csrf
                    <button class="btn btn-danger">Delete </button>
                </form>
            </td>
        </tr>    
        @endforeach
    </tbody>
  </table> 
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $('.table').DataTable()
    })
</script>
@endpush