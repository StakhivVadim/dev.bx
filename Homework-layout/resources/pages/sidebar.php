<?php
/** @var array $config */
/** @var array $genres */
/** @var string $currentPage */
?>

//еще не реализовано

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
