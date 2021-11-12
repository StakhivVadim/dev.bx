<?php
/** @var array $movies */
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Bitflix</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="./resources/css/reset.css">
	<link rel="stylesheet" href="./resources/css/style.css">
	<link rel="stylesheet" href="./resources/css/itemStyle.css">
</head>
<body>
<div class="wrapper">
	<div class="sidebar">
		<ul class="menu">
			<div class="menu-logo">
				<div class="menu-logo-icon" style="background-image: url(data/images/Logo.svg)"></div>
			</div>
			<li class="menu-item menu-item--active">
				<a href="#Main.html">Главная</a>
			</li>
			<li class="menu-item">
				<a href="#Movies.html">Фильмы</a>
			</li>
			<li class="menu-item">
				<a href="#Serials.html">Сериалы</a>
			</li>
			<li class="menu-item">
				<a href="#News.html">Новинки и популярное</a>
			</li>
			<li class="menu-item">
				<a href="#My-list.html">Мой список</a>
			</li>
		</ul>
	</div>
	<div class="container">
		<div class="header">

		</div>
		<div class="content">
			<div class="movie-list"></div>
			<?php foreach ($movies as $movie): ?>
				<div class="movie-list--item">
					<div class="movie-list--item-overlay">
						<a href="#" class="movie-list--item-overlay-more">Подробнее</a>
					</div>
					<div class="movie-list--item-image" style="background-image: url(data/images_movies/1.jpg)"></div>
					<div class="movie-list--item-head">
						<div class="movie-list--item-title"><?= $movie['title'] ?></div>
						<div class="movie-list--item-subtitle"><?= $movie['original-title'] ?></div>
						<div class="movie-list--item-wrapper"></div>
					</div>
					<div class="movie-list--item-description"><?= $movie['description'] ?></div>
					<div class="movie-list--item-bottom">
						<div class="movie-list--item-bottom-time">
							<div class="movie-list--item-bottom-time--icon"></div>
							<?= $movie['duration'] ?></div>
						<div class="movie-list--item-bottom-info">
							<?php foreach ($movie['genres'] as $movie['genre']): ?><?= $movie['genre'] ?>
							<?php endforeach; ?></div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

	</div>
</div>
</body>
</html>
