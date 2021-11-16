<?php
/** @var array $movies */
require_once "./lib/template-functions.php";
?>

<div class="movie-list"></div>
<?= renderTemplate("./resources/blocks/movieMore.php", [
	'movies' => $movies,
]);
?>
