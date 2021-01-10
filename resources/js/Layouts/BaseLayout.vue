<template>
	<div class="row">
		<div class="col-md-12 bg-dark text-white">

			<div class="row">
				<div class="col-md-2"><h4>St Gabriel</h4></div>
				<div class="col-md-8">
					<span>1</span>
					<span>Nouveau</span>

				</div>
				<div class="col-md-2">
					<span>YUDA</span>
				</div>
			</div>
		</div>

		<div class="col-md-2 bg-dark text-white">
			<ul class="list-group m-lg-4">
				<li class="list-group">Vue Global</li>
				<li class="list-group">

					<inertia-link :href="route('teachers.index')">
						Professeur
					</inertia-link>

				</li>
				<li class="list-group"><inertia-link :href="route('students.index')">Elève</inertia-link></li>
				<li class="list-group">
					<inertia-link :href="route('courses.index')">courses</inertia-link>

				</li>

				<li class="list-group">
					<inertia-link :href="route('classes.index')">Classes</inertia-link>

				</li>
				<li class="list-group">
					<inertia-link :href="route('notes.index')">Notes</inertia-link>
				</li>
				<li class="list-group">Résultat</li>

			</ul>

		</div>

		<div class="col-md-10">
			
			<!-- Page Content -->
			<main>
				<slot></slot>
			</main>

			<!-- Modal Portal -->
		</div>

		<div class="col-md-12 bg-secondary">
			<h1 class="text-center"> hogi.bi</h1>

		</div>

	</div>

	
</template>

<script>
	
	export default{
		
	}
</script>