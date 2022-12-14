@extends('layouts.app1')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Add Courses</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('home')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="#">Courses</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Add Courses</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="card card-box">
                    <div class="card-head">
                        <header>Basic Information</header>
                    </div>
                    <div class="card-body" id="bar-parent">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert"><span class="fa fa-times"></span></button>
                                    <strong>{{ $error }} </strong>.
                                </div>
                                @endforeach
                            @endif

                            </div>
                            <div class="col-md-3"></div>
                        </div>
                       
                        <form action="{{route('course.postAdd')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="form-body">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Course Name
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <input type="text" value="{{ old('name') }}" name="name" data-required="1" placeholder="enter course name" class="form-control input-height" /> </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Course Code
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <input type="text" value="{{ old('course_code') }}" name="course_code" data-required="1" placeholder="enter course code" class="form-control input-height" /> </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Unit
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <input type="number" value="{{ old('unit') }}" name="unit" data-required="1" placeholder="enter course unit" class="form-control input-height" /> </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-3">Professor in Charge
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <select name="professor_id" id="" class="form-control">
                                            <option value="">Professor</option>
                                            @foreach($professors as $professor)
                                                <option value="{{$professor->id}}">{{$professor->lastname}} {{$professor->firstname}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    

                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-3">Level
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <select name="level_id" id="" class="form-control">
                                            <option value="">Level</option>
                                            @foreach($levels as $level)
                                                <option value="{{$level->id}}">{{$level->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="control-label col-md-3">Semester
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <select name="semester_id" id="" class="form-control">
                                            <option value="">Semester</option>
                                            @foreach($semesters as $semester)
                                                <option value="{{$semester->id}}">{{$semester->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                
                                {{-- <div class="form-group row">
                                    <label class="control-label col-md-3">Image
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <input type="file" name="photo" class="form-control">
                                    </div>
                                </div> --}}
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="offset-md-3 col-md-9">
                                            <button type="submit" class="btn btn-info">Submit</button>
                                            <button type="button" class="btn btn-default">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
