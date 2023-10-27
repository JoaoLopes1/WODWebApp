<?php

include('protect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Rubik&family=Secular+One&display=swap" rel="stylesheet" />

	<link rel="stylesheet" href="assets/css/reset.css">
	<link rel="stylesheet" href="assets/css/style_home_page.css">
	<link rel="stylesheet" href="assets/css/responsivo.css">
	<title>WebAplication WOD</title>
</head>
<body>
	<header>
		<div class="container">
			<div class="topnav">
				<a href="home_page.php">Home</a>
				<a href="https://whitewolf.fandom.com/wiki/World_of_Darkness" target="_blank">Wiki</a>
				<a href="chars.php">Char's</a>
				<a href="choricle.php">Chronicles</a>
				<a href="profile.php" >Profile</a>
			</div>
		</div>
	</header>

	<main>
		<div class="config">
			<section class="bg_img"><img src="assets/img/bgWere.jpg" alt="Background Werewolf"></section>
			<div class="conteudo">
				<i class="logo"></i>
				<h2 class="setting">Werewolf: The Apocalypse</h2>
				<p class="descricao">Werewolves are shapeshifters who change from human to wolf form—adopting many intermediary forms if they so choose. They are physically more powerful than most living creatures, and are immune to many of the ailments and diseases that plague their human and wolf cousins, but they’re still living beings and they can still die.</p>
			</div>
		</div>

		<div class="config">
			<img src="assets/img/bgVamp.jpg" alt="Background Vampire" class="bg_img">
			<div class="conteudo">
				<i class="logo"></i>
				<h2 class="setting">Vampire: The Masquerade</h2>
				<p class="descricao">The Cainites (also called Kindred), are descendants of Caine (the Biblical Cain), cursed with a thirst for blood, vulnerability to sunlight and immortality. They are forever subject to the Beast, their raging animal urges of hunger, fear and rage.
				Cainites generally live in cities, which are run feudally by Princes; life in a city is one of constant political manipulation and paranoia, as the powers of the city vie for power, control and food. They are creatures ruled by fear, most importantly the fear of exposure to the Kine, everyday humanity.</p>
			</div>
		</div>

		<div class="config selecionado">
			<img src="assets/img/bgMage.jpg" alt="Background Mage" class="bg_img">
			<div class="conteudo">
				<i class="logo"></i>
				<h2 class="setting">Mage: The Ascension</h2>
				<p class="descricao">Most mages don't come to the full realization of this power. Few to none can handle that awesome power with any certainty or clarity. Most cloak this newfound potential in a familiar form, using tools to help themselves along. Some believe that they affect the world through prayer, and that god (or the shard of God, the piece of their creator that is the potential in them) changes the world for them.</p>
			</div>
		</div>

	</main>

	<ul class="button_list">
		<li>
			<button class="button_icon">
				<img src="assets/img/buttonWere.webp" alt="Werewolf Button" class="icon">
			</button>
		</li> 

		<li>
			<button class="button_icon">
				<img src="assets/img/buttonVamp.png" alt="Vampire Button" class="icon">
			</button>
		</li>

		<li>
			<button class="button_icon selecionado">
				<img src="assets/img/buttonMage.png" alt="Mage Button" class="icon">
			</button>
		</li>
	</ul>

	<script src="assets/js/home_page.js"></script>
</body>
</html>