<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset') ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title> Vida Sana en Quilicura </title>

	<link rel="stylesheet" href="assets/css/fontAwesome.css">
	<link rel="stylesheet" href="assets/css/fonts.css">
	<link rel="stylesheet" href="assets/css/style.css">
    <?php get_template_part('_includes/iOS', 'icons') ?>
    <?php wp_head() ?>

 <?php if ( has_nav_menu( 'header-menu' ) ) { ?>
	<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container_class' => 'header-menu' ) ); ?>
<?php } ?>


    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Delius|Roboto|Poppins|Raleway" rel="stylesheet"> -->

</head>
<body>

<header>
        <div class="wrapper">
            <div class="logo">Vida Sana</div>
            
            <nav>
              <a href="<?php echo get_home_url(); ?>">Inicio</a>
              <a href="recetas">Recetas</a>
              <a href="deporte">Deportes</a>
              <a href="actividades">Actividades</a>
              <a href="contacto">Contacto</a>
            </nav>
        </div>
</header>