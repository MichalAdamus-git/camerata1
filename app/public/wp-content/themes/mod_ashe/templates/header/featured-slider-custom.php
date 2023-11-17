<?php
get_template_part( 'templates/single/aktualnosci' );

$query = new WP_Query(array(
   'post_type' => 'post',
   'posta_status' => 'publish',
   )
);

 while($query->have_posts()) {
    $query->the_post(); ?>
   <div class="post-item">
    <h2><a class="fuckeduplink" href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
```</div>

    <div class="metabox">
     <p><?php echo(get_the_date()) ?> </p>
    </div>
    <div class="generic-content ">
     <?php the_excerpt(); ?>
    </div>
<?php
}
 ?>

