<template>
	<div class="row">
		<div class="col-md-12 bg-dark text-white" >

			<div class="row">
				<div class="col-md-2">

					<h4> <i class="fa fa-eyedropper"></i> <i class=" fa fa-graduation-cap"></i> St Gabriel</h4></div>
					<div class="col-md-8">
						<span><i class="fa fa-bell-o"></i></span>
						<span> <i class="fa fa-plus"></i> Nouveau</span>

					</div>
					<div class="col-md-2">
						<span id="logout" title="Se deconnecter" @click="logout">YUDA <i class="fa fa-user"></i></span>

					</div>
				</div>
			</div>

			<div class="col-md-2 bg-dark text-white" id="left-bar">
				<ul class="list-group m-lg-4">
					<li class="list-group"><i class="fa fa-dashboard"></i>  Vue Global</li>
					<li class="list-group">

						<inertia-link class="left-icon" :href="route('teachers.index')">

							<i class="fa fa-folder-open"></i>
							Professeur
						</inertia-link>

					</li>
					<li class="list-group">
						<inertia-link class="left-icon" :href="route('students.index')"> <i class="fa fa-child"></i> Elève</inertia-link></li>
						<li class="list-group">
							<inertia-link class="left-icon" :href="route('courses.index')">
								<i class="fa fa-book"></i> courses</inertia-link>

							</li>

							<li class="list-group">
								<inertia-link class="left-icon" :href="route('classes.index')">
									<i class="fa fa-institution"></i>	Classes</inertia-link>

								</li>
								<li class="list-group">
									<inertia-link class="left-icon" :href="route('notes.index')">
										<i class="fa fa-file"></i> 
									Notes</inertia-link>
								</li>
								<li class="list-group">
									<inertia-link :href="route('students.index')" class="left-icon">
										<i class="fa fa-calculator"></i> 
										Résultat

									</inertia-link>
								</li>

							</ul>

						</div>

						<div class="col-md-10">

							<!-- Page Content -->
							<main>
								<slot></slot>
							</main>

							<!-- Modal Portal -->
						</div>

						<div class="bg-secondary footer">
							<h1 class="text-center"> hogi.bi</h1>

						</div>

					</div>


				</template>

<script>

export default{
	name:"BaseLayout",
	data(){
		return{

		}
	},
	methods:{

		logout(){

			//this.$router.push({ name: 'login' })

			// this.$inertia.post('logout',{});
			// window.location.href = 'login'


		}

	}

}
</script>

<style>
.left-icon{
	font-size: 20px;
	color: white;
}

.left-icon:hover{
	background: #0b0;
	cursor: pointer;
	text-decoration: none;
}

.footer{
	position: absolute;
	left: 0;
	bottom: 0;
	width: 100%;
}

#logout{
	display: block;
	padding: 5px;
}
#logout:hover{
	cursor: pointer;
}

#left-bar{
	min-height: 600px;
}
</style>
