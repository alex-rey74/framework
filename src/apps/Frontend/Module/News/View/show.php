<p>Auteur : <?php echo $actu->getAuteur();?> Date de publication : <?php echo $actu->getDateAjout();?></p>

<h2><?php echo $actu->getTitre(); ?></h2>

<p><?php echo $actu->getContenu(); ?></p>

<?php if($actu->getDateAjout() != $actu->getDateModif()){
    echo "<p>Date de modification".$actu->getDateModif()."</p>";
}