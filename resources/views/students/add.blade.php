@extends('layouts.app1')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Add Student</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('home')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="#">Student</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Add Student</li>
                    </ol>
                </div>
            </div>
            <add-student></add-student>

            {{-- <div class="row">
                <notifications position="center" />
                <div class="col-md-12 col-sm-12">
                    <div class="card card-box">
                        <div class="card-head">
                            <header>Basic Information</header>
                        </div>
                        <div class="card-body" id="bar-parent">
                            <form action="{{ route('student.add') }}" method="POST" id="form_sample_1" class="form-horizontal">
                                {{ csrf_field() }}
                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">First Name
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <input type="text" value="{{ old('firstname') }}" name="firstname" data-required="1"
                                                placeholder="enter first name" class="form-control input-height" />
                                        </div>
                                        @if ($errors->has('firstname'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('firstname') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Middle Name
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <input type="text"  value="{{ old('middlename') }}" name="middlename" data-required="1"
                                                placeholder="enter first name" class="form-control input-height" />
                                        </div>
                                        @if ($errors->has('middlename'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('middlename') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Last Name
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <input type="text"  value="{{ old('lastname') }}" name="lastname" data-required="1"
                                                placeholder="enter last name" class="form-control input-height" />
                                        </div>

                                        @if ($errors->has('lastname'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('lastname') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">                                    
                                            Identification No
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <input type="text" name="matric_no" data-required="1" placeholder="enter ID no" class="form-control input-height" /> </div>
                                    </div>
        
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Email
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-envelope"></i>
                                                </span>
                                                <input type="text" class="form-control input-height"  value="{{ old('email') }}" name="email"
                                                    placeholder="Email Address">
                                            </div>
                                        </div>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                        @endif

                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Password
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <input type="password" name="password" data-required="1"
                                                placeholder="enter Password" class="form-control input-height" />
                                        </div>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                    <input type="hidden" value="3" name="user_type">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Confirm Password
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <input type="password" name="password_confirmation" data-required="1"
                                                placeholder="Reenter your password" class="form-control input-height" />
                                        </div>

                                        @if ($errors->has('confirm-Password'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('confirm-Password') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Departments
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <select class="form-control input-height" name="department_id">
                                                <option value="">Select...</option>
                                                @foreach ($departments as $item)
                                                <option value="{{ $item->id }}" >{{ $item->name }} </option>
                                                @endforeach
                                                
                                            </select>
                                        </div>

                                        @if ($errors->has('department_id'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('department_id') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Gender
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <select class="form-control input-height" name="gender">
                                                <option  selected value="{{ old('gender') }}"> {{ old('gender'), 'Select...' }} </option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>

                                        @if ($errors->has('gender'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('gender') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Mobile No.
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <input name="tel_no"  value="{{ old('tel_no') }}" type="text" placeholder="mobile number"
                                                class="form-control input-height" />
                                        </div>

                                        @if ($errors->has('tel_no'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('tel_no') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Birth Date
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <input type="date"  value="{{ old('DOB') }}" class="form-control" name="DOB" />
                                        </div>


                                        @if ($errors->has('DOB'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('DOB') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Address
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <textarea name="address" placeholder="address"
                                                class="form-control-textarea" rows="5">
                                                {{ old('address') }}
                                            </textarea>
                                        </div>

                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="offset-md-3 col-md-9">
                                                <button type="submit" class="btn btn-info"
                                                    >Submit</button>
                                                <button type="button" class="btn btn-default">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> --}}


        </div>
    </div>

@endsection
