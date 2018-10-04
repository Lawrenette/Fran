<?php get_header() ?>

<main>

<h1 class="titulo_deportes">DEPORTES EN LA COMUNA</h1><hr><hr class="linea_deportes">

<div class="row rutina">
  <div class="col-12">
    <h1 class="deporte_titulo">Rutina de ejercicio en casa</h1>
  </div>
</div>

<!-- VIDEOS -->
<div class="container">
  <div class="row video">
    <div class="col-sm-12 col-md-6 col-lg-6">
      <div class="embed-responsive embed-responsive-16by9">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/2Ap1S3BGn6o?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
      </div>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6">
      <div class="embed-responsive embed-responsive-16by9">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/58GPgYJRyKs?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div><hr class="linea_deportes">

<!-- ZUMBA -->
<div class="container">
  <div class="row video">
    <div class="col-sm-12 col-md-6 col-lg-6">
      <div class="embed-responsive embed-responsive-16by9">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/EsoS-atpp9g?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
      </div>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6">
      <div class="row zumba">
        <div class="col-12">
          <h3>¡EN QUILICURA...<br> SE VIVE LA VIDA SANA!</h3>
          <p>Recuerda que desde septiembre tenemos clases de Zumba Gratuitas en el Liceo José Miguel Carrera los días martes y jueves de 20:00 a 21:00 hrs. Invita a tus vecinos, amigos y familiares.</p>
        </div>
      </div>
    </div>
  </div>
</div><hr class="linea_deportes">

<div class="row libre">
  <div class="col-12">
    <h1 class="deporte_titulo">Actividades realizadas al aire libre <br> en Quilicura</h1>
  </div>
</div>

<!-- GALERIA -->
<div class="row">
  <?php
    $arg = array(
      'post_type'     => 'galeria',
      'posts_per_page'  => -1
      );

      $get_arg = new WP_Query( $arg );

      while ( $get_arg->have_posts() ) {
      $get_arg->the_post();
      ?>

      <div class="col-sm-12 col-md-4 col-lg-4 imagen_galeria">
        <?php the_post_thumbnail('full', array('class', 'img-fluid')); ?>
        <p><?php the_title(); ?></p>
      </div>
    <?php } wp_reset_postdata();
  ?>
</div>
</main>

<?php get_footer() ?>