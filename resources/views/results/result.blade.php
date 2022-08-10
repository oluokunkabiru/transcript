<html>
    <head>
      {{-- <link href='plugins/bootstrap/css/bootstrap.min.css' rel='stylesheet' type='text/css' />
      <link href='/plugins/summernote/summernote.css' rel='stylesheet'>
      <link href='/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css' rel='stylesheet' type='text/css' />
      <link rel='stylesheet' href='/plugins/material/material.min.css'>
      <link rel='stylesheet' href='/css/material_style.css'>
          <link href='/css/theme/light/theme_style.css' rel='stylesheet' id='rt_style_components' type='text/css' />
          <link href='/css/theme/light/style.css' rel='stylesheet' type='text/css' />
          <link href='/css/theme/light/theme-color.css' rel='stylesheet' type='text/css' />
      <link href='/css/plugins.min.css' rel='stylesheet' type='text/css' />
      <link href='/css/responsive.css' rel='stylesheet' type='text/css' />
      <link href='/css/pages/formlayout.css' rel='stylesheet' type='text/css' /> --}}
  </head>                
  <body>
      @php
          $resultArray = $datas['result'];
        $gpa = json_decode($datas['gpa'], TRUE);
        $student_id = $datas['student_id'];

        $data = [
            'resultArray' => $resultArray,
            'gpa' => $gpa,
            'student_id' => $student_id,
        ];
      @endphp
      <div class='table-scrollable'>
          <table class='table table-striped table-bordered table-hover table-checkable order-column valign-middle'>
              <thead>
              <tr>
                  <th align='center'>Course Code</th>
                  <th align='center'>Unit</th>
                  <th align='center'>C.A</th>
                  <th align='center'>Exam</th>
                  <th align='center'>Total</th>
                  <th align='center'>Grade</th>
              </tr>
              </thead>
              <tbody>
                @foreach($resultArray as $results){
                    @foreach(json_decode($results, TRUE) as $result){
                        {{-- // return $result; --}}
                        @if ($result['student_id'] == $student_id){                
                <tr>
                    <td align='center'>{{ $result['course_code'] }}</td>
                    <td align='center'>{{ $result['unit'] }}</td>
                    <td align='center'>{{ $result['C_A'] }}</td>
                    <td align='center'>{{ $result['Exam'] }}</td>
                    <td align='center'>{{ $result['total'] }}</td>
                    <td align='center'>{{ $result['grade'] }}</td>
                </tr>
                @endif
                @endforeach
                @endforeach
             </tbody>

             <tfoot>
                <tr>
                    <th align='center' colspan='2'>Total Grade Points:{{ $gpa['totalGradePoints'] }}</th>
                    <th align='center' colspan='2'>Total Units:{{ $gpa['totalUnits'] }}</th>
                    <th align='center' colspan='2'>GPA:{{ $gpa['gpa'] }}</th>
                </tr>
            </tfoot>
              
          </table>
      </div>

  
  </body>