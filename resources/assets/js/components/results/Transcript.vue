<template>
    <div class="row">
        <notifications position="center" />
        <div class="col-md-12 col-sm-12">
            <div class="card card-box">
                <div class="card-head">
                    <header>All Results</header>
                </div>


                <div class="card-body" v-for="allResult in allRegisterCourse" id="bar-parent">
                    <div class="col-md-12">
                        <table class="tbl-typical col-md-4">
                            
                            <!-- <tr v-for="resultDetails in allResult">
                               
                            </tr> -->
                        </table>

                        <div  class="table-scrollable">
                            <div id="printMe">
                                    <span>
                                        <h4><strong>
                                        <h5>Level: {{allResult.level.name}}</h5> 
                                        <h5>Semester: </h5> {{allResult.semester.name}}
                                        <h5>Session: </h5> {{allResult.session.name }}
                                        </strong>
                                        </h4>
                                    </span>     
                                <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle">
                                    <thead>
                                    <tr>
                                        <th align="center">Course Code</th>
                                        <th align="center">Unit</th>
                                        <th align="center">C.A</th>
                                        <th align="center">Exam</th>
                                        <th align="center">Total</th>
                                        <th align="center">Grade</th>
                                    </tr>
                                    </thead>
                                    <tbody >
                                    <!-- {{ results.grade }}v-for="result in results" -->
                                    id {{ allResult.id }}
                                    <tr v-for="result in allResults[allResult.id]" >
                                    <!-- {{ result }} -->
                                        <td align="center">{{result.course_code}}</td>
                                        <td align="center">{{result.unit}}</td>
                                        <td align="center">{{result.C_A}}</td>
                                        <td align="center">{{result.Exam}}</td>
                                        <td align="center">{{result.total}}</td>
                                        <td align="center">{{result.grade}}</td>
                                    </tr>
                                    </tbody>
                                    <tbody>
                                    <tr>
                                        <th align="center" colspan="2">Total Grade Points: {{gpa.totalGradePoints}}</th>
                                        <th align="center" colspan="2">Total Units: {{gpa.totalUnits}}</th>
                                        <th align="center" colspan="2">GPA: {{gpa.gpa}}</th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <div style="float: right">
                                <!-- <button class="btn btn-sm btn-default" @click="print"><span class="fa fa-print"></span></button> -->
                                <!-- <button class="btn btn-sm btn-default" @click.prevent="pdf"><span class="fa fa-file-pdf-o"></span></button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
               
                allRegisterCourse:'',
                allResults :[],
                resultArray:[],
                gpa:{},
            }
        },

        methods: {
            fetchResults(){
                this.resultArray = [];
                axios.get('transcript-check-result')
                    .then(response => {
                        var _response = response.data;
                        if(_response.status === 0){
                            
                            this.allRegisterCourse = _response.data;
                            this.allRegisterCourse.forEach(register =>{
                                // this.allResults.push(register);
                            // this.rsession = register.session.name
                            // this.rsemester = register.semester.name
                            // this.rlevel = register.level.name
                            // // console.log(this.rlevel);
                            var allResult = JSON.parse(register.results);
                            allResult.forEach( entry => {
                                // console.log(entry.semester.name);
                            //    var result = register.id;
                            //    console.log(result);
                            // this.resultArray = this.resultArray[result];
                            // console.log(this.resultArray);
                               var secondEntry = entry;
                            //    console.log(secondEntry);
                            //    result.status = entry.status;
                            //    entry.results = JSON.parse(entry.results);

                            //    /*calculating the grade*/
                            //    result.forEach(secondEntry => {
                                   secondEntry.total = parseInt(secondEntry.C_A) + parseInt(secondEntry.Exam);
                                   if (secondEntry.total >= 70){
                                       secondEntry.grade = 'A';
                                       secondEntry.points = 5;
                                   }else if(secondEntry.total <70 && secondEntry.total >= 60){
                                       secondEntry.grade = 'B';
                                       secondEntry.points = 4;
                                   }else if(secondEntry.total <60 && secondEntry.total >= 50){
                                       secondEntry.grade = 'C';
                                       secondEntry.points = 3;
                                   }else if(secondEntry.total <50 && secondEntry.total >= 40){
                                       secondEntry.grade = 'D';
                                       secondEntry.points = 0;
                                   }else if(secondEntry.total <40){
                                       secondEntry.grade = 'F';
                                       secondEntry.points = 0;

                                   }

                                //    console.log(secondEntry.grade);

                            // //     //    allCourses.forEach(courseEntry =>{
                            // //     //        if (courseEntry.id  == secondEntry.course_id.course_id){
                            // //     //            secondEntry.unit = courseEntry.unit;
                            // //     //            secondEntry.course_code = courseEntry.course_code;
                            // //     //        }
                            // //     //    })
                            //    })

                                this.resultArray.push(secondEntry);
                                // console.log(this.resultArray.length);
                            });

                            // console.log(this.allResults);
                            // console.log(register.id);
                            this.allResults[register.id] =  this.resultArray; //[2,3,4,5];
        // [(this.resultArray)];
                            // console.log(this.allResults);

                            })

                            this.allResults.forEach( ell =>{
                                // console.log(ell[0]);
                                ell.forEach(hi =>{
                                    console.log(hi.course_reg_id);
                                })
                            } )
                        }
                    })
            },
            //  fetchLevel(){
            //     axios.get('/get-level')
            //         .then(response => {
            //             var _response = response.data;
            //             if(_response.status === 0){
            //                 this.level = _response.data;
            //             }
            //         })
            // },
            // getAuthUser(){
            //     axios.get('/auth')
            //         .then(response => {
            //             var _response = response.data;
            //             if (_response.status === 0){
            //                 this.authUser = _response.data;
            //             }
            //         })
            // },
            // fetchSessions() {
            //     axios.get('/student/course-registration-session')
            //         .then(response => {
            //             var _response = response.data;
            //             if (_response.status === 0) {

            //                 this.sessions = _response.data;

            //             }
            //         })
            // },
            // getSemester(){
            //     axios.get('/get-semester')
            //         .then(response => {
            //             var _response = response.data;
            //             if(_response.status === 0){
            //                 this.semesters =  _response.data;
            //             }
            //         })
            // },
            // getAllCourses(){
            //     axios.get('/course/view')
            //         .then(response => {
            //             var _response = response.data;
            //             if (_response.status === 0){
            //                 this.allCourseInfo = _response.data;
            //             }
            //         })
            // },

            // fetchStudents(){
            //     axios.get('/student/view')
            //         .then(response => {
            //             var _response = response.data;
            //             if(_response.status === 0){
            //                 this.students = _response.data;
            //             }
            //         })
            // },

            // viewResult(student_id){
            //     this.calculateCGPA(student_id);
            //     this.selectedStudentId = student_id;
            //     this.showResult = !this.showResult;
            // },

            // print(){
            //     var prtContent = document.getElementById("printMe");
            //     var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
            //     WinPrint.document.write(prtContent.innerHTML);
            //     WinPrint.document.close();
            //     WinPrint.focus();
            //     WinPrint.print();
            //     WinPrint.close();
            // },

            // pdf(){
            //     var data = {
            //         result : this.resultArray,
            //         student_id: this.selectedStudentId,
            //         gpa: this.gpa
            //     }

            //     axios.get('/result/pdf/make', {
            //         params:{
            //             result : this.resultArray,
            //             student_id: this.selectedStudentId,
            //             gpa: this.gpa
            //         }
            //     });
            // },

            
            // calculateCGPA (student_id){
            //     var totalUnits = 0.0;
            //     var gradePoints = 0.0;
            //     var  gpa = 0.0;
            //     this.gpa = {};
            //    /* var student_id = '';*/
            //     this.resultArray.forEach(entry =>{
            //         entry.forEach(subEntry => {
            //             if(subEntry.student_id == student_id){;
            //                 var v1 = parseInt(subEntry.unit);
            //                 var v2 = parseInt(subEntry.points);
            //                 totalUnits += parseInt(subEntry.unit);
            //                 var points = v1 * v2;
            //                 gradePoints += points
            //             }
            //         })

            //         gpa = gradePoints / totalUnits;

            //     })

            //     this.gpa.totalGradePoints = gradePoints;
            //     this.gpa.totalUnits = totalUnits;
            //     this.gpa.gpa = gpa;
            //     this.gpa.student_id = student_id;

            // },

            // approveResult(result){
            //     console.log(result.id);
            // },

            // printTemplate(student_id){

            // },

            /*update(course){
                axios.post('/course/edit', course)
                    .then(response => {
                        this.fetchView();
                        this.$notify({type: 'success', text: 'Course update successful', speed:400});
                    })
                    .catch(error =>{
                        this.$notify({type: 'error', text: '<span style="color: white">Updating course. unsuccessfully. Try again later</span>', speed:400});
                    })
            }*/
        },

        mounted(){
            // this.getAuthUser();
            this.fetchResults();
            // this.getAllCourses();

            // this.fetchSessions();
            // this.getSemester();


        },

        // watch: {
        //     year() {
        //         if (this.semester) {
        //             this.fetchStudents();
        //             this.getAllCourses();
        //             this.fetchResults();
        //         }
        //     },

        //     semester() {
        //         if(this.year){
        //             this.fetchStudents();
        //             this.getAllCourses();
        //             this.fetchResults();
        //         }
        //     }
        // }
    }
</script>