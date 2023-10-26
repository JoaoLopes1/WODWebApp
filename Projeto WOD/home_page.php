<?php

include('protect.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link href="https://fonts.googleapis.com/css2?family=Rubik&family=Secular+One&display=swap" rel="stylesheet" />

		<link rel="stylesheet" href="assets/css/reset.css" />
		<link rel="stylesheet" href="assets/css/style.css" />
		<link rel="stylesheet" href="assets/css/responsivo.css" />

		<title>WebApplication WOD</title>
	</head>

	<body>
		<main class="personagens">
			<div class="container">
				<div class="topnav">
					<a href="index.html">Home</a>
					<a href="https://whitewolf.fandom.com/wiki/World_of_Darkness" target="_blank">Wiki</a>
					<a href="chars.php">Char's</a>
					<a href="choricle.html">Chronicles</a>
					<a href="profile.php" >Profile</a>
				</div>
			</div>
			<div class="personagem">
				<img class="imagem" class="new_wpp" src="assets/src/img/werewolfNEW.jpg" alt="Werewolf"/>
				<div class="conteudo">
					<i class="logo"></i>
					<h2 class="nome-personagem">Werewolf: The Apocalypse</h2>
					<p class="descricao">Werewolves are shapeshifters who change from human to wolf form—adopting many intermediary forms if they so choose. They are physically more powerful than most living creatures, and are immune to many of the ailments and diseases that plague their human and wolf cousins, but they’re still living beings and they can still die.</p>
				</div>
			</div>

			<div class="personagem">
				<img class="imagem" class="new_wpp" src="assets/src/img/VampireNEW.jpg" alt="Vampire"/>
				<div class="conteudo">
					<i class="logo"></i>
					<h2 class="nome-personagem">Vampire: The Masquerade</h2>
					<p class="descricao">The Cainites (also called Kindred), are descendants of Caine (the Biblical Cain), cursed with a thirst for blood, vulnerability to sunlight and immortality. They are forever subject to the Beast, their raging animal urges of hunger, fear and rage.
                        Cainites generally live in cities, which are run feudally by Princes; life in a city is one of constant political manipulation and paranoia, as the powers of the city vie for power, control and food. They are creatures ruled by fear, most importantly the fear of exposure to the Kine, everyday humanity.</p>
				</div>
			</div>

			<div class="personagem selecionado">
				<img class="imagem" class="new_wpp" src="assets/src/img/mageteste.jpg" alt="Mage"/>
				<div class="conteudo">
					<i class="logo"></i>
					<h2 class="nome-personagem">Mage: The Ascension</h2>
					<p class="descricao">Most mages don't come to the full realization of this power. Few to none can handle that awesome power with any certainty or clarity. Most cloak this newfound potential in a familiar form, using tools to help themselves along. Some believe that they affect the world through prayer, and that god (or the shard of God, the piece of their creator that is the potential in them) changes the world for them.</p>
				</div>
			</div>
		</main>
		<ul class="botoes">
			<li>
				<button class="botao">
					<img src="assets/src/img/werewolfbutton.webp" alt="Werewolf Button" class="new_img"/>
				</button>
			</li>
			<li>
				<button class="botao">
					<img src="assets/src/img/vampirebutton.png" alt="Tripulação Roronoa Zoro" class="new_img"/>
				</button>
			</li>
			<li>
				<button class="botao selecionado">
					<img src="assets/src/img/magebutton.png" alt="Tripulação Monkey D. Luffy" class="new_img"/>
				</button>
			</li>
			</li>
		</ul>

		<script src="./assets/js/home_page.js"></script>
	</body>
</html>
