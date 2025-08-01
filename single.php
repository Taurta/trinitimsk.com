<?php
/**
 * Template Name: Текстовая страница
 * 
 * @package trinitimsk
 */

get_header();

$fields = get_fields();
?>
	<main>
        <div class="container" style="max-width: 1000px; padding: 100px 0">
            <h1><? the_title(); ?></h1>
            <? the_content(); ?>
        </div>
	</main>
<?php
get_footer();
