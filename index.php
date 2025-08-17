<?php
/**
 * Template Name: Главная страница
 * 
 * @package trinitimsk
 */

get_header();

$fields = get_fields();
?>
	<main>
		<? require_once (get_template_directory() . '/components/home/main.php'); ?>
		<? require_once (get_template_directory() . '/components/home/about.php'); ?>
		<? require_once (get_template_directory() . '/components/home/advantages.php'); ?>
		<? require_once (get_template_directory() . '/components/home/products.php'); ?>
		<? require_once (get_template_directory() . '/components/home/form.php'); ?>
		<? require_once (get_template_directory() . '/components/home/services.php'); ?>
	</main>
<?php
get_footer();
