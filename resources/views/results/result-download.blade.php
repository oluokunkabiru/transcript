<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/lobipanel/lobipanel.min.css">
    <link rel="stylesheet" href="/css/vendor/lobipanel.min.css">
    <link rel="stylesheet" href="/css/jqueryui/jquery-ui.min.css">
    <link rel="stylesheet" href="/css/pages/widgets.min.css">
    <link rel="stylesheet" href="/css/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <style>
        table {
          border-collapse: collapse;
          width: 100%;
        }
        
        th, td {
          text-align: left;
          padding: 8px;
        }
        
        tr:nth-child(even){background-color: #f2f2f2}
        
        th {
          background-color: #4CAF50;
          color: white;
        }

        @media print{
            body *{
                visibility:hidden;
            }
            #printMe, #printMe *{
                visibility: visible;
                -webkit-print-color-adjust: exact !important;   /* Chrome, Safari, Edge */
                color-adjust: exact !important;                 /*Firefox*/
            }
            #printMe{
                position: relative;
                left: 0;
                right: 0;
            }
        }

        #printMe{

            background-image: linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9)), url("{{ asset('img/logo-2-mob.png') }}");
            /* color:#601D43; */
            /* background-position:center;
            background-repeat:no-repeat;
            background-size:100%; */

       }
        </style>    
</head>
<body>
    <div class="container-fluid">
        <div class="">
            <div class="col-md-12 col-sm-12">
                <div class="card card-box">
                    <div class="card-head">
                        <header>All Results</header>
                    </div>
    
    
                    <div class= "card-body" for="allResult in allRegisterCourse" id="bar-parent">
                        <div class="col-md-12">
                            <table class="tbl-typical col-md-4">
                                <div  class="table-scrollable">
                                    <div id="printMe">
                                        <div class="col-md-12">
                                            <hr>
                                                    <h1 class="text-center font-weight-bold">OSUN STATE UNIVERSITY, OSOGBO</h1> 
                                                    <hr>
                                                    <h3 class="text-center  font-weight-bold">ACADEMIC AFFAIRS UNIT</h3>
                                                    <h3 class="text-center  font-weight-bold">EXAMINATION & RECORDS OFFICE
                                    
                                        </div>
                                            <div class="row">
                                                <div class="col-9">
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <h6><strong>Full Name:</strong></h6>
                                                        </div>
                                                        <div class="col-7">
                                                            <h6>{{ Auth::user()->firstname." ". Auth::user()->middlename." ". Auth::user()->lastname }}</h6>
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-5">
                                                            <h6><strong>Matriculation Number:</strong></h6>
                                                        </div>
                                                        <div class="col-7">
                                                            <h6>{{ Auth::user()->matric_no }}</h6>
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-5">
                                                            <h6><strong>Department:</strong></h6>
                                                        </div>
                                                        <div class="col-7">
                                                            <h6>{{ Auth::user()->department->name }}</h6>
                                                        </div>
                                                    </div>


                                                </div>
                                                
                                                <div class="col-3">
                                                    <h6>DOB: <strong>{{ Auth::user()->DOB }}</strong> </h6>
                                                </div>
                                            </div>
                                        @forelse ($results as $item)
                                            <hr>
                                            <h4 class="text-center">Session:{{ $item->session->name }} | Semester:{{$item->sem->name}} | Level:{{ $item->level->name }}</h4>
                                            <hr>  
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle">
                                            <thead>
                                            <tr>
                                                <th align="center">Course Title</th>
                                                <th align="center">Course Code</th>
                                                <th align="center">Unit</th>
                                                
                                                <th align="center">C.A</th>
                                                <th align="center">Exam</th>
                                                <th align="center">Total</th>
                                                <th align="center">Grade</th>
                                                <th align="center">Point</th>
                                                <th align="center">Total Point</th>


                                            </tr>
                                            </thead>
                                            <tbody >
                                                @php
                                                    $totalPoint =0;
                                                    $totalUnit = 0;
                                                    $cpga = 0;
                                                    $totalTCP = 0;
                                                    
                                                @endphp
                                            @foreach (json_decode($item->results, TRUE) as $result)
                                                @php
                                                    $ca = $result['C_A'];
                                                    $exam = $result['Exam'];
                                                    $texam = $ca + $exam ;
                                                    $unit = ($item->getCourse($result['course_id'])->unit);
                                                    $grade = $item->grade($texam);
                                                    $point = $item->point($grade);
                                                    $tcp = $unit*$point;
                                                    $totalPoint += $point;
                                                    $totalUnit += $unit;
                                                    $totalTCP +=$tcp;

                                                @endphp 
                                            <tr>
                                                <td>{{ ($item->getCourse($result['course_id'])->name) }}</td>
                                                <td>{{ ($item->getCourse($result['course_id'])->course_code) }}</td>
                                                <td>{{ ($item->getCourse($result['course_id'])->unit) }}</td>
                                                <td>{{ $ca }}</td>
                                                <td>{{ $exam }}</td>
                                                <td>{{ $texam }}</td>
                                                <td>{{ $grade }}</td>
                                                <td>{{ $point }}</td>
                                                <td>{{ $tcp }}</td>
                                               
                                            </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Total</th>
                                                <th></th>
                                                <th align="center" >{{ $totalUnit }}</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th align="center" >{{ $totalPoint }}</th>
                                                <th align="center" >{{ $totalTCP }}</th>
                                                
                                                {{-- <th align="center" >GPA: {{ $totalPoint/$totalUnit }}</th> --}}
                                            </tr>
                                            <tr>
                                                <th>CGPA</th>
                                                <th align="center" colspan="4">
                                                    {{ number_format($totalTCP/$totalUnit,2,".",",") }}
                                                </th>
                                                <th align="center" colspan="4">{{ $item->myClass($totalTCP/$totalUnit) }}</th>
                                            </tr>
                                            </tfoot>
                                        </table>

                                        @empty
                                            
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <transcript-view></transcript-view> --}}
                </div><!--.row-->
            </div><!--.container-fluid-->
        </div>
    
</body>
</html>