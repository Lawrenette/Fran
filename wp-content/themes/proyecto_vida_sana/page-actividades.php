<?php get_header() ?>

  <h1 class="titulo_actividades">ACTIVIDADES</h1><hr>
   
<!-- ACTIVIDADES  -->
<div class="container">
    <?php
    $arg = array(
      'post_type'     => 'actividades',
      'posts_per_page'  => -1
      );

      $get_arg = new WP_Query( $arg );

      while ( $get_arg->have_posts() ) {
      $get_arg->the_post();
      ?>

  <div class="row actividades">
    <div class="col-12">
      <h2><?php the_title(); ?></h2>
      <?php the_post_thumbnail('full', array('class', 'img-fluid')); ?>
      <p><?php the_content(); ?><hr>
      </div>
    </div>

        <?php } wp_reset_postdata();
  ?>

  </div>


<?php get_footer() ?>