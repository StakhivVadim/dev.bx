<?php

function searchMovies($movies)
{
	echo "Welcome to the movie list!\n";
	$userAge = readline("Enter your age: ");
	if (!is_numeric($userAge))
	{
		echo "Incorrect age.";
		return false;
	}
	$i=0;
	foreach ($movies as $movie)
	{
		if ($movie['age_restriction'] <= (int)$userAge)
		{
			$i++;
			printMessage(formatMovie($movie,$i));
		}
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
