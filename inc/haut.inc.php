<!Doctype html>
<html>

<head>
    <title>Mon Site</title>
    <link rel="stylesheet" href="<?php echo RACINE_SITE; ?>inc/css/style.css">
</head>

<body>
    <header>
        <div class="conteneur">
            <div class="logo">
                <a href="<?php echo RACINE_SITE; ?>inscription.php" title="Mon Site">MonSite.com</a>
            </div>
            <nav>
                <?php

                if (internauteEstConnecteEtEstAdmin()) {
                    echo '<a href="' . RACINE_SITE . 'admin/gestion_membre.php" class="menu_admin">Gestion des membres</a>';
                    echo '<a href="' . RACINE_SITE . 'admin/gestion_commande.php" class="menu_admin">Gestion des commandes</a>';
                    echo '<a href="' . RACINE_SITE . 'admin/gestion_boutique.php" class="menu_admin">Gestion de la boutique</a>';
                }

                if (internauteEstConnecte()) {

                    echo '<a href="' . RACINE_SITE . 'profil.php" class="menu_membre">Voir votre profil</a>';
                    echo '<a href="' . RACINE_SITE . 'boutique.php" class="menu_membre">Accés à la boutique</a>';
                    echo '<a href="' . RACINE_SITE . 'panier.php" class="menu_membre">Voir votre panier</a>';
                    echo '<a href="' . RACINE_SITE . 'deconnexion.php?=deconnection">Se déconnecter</a>';
                } else {


                    echo '<a href="' . RACINE_SITE . 'inscription.php">Inscription</a>';
                    echo '<a href="' . RACINE_SITE . 'connexion.php">Connexion</a>';
                    echo '<a href="' . RACINE_SITE . 'boutique.php">Accès à la boutique</a>';
                    echo '<a href="' . RACINE_SITE . 'panier.php">Voir votre panier</a>';
                }

                ?>
            </nav>
        </div>
    </header>
    <section>
        <div class="conteneur">