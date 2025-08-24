<?
// О нас на главной

global $fields;
?>

<section id="about">
	<div class="container about-container">
		<div class="about-text">
			<img src="<?= get_stylesheet_directory_uri() ?>/assets/imgs/green-logo.png" alt="Triniti" class="about-logo">
			<div class="about-text-line"></div>
			<p><?= $fields['about_text']; ?></p>
		</div>
		<? if ($fields['about_cards']): ?>
			<div class="about-cards">
				<? foreach ($fields['about_cards'] as $card): ?>
					<div class="about-card">
						<img src="<?= $card['icon']; ?>" alt="<?= $card['title']; ?>">
						<h3>
							<?= $card['title']; ?>
						</h3>
						<p>
							<?= $card['text']; ?>
						</p>
					</div>
				<? endforeach; ?>
			</div>
		<? endif; ?>
		<div class="cloud cloud-1"></div>
		<div class="cloud cloud-2"></div>
		<img class="about-bg" src="<?= get_stylesheet_directory_uri() . '/assets/imgs/about-bg.svg' ?>" alt="bg">
	</div>
</section>

<style>
	#about {
		padding-top: 80px;
		padding-bottom: 114px;
		position: relative;
		z-index: 2;
	}

	.about-bg {
		position: absolute;
		left: -190px;
		top: -30px;
		z-index: -1;
		width: 1026px;
		opacity: 0.3;
	}

	.about-container {
		position: relative;
	}

	.about-text {
		display: flex;
		flex-direction: column;
		align-items: center;
		gap: 24px;
	}

	.about-text-line {
		height: 2px;
		width: 100px;
		background-color: var(--accent);
	}

	.about-text p {
		max-width: 490px;
		text-align: center;
		font-size: 20px;
		font-weight: 300;
		margin: 0;
	}

	.about-cards {
		margin-top: 50px;
		display: grid;
		grid-template-columns: repeat(4, 1fr);
		gap: 40px;
	}

	.about-card {
		padding: 110px 32px 40px;
		height: 100%;
		position: relative;
		border-radius: 12px;
		background-image: linear-gradient(0turn, rgba(25, 43, 41, 1) 0%, rgba(22, 33, 26, 1) 100%);
	}

	.about-card:nth-child(even) {
		background-image: linear-gradient(0turn, rgba(9, 13, 9, 0.75) 0%, rgba(27, 27, 27, 1) 100%);
	}

	.about-card img {
		position: absolute;
		top: 24px;
		left: 32px;
	}

	.about-card h3 {
		font-size: 22px;
		margin-top: 0;
		margin-bottom: 16px;
	}

	.about-card p {
		font-size: 15px;
		font-weight: 300;
	}

	#about .cloud-1 {
		width: 723px;
		left: -190px;
		top: -190px;
	}

	#about .cloud-2 {
		width: 723px;
		right: -100px;
		top: -340px;
	}

	@media screen and (max-width: 1200px) {
		#about {
			padding-bottom: 40px;
		}

		.about-logo {
			width: 150px;
		}

		#about .cloud-1 {
			left: -35px;
			top: -470px;
			width: 531px;
		}

		#about .cloud-2 {
			left: -130px;
			top: -43px;
			width: 723px;
		}

		.about-cards {
			margin-top: 42px;
			display: grid;
			grid-template-columns: repeat(2, 1fr);
			gap: 10px;
		}

		.about-card {
			padding: 74px 20px 34px;
			width: 100%;
		}

		.about-card h3 {
			font-size: 18px;
			line-height: 28px;
		}

		.about-card p {
			font-size: 13px;
			line-height: 18px;
		}

		.about-card img {
			top: 20px;
			left: 20px;
		}
	}

	@media screen and (max-width: 480px) {
		.about-text p {
			font-size: 14px;
			line-height: 19px;
		}

		.about-cards {
			grid-template-columns: 1fr;
		}

		.about-card {
			padding: 23px 64px;
			position: relative;
		}

		.about-card img {
			position: absolute;
			top: 20px;
			left: 15px;
			height: 30px;
		}

		.about-card p {
			margin-bottom: 0;
		}
	}
</style>