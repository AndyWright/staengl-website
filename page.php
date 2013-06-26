<?php get_header(); ?>

<div class="innards">

    <h4>page.php</h4>

<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>

        <?php the_content(); ?>

    <?php endwhile; ?>

<?php else: ?>

    <?php get_template_part('notfound'); ?>

<?php endif; ?>

</div> <!-- class="innards" -->

<?php get_footer(); ?>