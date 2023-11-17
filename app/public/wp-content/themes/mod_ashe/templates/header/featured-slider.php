<?php
if (is_front_page()) {
get_template_part( 'templates/single/aktualnosci' );
}
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
    <div class="post-item<?php echo $n ?>">
    <span>
    <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
   </span>

    <div class="metabox">
     <p><?php echo(get_the_date()) ?> </p>
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


