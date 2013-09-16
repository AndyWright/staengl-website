<?php
$Q = new GetPostsQuery();
$args = array();
$args['post_type'] =  'staengl_project';
$args['post_status'] = 'publish';
// $args['taxonomy'] = 'category';
$args['post_status'] = 'publish';
$args['orderby'] = 'post_date';
$args['order'] = 'DESC';
// $args['taxonomy_slug'] = 'mep';
$results = $Q->get_posts($args);
?>
<div class="filmstrip">
  <ul class="projects-filmstrip">
<?php
foreach ($results as $r) {
  if ($r['bottom_slider_image']) {
    echo '<li>';
    echo '<a href="' . $r['permalink'] . '"><img src="' . CCTM::filter($r['bottom_slider_image'], 'to_image_src') . '"></a>';
    // echo '<a href="' .  . '"><img src="' . CCTM::filter($r['bottom_slider_image'], 'to_image_src') . '"></a>';
    echo '</li>';
  }
}
?>
  </ul>
</div>
