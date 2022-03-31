<?php
include('../bdd.php');
if($pdo){
    $resultat = array();
    if( !empty($_GET['id']) ){
        $date_update = date("Y-m-d");
        if(isset($_GET['nom'])){
            $req = $pdo->prepare("UPDATE produits SET nom = '".$_GET['nom']."' ,update_at = '".$date_update."' WHERE id = '".$_GET['id']."';");
            $req->execute();
        }
        if(isset($_GET['description'])){
            $req = $pdo->prepare("UPDATE produits SET description_p = '".$_GET['description']."' ,update_at = '".$date_update."' WHERE id = '".$_GET['id']."';");
            $req->execute();
        }
        if(isset($_GET['token'])){
            $req = $pdo->prepare("UPDATE produits SET token = '".$_GET['token']."' ,update_at = '".$date_update."' WHERE id = '".$_GET['id']."';");
            $req->execute();
        }
        if(isset($_GET['prix'])){
            $req = $pdo->prepare("UPDATE produits SET prix = '".$_GET['token']."' ,update_at = '".$date_update."' WHERE id = '".$_GET['id']."';");
            $req->execute();
        }
        if(isset($_GET['stock'])){
            $req = $pdo->prepare("UPDATE produits SET stock = '".$_GET['stock']."' ,update_at = '".$date_update."' WHERE id = '".$_GET['id']."';");
            $req->execute();
        }
        if(isset($_GET['reference'])){
            $req = $pdo->prepare("UPDATE produits SET reference = '".$_GET['token']."' ,update_at = '".$date_update."' WHERE id = '".$_GET['id']."';");
            $req->execute();
        }
        
        if( $req){
            $resultat["modifie"] = true;
        } else {
            $resultat["modifier"] = false;
        }
    } else {
        $resultat["information"] = "il manque des informations, vous devez mettre un id";
    }
}

echo json_encode($resultat);