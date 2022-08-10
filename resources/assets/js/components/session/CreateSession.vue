<template>
    <div class="row">
        <notifications position="center" />
        <div class="col-md-12 col-sm-12">
            <div class="card card-box">
                <div class="card-head">
                    <header>Add New Session</header>
                </div>
                <div class="card-body" id="bar-parent">
                    <form action="#" id="form_sample_1" class="form-horizontal">
                        <div class="form-body">
                            <div class="form-group row">
                                <label class="control-label col-md-3"> Years
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <input type="text" v-model="session.name" data-required="1" placeholder="2015/2016" class="form-control input-height" /> </div>
                            </div>
                            
                            <div class="form-actions">
                                <div class="row">
                                    <div class="offset-md-3 col-md-9">
                                        <button type="submit" class="btn btn-info" @click.prevent="create()">Create</button>
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
                session:{},
            }
        },

        mounted(){

        },

        methods: {
            create(){
                axios.post('/session', this.session)
                    .then(response => {
                        var _response = response.data;
                        console.log(response);

                        if(_response.status == 0){
                            this.$notify({type: 'success', text: _response.message, speed:400});
                        }
                        else{
                            this.$notify({type: 'error', text: '<span style="color: white">Process'+ _response.message +'</span>', speed:400});
                        }
                    })
                    .catch(error =>{
                        this.$notify({type: 'error', text: '<span style="color: white">'+ error.response.data.errors.name[0] +'</span>', speed:400});
                    })
            },
        },

        
    }
</script>