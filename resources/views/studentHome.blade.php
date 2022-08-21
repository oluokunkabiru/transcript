@extends('layouts.studentsApp')

@section('content')
    <div id="app">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-box">
                        <div class="card-body no-padding ">
                            <div class="doctor-profile">
                                <img src="{{ asset('img/avatar-1-128.png') }}" class="doctor-pic" alt="">
                                <div class="profile-usertitle">
                                    <div class="doctor-name">{{Auth::user()->surname}} {{Auth::user()->firstname}} {{ Auth::user()->lastname }}</div>
                                    
                                    <div class="name-center">
                                        <span>
                                            <span>
                                                {{Auth::user()->department->name}}
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <p>{{Auth::user()->address}}</p>
                                <div><p><i class="fa fa-phone"></i><a href="tel{{ Auth::user()->tel_no }}">{{ Auth::user()->tel_no }}</a></p> </div>
                                <div><p><i class=""></i>  {{Auth::user()->matric_no}}</p> </div>
                                    
                                <div class="profile-userbuttons">
                                    <a href="#" class="btn btn-circle deepPink-bgcolor btn-sm">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--.container-fluid-->
    </div>
@endsection