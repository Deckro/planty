<?php /* Template Name: commander */ ?>
<?php require "header.php"; ?>
<main class="back">
    <div class="taille">
        <h1 class="commandertitre">COMMANDER</h1>
    <article class="selection">
        <h2 class="votre">votre commande</h2>
        <div class="fruits">
            <div>
                <h3 class="fraise">fraise</h3><img src="<?php echo get_stylesheet_directory_uri()."/img/jeremy-bezanger-0QgbyZdhX7k-unsplash 1.png";?>" alt="fraise">
            </div>
            <div>
		        <h3 class="pamplemousse">pamplemousse</h3><img src="<?php echo get_stylesheet_directory_uri()."/img/estudio-bloom-tOitjphtIXU-unsplash 1.png";?>"  alt="pamplemousse">
            </div>
            <div>
                <h3 class="framboise">framboise</h3><img src="<?php echo get_stylesheet_directory_uri()."/img/rodion-kutsaev-4k8xEFW4_3Q-unsplash 1.png";?>"  alt="framboise">
            </div>
            <div>
		        <h3 class="citron">citron</h3><img src="<?php echo get_stylesheet_directory_uri()."/img/estudio-bloom-ezqnxsqUZ80-unsplash 1.png";?>"  alt="citron">
            </div>
        </div>
        <div>
            <input class="number" type="number" value="0" min="0" max="99999">
            <button type="submit">OK</button>
            <input class="number" type="number" value="0" min="0" max="99999">
            <button type="submit">OK</button>
            <input class="number" type="number" value="0" min="0" max="99999">
            <button type="submit">OK</button>
            <input class="number" type="number" value="0" min="0" max="99999">
            <button type="submit">OK</button>
        </div>
    </article>
    <article class="formulaire">
        <div>
            <h2>vos informations</h2>
            <div class="colonne"><label>Nom</label><input type="text"></div>
            <div class="colonne"><label>Prenom</label><input type="text"></div>
            <div class="colonne"><label>E-mail</label><input type="email"></div>
        </div>
        <div>
            <h2>Livraison</h2>
            <div class="colonne"><label>Adresse de livraison</label><input type="text"></div>
            <div class="colonne"><label>code postal</label><input type="text"></div>
            <div class="colonne"><label>Ville</label><input type="text"></div>
        </div>
    </article>
    <button type="submit">Commander</button>    
    </div>
</main>
<?php require "footer.php"; ?>
