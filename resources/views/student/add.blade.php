
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create New Student</h2>

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

    <form action="{{ route('student.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Student Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Student name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="name">Student class</label>
            <input type="text" name="class" class="form-control" id="name" placeholder="Enter Student name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="name">Student fess</label>
            <input type="number" name="yearly_fees" class="form-control" id="yearly_fees" placeholder="Enter Student fees" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="name">Student Addmision Date</label>
            <input type="date" name="admission_date" class="form-control" id="name" placeholder="" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="name">Teacher Name</label>
            <select name='class_teacher_id' class="form-control" placeholder="Select Class Teacher">
                 @foreach ($tearcher as $teacher)
                     <option value="{{$teacher->id}}">{{$teacher->teacher_name}}</option>   
                 @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection