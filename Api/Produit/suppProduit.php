<?php
include('../bdd.php');
if($pdo){
    $resultat = array();
    if( !empty($_GET['id']) ){

        $req = $pdo->prepare("DELETE FROM produits WHERE id = '".$_GET['id']."';");
        
        $req->execute();
        if( $req){
            $resultat["supprime"] = true;
        } else {
            $resultat["supprime"] = false;
        }
    } else {
        $resultat["information"] = "il manque des informations, vous devez mettre un id";
    }
}

echo json_encode($resultat);