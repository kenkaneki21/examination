<template>
	<main class="container">
  <div class="bg-light p-5 rounded">
   	<div class="card">
        <div class="card-header">Home</div>
        	<div class="card-body">
              <button @click="generateRandomName()" class="btn btn-success">Generate Random Name</button>
              <table class="table">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Random Name</th>
				      <th scope="col">Action</th>
				       
				    </tr>
				  </thead>
				  <tbody>
				   <tr v-for='random in randoms' v-on:reloadlist="getList()">
				      <td>{{ random.id  }}</td>
				      <td>{{ random.values  }}</td>
				     
				      <td><router-link :to='{name:"display", params:{ id:random.id}}' class="btn btn-primary">View Spiral</router-link>
					 </td>
				    </tr>
				     
				  </tbody>
				</table>      
            </div>
         </div>
     </div>
  </div>
</main>
</template>
<script>
	export default {
		data(){
			return{
				randoms: []
			}

		},
		methods:{
		getList() {
				axios.get('api/random')
				.then( response => {
					this.randoms = response.data
				})
				.catch(error => {
					console.log( error );
				})
			},
		generateRandomName(){
		 
				axios.get('api/generate')
				.then( response => {
					if( response.status == 200){
					 
						this.$emit('reloadlist');
					}
				})
				.catch (error => {
					console.log( error);

				})

		}
		
		},


		created(){
			this.getList();

		}

	}
</script>