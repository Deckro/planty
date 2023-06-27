<!doctype html>
<html <?php language_attributes(); ?> <?php twentytwentyone_the_html_classes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>
<body>
<header <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="top">
    <a href="#index.php"><img src="<?php echo get_stylesheet_directory_uri()."/img/Logo source.png";?>" alt="gauche"> </a>
    <div>
	    <nav class="nav">
            <ul>
                <li><a href="nous-rencontrer">nous rencontrer</a></li>
                <li><a href="#">admin</a></li>
                <li><a href="commander">commander</a></li>
            </ul>
	    </nav>
    </div>
</div>
</header>