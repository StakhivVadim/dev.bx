<?php
/** @var array $movies */
?>
<div class="content-more">
	<div class="content-more--header">
		<div class="content-more--header-title"><?= $movies['title'] . '(' . $movies['release-date'] . ')' ?>
			<div class="content-more--header-like">
				<a class="content-more--header-liked <?= (isset($_GET['favourite'])) ? "active"
					: "" ?>" href="<?= (isset($_GET['favourite']) === false) ? ("more.php?movie="
					. $movies['original-title']
					. "&favourite=true") : ("more.php?movie=" . $movies['original-title']) ?>">
					<img src="<?= (isset($_GET['favourite']) === true) ? "data/images/icon-with-like.svg"
						: "data/images/icon-without-like.svg" ?>"></a>
			</div>
		</div>
		<div class="content-more--header-subtitle"><?= $movies['original-title'] ?>
			<div class="content-more--header-subtitle-age-image">
				<div class="content-more--header-subtitle-age-image-rectangle">
					<div class="content-more--header-subtitle-age-image-rectangle-age"><?= $movies['age-restriction']
						. '+' ?></div>
				</div>
			</div>
		</div>
		<div class="content-more--header-wrapper"></div>
	</div>
	<div class="content-more--preview" style="background-image: url(data/images_movies/<?= $movies['id'] ?>.jpg)">
		<div class="content-more--header-raiting">
			<?php
			for ($i = 1; $i < $movies['rating']; $i++) { ?>
				<div class="content-more--header-raiting-orange-block"></div>
			<?php
			} ?>
			<?php
			for ($i = 0; $i < (10 - $movies['rating']); $i++) { ?>
				<div class="content-more--header-raiting-grey-block"></div>
			<?php
			} ?>
			<div class="content-more--header-raiting-icon" style="background-image: url(data/images/rating-icon.svg)">
				<div class="content-more--header-raiting-number"><?= $movies['rating'] ?></div>
			</div>
		</div>
		<div class="content-more--info">
			<div class="content-more--info-about-movie">О фильме</div>
			<div class="content-more--info-block">
				<div class="content-more--info-title">Год производства:</div>
				<div class="content-more--info-movie"><?= $movies['release-date'] ?></div>
			</div>
			<div class="content-more--info-block">
				<div class="content-more--info-title">Режиссер:</div>
				<div class="content-more--info-movie"><?= $movies['director'] ?></div>
			</div>
			<div class="content-more--info-block">
				<div class="content-more--info-title">В главных ролях:</div>
				<div class="content-more--info-movie"><?= castToStr($movies) ?></div>
			</div>

			<div class="content-more--info-description-title">Описание</div>
			<div class="content-more--info-description"><?= $movies['description'] ?></div>

		</div>
		<div class="content-more--header-raiting"></div>
	</div>

</div>
