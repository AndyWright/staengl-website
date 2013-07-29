<?php get_header(); ?>

 <h1>index.php</h1>

 <div class="row welcome">
    <div class="large-12 columns">
      <h1>welcome to <a href="https://github.com/ngn33r/wp-zurb-boilerplate">wp-zurb-boilerplate</a></h1>
      <p>a bare-bones boilerplate for developing a theme for <a href="http://wordpress.org/">worpdress</a>
        using <a href="http://foundation.zurb.com/docs/">Zurb Foundation version 4.2.2</a>.</p>
      <hr />
    </div>
  </div>

  <div class="row main-content">
    <div class="large-8 columns home-content">

      <h3>static home content</h3>

      <ul data-orbit>
        <li>
          <img src="<?php demo_image('demo01.png'); ?>" />
          <div class="orbit-caption">puppy!!</div>
        </li>
        <li>
          <img src="<?php demo_image('demo03.jpeg'); ?>" />
          <div class="orbit-caption">awwww cuuuute!</div>
        </li>
        <li>
          <img src="<?php demo_image('demo02.png'); ?>" />
          <div class="orbit-caption">woof</div>
        </li>
      </ul>

      <div class="row">
        <div class="large-11 columns">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. <b>Lorem</b> Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla <b>cursus</b> quis sem at <b>dapibus</b> nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per <b>nulla.</b> conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc. Curabitur tortor. Pellentesque nibh. Aenean quam. In scelerisque sem at <b>dignissim</b> dolor. Maecenas mattis. Sed convallis tristique <b>at</b> sem. Proin ut ligula <b>at</b> vel nunc egestas <b>dolor.</b> porttitor. Morbi lectus risus, iaculis <b>vel</b> vel, suscipit quis, luctus non, massa. Fusce ac <b>vel,</b> turpis quis ligula lacinia aliquet. Mauris ipsum.</p>
        </div>
      </div>
      <p><a href="#" class="secondary button">click me</a></p>
    </div>

    <div class="large-4 columns posts">

<?php if (have_posts()): ?>
      <h3>blog posts</h3>
    <?php while (have_posts()): the_post(); ?>

        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>

    <?php endwhile; ?>

    <?php if( get_previous_posts_link() ) : ?>

        <span class="pagination button alignleft"><?php previous_posts_link('&laquo; Newer Entries'); ?></span>

    <?php endif; ?>

    <?php if( get_next_posts_link() ) : ?>

        <span class="pagination button alignright"><?php next_posts_link('Older Entries &raquo;'); ?></span>

    <?php endif; ?>

<?php else: ?>

    <?php get_template_part('notfound'); ?>

<?php endif; ?>

    </div>
  </div>

<?php get_footer(); ?>