<?php
/**
 * @package trinitimsk
 */
$lang = get_site_language();
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="yandex-verification" content="999af3ddc85001e1" />
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<!-- Yandex.Metrika counter -->
	<script type="text/javascript">
		(function(m,e,t,r,i,k,a){
			m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
			m[i].l=1*new Date();
			for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
			k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)
		})(window, document,'script','https://mc.yandex.ru/metrika/tag.js', 'ym');

		ym(96215171, 'init', {webvisor:true, clickmap:true, accurateTrackBounce:true, trackLinks:true});
	</script>
	<noscript><div><img src="https://mc.yandex.ru/watch/96215171" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	<!-- /Yandex.Metrika counter -->
	<meta name="yandex-verification" content="b525152e6cb791ec" />
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
					<? if ($lang == 'en_US'): ?>
						<a href="/">RU</a>
						<a class="active">EN</a>
					<? else: ?>
						<a class="active">RU</a>
						<a href="/en">EN</a>
					<? endif; ?>
				</div>
				<div class="header-contacts">
					<a class="header-phone" href="<?= format_phone_to_tel('+7 (905) 510-75-75'); ?>" onclick="ym(96215171,'reachGoal','nomer')">
						+7 (905) 510-75-75
					</a>
					<a class="header-email" href="mailto:sale.triniti@yandex.ru" onclick="ym(96215171,'reachGoal','email')">
						sale.triniti@yandex.ru
					</a>
				</div>
			</div>
			<div class="menu-btn mobile" onclick="toggleMenu()">
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>

		<div class="mobile-menu mobile">
			<div class="container mobile-menu-container">
				<div class="menu mobile">
					<div class="menu-item" onclick="smoothScrollToElement('#about', 40, true)">
						<?= $lang == 'en_US' ? 'About us' : 'О нас' ?>
					</div>
					<div class="menu-item" onclick="smoothScrollToElement('#products', 40, true)">
						<?= $lang == 'en_US' ? 'Items' : 'Товары' ?>
					</div>
					<div class="menu-item" onclick="smoothScrollToElement('#services', 40, true)">
						<?= $lang == 'en_US' ? 'Services' : 'Услуги' ?>
					</div>
					<div class="menu-item" onclick="smoothScrollToElement('#footer', 0, true)">
						<?= $lang == 'en_US' ? 'Contacts' : 'Контакты' ?>
					</div>
				</div>
				<div class="header-info mobile">
					<div class="header-contacts">
						<a class="header-phone" href="<?= format_phone_to_tel('+7 (905) 510-75-75'); ?>" onclick="ym(96215171,'reachGoal','nomer')">
							<img src="<?= get_stylesheet_directory_uri() . '/assets/imgs/phone.svg' ?>" alt="phone">
						</a>
						<a class="header-email" href="mailto:sale.triniti@yandex.ru" onclick="ym(96215171,'reachGoal','email')">
							<img src="<?= get_stylesheet_directory_uri() . '/assets/imgs/email.svg' ?>" alt="email">
						</a>
					</div>
					<div class="langs">
						<? if ($lang == 'en_US'): ?>
							<a href="/">RU</a>
							<a class="active">EN</a>
						<? else: ?>
							<a class="active">RU</a>
							<a href="/en">EN</a>
						<? endif; ?>
					</div>
				</div>
			</div>

	</header>