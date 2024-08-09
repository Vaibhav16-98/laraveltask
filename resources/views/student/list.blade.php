
@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="row justify-content-between">
        <h2>List of Student</h2>
        <a href="{{ url('student/create') }}" class="btn btn-info btn-sm align-self-center" >Add </a>
     </div>
    

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>class</th>
                <th>Fees</th>
                <th>Admission Date</th>
                <th>Class Teacher name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->class }}</td>
                <td>{{ $student->yearly_fees }}</td>
                <td>{{ $student->admission_date }}</td>
                <td>{{ $student->teacher->teacher_name }}</td>
                <td>
                    <a href="{{ route('student.edit', $student->id) }}" class="btn btn-info btn-sm">Edit</a>
                    
                </td>
                <td>
                    <form action="{{ route('student.destroy', $student->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        {{-- {{$students->links() }} --}}
    </table>
</div>
@endsection