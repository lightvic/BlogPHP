<?php /** @var App\Entity\User $user */?>
<h1><?= $titre1; ?></h1>
<h2><?= $titre2; ?></h2>

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
	<div id='post-<?= strval($post->getId()) ?>' style='border: 1px solid'>
	<h4><?= $authorNickname ?> </h4> 
	<div> <?= $post->getContent() ?> </div>
	<div> <?= $post->getDate() ?> </div>
	
	<?php if($userNickname === $authorNickname): ?>
		<button type='submit'>Modifier</button>
	<?php endif ?>
	<?php if($userNickname === $authorNickname || $userIsAdmin === 'true'): ?>
		<form action="/delete/<?= $post->getId() ?>" method="POST">
    		<input class="validate" type="submit" id="valider" value="Supprimer"/>
		</form>
	<?php endif ?>
	</div>
	</br>
	</br>
<?php endforeach ?>