<template>
	<base-layout>
	<div class="row">

		<div class="col-md-4" v-if="showForm">	
				<div class="form-group">
					<label for="first_name">Nom</label>
					<input type="text" id="first_name" class="form-control" v-model="first_name">
				</div>
				<div class="form-group">
					<label for="last_name">Prénom</label>
					<input type="text" id="last_name" class="form-control" v-model="last_name">
				</div>
				<div class="form-group">
					<label for="">Classe</label>
					<select v-model="classe_id" name="" id="" class="form-control">
						<option value="" selected>Choisissez une classe</option>
						
						<option v-for="item in classes" :value="item.id"  :key="item.id">
							{{ item.name }}
						</option>
					</select>
				</div>
		</div>

		<div class="col-md-4" v-if="showForm">	
				<div class="form-group">
					<label for="date_naissance">Date de Naissance</label>
					<input type="date" id="date_naissance" class="form-control" v-model="date_naissance">
				</div>
				<div class="form-group">
					<label for="">GENRE</label><br>
					<label for="masculin">MASCULIN</label>
					<input id="masculin" type="radio" v-model="sexe" name="sexe" value="MASCULIN">
					<label for="feminin">FEMININ</label>
					<input type="radio" id="feminin" v-model="sexe" name="sexe" value="FEMININ">
				</div>

				<div class="form-group">
					<button class="btn btn-primary btn-block" @click="save()">Enregistrer</button>
				</div>
		</div>

		<div class="col-md-12">
			<div class="row"> 
				<select name="" id="" class="form-control col-md-2">
					<option value="">Selectionner la classe ...</option>
					<option v-for="classe in classes" value="" @click="selectClasse(classe)" >{{ classe.name  }}</option>
				</select>
				<button class="col-md-2" @click="showForm = !showForm">
					{{ showForm == true ? 'Fermer' : 'Ajouter un eleve' }}
				</button>
			</div>
			

			<table class="table">
				<tr class="badge-info">
					<th>#</th>
					<th>Nom</th>
					<th>Prénom</th>
					<th>Classe</th>
					<th>Date de naissance</th>
					<th>Genre</th>
					<th>Action</th>
				</tr>

				<tr v-for="student in students" :key="student.id">
					<td>{{ student.id }}</td>
					<td>{{ student.first_name }}</td>
					<td>{{ student.last_name }}</td>
					<td>{{ classe_name}}</td>
					<td>{{ student.date_naissance }}</td>
					<td>{{ student.sexe }}</td>
				</tr>
			</table>
		</div>

	
	</div>
   </base-layout>
	
</template>

<script>
	import BaseLayout from '@/Layouts/BaseLayout';

	export default{

		components:{
			BaseLayout
		},
		props:{
			
			classes : Array
		},
		data(){
			return{
				first_name : "",
				last_name : "",
				date_naissance : "",
				sexe : "",
				classe_id : "",
				showForm : false,
				students : [],
				classe_name : ""

			}
		},
		mounted(){
		},

		methods:{
			save(){
				this.$inertia.post('students',{

				first_name : this.first_name,
				last_name : this.last_name,
				date_naissance : this.date_naissance,
				sexe : this.sexe,
				classe_id : this.classe_id,

				},{preserveState:false})
			},

			selectClasse(data){

				this.classe_name = data.name

				this.students = data.students

			},
			
		}

	}
</script>