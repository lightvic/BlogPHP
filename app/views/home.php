<?php /** @var App\Entity\User $user */ ?>
<h1><?= $trucs; ?></h1>
<h2><?= $machin; ?></h2>

<form action="/deconnexion" method="get">
		<button type="submit" id="submitPublication" >Deconnexion</button>
	</form>

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
	echo("Id du post : " . $post->getId() . " - date : " . $post->getDate() . " - id de l'auteur : " . $post->getUser());
	echo('</br>');
	echo($post->getContent());
	echo('</br>');
	echo('</br>');
}



