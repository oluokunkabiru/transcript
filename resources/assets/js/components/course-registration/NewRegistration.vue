<template>
    <div>
        <notifications position="top center" />
        <div class="row">
            <div class="col-md-8">
                    <table class="tbl-typical">
                        <tr>
                            <th align=""><h4>Course Registration</h4></th>
                            <th><h6 style="float:right;">Add Courses &emsp;<a class="fa fa-plus-circle" @click="addCourse"></a></h6></th>
                        </tr>
                        <tr>
                            <td>
                                Semester:
                                 <select name="" id="" class="form-control" v-model="registrationDetails.semester">
                                        <option :value="semester.id" v-for="semester in semesters">
                                            {{ semester.name  }}
                                        </option>
                                    </select>
                                <!-- <select name="" id="" class="form-control col-md-6" v-model="registrationDetails.semester">
                                    <option value="1st">First Semester</option>
                                    <option value="2nd">Second Semester</option>
                                </select> -->
                            </td>

                            <td>
                                Year:
                                <select name="" id="" class="form-control" v-model="registrationDetails.year">
                                        <option value="" selected>Session</option>
                                        <option :value="session.id" v-for="session in sessions">
                                            {{ session.name  }}
                                        </option>
                                    </select>
                                <!-- <input type="text" v-model="registrationDetails.year" class="form-control" placeholder="2017/2018"> -->
                            </td>
                            <td>Level:

                                <select name="" id="" class="form-control" v-model="registrationDetails.level_id">
                                        <option value="" selected>Level</option>
                                        <option :value="session.id" v-for="session in levels">
                                            {{ session.name  }}
                                        </option>
                                    </select>
                            </td>
                        </tr>
                        <tr v-for="(course, index) in registrationDetails.courses">
                            <td>
                                <label for="" class="form-label">Course:</label>
                            </td>
                            <td>
                                        <select name="" id="" class="form-control col-md-6" v-model="course.course_id">
                                            <option :value="singleCourse.id" v-for="singleCourse in listOfCourses">
                                                {{singleCourse.name}} || {{singleCourse.course_code}}
                                            </option>
                                        </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button class="btn btn-success" style="margin-left:20px; margin-right:20px;" @click.prevent="registerStudent">
                                    <!--<img src="/assets/loaders/Spinner.svg" alt="loading" v-if="loading">--> Save
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-danger" @click.prevent="registeredCourses = [{course_id:''}]">Clear</button>
                            </td>
                        </tr>

                    </table>
            </div>

        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                students :'',
                sessions :'',
                semesters:'',
                levels:'',
                courseEditor:false,
                listOfCourses:{},
                registrationDetails: {
                    courses: [
                        { course_id:''}
                    ],
                    student_id:'',
                },
                check:''
            }
        },

        methods: {
            fetchStudent(){
                axios.get('/student/loggedIn')
                    .then(response => {
                        var _response = response.data;
                        if(_response.status === 0){
                            this.registrationDetails.student_id = _response.data;
                        }
                    })
            },
            fetchSessions() {
            axios.get('/student/course-registration-session')
                .then(response => {
                    var _response = response.data;
                    console.log(_response.data);
                    if (_response.status === 0) {

                        this.sessions = _response.data;
                        console.log("hello");

                    }
                })
        },
 getSemester(){
                            axios.get('/get-semester')
                                .then(response => {
                                    var _response = response.data;
                                    if(_response.status === 0){
                                        this.semesters =  _response.data;
                                    }
                                })
                        },
            addCourse(){
                this.registrationDetails.courses.push({course_id: ''});
            },

            getCourses(){
                axios.get('/course/view')
                    .then(response => {
                        var _response = response.data;
                        if (_response.status === 0){
                            this.listOfCourses =  _response.data;
                        }
                    })
            },

            registerStudent(){
                axios.post('/student/registration/add', this.registrationDetails)
                    .then(response => {
                        var _response = response.data;
                        if (_response.status === 0){
                            this.$notify({type: 'success', text: 'Registration successfully', speed:400});
                        }
                        else{
                            this.$notify({type: 'error', text: '<span style="color: white">Already enroll for this course. Try again later</span>', speed:400});
                        }
                    })
                    .catch(error =>{
                        this.$notify({type: 'error', text: '<span style="color: white">Already register for this course. Try again later</span>', speed:400});
                    })
            },
             fetchLevel(){
                axios.get('/get-level')
                    .then(response => {
                        var _response = response.data;
                        if(_response.status === 0){
                            this.levels = _response.data;
                        }
                    })
            },
        },

        mounted(){
            this.fetchStudent();
            this.getCourses();
             this.fetchSessions();
            this.getSemester();
            this.fetchLevel();
        },

        watch: {
            check(){
                console.log(this.check);
            }
        }
    }
</script>