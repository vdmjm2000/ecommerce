<!Doctype html>
<html>

<head>
    <title>Mon Site</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo RACINE_SITE; ?>inc/css/style.css">
</head>

<body>
    <header>
        <div class="conteneur">
            <div class="logo">
                <a href="<?php echo RACINE_SITE; ?>inscription.php" title="Mon Site"><img src="<?php echo RACINE_SITE; ?>/photo/logo_chaussure.jpg" height="50px" weight="50px"></a>
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
                    echo '<a href="' . RACINE_SITE . 'deconnexion.php?=deconnection" class="menu_membre">Se déconnecter</a>';
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