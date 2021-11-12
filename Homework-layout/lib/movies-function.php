<?php

function getMoviesByGenre(array $movies,array $genres, string $code, array $result){
	foreach ($movies as $movie)
	{
		if (isset($genres[$code]) && in_array($genres[$code], $movie['genres'], true))
		{
			array_push($result,$movie);
		}
	}
	return $result;
}

function checkFilter($movies,$genres){
	if (isset ($_GET['genre'])){
		$status = $_GET['genre'];
		$result = [];
		return $movies = getMoviesByGenre($movies,$genres,$status,$result);
	}
	else return $movies;
}

function timeChanger($movie){
	$hours = intdiv($movie['duration'],60);
	$mins = ($movie['duration']%60);
	if ($mins<10){
		return $movie['duration'] . "мин./ " . "0" . $hours . ":0" . $mins;
	}
	else return $movie['duration'] . "мин./ " . "0" . $hours . ":" . $mins;
}

function findSizeOfDecription(array $movie){
	$maxTitleSizePerStr = 50;
	if (strlen($movie['title'])>$maxTitleSizePerStr){
		return cutDescription ($movie['description'],210);
	}
	else return cutDescription($movie['description'],270);
}

function cutDescription(string $text, int $maxTextLength): string
{
	if (strlen($text) > $maxTextLength)
	{
		$text = mb_strimwidth($text,0,$maxTextLength,"...");
	}
	return $text;
}

function genreToStr($movie){
	$str = implode(",",$movie['genres']);
	return cutDescription($str ,30);;
}
