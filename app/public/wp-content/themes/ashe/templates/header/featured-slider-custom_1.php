<?php
 while(have_posts()) {
    the_post(); ?>
 <div class="post-item">
    <h2><a href=<?php the_permalink() ?>>the_title()</h2>

    <div class="metabox">
     <p><?php echo(get_the_date())
    </div>
    <div class="generic-content ">
     <?php the_excerpt(); ?>
    </div>
 </div>
<?php
}
 ?>

