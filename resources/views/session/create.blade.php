@extends('layouts.app1')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Add Session</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('home')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="#">Session</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Add Session</li>
                    </ol>
                </div>
            </div>
            <session-create></session-create>
        </div>
    </div>

@endsection
