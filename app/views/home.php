<?php /** @var App\Entity\User $user */?>
</br>
<?php
var_dump($_SESSION);
$user = $_SESSION["user"];
?>
<h1><?= $trucs; ?></h1>
<h2><?= $machin; ?></h2>

<form action="/deconnexion" method="get">
	<button type="submit" id="submitPublication" >Deconnexion</button>
</form>

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
foreach ($posts as $post):
	$authorId = $post->getUser();
	$authorNickname = $users[$authorId - 1]->getNickname();
?>
	<div id='post-<?= strval($post->getId()) ?>' style='border: 1px solid'>"
	<!--  ligne à retirer pour la suite : ne sert qu'au debugging -->
	Id du post : " <?= $post->getId() ?> - id de l'auteur :  <?= strval($authorId)?>
	<h4>Auteur du post :  <?= $authorNickname ?> </h4> 
	
	<!-- Je dois créer une fonction qui me permet de récupérer le NOM de l'auteur d'un post -->
	<div> <?= $post->getContent() ?> </div>
	<div> <?= $post->getDate() ?> </div>
	
	<?php if($_SESSION["user"]["nickname"] === $authorNickname): ?>
		<button type='submit'>Modifier</button>";
	<?php endif ?>
	<?php if($_SESSION["user"]["nickname"] === $authorNickname || $_SESSION["user"]['admin'] === 'true'): ?>
		<form action="/delete/<?= $post->getId() ?>" method="POST">
    		<input class="validate" type="submit" id="valider" value="Supprimer"/>
		</form>
	<?php endif ?>
	</div>
	</br>
	</br>
<?php endforeach ?>