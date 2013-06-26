<?php get_header(); ?>
    <h2>page.php</h2>

<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>

        <?php the_content(); ?>

    <?php endwhile; ?>

<?php else: ?>

    <?php get_template_part('notfound'); ?>

<?php endif; ?>

<?php get_footer(); ?>