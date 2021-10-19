<?php
/** @var array $movies */
require "Base_of_movies.php";
require "Function_of_movies.php";

$recommendedMovies = SearchMovies($movies);
PrintMovies($recommendedMovies);
