@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Teacher</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Teacher Name</label>
            <input type="text" name="teacher_name" class="form-control" id="teacher_name" value="{{ old('teacher_name', $teacher->teacher_name) }}" placeholder="Enter teacher name">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection