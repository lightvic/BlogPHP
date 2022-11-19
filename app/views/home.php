<?php /** @var App\Entity\User $user */ ?>
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
<h3 style="color:red">Samedi, j'en serai à régler ça.</h3>
<?php
/** @var App\Entity\Post[] $posts */
foreach ($posts as $post) {
	$postAuthorId = $post->getUser();
    echo $postAuthorId;
    echo $post->getByID($postAuthorId);
    echo $post->getContent();
}


