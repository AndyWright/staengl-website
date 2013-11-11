<?php
/*
 * Template Name: Services Page
 */
?>

<?php get_header(); ?>
<div class="innards">
<div class="services">
<?php if (have_posts()): ?>
  <?php while (have_posts()): the_post(); ?>
    <?php the_content(); ?>
  <?php endwhile; ?>
<?php else: ?>
  <?php get_template_part('notfound'); ?>
<?php endif; ?>
</div>
</div> <!-- class="innards" -->
<?php get_footer(); ?>