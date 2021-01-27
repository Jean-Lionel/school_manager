<template>
	<base-layout>
	<div>
		<div class="row">
			<div class="col-md-4">
				<h3>Ajouter un Professeur</h3>
				<p class="text-sm">{{ $page.flash.message }}</p>
				<p>{{ $page.errors }}</p>
				<form action="#">
					<div class="form-group">
						<label for="">Nom</label>
						<input required="" type="text" v-model="form.first_name" class="form-control">
					</div>

					<div class="form-group">
						<label for="">Prénom</label>
						<input required="" type="text" v-model="form.last_name" class="form-control">
					</div>
					<div class="form-group">
						<label for="">SEXE</label><br>
						HOMME
						<input  type="radio" v-model="form.sexe" value="HOMME">
						FEMME
						<input type="radio" v-model="form.sexe" value="FEMME">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input type="text" v-model="form.email" class="form-control">
					</div>
					<div>
						<button @click.prevent="save()" class="btn btn-primary btn-block">Enregistrer</button>
					</div>
				</form>
				
			</div>

			<div class="col-md-8">

				<h5>Liste des professeurs</h5>

				<table class="table-hover table-responsive table table-sm table-striped">
					<tr>
						<th>#</th>
						<th>Nom</th>
						<th>Prénom</th>
						<th>Email</th>
						<th>GENRE</th>
						<th>Action</th>
					</tr>

					<tr v-for="teacher in teachers.data" :key="teacher.id">
						<td>{{ teacher.id }}</td>
						<td>{{ teacher.first_name }}</td>
						<td>{{ teacher.last_name }}</td>
						<td>{{ teacher.email }}</td>
						<td>{{ teacher.sexe }}</td>
						<td class="d-flex">
							<button class="btn btn-sm btn-warning" @click.prevent="update(teacher)">edit</button>
							<button class="btn btn-sm btn-danger" @click.prevent="supprimer(teacher)">supprimer</button>
						</td>
					</tr>
				</table>
				
			</div>
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
			teachers : Object
		} ,
		data(){
			return {
				form:{
					first_name : "",
					last_name: "",
					sexe: "",
					email:"",
					id: ""
				}
			}
		},
		methods:{
			save(){
				this.$inertia.post('teachers',this.form,
				{preserveState : false})
			},

			update(teacher){

				this.form = Object.assign({}, teacher)

				//console.log(teacher)
			},

			supprimer(data){
				if (!confirm('êtez-vous sur de supprimer ?')) return;
                data._method = 'DELETE';
                this.$inertia.post('/teachers/' + data.id, data)
			}
		}

	}
</script>