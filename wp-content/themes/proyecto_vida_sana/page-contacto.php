<?php get_header() ?>
	<?php the_post() ?>
	
	<?php if ( is_active_sidebar( 'contact-widget' ) ) { ?>
		<?php dynamic_sidebar( 'contact-widget' ); ?>
	<?php }; ?>

<div class="container-fluid fondo pt-5">
    <h1 class="contacto">INSCRÍBETE CON NOSOTROS</h1>
    <hr>
      <div class="row">
        <div class="col-sm-10 col-md">
          <?php echo do_shortcode('[contact-form-7 id="49" title="formulario"]') ?>
        </div>
        <div class="col-sm-10 col-md">
          <div class="embed-responsive embed-responsive-21by9">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3332.1124525095643!2d-70.73423278501917!3d-33.36813010067774!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662c0d976d06583%3A0x28f678fe853a60d2!2sJos%C3%A9+Francisco+Vergara+400%2C+Quilicura%2C+Regi%C3%B3n+Metropolitana!5e0!3m2!1ses-419!2scl!4v1530233912113" width="1200" height="200" frameborder="0" style="border:0" class="embed-responsive-item" src="..."></iframe>
          </div>
        </div>
      </div>
</div>

<?php get_footer() ?>