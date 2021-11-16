<?php

function getMoviesByGenre(array $movies, array $genres, string $code)
{
	$result = [];
	foreach ($movies as $movie)
	{
		if (isset($genres[$code]) && in_array($genres[$code], $movie['genres'], true))
		{
			array_push($result, $movie);
		}
	}
	return $result;
}

function timeChanger($movie)
{
	$hours = intdiv($movie['duration'], 60);
	$mins = ($movie['duration'] % 60);
	if ($mins < 10)
	{
		return $movie['duration'] . "мин./ " . "0" . $hours . ":0" . $mins;
	}
	else
	{
		return $movie['duration'] . "мин./ " . "0" . $hours . ":" . $mins;
	}
}

function cutText(string $text, int $maxTextLength): string
{
	if (strlen($text) > $maxTextLength)
	{
		$text = mb_strimwidth($text, 0, $maxTextLength, "...");
	}
	return $text;
}

function genreToStr($movie)
{
	$str = implode(",", $movie['genres']);
	return cutText($str, 30);;
}

function castToStr($movie)
{
	$str = implode(",", $movie['cast']);
	return $str;
}

function movie_search($status, $movies)
{
	foreach ($movies as $movie)
	{
		if ($movie['original-title'] === $status)
		{
			return $movie;
		}
	}
}
