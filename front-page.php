<?php
/*
Template Name: front page
*/
?>

<?php get_header(); ?>

<h1>front page</h1>

<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>

        <?php the_content(); ?>

    <?php endwhile; ?>

<?php else: ?>

    <?php get_template_part('notfound'); ?>

<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>