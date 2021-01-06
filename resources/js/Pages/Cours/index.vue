<template>
	<base-layout>
	 <div>
	 	<h2>Ajouter un cours</h2>
	 	<p class="text-sm">{{ $page.flash.message }}</p>
		
	 	<div class="row">
	 		<div class="card col-md-4">
	 			<form action="" @submit.prevent>
		 		
		 			<label for="name">Name</label>
		 			<input type="text" v-model="form.name" class="form-control">
		 			<p class="error text-danger">{{ $page.errors.name}}</p>
		 			<!-- <div v-if="$page.errors.name">{{ page.errors.name }}</div> -->
		 			<label for="">Pondération</label>
		 			<input type="number" v-model="form.ponderation" class="form-control">
		 			<p class="error text-danger">{{ $page.errors.ponderation}}</p>
		 			<label for="">Nombre d'heure</label>
		 			<input type="number" v-model="form.nombre_heure" class="form-control">
		 			<p class="error text-danger">{{ $page.errors.nombre_heure}}</p>
		 			<label for="">Classe</label>

		 			<select v-model="form.classe_id" name="" id="" class="form-control">
		 				<option value="">Selectionner la classe ...</option>

		 				<option  v-for="classe in classes" :value="classe.id">
		 					{{ classe.name}}
		 				</option>
		 			</select>
		 			<p class="error text-danger">{{ $page.errors.classe_id}}</p>
		 			<label for="">Professeur</label>
		 			<select v-model="form.teacher_id" id="" class="form-control">
		 				<option value="">Selectionner le professeur ...</option>

		 				<option  v-for="teacher in teachers" v-bind:value="teacher.id">
		 					{{ teacher.first_name}} {{ teacher.last_name}} 
		 				</option>
		 			</select>

		 			<p class="error text-danger">{{ $page.errors.teacher_id}}</p>
		 			<input type="submit" @click.prevent="save" class="mt-3 btn btn-primary form-control" value="Enregistrer">	

	 			</form>

	 		</div>
	 		<div class="card col-md-6">

	 			<input type="text" v-model="val" @keyup="search" classe="form-control" placeholder="Rechercher .....">

	 			<table classe="table table-bordered table-striped">
	 				<thead class="badge-dark">
	 					<tr>
	 						<th>name</th>
	 						<th>Pofesseur</th>
	 						<th>Classe</th>
	 						<th>Pondération</th>
	 					</tr>
	 					
	 					
	 				</thead>

	 				<tbody>
	 					<tr v-for="cour in cours.data">
	 						<td class="col">{{ cour.name }}</td>
	 						<td class="col">{{ cour.teacher.first_name }} {{ cour.teacher.last_name }} </td>
	 						<td class="col">{{ cour.classe.name }}</td>
	 						<td class="col">{{ cour.ponderation }}</td>
	 						
	 					</tr>
	 				</tbody>
	 			</table>

	 			<div v-if="cours.prev_page_url">

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
			cours : {
				type: Object,
				default: ()=>[{}]
			},
			classes : Array,
			teachers : Array,
			
		},
		data(){
			return {
				form : {
					name : "",
					classe_id : "",
					ponderation : "",
					classe_id : "",
					teacher_id : "",
				},
				val : ""

			}
		},

		mounted(){
			// console.log(this.cours);
			//console.log(this.teachers);
		},
		methods:{
		   search : function(){
		   	this.$inertia.replace(this.route('courses.index',{val : this.val}));
		   },

		   save(){

		   	//console.log(this.form.teacher_id)

		   	this.$inertia.post('courses', 
		   		this.form
		   	, {preserveState : false});
		   }
		   
		   
		}
	}

</script>