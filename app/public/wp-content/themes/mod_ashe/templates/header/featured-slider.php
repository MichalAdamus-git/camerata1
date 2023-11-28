<?php
if (is_front_page()) {
get_template_part( 'templates/single/aktualnosci' );
} elseif ( is_home() ) {
get_template_part('templates/single/blog');
}
/*
remember to change this query with numebr only for frontpage
*/
$query = new WP_Query(array(
   'post_type' => 'post',
   'posta_status' => 'publish',
   'posts_per_page' => 5,
   )
);
$n = 0;
?>
<aside class="post-item">
   <?php
 while($query->have_posts()) {
    $query->the_post(); ?>
   <hr class="adamus-pro-line">
    <div class="post-item<?php echo $n ?>">
    <?php if (has_post_thumbnail()) { ?>
      <div id="adamus-pro-thumbnail">
      <div class="tytul_span">
      <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
      </div>
      <div class="thumbnail-div">
      <?php
      the_post_thumbnail(); ?>
      </div>
    </div>
     <?php
   } else { ?>

   <div>
    <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
   </div>
   <?php } ?>
    

    <div class="metabox">
     <p><?php echo(get_the_date()) ?> </pa>
    </div>
    <div class="generic-content ">
     <?php the_excerpt(); ?>
    </div>
 </div>

<?php
$n ++;
}
 ?>
</aside>


