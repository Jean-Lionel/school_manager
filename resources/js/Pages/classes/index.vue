<template>
	
	<base-layout>
	<div>

		<p class="text-sm">{{ $page.flash.message }}</p>
		<p>{{ $page.errors }}</p>

	</div>


	<form action="" @submit.prevent>
		<h1>Nouvelle classe</h1>
		<select v-model="form.level_id" id="">
			<option  v-for="level in levels"> {{ level.name }}</option>
		</select>
		<input type="text" v-model="form.name">
		<button @click.prevent="save">Eregister</button>
		<button @click.prevent="update">Modifier</button>
	</form>

	<table class="table table-responsive table-striped">

		<thead>
			<tr>
				<th>No</th>
				<th>NIVEAU</th>
				<th>Classe</th>
				<th>Action</th>
			</tr>
		</thead>
		
		<tbody>
			<tr v-for="classe in classes" :key="classe.id">
				<td >{{ classe.id }}</td>
				<td >{{ classe.level_id }}</td>
				<td >{{ classe.name }}</td>
				<td>
					<button @click.prevent="edit(classe)">Modifier</button>
					<button @click.prevent="remove(classe)">Supprimer</button>
				</td>
			</tr>
		</tbody>
	</table>


</base-layout>


</template>


<script>

	import BaseLayout from '@/Layouts/BaseLayout'
	export default{
		components :{
			BaseLayout
		},
		props:['levels','classes'],
		data(){

			return{
				form:{
					level_id : "",
					name : "",
				},
				id : ""
				
			}
			
		},

		mounted(){
			
		},
		methods:{

			save(){

				this.$inertia.post('classes', {level_id: this.form.level_id, name: this.form.name}, {preserveState : false});
			},

			edit(data){

				this.form = Object.assign({}, data);

			},

			remove(data){
				 if (!confirm('Are you sure want to remove?')) return;
                data._method = 'DELETE';

                  this.$inertia.post('classes/' + data.id, data)
             

			},
			update(data){
				data._method = 'PUT';
				data.id = this.form.id;
				data.name = this.form.name
				data.level_id = this.form.level_id
                this.$inertia.post('classes/' + data.id, data,{
                	preserveState : false
                })
			}

		}

	}
	
</script>