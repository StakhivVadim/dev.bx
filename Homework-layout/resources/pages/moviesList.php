<?php
/** @var array $movies */
require_once "./lib/template-functions.php";
?>

<div class="movie-list"></div>
<?php
foreach ($movies as $movie): ?>
	<?= renderTemplate("./resources/blocks/movieCard.php", [
		'movie' => $movie,
	]); ?>
<?php
endforeach; ?>
