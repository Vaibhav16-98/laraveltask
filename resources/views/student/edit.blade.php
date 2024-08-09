@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Student</h2>

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

    <form action="{{ route('student.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Student Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Student name" value="{{ $student->name }}">
        </div>
        <div class="form-group">
            <label for="name">Student class</label>
            <input type="text" name="class" class="form-control" id="name" placeholder="Enter Class name" value="{{ $student->class }}">
        </div>
        <div class="form-group">
            <label for="name">Student fess</label>
            <input type="text" name="yearly_fees" class="form-control" id="yearly_fees" placeholder="Enter Fees" value="{{ $student->yearly_fees }}">
        </div>
        <div class="form-group">
            <label for="name">Student Admission Name</label>
            <input type="date" name="admission_date" class="form-control" id="admission_date" placeholder="" value="{{ $student->admission_date }}">
        </div>
        <div class="form-group">
            <label for="name">Teacher Name</label>
            <select name='class_teacher_id' class="form-control" placeholder="Select Class Teacher">
                 @foreach ($tearcher as $teacher)
                     <option value="{{$teacher->id}}" {{$student->class_teacher_id == $teacher->id ? "selected" : ''}}>{{$teacher->teacher_name}}</option>   
                 @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>

    </form>
</div>
@endsection