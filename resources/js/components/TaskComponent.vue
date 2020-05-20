<template>
    <div>
        <div v-if="!loading">
                <img class="rounder mx-auto d-block" :src="image" alt="loader">
            </div>

            <div v-else>
                
                
             
            <table class ="table" v-if="tasks">
                <thead>
                    <tr>
                        <th style="font-size: 18px; width: 5%" scope="col"><b>#</b></th>
                        <th style="font-size: 18px; width: 20%" scope="col"><b>Restaurant Name</b></th>
                        <th style="font-size: 18px; width: 20%" scope="col"><b>Contact Info</b></th>
                        <th style="font-size: 18px; width: 20%" scope="col"><b>Reviews</b></th>
                        <th style="font-size: 18px; width: 20%" scope="col"><b>Website</b></th>
                        <th style="font-size: 18px;" class="w-50" scope="col"><b>Location</b></th>
                    </tr>
                </thead>  
                <tbody>
                    <tr v-for="(task, index) in tasks">
                        <td><b>{{ index + 1 }}</b></td>
                        <td>{{ task.name }}</td>                  
                        <td>{{ task.number }}</td>
                        <td>{{ task.review }}</td>
                        <a href=""><td>{{ task.website }}</td></a>
                        <td>{{ task.location }}</td>     
                        <td><button @click="updateModal(index)" class="btn btn-info">Edit</button></td>                  
                        <td><button @click="deleteTask(index)" class="btn btn-danger">Delete</button></td>                       
                    </tr>
                    
                </tbody>     

            </table>   
            <button @click ="createModal" class ="btn btn-primary btn-block"><b>Add Restaurant</b></button>

            


            <!-- Modal -->
            <div class="modal fade" 
            id="create-modal" 
            tabindex="-1" 
            role="dialog" 
            aria-labelledby="exampleModalLabel" 
            aria-hidden="true"
            >

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 style="margin: 0px 0px 0px 28%; color: #6cb2eb;" class="modal-title" id="exampleModalLabel"><b>New Restaurant</b></h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">
                    <div class="alert alert-danger" v-if="errors.length > 0">
                        <ul>
                            <li v-for="error in errors">{{ error }}</li>
                        </ul>
                    </div>
                    <div class= "form-group">
                        <label style="font-size: 30px; text-shadow: 0 0 3px #FF0000, 0 0 5px #4DC0B5; color: #ffed4a;" for="name">Restaurant Name</label>
                        <input v-model = "task.name" type ="text" id="name" class="form-control"> 
                    </div>
                    <div class= "form-group">
                        <label style="font-size: 30px; text-shadow: 0 0 3px #FF0000, 0 0 5px #4DC0B5; color: #ffed4a;" for="number">Contact Information</label>
                        <input v-model = "task.number" type ="number" id="number" class="form-control"> 
                    </div>
                    <div class= "form-group">
                        <label style="font-size: 30px; text-shadow: 0 0 3px #FF0000, 0 0 5px #4DC0B5; color: #ffed4a;" for="reviews">Reviews</label>
                        <input v-model = "task.review" type ="text" id="reviews" class="form-control"> 
                    </div>
                    <div class= "form-group">
                        <label style="font-size: 30px; text-shadow: 0 0 3px #FF0000, 0 0 5px #4DC0B5; color: #ffed4a;" for="website">Website</label>
                        <input v-model = "task.website" type ="text" id="website" class="form-control"> 
                    </div>
                    <div class= "form-group">
                        <label style="font-size: 30px; text-shadow: 0 0 3px #FF0000, 0 0 5px #4DC0B5; color: #ffed4a;" for="location">Location</label>
                        <input v-model = "task.location" type ="text" id="location" class="form-control"> 
                    </div>
                    
                </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button @click="createTask" type="button" class="btn btn-primary">Add</button>
                    </div>
                </div>
                </div>
            </div> 
            <!--  END-->

            <!-- Modal -->
            <div class="modal fade" 
            id="update-modal" 
            tabindex="-1" 
            role="dialog" 
            aria-labelledby="exampleModalLabel" 
            aria-hidden="true"
            >

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 style="margin: 0px 0px 0px 28%; color: #6cb2eb;" class="modal-title" id="exampleModalLabel"><b>Edit Restaurant</b></h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">
                    <div class="alert alert-danger" v-if="errors.length > 0">
                        <ul>
                            <li v-for="error in errors">{{ error}}</li>
                        </ul>
                    </div>
                    <div class= "form-group">
                        
                        <label style="font-size: 30px; text-shadow: 0 0 3px #FF0000, 0 0 5px #4DC0B5; color: #ffed4a;" for="name">Restaurant Name</label>
                        <input v-model = "new_update_task.name" type ="text" id="name" class="form-control"> 
                    </div>
                    <div class= "form-group">
                        <label style="font-size: 30px; text-shadow: 0 0 3px #FF0000, 0 0 5px #4DC0B5; color: #ffed4a;" for="number">Contact Information</label>
                        <input v-model = "new_update_task.number" type ="number" id="number" class="form-control"> 
                    </div>
                    <div class= "form-group">
                        <label style="font-size: 30px; text-shadow: 0 0 3px #FF0000, 0 0 5px #4DC0B5; color: #ffed4a;" for="reviews">Reviews</label>
                        <input v-model = "new_update_task.review" type ="text" id="reviews" class="form-control"> 
                    </div>
                    <div class= "form-group">
                        <label style="font-size: 30px; text-shadow: 0 0 3px #FF0000, 0 0 5px #4DC0B5; color: #ffed4a;" for="website">Website</label>
                        <input v-model = "new_update_task.website" type ="text" id="website" class="form-control"> 
                    </div>
                    <div class= "form-group">
                        <label style="font-size: 30px; text-shadow: 0 0 3px #FF0000, 0 0 5px #4DC0B5; color: #ffed4a;" for="location">Location</label>
                        <input v-model = "new_update_task.location" type ="text" id="location" class="form-control"> 
                    </div>
                    
                </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button @click="updateTask" type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                </div>
            </div> 
            <!--  END-->
        </div>   
    </div>
</template>

<script>
    export default {

        data(){
            return{
                task:{
                    name:'',
                    number:'',
                    review: '',
                    website: '',
                    location: ''
                },
                tasks: [],
                errors: [],
                new_update_task: [],
                uri: 'http://127.0.0.1:8000/tasks/',
                image: 'img/load.gif',
                loading:false

            }
        },
        methods:{
            createModal() {
                $("#create-modal").modal("show");
            },

             updateModal(index) {
                 this.errors = [];
                $("#update-modal").modal("show");
                this.new_update_task = this.tasks[index];
            },
            
            createTask() {
                axios.post(this.uri, {name: this.task.name, number: this.task.number, review: this.task.review, website: this.task.website, location: this.task.location})
                .then(response=>{

                    this.resetData();
                    this.tasks.push(response.data.task);
                    $("#create-modal").modal("hide");
                    toastr.success(response.data.message);
                })

                .catch(error=>{
                    this.errors = [];
                    if(error.response.data.errors.name){
                        this.errors.push(error.response.data.errors.name[0]);
                    }
                    if(error.response.data.errors.number){
                        this.errors.push(error.response.data.errors.number[0]);
                    }
                    if(error.response.data.errors.review){
                        this.errors.push(error.response.data.errors.review[0]);
                    }
                    if(error.response.data.errors.website){
                        this.errors.push(error.response.data.errors.website[0]);
                    }
                    if(error.response.data.errors.location){
                        this.errors.push(error.response.data.errors.location[0]);
                    }
                })
            },

            updateTask() {
                axios.patch(this.uri + this.new_update_task.id, {
                    name: this.new_update_task.name, 
                    number: this.new_update_task.number,
                    review: this.new_update_task.review,
                    website: this.new_update_task.website,
                    location: this.new_update_task.location
                })
                .then(response=>{
                    $("#update-modal").modal("hide");
                    toastr.success(response.data.message);
                })

                .catch(error=>{
                    this.errors = [];
                    if(error.response.data.errors.name){
                        this.errors.push(error.response.data.errors.name[0]);
                    }
                    if(error.response.data.errors.number){
                        this.errors.push(error.response.data.errors.number[0]);
                    }
                    if(error.response.data.errors.review){
                        this.errors.push(error.response.data.errors.review[0]);
                    }
                    if(error.response.data.errors.website){
                        this.errors.push(error.response.data.errors.website[0]);
                    }
                    if(error.response.data.errors.location){
                        this.errors.push(error.response.data.errors.location[0]);
                    }
                })
            },

            loadTask(){
                axios.get(this.uri).then(response=>{
                    this.tasks = response.data.tasks;
                    this.loading = true;
                })
            },
            
            deleteTask(index) {
                let confirmBox = confirm("Do you want to delete this restaurant?");

                if(confirmBox == true){
                    axios.delete(this.uri + this.tasks[index].id)
                    .then(response=>{
                        this.$delete(this.tasks, index);
                        toastr.success(response.data.message);

                    }).catch(error =>{
                        console.log("Cannot delete for special reasons")
                    });
                }

            },

            resetData() {
                this.task.name = "";
                this.task.number = "";
                this.task.review = "";
                this.task.website = "";
                this.task.location = "";
            },


        },

        mounted() {
            this.loadTask();
        }
    };
</script>