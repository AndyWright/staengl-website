<?php
/**
 * Sample template for displaying single staengl_project posts.
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>


  <h1><?php the_title(); ?></h1>
    <?php the_content(); ?>
    <?php the_excerpt(); ?>

    <h2>Custom Fields</h2>

    <strong>client name</strong> <?php print_custom_field('client_name'); ?><br />
    <strong>project subtitle</strong> <?php print_custom_field('project_subtitle'); ?><br />
    <strong>project location</strong> <?php print_custom_field('project_location'); ?><br />
    <strong>project images:</strong> <?php $images = get_custom_field('project_images:to_image_src');
foreach ($images as $img) {
  printf('<img src="%s"/>', $img);
}
?><br />
    <strong>bottom slider image</strong> <?php print_custom_field('bottom_slider_image'); ?><br />

<?php endwhile; // end of the loop. ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>