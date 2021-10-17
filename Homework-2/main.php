<?php

$recommendedFilms =[];
foreach ($films as $filmIndex => $film)
{
	if($film['minAge'] <= $userAge)
	{
		$recommendedFilms[] = $film;
	}
}
