<?php
/**
 * Sample template for displaying single staengl_project posts.
 */
?>

<?php get_header(); ?>
<div class="innards">
<div class="project">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div class="top">
    <div class="one">
        <h1><?php the_title(); ?></h1>
        <p class="subtitle"><?php print_custom_field('project_subtitle'); ?></p>
        <p class="location"><?php print_custom_field('project_location'); ?></p>
        <p class="deets"><?php the_content(); ?></p>
    </div>
    <div class="two">
        &nbsp;
        <?php $images = get_custom_field('project_images:to_image_s'); ?>
    </div>
</div>
<div class="bottom">
    <h4>OTHER PROJECTS</h4>
    <?php get_template_part('filmstrip'); ?>
</div>
<?php endwhile; // end of the loop. ?>

</div>
</div> <!-- class="innards" -->
<?php get_footer(); ?>