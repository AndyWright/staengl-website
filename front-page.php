<?php get_header(); ?>

<div class="hero">
  <img src="<?php staengl_image('hero/crossing01.jpg'); ?>"></div>
</div>

<div class="innards bottomless">
  <div class="titles">
    <div class="one what">What We Do</div>
    <div class="two philosophy">Our Philosophy</div>
    <div class="three latest-news">The Latest News</div>
    <div class="clear"></div>
  </div>
</div>

<div class="innards">
  <div class="copy">
    <div class="one">
      <p>Staengl Engineering is a Mechanical, Electrical and Plumbing Engineering
      Design & Energy Consulting firm specializing in energy-efficient MEP
      systems for high-performance and sustainable buildings. Our focus is on
      projects targeting very low, net-zero and net-positive energy use. We
      design systems for buildings certified for LEED (Platinum, Gold and
      Silver), Net Zero Energy, PassivHaus, and Living Building Challenge,
      and we’ve been recognized for our award-winning projects by the US Green
      Building Council and the Virginia Sustainable Building Network, among others.</p>
    </div>
    <div class="two">
      <p>We strive to design elegant, simple systems – minimizing the use of
      resources and energy – to create comfortable, healthy, vibrant spaces
      where people live and work. Each of our designs represents an in-depth
      evaluation of our client’s goals, the building design and the environmental
      conditions, producing systems that are tailored for each project. The past
      10 years have proved that designing and constructing net-zero and low-energy
      buildings is readily achievable and economical. The challenge now, as we see
      it, is to use integrated design to create low-energy buildings that embody
      elegance, inspire visitors and occupants, and maximize economy.</p>
    </div>
    <div class="three">
      <p>bunch of text goes here</p>
    </div>
    <div class="clear"></div>
  </div>
</div>

<div class="innards">
  <div class="badges">
    <div class="one">
      <span data-tooltip class="tip-top" title="Staengl Engineering is a member of the U.S. Green Building Council. The USGBC is a 501©(3) nonprofit organization committed to a prosperous and sustainable future for our nation through cost-efficient and energy-saving green buildings.">
        <img src="<?php staengl_image('greenbuilding.jpg'); ?>">
      </span>
    </div>
    <div class="two">
      <span data-tooltip class="has-tip tip-top" title="Staengl Engineering is a member of the Passive House Alliance. The Passive House Building Energy Standard is the most rigorous building envelope energy standard in the world. Staengl Engineering is proud to be designing innovative building systems for some of the first non-residential Passive House projects in North America.">
        <img src="<?php staengl_image('alliance.jpg'); ?>">
      </span>
    </div>
    <div class="three">
      <span data-tooltip class="has-tip tip-top" title="Staengl Engineering is proud to have adopted the Architecture 2030 Challenge. The goal of the 2030 Challenge is to achieve a dramatic reduction in the climate-change-causing greenhouse gas (GHG) emissions of the Building Sector by changing the way buildings and developments are planned, designed and constructed.">
        <img src="<?php staengl_image('integral.jpg'); ?>">
      </span>
    </div>
    <div class="clear"></div>
  </div>
</div>

<div class="innards">

  <div class="">
    <div class="posts">

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


</div> <!-- class="innards" -->

<?php get_footer(); ?>