<?php
/**
 * @package trinitimsk
 */
$lang = get_site_language();
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="yandex-verification" content="999af3ddc85001e1" />
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<header>
		<div class="container header-container">
			<div class="logo">
				<a href="<?= $lang == 'en_US' ? '/en' : '/'; ?>">
					<img src="<?= getLogoUrl(); ?>" alt="logo">
				</a>
			</div>
			<div class="menu desktop">
				<div class="menu-item" onclick="smoothScrollToElement('#about', 40)">
					<?= $lang == 'en_US' ? 'About us' : 'О нас' ?>
				</div>
				<div class="menu-item" onclick="smoothScrollToElement('#products', 40)">
					<?= $lang == 'en_US' ? 'Items' : 'Товары' ?>
				</div>
				<div class="menu-item" onclick="smoothScrollToElement('#services', 40)">
					<?= $lang == 'en_US' ? 'Services' : 'Услуги' ?>
				</div>
				<div class="menu-item" onclick="smoothScrollToElement('#footer', 0)">
					<?= $lang == 'en_US' ? 'Contacts' : 'Контакты' ?>
				</div>
			</div>
			<div class="header-info desktop">
				<div class="langs">
					<? if ($lang == 'en_US') :?>
						<a href="/">RU</a>
						<a class="active">EN</a>
					<? else: ?>
						<a class="active">RU</a>
						<a href="/en">EN</a>
					<? endif; ?>
				</div>
				<div class="header-contacts">
					<a class="header-phone" href="<?= format_phone_to_tel('+7 (905) 510-75-75'); ?>">
						+7 (905) 510-75-75
					</a>
					<a class="header-email" href="mailto:sale.triniti@yandex.ru">
						sale.triniti@yandex.ru
					</a>
				</div>
			</div>
			<div class="menu-btn mobile">
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>

	</header>