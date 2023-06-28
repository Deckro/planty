<?php /* Template Name: nous rencontrer */ ?>
<?php require "header.php"; ?>
<main>
    <article>
    <h1>nous rencontrer</h1>
    <p>Chez Planty nous sommes tous passionnés par le bien-être, et ça se retrouve dans nos boissons ! Notre start-up s’est construite au fur et à mesure de rencontres entre amoureux des plantes.</p>
    </article>
    <article>
        <h2>L'équipe</h2>
        <div>
			<img src="<?php echo get_stylesheet_directory_uri()."/img/Mask group-2.png";?>" alt="gauche">
			<div>
				<h3>mégane</h3>
				<p>CEO</p>
			</div>
		</div>
        <div>
			<img src="<?php echo get_stylesheet_directory_uri()."/img/Mask group-1.png";?>" alt="gauche">
			<div>
				<h3>brooke</h3>
				<p>Nutritionniste</p>
			</div>
		</div>
        <div>
			<img src="<?php echo get_stylesheet_directory_uri()."/img/Mask group.png";?>" alt="gauche">
			<div>
				<h3>sylvie</h3>
				<p>Mixologue</p>
			</div>
            <img src="<?php echo get_stylesheet_directory_uri()."/img/Group 3.png";?>" alt="droit">
		</div>
    </article>
    <article>
        <h2>Nous contacter</h2>
        <h4>Nom</h4><input type="text">
        <h4>E-mail</h4><input type="email">
        <h4>Message</h4><textarea aria-errormessage=""></textarea>
    </article>
    <img src="<?php echo get_stylesheet_directory_uri()."/img/Mask group(1).png";?>" alt="bas">
</main>
<?php require "footer.php"; ?>