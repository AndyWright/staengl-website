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
        <ul class="project-slideshow">
<?php
$project_images_array = get_custom_field('project_images:to_array', 'to_image_src');
foreach ($project_images_array as $img) {
    printf('<li><img src="%s"/></li>', $img);
    print_r($img);
}
?>
        </ul>
    </div>
</div>
<?php endwhile; // end of the loop. ?>
<div class="bottom">
    <h4>OTHER PROJECTS</h4>
    <?php get_template_part('filmstrip'); ?>
</div>
</div>
</div> <!-- class="innards" -->
<?php get_footer(); ?>