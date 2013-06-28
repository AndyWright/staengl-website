<?php get_header(); ?>
<div class="innards">
  <div class="news">
<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
        <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
            <div class="date"><?php echo the_time("Y M d"); ?></div>
            <h2><?php the_title(); ?></h2>
            <div class="postcontent">
                <?php the_content(__('(continue...)')); ?>
                <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
            </div><!--/postcontent-->
            <?php if (get_the_tags()) { ?><span class="tags"><?php the_tags('', ', ', ''); ?></span><?php } ?>
        </div><!--/post-->
    <?php endwhile; ?>
<?php else: ?>
    <?php get_template_part('notfound'); ?>
<?php endif; ?>
  </div>
</div> <!-- class="innards" -->
<?php get_footer(); ?>