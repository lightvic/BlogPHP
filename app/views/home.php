<?php /** @var App\Entity\User $user */ ?>
<?php
var_dump($_SESSION);
?>
<h1><?= $trucs; ?></h1>
<h2><?= $machin; ?></h2>



<h3>Zone pour créer un post</h3>
<h3 style="color:green">Ça, ça marche.</h3>
<div id="newPublication">
	<!-- Form new article-->
	<form id="newPublicationForm" method="post">
		<label id="publicationLabel" for="content">Que voulez-vous publier ?</label><br>
		<textarea id="content" name="content" type="text"></textarea><br>
		<button type="submit" id="submitPublication" >Valider</button>
		<button type="button" id="cancel">Annuler</button>
	</form>
</div>
<br/>
<h3>Zone pour afficher les posts existants</h3>
<h3 style="color:orange">Il me reste à récupérer les auteurs (et à mettre un peu de mise en forme XD). Valentine</h3>
<?php
/** @var App\Entity\Post[] $posts */
foreach ($posts as $post) {
	echo "<div id='post-" . strval($post->getId()) . "' style='border: 1px solid'>";
	echo("Id du post : " . $post->getId() . " - id de l'auteur : " . $post->getUser()); // ligne à retirer pour la suite : ne sert qu'au debugging
	echo "<h4>Auteur du post</h4>"; // Je dois créer une fonction qui me permet de récupérer le NOM de l'auteur d'un post
	echo "<div>" . $post->getContent() . "</div>";
	echo "<div>" . $post->getDate() . "</div>";
	echo "</div>";
	echo "</br>";
	echo "</br>";
}



