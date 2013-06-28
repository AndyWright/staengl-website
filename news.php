<?php
/*
 * Template Name: News Page
 */
?>

<?php get_header(); ?>

<div class="innards">
  <div class="news">
    <h1>News</h1>
    <ul>
<?php $the_query = new WP_Query( 'showposts=999' ); ?>
<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
      <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
<?php endwhile;?>
    </ul>
  </div>
</div> <!-- class="innards" -->
<?php get_footer(); ?>