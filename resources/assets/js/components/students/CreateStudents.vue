<template>
    <div class="row">
        <notifications position="center" />
        <div class="col-md-12 col-sm-12">
            <div class="card card-box">
                <div class="card-head">
                    <header>Basic Information</header>
                </div>
                <div class="card-body" id="bar-parent">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                    <div v-for="(error, idx) in notifmsg" :key="idx">
                        <div v-for="(er, idxx) in error" :key="idxx">
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert"><span class="fa fa-times"></span></button>
                                <strong>{{ idx }} : </strong> {{ er }}.
                            </div>
                        </div>
                    </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                   
                    <form action="#" id="form_sample_1" class="form-horizontal">
                        <div class="form-body">
                            <div class="form-group row">
                                <label class="control-label col-md-3">First Name
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <input type="text" v-model="student.firstname" data-required="1"
                                        placeholder="enter first name" class="form-control input-height" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Middle Name
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <input type="text" v-model="student.middlename" data-required="1"
                                        placeholder="enter first name" class="form-control input-height" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Last Name
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <input type="text" v-model="student.lastname" data-required="1"
                                        placeholder="enter last name" class="form-control input-height" />
                                </div>
                            </div>
                            
                            <!-- <div class="form-group row">
                                <label class="control-label col-md-3">                                    
                                    Identification No
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <input type="text" v-model="student.matric_no" data-required="1" placeholder="enter ID no" class="form-control input-height" /> </div>
                            </div> -->

                            <div class="form-group row">
                                <label class="control-label col-md-3">Email
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" class="form-control input-height" v-model="student.email"
                                            placeholder="Email Address">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Password
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <input type="password" v-model="student.password" data-required="1"
                                        placeholder="enter Password" class="form-control input-height" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Confirm Password
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <input type="password" v-model="student.password_confirmation" data-required="1"
                                        placeholder="Reenter your password" class="form-control input-height" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Departments
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <select class="form-control input-height" v-model="student.department_id">
                                        <option value="">Select...</option>
                                        <option :value="department.id" v-for="department in departments">
                                            {{ department.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Gender
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <select class="form-control input-height" v-model="student.gender">
                                        <option value="">Select...</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Mobile No.
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <input v-model="student.tel_no" type="text" placeholder="mobile number"
                                        class="form-control input-height" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Birth Date
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <input type="date" class="form-control" v-model="student.DOB" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Address
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <textarea v-model="student.address" placeholder="address"
                                        class="form-control-textarea" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="offset-md-3 col-md-9">
                                        <button type="submit" class="btn btn-info"
                                            @click.prevent="create()">Submit</button>
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
</template>

<script>
export default {
    data() {
        return {
            student: {},
            departments: '',
            notifmsg: '',
        }
    },

    mounted() {

    },

    methods: {
        create() {
            this.student.user_type = 3;
            axios.post('/student/add', this.student)
                .then(response => {
                    var _response = response.data;
                    if (_response.status == 0) {
                        this.$notify({ type: 'success', text: 'Student added successfully', speed: 400 });
                    }
                    else {
                        console.log(_response);
                        
                        // this.$notify({ type: 'error', text: '<span style="color: white">Process unsuccessfully.Check if course exists and try again later</span>', speed: 400 });
                    }
                })
                .catch(error => {
                     this.notifmsg = error.response.data.errors;
                    // this.$notify({ type: 'error', text: '<span style="color: white">Process unsuccessfully.Check if course exists and try again later</span>', speed: 400 });
                })
        },

        fetchDepartments() {
            axios.get('/department/view')
                .then(response => {
                    var _response = response.data;
                    if (_response.status === 0) {
                        this.departments = _response.data;
                    }
                })
        },
    },

    mounted() {
        this.fetchDepartments();
    }
}
</script>