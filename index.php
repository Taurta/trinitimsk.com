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
	</main>
<?php
get_footer();
