<?php /* Template Name: nous rencontrer */ ?>
<?php require "header.php"; ?>

    <main>
        <article class="nous">
            <img src="<?php echo get_stylesheet_directory_uri()."/img/Group 2.png";?>" alt="gauche">
            <div>
                <h1>nous rencontrer</h1>
                <p class="textnous">Chez Planty nous sommes tous passionnés par le bien-être, et ça se retrouve dans nos boissons ! Notre start-up s’est construite au fur et à mesure de rencontres entre amoureux des plantes.</p>
            </div>
        </article>
        <article>
            <h2 class="equipe">L'équipe</h2>
            <div  class="équipe">
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
                </div>
                <img class="fleur" src="<?php echo get_stylesheet_directory_uri()."/img/Group 4.png";?>" alt="droit">
            </div>
        </article>
        <article class="formrencontre">
            <div class="encolonne">
                <h2>Nous contacter</h2>
                <div class="rencontrer">
                    <div class="colonne"><label>Nom</label><input  type="text"></div>
                    <div class="colonne"><label>E-mail</label><input  type="email"></div>
                    <div class="colonne"><label>Message</label><textarea class="message" aria-errormessage=""></textarea></div>
                    <button class="envoyer">Envoyer</button>
                </div>
            </div>
            <img src="<?php echo get_stylesheet_directory_uri()."/img/Mask group(1).png";?>" alt="bas">
        </article>
        
    </main>

<?php require "footer.php"; ?>