
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="RMS, Result Management System">
    <meta name="keywords" content="RMS, Result Management System, Timothy, Timothy-mee">
    <title>RMS | Register</title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
    <!-- icons -->
    <link href="/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <!-- Material Design Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--bootstrap -->
    <link href="/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Material Design Lite CSS -->
    <link rel="stylesheet" href="/plugins/material/material.min.css">
    <link rel="stylesheet" href="/css/material_style.css">
    <!-- Theme Styles -->
    <link href="/css/theme/light/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
    <link href="/css/theme/light/style.css" rel="stylesheet" type="text/css" />
    <link href="/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="/css/theme/light/theme-color.css" rel="stylesheet" type="text/css" />
    <!-- dropzone -->
    <link href="/plugins/dropzone/dropzone.css" rel="stylesheet" media="screen">
    <!-- Date Time item CSS -->
    <link rel="stylesheet" href="/plugins/material-datetimepicker/bootstrap-material-datetimepicker.css" />
    <!-- favicon -->
    {{--<link rel="shortcut icon" href="../assets/img/favicon.ico" />--}}
</head>
<!-- END HEAD -->
<body class="">
<div class="">
    <div class="page-container">
        <!-- start page content -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="breadcrumb">
                    <div class="breadcrumb">
                        <div class="pull-left">
                            <div class="page-title"><span style="color:rebeccapurple">New Application</span></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="card-head">
                                <header><h4>Basic Information</h4></header>
                            </div>
                            {{-- <form  action="{{ route('register') }}"> --}}
                                {{-- {{ csrf_field() }} --}}
                                <div class="card-body row">
                                    <div class="col-lg-6 p-t-20">
                                        <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                            <input class="mdl-textfield__input" type = "text" name="matric_no" id="matric_no">
                                            <label class="mdl-textfield__label" >Matric No</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 p-t-20">
                                        <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                            <input class="mdl-textfield__input" type = "text" name= "firstname">
                                            <label class="mdl-textfield__label">First Name</label>
                                        
                                        </div>
                                    </div>
                                    <div class="col-lg-6 p-t-20">
                                        <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                            <input class="mdl-textfield__input" type = "text" name= "middlename">
                                            <label class="mdl-textfield__label">Second Name</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 p-t-20">
                                        <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                            <input class="mdl-textfield__input" type = "text" name="lastname">
                                            <label class="mdl-textfield__label" >Last Name</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 p-t-20">
                                        <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                            <input class="mdl-textfield__input" type = "email" name="email">
                                            <label class="mdl-textfield__label" >Email</label>
                                            <span class="mdl-textfield__error">Enter Valid Email Address!</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 p-t-20">
                                        <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                            <input class = "mdl-textfield__input" type = "text"
                                                   pattern = "-?[0-9]*(\.[0-9]+)?" name = "tel_no" id="telephone">
                                            <label class = "mdl-textfield__label" for = "telephone">Mobile Number</label>
                                            <span class = "mdl-textfield__error">Number required!</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 p-t-20">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                            <select name="department_id"  class="form-control">
                                                <option value="">Department</option>
                                                @foreach($departments as $department)
                                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    
                                    


                                    <div class="col-lg-12 p-t-20 text-center">
                                        <button  onclick="payWithPaystack()" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-success">Pay Now</button>
                                        <a href="{{route('login')}}" class="text">
                                            <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-pink">Already Paid</button>
                                        </a>
                                        {{-- <a href="{{route('login')}}" class="text">Already Paid</a> --}}
                                    </div>
                                </div>
                                <input type="hidden" name="referrence" >
                                <input type="hidden" name="user_id" >
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page content -->
    </div>
    <!-- end page container -->
    <!-- start footer -->
    <div class="page-footer">
        <div class="page-footer-inner"> {{ date('Y') }} &copy; RMS</div>
        {{--<div class="scroll-to-top">--}}
            {{--<i class="icon-arrow-up"></i>--}}
        {{--</div>--}}
    </div>
    <!-- end footer -->
</div>
<!-- start js include path -->
{{-- <script src="{{ asset('plugins/jquery/jquery.min.js') }}" ></script> --}}
{{-- <script src="{{ asset('plugins/popper/popper.js') }}" ></script> --}}
<script src="{{ asset('bootsrap/jquery.js') }}"></script>
<script src="{{ asset('bootsrap/popper.js') }}"></script>
<script src="{{ asset('bootsrap/bootstrap.min.js') }}"></script>
{{-- <script src="/plugins/jquery-blockui/jquery.blockui.min.js" ></script> --}}
{{-- <script src="/plugins/jquery-slimscroll/jquery.slimscroll.js"></script> --}}

<!-- bootstrap -->
{{-- <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}" ></script> --}}
<!-- Common js-->
{{-- <script src="/js/app(copy).js" ></script> --}}
{{-- <script src="/js/layout.js" ></script> --}}
{{-- <script src="/js/theme-color.js" ></script> --}}
<!-- Material -->
{{-- <script src="/plugins/material/material.min.js"></script> --}}
{{-- <script src="/js/pages/material-select/getmdl-select.js" ></script> --}}
{{-- <script  src="/plugins/material-datetimepicker/moment-with-locales.min.js"></script>
<script  src="/plugins/material-datetimepicker/bootstrap-material-datetimepicker.js"></script>
<script  src="/plugins/material-datetimepicker/datetimepicker.js"></script>
<!-- dropzone -->
<script src="/plugins/dropzone/dropzone.js" ></script>
<script src="/plugins/dropzone/dropzone-call.js" ></script> --}}
<script src="{{ asset('axios/dist/axios.min.js') }}"></script>
<script src="{{ asset('sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script> --}}
{{-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script> --}}

{{-- <script src="https://js.paystack.co/v1/inline.js"></script> --}}
	<script src="https://js.paystack.co/v1/inline.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<!-- end js include path -->
<script>
    $(document).ready(function(){

        $("#matric_no").on('change', function(){
            var data = $("#matric_no").val();
            var params = {
                    matric_no: data,
                }
            axios.post('{{ route('transcript-data') }}', params)
            .then(response => {
                var student = response.data;
                $("[name='firstname']").val(student.firstname).attr('disabled', true);
                $("[name='lastname']").val(student.lastname).attr('disabled', true);
                $("[name='middlename']").val(student.middlename).attr('disabled', true);
                $("[name='email']").val(student.email).attr('disabled', true);
                $("[name='user_id']").val(student.id);
                $("[name='department_id'] option:not(:selected)").attr('disabled', 'true');
                $("[name='department_id'] option:first").val(student.department_id).attr('disabled', true);
                $("[name='department_id'] option:first").text(student.department.name).attr('disabled', true);

                $("[name='tel_no']").val(student.tel_no).attr('disabled', true).click();
                $(".mdl-textfield").addClass('is-focused')
                // payWithPaystack();
                // console.log(_response.firstname);
                // console.log(_response.firstname);
            })
        })
      
        

   
    
    })

    function payWithPaystack() {
        // alert($("[name='email']").val());
        var matric_no =$("#matric_no").val();
        // alert(matric_no.replace(/\//g, "_"));
		var handler = PaystackPop.setup({
			key: "{{ env('PAYSTACK_PUBLIC_KEY') }}",
			email: $("[name='email']").val(),
			amount: 20000,//parseInt($('#price').val()) * 100,
			currency: "NGN",
			ref: matric_no.replace(/\//g, "_")+8,
			firstname: $("[name='firstname']").val(),
			lastname: $("[name='lastname']").val() ,
			// label: "Optional string that replaces customer email"
			metadata: {
				custom_fields: [
					{
						display_name: "Mobile Number",
						variable_name: "mobile_number",
						value: $("[name='tel_no']").val()
					}
				]
			},
			callback: function (response) {
				$("[name='referrence']").val(response.reference);
                // console.log(response);

                if ($("[name='referrence']").val() != '') {
                    
                    var params = {
                    user_id: $("[name='user_id']").val(),
                    status :"success",
                    payment_details : response,
                }
                        axios.post('{{ route('transcript_payment.store') }}', params)
                        .then(response => {
                            // console.log(response);
                            swal({
						title: response.data.message,
						text: "Dear "+$("[name='firstname']").val() +" "+ $("[name='lastname']").val()+" "+$("[name='middlename']").val()+"!\n" + 'r : ' + response.reference +"\nPLEASE WAIT AS YOU WILL BE REDIRECTED TO LOGIN PAGE NOW...",
						type: "success",
						icon: "success",
						showConfirmButton: true,
						allowOutsideClick: false,
						closeOnClickOutside: false,
					}).then(function() {
                        window.location.assign("{{ route('login') }}");
                        });

                });
                        
					
					// form.submit();
				}
			},
			onClose: function () {
				alert('window closed');
                // form.submit();
			}
		});
		handler.openIframe();
	}
   
</script>
</body>
</html>