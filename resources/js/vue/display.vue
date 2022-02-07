<template>
	<main class="container">
  <div class="bg-light p-5 rounded">
   	<div class="card">
        <div class="card-header">Display Breakdown  <router-link :to='{name:"home"}' class="btn btn-danger float-end"><i class="fas fa-arrow-circle-left"></i> Back</router-link></div>
        	<div class="card-body">
             <ul>
			    <li v-for='random in randoms'>{{ random.values }}</li>
			  </ul>
              
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
			const self = this;
				var random_id = self.$route.params.id;
				axios.get('/api/breakdowns/'+random_id)
				.then( response => {
					this.randoms = response.data
					
				})
				.catch(error => {
					console.log( error );
				})
			}
		 
		
		},


		created(){
			this.getList();

		}

	}
</script>