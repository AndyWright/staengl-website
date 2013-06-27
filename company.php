<?php
/*
 * Template Name: Company Page
 */
?>

<?php get_header(); ?>
<div class="innards">
<?php if (have_posts()): ?>
  <?php while (have_posts()): the_post(); ?>
    <?php the_content(); ?>
  <?php endwhile; ?>
<?php else: ?>
  <?php get_template_part('notfound'); ?>
<?php endif; ?>
<div class="company-links">
<a href="http://passivscience.com/" target="_blank">
  <img src="<?php staengl_image('passiv.jpg'); ?>" />
</a>
<a href="http://www.integralgroup.com/" target="_blank">
  <img src="<?php staengl_image('integral.jpg'); ?>" />
</a>
</div>
</div> <!-- class="innards" -->
<?php get_footer(); ?>