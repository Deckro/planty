<?php /* Template Name: commander */ ?>
<?php require "header.php"; ?>
<main>
        <h1>COMMANDER</h1>
    <article>
        <h2>votre commande</h2>
    </article>
    <div>
        <img src="<?php echo get_stylesheet_directory_uri()."/img/jeremy-bezanger-0QgbyZdhX7k-unsplash 1.png";?>" alt="fraise">
		<img src="<?php echo get_stylesheet_directory_uri()."/img/estudio-bloom-tOitjphtIXU-unsplash 1.png";?>"  alt="pamplemousse">
        <img src="<?php echo get_stylesheet_directory_uri()."/img/rodion-kutsaev-4k8xEFW4_3Q-unsplash 1.png";?>"  alt="framboise">
		<img src="<?php echo get_stylesheet_directory_uri()."/img/estudio-bloom-ezqnxsqUZ80-unsplash 1.png";?>"  alt="citron">
    </div>
    <div>
        <input class="number" type="number" name="tentacles"min="0" max="99999">
        <button type="submit">OK</button>
        <input class="number" type="number" name="tentacles"min="0" max="99999">
        <button type="submit">OK</button>
        <input class="number" type="number" name="tentacles"min="0" max="99999">
        <button type="submit">OK</button>
        <input class="number" type="number" name="tentacles"min="0" max="99999">
        <button type="submit">OK</button>
    </div>
    <article>
        <div>
            <h2>vos informations</h2>
            <h4>Nom</h4><input type="text">
            <h4>Prenom</h4><input type="text">
            <h4>E-mail</h4><input type="email">
        </div>
        <div>
            <h2>Livraison</h2>
            <h4>Adresse de livraison</h4><input type="text">
            <h4>code postal</h4><input type="text">
            <h4>Ville</h4><input type="text">
        </div>
    </article>
</main>
<?php require "footer.php"; ?>
