<template>
	<base-layout>
	<div>
		<div class="row">
			<h3>Ajouter un Professeur</h3>
			<div class="col-md-4">


				<form action="#">
					<div class="form-group">
						<label for="">Nom</label>
						<input type="text" v-model="form.first_name" class="form-control">
					</div>

					<div class="form-group">
						<label for="">Prénom</label>
						<input type="text" v-model="form.last_name" class="form-control">
					</div>
					<div class="form-group">
						<label for="">SEXE</label><br>
						HOMME
						<input type="radio" v-model="form.sexe" value="HOMME">
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
		data(){
			return {
				form:{
					first_name : "",
					last_name: "",
					sexe: "",
					email:""
				}
			}
		},
		methods:{
			save(){
				this.$inertia.post('teachers',{
					first_name : this.form.first_name,
					last_name : this.form.last_name,
					sexe : this.form.sexe,
					email : this.form.email,

				},


					{preserveState : false})
			}
		}

	}
</script>