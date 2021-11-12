<?php
/** @var array $movies */
?>

<div class="movie-list--item">
	<div class="movie-list--item-overlay">
		<a href="more.php#<?=$movie['original-title']?>" class="movie-list--item-overlay-more">Подробнее</a>
	</div>
	<div class="movie-list--item-image" style="background-image: url(data/images_movies/<?= $movie['id']?>.jpg)"></div>
	<div class="movie-list--item-head">
		<div class="movie-list--item-title"><?= $movie['title'] ?></div>
		<div class="movie-list--item-subtitle"><?= $movie['original-title'] ?></div>
		<div class="movie-list--item-wrapper"></div>
	</div>
	<div class="movie-list--item-description"><?=findSizeOfDecription($movie) ?></div>
	<div class="movie-list--item-bottom">
		<div class="movie-list--item-bottom-time">
			<div class="movie-list--item-bottom-time--icon" style="background-image: url(data/images/time-icon.svg)"></div>
			<?= timeChanger($movie)?></div>
		<div class="movie-list--item-bottom-info">
			<?= genreToStr($movie)?>
		</div>
	</div>
</div>
