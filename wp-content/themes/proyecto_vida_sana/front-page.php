<?php get_header() ?>

<main>

<!-- BANNER QUILICURA -->
<div class="row">
  <div class="offset-4 col-xs-12 col-md-4">
    <img src=" <?php echo get_template_directory_uri(); ?> /assets/img/banner.png" class="img-responsive slide-img" alt="">
  </div>
</div>

<!-- CAROUSEL -->
<div class="container">
  <div class="row">
    <div class="col-12">
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

          <div class="carousel-item">
            <a href="recetas"><img src=" <?php echo get_template_directory_uri();?> /assets/img/slide/banner01.jpg" class="img-responsive slide-img" alt=""></a>
            <div class="carousel-caption d-none d-md-block">
              <div class="texto_carousel">
                <h2><b>RECETARIO</b></h2>
                Las mejores recetas sanas las tenemos para ti.
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <a href="deporte"><img src=" <?php echo get_template_directory_uri(); ?> /assets/img/slide/banner02.jpg" class="img-responsive slide-img" alt=""></a>
            <div class="carousel-caption d-none d-md-block">
              <div class="texto_carousel">
                <h2><b>DEPORTES EN TU COMUNA</b></h2>
                Ven y haz deporte junto a los mejores entrenadores de tu comuna <br><br> zumba, fitness, natación, baile entretenido y más.
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <a href="#"><img src=" <?php echo get_template_directory_uri(); ?> /assets/img/slide/banner03.png" class="img-responsive slide-img" alt=""></a>
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>

        </div> 
      </div> 
    </div> <!--col-12-->
  </div> <!--row-->
</div> <!-- Container-->

<!-- COMER SALUDABLE Y DEPORTES -->
<div class="container">
     <div class="row sesion01">
      <div class="col-xs-12 col-md-6 sesion01-text">
       <h1>Más deporte en Quilicura</h1><hr>
       <p>Entendemos la importancia de la actividad física, por lo que potenciamos el derecho a practicarlo. Para ello, disponemos de talleres gratuitos en diferentes puntos de la comuna, con profesores calificados que te ayudarán a tener un rendimiento adecuado.
        El deporte mejora tu bienestar, te entrega energías, y te hace feliz. <br> ¡Únete a la iniciativa y mejora tu calidad de vida!</p>
      </div>
      <div class="col-xs-12 col-md-6">
        <img src=" <?php echo get_template_directory_uri(); ?> /assets/img/dsaludable.jpg" class="img-responsive" alt="">
      </div>
      <div class="col-xs-12 col-md-6">
        <img src=" <?php echo get_template_directory_uri(); ?> /assets/img/saludable.jpg" class="img-responsive" alt="">
      </div>
      <div class="col-xs-12 col-md-6 sesion01-text">
        <h1>Importancia de comer saludable</h1><hr>
        <p>Una alimentación saludable significa comer en forma equilibrada todos los alimentos disponibles, con una correcta selección y un adecuado consumo de los mismos. Es decir, una alimentación variada asegura la incorporación y aprovechamiento de todos los nutrientes que necesitamos para crecer y vivir saludablemente.</p>
      </div>
</div>

  <!-- ACTIVIDADES -->
<div class="container">
  <div class="row">
    <div class="offset-4 col-xs-12 col-md-4">
      <h1 class="sesiones">Actividades</h1><hr>
    </div>
  </div>
  <div class="row sesion02">
    <?php
    $arg = array(
      'post_type'     => 'actividades',
      'posts_per_page'  => -1
      );

      $get_arg = new WP_Query( $arg );

      while ( $get_arg->have_posts() ) {
      $get_arg->the_post();
      ?>
    <div class="col-sm-12 col-md-4 col-lg-4 box_actividades">
      <?php the_post_thumbnail('full', array('class', 'img-fluid')); ?>
      <h2><?php the_title(); ?></h2>
      <a href="actividades"><button type="button" class="btn btn-outline-warning btn-sm">Leer más..</button></a>
    </div>
  <?php } wp_reset_postdata();
  ?>
  </div>
</div>

<!-- INFORMACION SANA -->
<div class="container">
  <div class="row">
    <div class="offset-4 col-sm-12 col-lg-4 col-xl-4">
      <h1 class="sesiones">Información Sana</h1><hr>
    </div>
  </div>
  <div class="row sesion03">

    <?php
    $arg = array(
      'post_type'     => 'informacion_sana',
      'posts_per_page'  => -1
      );

      $get_arg = new WP_Query( $arg );

      while ( $get_arg->have_posts() ) {
      $get_arg->the_post();
      ?>

   <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
    <h2><?php the_title(); ?></h2>
    <?php the_post_thumbnail('full', array('class', 'img-fluid')); ?>
    <p><?php the_content(); ?></p><br>
  </div>
    <?php } wp_reset_postdata();
  ?>
</div>

</main>

<?php get_footer() ?>