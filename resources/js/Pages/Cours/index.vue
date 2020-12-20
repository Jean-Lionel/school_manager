<template>
	<base-layout>
	 <div>
	 	<h2>Ajouter un cours</h2>

	 	<div class="row">
	 		<div class="card col-md-6">
	 			<input type="text" v-model="form.name" class="form-control">

	 			<select v-model="form.classe_id" name="" id="">
	 				<option value="">Selectionner la classe ...</option>

	 				<option value="" v-for="classe in classes">
	 					{{ classe.name}}
	 				</option>
	 			</select>
	 		
	 		</div>
	 		<div class="card col-md-6">

	 			<input type="text" v-model="val" @keyup="search" classe="form-control" placeholder="Rechercher .....">

	 			<table classe="table table-borded table-responsive">
	 				<thead>
	 					<tr>
	 						<th>name</th>
	 						<th>Class</th>
	 					</tr>
	 					
	 					
	 				</thead>

	 				<tbody>
	 					<tr v-for="cour in cours.data">
	 						<td>{{ cour.name }}</td>
	 						<td>{{ cour.classe_id }}</td>
	 						
	 					</tr>
	 				</tbody>
	 			</table>

	 			<div>
	 				<inertia-link :href="cours.prev_page_url">Précedent</inertia-link>
	 				
	 				<inertia-link :href="cours.next_page_url">Suivant</inertia-link>
	 			</div>
	 			
	 		</div>
	 	</div>
	 </div>

	</base-layout>
</template>

<script>
	import BaseLayout from '@/Layouts/BaseLayout';
	import _ from 'lodash' ;
	
	export default{
		components:{
			BaseLayout

		},

		props : {
			cours : Object,
			classes : Array,
			
		},
		data(){
			return {
				form : {
					name : "",
					classe_id : ""
				},
				val : ""

			}
		},

		mounted(){
			// console.log(this.cours);
			console.log(this.route);
		},
		methods:{
		   search : function(){
		   	this.$inertia.replace(this.route('courses.index',{val : this.val}));
		   }
		   
		   
		}
	}

</script>