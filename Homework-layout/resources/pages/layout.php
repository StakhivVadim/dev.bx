<?php
/** @var array $config */
/** @var array $genres */
/** @var string $content */
/** @var string $currentPage */
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
	<link rel="stylesheet" href="./resources/css/header.css">
</head>
<body>
<div class="wrapper">
	<div class="sidebar">
		<ul class="menu">
			<div class="menu-logo">
				<div class="menu-logo-icon" style="background-image: url(data/images/Logo.svg)"></div>
			</div>
			<?php foreach($config['menu'] as $code => $name): ?>
				<div class="menu-item">
					<a class="menu-item-link <?= $currentPage === $code ? "active" : "" ?>" href="<?= $code . ".php" ?>"><?= $name ?></a>
				</div>
			<?php endforeach; ?>
			<?php foreach($config['genres'] as $genre => $nameg): ?>
				<div class="menu-item">
					<a class="menu-item-link <?= $currentPage === ("index.php?genre=" . $genre) ? "active" : "" ?>" href="<?= "index.php?genre=" . $genre ?>"><?= $nameg ?></a>
				</div>
			<?php endforeach; ?>
	</div>
		</ul>
	<div class="container">
		<div class="header">
			<div class="header-find">
				<div class="header-find-icon" style="background-image: url(data/images/icon-search.svg)"></div>
			<div class="header-find-str">
				<form action="#">
					<input type="text" name=text" class="search" placeholder="Поиск по каталогу...">
				</form>
			</div>
			<a href="#" class="header-find-button">искать</a>
			<a href="newMovie.php" class="header-add-button">добавить фильм</a>
			</div>
			<div class="header-bottom"></div>
			</div>
		<div class="content">
			<?= $content ?>
		</div>

	</div>
</div>
</body>
</html>
