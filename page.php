<?php get_header(); ?>

<div class="row inner-content">

  <h1>page.php</h1>

<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>

        <?php the_content(); ?>

    <?php endwhile; ?>

<?php else: ?>

    <?php get_template_part('notfound'); ?>

<?php endif; ?>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>