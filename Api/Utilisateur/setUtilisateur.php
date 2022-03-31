<?php
include('../bdd.php');
if($pdo){
    $resultat = array();
    if( !empty($_GET['id']) ){
        $date_update = date("Y-m-d");
        if(isset($_GET['nom'])){
            $req = $pdo->prepare("UPDATE users SET nom = '".$_GET['nom']."' ,update_at = '".$date_update."' WHERE id = '".$_GET['id']."';");
            $req->execute();
        }
        if(isset($_GET['prenom'])){
            $req = $pdo->prepare("UPDATE users SET prenom = '".$_GET['prenom']."' ,update_at = '".$date_update."' WHERE id = '".$_GET['id']."';");
            $req->execute();
        }
        if(isset($_GET['role_u'])){
            $req = $pdo->prepare("UPDATE users SET role_u = '".$_GET['role_u']."' ,update_at = '".$date_update."' WHERE id = '".$_GET['id']."';");
            $req->execute();
        }
        if(isset($_GET['token'])){
            $req = $pdo->prepare("UPDATE users SET token = '".$_GET['token']."' ,update_at = '".$date_update."' WHERE id = '".$_GET['id']."';");
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