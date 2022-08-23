<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use PDF;
use App;
use Illuminate\Http\Response;

class PdfController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function make(Request $request)
    {
        // return $request;
        $datas = $request->all();
        return $datas;

//         $resultArray = $datas['result'];
//         $gpa = json_decode($datas['gpa'], TRUE);
//         $student_id = $datas['student_id'];

//         $data = [
//             'resultArray' => $resultArray,
//             'gpa' => $gpa,
//             'student_id' => $student_id,
//         ];

//         // $hello  ="Good mornig";
// // return dd($data);
//       $resultHtml = '';
//         $gpaHtml = '';


//         foreach($resultArray as $results){
//             // return json_decode($results, true);
//             foreach(json_decode($results, TRUE) as $result){
//                 // return $result;
//                 if ($result['student_id'] == $student_id){
//                     $resultHtml .=  "<tbody>
//                                         <tr>
//                                             <td align='center'>".$result['course_code']."</td>
//                                             <td align='center'>".$result['unit']."</td>
//                                             <td align='center'>".$result['C_A']."</td>
//                                             <td align='center'>".$result['Exam']."</td>
//                                             <td align='center'>".$result['total']."</td>
//                                             <td align='center'>".$result['grade']."</td>
//                                         </tr>
//                                      </tbody>";
//                 }
//             }
//         }


//         $gpaHtml .= "<tbody>
//                         <tr>
//                             <th align='center' colspan='2'>Total Grade Points:".$gpa['totalGradePoints']."</th>
//                             <th align='center' colspan='2'>Total Units:".$gpa['totalUnits']."</th>
//                             <th align='center' colspan='2'>GPA:".$gpa['gpa']."</th>
//                         </tr>
//                     </tbody>";

//         $view =
//         "
//                 <html>
//                   <head>
//                     <link href='plugins/bootstrap/css/bootstrap.min.css' rel='stylesheet' type='text/css' />
//                     <link href='/plugins/summernote/summernote.css' rel='stylesheet'>
//                     <link href='/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css' rel='stylesheet' type='text/css' />
//                     <link rel='stylesheet' href='/plugins/material/material.min.css'>
//                     <link rel='stylesheet' href='/css/material_style.css'>
//                         <link href='/css/theme/light/theme_style.css' rel='stylesheet' id='rt_style_components' type='text/css' />
//                         <link href='/css/theme/light/style.css' rel='stylesheet' type='text/css' />
//                         <link href='/css/theme/light/theme-color.css' rel='stylesheet' type='text/css' />
//                     <link href='/css/plugins.min.css' rel='stylesheet' type='text/css' />
//                     <link href='/css/responsive.css' rel='stylesheet' type='text/css' />
//                     <link href='/css/pages/formlayout.css' rel='stylesheet' type='text/css' />
//                 </head>                
//                 <body>
//                     <div class='table-scrollable'>
//                         <table class='table table-striped table-bordered table-hover table-checkable order-column valign-middle'>
//                             <thead>
//                             <tr>
//                                 <th align='center'>Course Code</th>
//                                 <th align='center'>Unit</th>
//                                 <th align='center'>C.A</th>
//                                 <th align='center'>Exam</th>
//                                 <th align='center'>Total</th>
//                                 <th align='center'>Grade</th>
//                             </tr>
//                             </thead>".$resultHtml.$gpaHtml."
//                         </table>
//                     </div>

                
//                 </body>
//         ";

        $pdf = PDF::loadView('results.result', compact(['datas']));
        return $pdf =  $pdf->download('result.pdf');


/*        return (new Response($pdf,200))->header('ContentType','application/pdf')
                                        ->header('Content-Disposition': 'attachment'; 'filename'="downloaded.pdf");*/
        /*if(Input::get('result') == null){
            $pdf = PDF::loadView('auth.login');
            return $pdf->download('result.pdf');
        }*/


    }

    public function download()
    {
        $pdf = PDF::loadView('auth.login');
        return $pdf->download('result.pdf');
    }

}
