
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create New Teacher</h2>

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

    <form action="{{ route('teachers.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Teacher Name</label>
            <input type="text" name="teacher_name" class="form-control" id="name" placeholder="Enter teacher name" value="{{ old('name') }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection