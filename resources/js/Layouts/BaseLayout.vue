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
			<ul>
				<li>Vue Global</li>
				<li>Professeur</li>
				<li>Elève</li>
				<li>Cours</li>
				<li>Notes</li>
				<li>Résultat</li>

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