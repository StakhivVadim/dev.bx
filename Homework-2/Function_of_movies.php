<?php

function SearchMovies($movies)
{
	echo "Welcome to the movie list!\n";
	$userAge = readline("Enter your age: ");
	if ($result = is_numeric($userAge))
	{
		foreach ($movies as $movie)
		{
			if ($movie['age_restriction'] <= $userAge)
			{
				$recommendedFilms[] = $movie;
			}
		}
		return $recommendedFilms;
	}
	else
	{
		echo"Incorrect age\n";
	}
}

function PrintMovies($movies)
{
	$i=0;
	foreach ($movies as $movie)
	{
		$i++;
		printMessage(formatMovie($movie,$i));
	}
}

function formatMovie(array $movie,$i)
{
	return "{$i}. {$movie['title']} ({$movie['release_year']}),{$movie['age_restriction']}+. Rating - {$movie['rating']} ";
}

function printMessage($message)
{
	echo $message . "\n";
}
