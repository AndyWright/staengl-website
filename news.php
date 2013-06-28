<?php
/*
 * Template Name: News Page
 */
?>

<?php get_header(); ?>

<div class="innards">
  <div class="news">
    <h1>News</h1>
<?php $the_query = new WP_Query( 'showposts=9999' ); ?>
<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
  <div class="news-item">
    <div class="date"><?php the_date('Y M d'); ?></div>
    <div class="deets">
      <div class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></div>
      <div class="content"><?php the_content(); ?></div>
    </div>
  </div>
  <div class="clear"></div>
<?php endwhile;?>


  </div>
</div> <!-- class="innards" -->
<?php get_footer(); ?>