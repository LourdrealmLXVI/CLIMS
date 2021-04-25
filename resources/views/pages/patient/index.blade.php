@extends('layouts.app')
@section('content')
    <h2>List of Patients</h2>    
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Patient Name</th>
        <th scope="col">Birth Date</th>
        <th scope="col">Address</th>
        <th scope="col">Contact Number</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($patients as $patient)
        <tr>
            <td>{{ $patient->last_name .', ' . $patient->first_name . ' ' .substr($patient->middle_name,0,1) . '.' }}</td>
            <td>{{ $patient->date_of_birth }}</td>
            <td>{{ $patient->address }}</td>
            <td>{{ $patient->contact_number }}</td>
            <td>
                <a href="{{ route('patient.edit',['id' => $patient->id]) }}">
                <button class="btn btn-primary">Edit </button>
                </a>
                <form action="{{ route('patient.delete',['id' => $patient->id]) }}" method="POST">
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