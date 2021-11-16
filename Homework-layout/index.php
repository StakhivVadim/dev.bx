<?php
declare(strict_types = 1);
/** @var array $movies */
/** @var array $genres */
/** @var array $config */
require_once "./config/app.php";
require_once "./data/movies.php";
require_once "./lib/helper-functions.php";
require_once "./lib/template-functions.php";
require_once "./lib/movies-function.php";

if (isset ($_GET['genre']))
{
	$status = $_GET['genre'];
	$movies = getMoviesByGenre($movies, $genres, $status);
}

$moviesListPage = renderTemplate("./resources/pages/moviesList.php", [
	'movies' => $movies,
]);

renderLayout($moviesListPage, [
	'config' => $config,
	'currentPage' => getFileName(__FILE__),
]);
?>
