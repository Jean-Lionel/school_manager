<template>
	<base-layout>
	<div class="row">
		<div class="col-md-11">
			<h1>Ajouter une évaluation</h1>
			
			<form action="">
				<div class="row">
					<div class="col-4">
						<div class="form-group row">
							<div class="col-4">
								COURS
							</div>
							<div class="col-8">
								<select v-model="form.course_id" name="" class="form-control" id="">
									<option value=""></option>
									<option    v-for="cour in cours" :value="cour.id">
										{{ cour.name }}
									</option>
								</select>
								 <span class="text-danger error" v-if="$page.errors.course_id">ce champ est obligatoire</span>
							</div>

						</div>

						<div class="form-group row">
							<div class="col-4">
								CLASSE
							</div>
							<div class="col-8">
								<select v-model="form.classe_id"  class="form-control" name="" id="">
									<option value=""></option>
									<option    v-for="classe in classes" :value="classe.id" @click="selectClasse(classe)">
										{{ classe.name }}
									</option>
								</select>
								<span class="text-danger error" v-if="$page.errors.classe_id">ce champ est obligatoire</span>
							</div>

						</div>
						
					</div>

					<div class="col-4">
						<div class="form-group row">
							<div class="col-4">
								TYPE
							</div>
							<div class="col-8">
								<select v-model="form.type_travail" class="form-control" name="" id="" >
									<option value="">Choisissez ...</option>
									<option value="TRAVAIL">TRAVAIL</option>
									<option value="EXAMEN">EXAMEN</option>
								</select>
								<span class="text-danger error" v-if="$page.errors.type_travail">ce champ est obligatoire</span>
							</div>

						</div>

						<div class="form-group row">
							<div class="col-4">NUMERO</div>
							<div class="col-8">
								<input type="number" class="form-control" v-model="form.travail_numero">
								<span class="text-danger error" v-if="$page.errors.travail_numero">ce champ est obligatoire</span>
							</div>
						</div>

						
					</div>

					<div class="col-md-4">

						<div class="form-group row">
							<div class="col-4">PONDERATION</div>
							<div class="col-8">
								<input type="number" class="form-control" v-model="form.ponderation">
								<span class="text-danger error" v-if="$page.errors.ponderation">ce champ est obligatoire</span>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-4">TRIMESTRE</div>
							<div class="col-8">
							

								<select name=""  id="" class="form-control"  v-model="form.trimestre">
									<option>select ...</option>
									<option value="1 ERE TRIMESTRE"> 1<sup>ère</sup> TRIMESTRE</option>
									<option value="2 EME TRIMESTRE"> 2<sup>ème</sup> EME TRIMESTRE</option>
									<option value="3 EME TRIMESTRE"> 3<sup>ème</sup> TRIMESTRE</option>
								</select>

								<span class="text-danger error" v-if="$page.errors.trimestre">ce champ est obligatoire</span>

							</div>
						</div>
		
						
					</div>

					<div class="col-md-4 row">
						<label for="" class="col">A/S : 2020-2021</label>
						<button @click.prevent="next" class="col btn btn-sm btn-primary btn-block">Enregistrer</button>
					</div>
				</div>

			</form>
			
		</div>
		<div class="col-12">
		  <!-- "id": 2, "trimestre": "1 ERE TRIMESTRE", "travail_numero": "25", "point_obtenu": null, "ponderation": 25, "student_id": 1, "course_id": 1, "classe_id": 1, "anne_scolaire_id": 1, "created_at": -->
		 <h1>Ajouter des points</h1>	
		 <table class="table-bordered table  table-sm">
		 	<thead>
		 		<tr>
		 			<th>A/S</th>
		 			<th>PERIODE</th>
		 			<th>TRAVAIL N°</th>
		 			<th>PONDERATION</th>
		 			<th>COURS</th>
		 		</tr>
		 	</thead>
		 	<tbody>
		 		<tr v-for="cour in notes">
		 			<td>{{ cour.anne_scolaire_id }}</td>
		 			<td>{{ cour.trimestre }}</td>
		 			<td>{{ cour.travail_numero }}</td>
		 			<td>{{ cour.course_id }}</td>
		 		</tr>
		 	</tbody>
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
			cours : Array,
			classes : Array,
			notes : Array,

		},
		data(){
			return{
				form :{
					course_id : "",
					classe_id : "",
					type_travail : "",
					travail_numero : "",
					ponderation : "",
					trimestre : "",
					anne_scolaire_id : 1,
				},
				classes_list : [],
				classe_name : "",
				point : []

			}
		},
		mounted(){
			console.log(this.notes)

		},

		updated(){
			
			
		}

		,
		methods:{
			selectClasse(classe){
				this.classes_list = classe.students;
				this.classe_name = classe.name;
				//console.log(classe.students)
				

			},
			saveMark(){
				

			},

			next(){
				this.$inertia.post('notes',this.form, {preserveState : false});
			}

		}
		

	}
</script>


<style>
/*input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}*/

/* Firefox */
/*input[type=number] {
  -moz-appearance: textfield;
}*/
</style>