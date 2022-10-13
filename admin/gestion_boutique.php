<?php
require_once("../inc/init.inc.php");
//--------------------------------- TRAITEMENTS PHP ---------------------------------//
//--- VERIFICATION ADMIN ---//
if(!internauteEstConnecteEtEstAdmin())
{
    header("location:../connexion.php");
    exit();
}
//--- ENREGISTREMENT PRODUIT ---//
if(!empty($_POST))
{   // debug($_POST);
    $photo_bdd = ""; 
    if(!empty($_FILES['photo']['name']))
    {   // debug($_FILES);
        $nom_photo = $_POST['reference'] . '_' .$_FILES['photo']['name'];
        $photo_bdd = RACINE_SITE . "photo/$nom_photo";
        $photo_dossier = $_SERVER['DOCUMENT_ROOT'] . RACINE_SITE . "/photo/$nom_photo"; 
        copy($_FILES['photo']['tmp_name'],$photo_dossier);
    }
    foreach($_POST as $indice => $valeur)
    {
        $_POST[$indice] = htmlEntities(addSlashes($valeur));
    }
    executeRequete("INSERT INTO produit (id_produit, reference, categorie, titre, description, couleur, taille, public, photo, prix, stock) values ('', '$_POST[reference]', '$_POST[categorie]', '$_POST[titre]', '$_POST[description]', '$_POST[couleur]', '$_POST[taille]', '$_POST[public]',  '$photo_bdd',  '$_POST[prix]',  '$_POST[stock]')");
    $contenu .= '<div class="validation">Le produit a été ajouté</div>';
}
//--- LIENS PRODUITS ---//
$contenu .= '<a href="?action=affichage">Affichage des produits</a><br>';
$contenu .= '<a href="?action=ajout">Ajout d\'un produit</a><br><br><hr><br>';
//--- AFFICHAGE PRODUITS ---//
if(isset($_GET['action']) && $_GET['action'] == "affichage")
{
    $resultat = executeRequete("SELECT * FROM produit");
     
    $contenu .= '<h2> Affichage des Produits </h2>';
    $contenu .= 'Nombre de produit(s) dans la boutique : ' . $resultat->num_rows;
    $contenu .= '<table border="1"><tr>';
     
    while($colonne = $resultat->fetch_field())
    {    
        $contenu .= '<th>' . $colonne->name . '</th>';
    }
    $contenu .= '<th>Modification</th>';
    $contenu .= '<th>Supression</th>';
    $contenu .= '</tr>';
 
    while ($ligne = $resultat->fetch_assoc())
    {
        $contenu .= '<tr>';
        foreach ($ligne as $indice => $information)
        {
            if($indice == "photo")
            {
                $contenu .= '<td><img src="' . $information . '" ="500" height="500"></td>';

            }

            else
            {
                $contenu .= '<td>' . $information . '</td>';
            }
        }
        $contenu .= '<td><a href="?action=modification&id_produit=' . $ligne['id_produit'] .'"><img src="../photo/icone/edit.png"></a></td>';
        $contenu .= '<td><a href="?action=suppression&id_produit=' . $ligne['id_produit'] .'" OnClick="return(confirm(\'En êtes vous certain ?\'));"><img src="../photo/icone/delete.png"></a></td>';
        $contenu .= '</tr>';
    }
    $contenu .= '</table><br><hr><br>';
}
//--------------------------------- AFFICHAGE HTML ---------------------------------//
require_once("../inc/haut.inc.php");
echo $contenu;
if(isset($_GET['action']) && ($_GET['action'] == 'ajout'))
{
    echo '
    <h1> Formulaire Produits </h1>
    <form method="post" enctype="multipart/form-data" action="">
        <label for="reference">reference</label><br>
        <input type="text" id="reference" name="reference" placeholder="la référence de produit"> <br><br>
 
        <label for="categorie">categorie</label><br>
        <input type="text" id="categorie" name="categorie" placeholder="la categorie de produit"><br><br>
 
        <label for="titre">titre</label><br>
        <input type="text" id="titre" name="titre" placeholder="le titre du produit"> <br><br>
 
        <label for="description">description</label><br>
        <textarea name="description" id="description" placeholder="la description du produit"></textarea><br><br>
         
        <label for="couleur">couleur</label><br>
        <input type="text" id="couleur" name="couleur" placeholder="la couleur du produit"> <br><br>
 
        <label for="taille">Taille</label><br>
        <select name="taille">
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
        </select><br><br>
 
        <label for="public">public</label><br>
        <input type="radio" name="public" value="m" checked>Homme
        <input type="radio" name="public" value="f">Femme<br><br>
         
        <label for="photo">photo</label><br>
        <input type="file" id="photo" name="photo"><br><br>
 
        <label for="prix">prix</label><br>
        <input type="text" id="prix" name="prix" placeholder="le prix du produit"><br><br>
         
        <label for="stock">stock</label><br>
        <input type="text" id="stock" name="stock" placeholder="le stock du produit"><br><br>
         
        <input type="submit" value="enregistrement du produit">
    </form>';
}
require_once("../inc/bas.inc.php"); ?>