<template>
	<base-layout>
	<div class="row">
		<div class="col-md-12">
			<h1>Ajouter des points</h1>

			<form action="">
				<div class="row">
					<div class="col-4">
						<div class="form-group row">
							<div class="col-4">
								COURS
							</div>
							<div class="col-8">
								<select v-model="form.course_id" name="" id="">
									<option value=""></option>
									<option    v-for="cour in cours" :value="cour.id">
										{{ cour.name }}
									</option>
								</select>
							</div>

						</div>

						<div class="form-group row">
							<div class="col-4">
								CLASSE
							</div>
							<div class="col-8">
								<select v-model="form.classe_id"  name="" id="">
									<option value=""></option>
									<option    v-for="classe in classes" :value="classe.id" @click="selectClasse(classe)">
										{{ classe.name }}
									</option>
								</select>
							</div>

						</div>
						
					</div>

					<div class="col-4">
						<div class="form-group row">
							<div class="col-4">
								TYPE
							</div>
							<div class="col-8">
								<select v-model="form.type_travail" name="" id="" class="">
									<option value="">Choisissez ...</option>
									<option value="TRAVAIL">TRAVAIL</option>
									<option value="EXAMEN">EXAMEN</option>
								</select>
							</div>

						</div>

						<div class="form-group row">
							<div class="col-4">NUMERO</div>
							<div class="col-8">
								<input type="number" v-model="form.travail_numero">
							</div>
						</div>

						
					</div>

					<div class="col-md-4">

						<div class="form-group row">
							<div class="col-4">PONDERATION</div>
							<div class="col-8">
								<input type="number" v-model="form.ponderation">
							</div>
						</div>

						<div class="form-group row">
							<div class="col-4">TRIMESTRE</div>
							<div class="col-8">
							

								<select name=""  id="" v-model="form.trimestre">
									<option>select ...</option>
									<option value="1 ERE TRIMESTRE"> 1<sup>ère</sup> TRIMESTRE</option>
									<option value="2 EME TRIMESTRE"> 2<sup>ème</sup> EME TRIMESTRE</option>
									<option value="3 EME TRIMESTRE"> 3<sup>ème</sup> TRIMESTRE</option>
								</select>
							</div>
						</div>
		
						
					</div>

					<div class="col-md-6">
						<label for="">A/S : 2020-2021</label>
						<button @click.prevent="next">suivant</button>
					</div>
				</div>

			</form>
			
		</div>
		<div class="col-md-12" v-if="classes_list.length > 0">
			<h5>LISTE DES ELEVES :  {{ classe_name  }}</h5>

							<table class="table table-striped table-sm">
								<thead>
									<tr>
										<th>#</th>
										<th>CLASSE</th>
										<th>Nom</th>
										<th>PRENOM</th>
										<th>POINT / {{ form.ponderation }}</th>
									</tr>
								</thead>
								<tbody>
									<tr v-for="student in classes_list" :key="student.id">
										<td>{{ student.id }}</td>
										<td>{{ classe_name }}</td>
										<td>{{ student.first_name }}</td>
										<td>{{ student.last_name }}</td>
										<td>
											<input 
											type="text" 

											v-model.number="student.mark"
											></td>
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
			//console.log()

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