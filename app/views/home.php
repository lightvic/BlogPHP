<?php /** @var App\Entity\User $user */?>
</br>
<?php
var_dump($_SESSION);
?>
<h1><?= $trucs; ?></h1>
<h2><?= $machin; ?></h2>

<<<<<<< HEAD
=======
<form action="/deconnexion" method="post">
		<button type="submit" id="submitPublication" >Deconnexion</button>
	</form>
>>>>>>> origin/victo

<h3>Zone pour créer un post</h3>
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
<?php
/** @var App\Entity\Post[] $posts */
foreach ($posts as $post) {
	$userId = $post->getUser();
	echo "<div id='post-" . strval($post->getId()) . "' style='border: 1px solid'>";
	echo("Id du post : " . $post->getId() . " - id de l'auteur : " . strval($userId)); // ligne à retirer pour la suite : ne sert qu'au debugging
	echo "<h4>Auteur du post : " . $users[$userId - 1]->getNickname() . "</h4>"; // Je dois créer une fonction qui me permet de récupérer le NOM de l'auteur d'un post
	echo "<div>" . $post->getContent() . "</div>";
	echo "<div>" . $post->getDate() . "</div>";
	echo "</div>";
	echo "</br>";
	echo "</br>";
}



