<?php
/*
 * Template Name: Company Page
 */
?>

<?php get_header(); ?>
<div class="innards">
<div class="company">
  <h1>Company</h1>

  <div>
    <div class="copy">
    <?php if (have_posts()): ?>
      <?php while (have_posts()): the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; ?>
    <?php else: ?>
      <?php get_template_part('notfound'); ?>
    <?php endif; ?>
    </div>
    <div class="headshot">
      <img src="<?php bloginfo('template_directory');?>/img/headshot.jpg" >
    </div>
  </div>
  <div class="clear"></div>

  <div class="clipboard">
    <p>You can download Galen's Resume <a href="<?php bloginfo('template_directory');?>/documents/Staengl_Resume_2013.pdf" target="_blank">here</a>.</p>
    <img src="<?php bloginfo('template_directory');?>/img/clipboard.jpg" >
  </div>
  <div class="clear"></div>

  <h3>Affiliates</h3>
  We have established partner affiliations with various select firms to allow us to offer
  our clients a wider range of integrated design services and cutting-edge solutions.

<div class="company-links">
<a href="http://passivscience.com/" target="_blank">
  <img src="<?php staengl_image('passiv.jpg'); ?>" />
</a>
<a href="http://www.integralgroup.com/" target="_blank">
  <img src="<?php staengl_image('integral.jpg'); ?>" />
</a>
</div>
</div>
</div> <!-- class="innards" -->
<?php get_footer(); ?>