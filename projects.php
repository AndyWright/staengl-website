<?php
/*
 * Template Name: Projects Page
 */
?>

<?php get_header(); ?>
<div class="innards">
<div class="projects">
<h1>Projects</h1>

<?php
$Q = new GetPostsQuery();
$args = array();
$args['post_type'] =  'staengl_project';
$args['post_status'] = 'publish';
$args['taxonomy'] = 'category';
$args['post_status'] = 'publish';
$args['orderby'] = 'post_date';
$args['order'] = 'DESC';

echo '<div class="one">';

echo '<div class="one-category">';
echo '<h3>Energy Efficient MEP Design</h3>';
$args['taxonomy_slug'] = 'mep';
$results = $Q->get_posts($args);
foreach ($results as $r) {
  echo '<div class="one-project">';
  echo '<div class="thumbnail">';
  echo '<a href="' . $r['permalink'] . '"><img src="' . CCTM::filter($r['bottom_slider_image'], 'to_image_src') . '"></a>';
  echo '';
  echo '</div>';
  echo '<div class="textnail">';
  echo '<p class="title"><a href="' . $r['permalink'] . '">' . $r['post_title'] . '</a></p>';
  echo '<p class="subtitle">' . $r['project_subtitle'] . '</p>';
  echo '<p class="location">' . $r['project_location'] . '</p>';
  echo '</div>';
  echo '</div>';
}
echo '</div>';

echo '<div class="one-category">';
echo '<h3>Energy Studies</h3>';
$args['taxonomy_slug'] = 'energy-studies';
$results = $Q->get_posts($args);
foreach ($results as $r) {
  echo '<div class="one-project">';
  echo '<div class="thumbnail">';
  echo '<a href="' . $r['permalink'] . '"><img src="' . CCTM::filter($r['bottom_slider_image'], 'to_image_src') . '"></a>';
  echo '';
  echo '</div>';
  echo '<div class="textnail">';
  echo '<p class="title"><a href="' . $r['permalink'] . '">' . $r['post_title'] . '</a></p>';
  echo '<p class="subtitle">' . $r['project_subtitle'] . '</p>';
  echo '<p class="location">' . $r['project_location'] . '</p>';
  echo '</div>';
  echo '</div>';
  // print_r($r);
}
echo '</div>';

echo '</div>';

echo '<div class="two">';

echo '<div class="one-category">';
echo '<h3>Current Projects</h3>';
$args['taxonomy_slug'] = 'current';
$results = $Q->get_posts($args);
foreach ($results as $r) {
  echo '<div class="one-project">';
  echo '<div class="thumbnail">';
  echo '<a href="' . $r['permalink'] . '"><img src="' . CCTM::filter($r['bottom_slider_image'], 'to_image_src') . '"></a>';
  echo '';
  echo '</div>';
  echo '<div class="textnail">';
  echo '<p class="title"><a href="' . $r['permalink'] . '">' . $r['post_title'] . '</a></p>';
  echo '<p class="subtitle">' . $r['project_subtitle'] . '</p>';
  echo '<p class="location">' . $r['project_location'] . '</p>';
  echo '</div>';
  echo '</div>';
}
echo '</div>';

echo '<div class="one-category">';
echo '<h3>Commissioning Projects</h3>';
$args['taxonomy_slug'] = 'commissioning';
$results = $Q->get_posts($args);
foreach ($results as $r) {
  echo '<div class="one-project">';
  echo '<div class="thumbnail">';
  echo '<a href="' . $r['permalink'] . '"><img src="' . CCTM::filter($r['bottom_slider_image'], 'to_image_src') . '"></a>';
  echo '';
  echo '</div>';
  echo '<div class="textnail">';
  echo '<p class="title"><a href="' . $r['permalink'] . '">' . $r['post_title'] . '</a></p>';
  echo '<p class="subtitle">' . $r['project_subtitle'] . '</p>';
  echo '<p class="location">' . $r['project_location'] . '</p>';
  echo '</div>';
  echo '</div>';
}
echo '</div>';

echo '</div>';

wp_reset_postdata();
?>
</div>

</div>
</div> <!-- class="innards" -->
<?php get_footer(); ?>