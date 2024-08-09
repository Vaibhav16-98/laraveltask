
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>List of Teachers</h2>

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
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teachers as $teacher)
            <tr>
                <td>{{ $teacher->id }}</td>
                <td>{{ $teacher->teacher_name }}</td>

                <td>
                    <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-info btn-sm">Edit</a>
                    
                </td>
                <td>
                    <a href="{{ route('teachers.create', $teacher->id) }}" class="btn btn-info btn-sm">Add</a>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection