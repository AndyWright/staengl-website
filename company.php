<?php
/*
 * Template Name: Company Page
 */
?>

<?php get_header(); ?>
<div class="innards">
<div class="company">
  <h1>Company</h1>
<?php if (have_posts()): ?>
  <?php while (have_posts()): the_post(); ?>
    <?php the_content(); ?>
  <?php endwhile; ?>
<?php else: ?>
  <?php get_template_part('notfound'); ?>
<?php endif; ?>
  <img class="headshot" src="<?php bloginfo('template_directory');?>/img/headshot.jpg" >
  <a href="http://loco8.org"></a>
  <p>You can download Galen's Resume <a href="<?php bloginfo('template_directory');?>/documents/Staengl_Resume_2013.pdf" target="_blank">here</a>.</p>

  <p>(image TBD – twilight shot of building?)</p><br/>

  <h3>Affiliates</h3>
  We have established partner affiliations with various select firms to allow us to offer
  our clients a wider range of integrated design services and cutting-edge solutions.
</div>
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