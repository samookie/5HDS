<?php
    header('Content-Type: application/json');
    include('../bdd.php');
    if($pdo){
        if(!empty($_GET["nom"]) && !empty($_GET["description"]) && !empty($_GET["prix"]) && !empty($_GET["reference"]) && !empty($_GET["stock"])){  
        $date_create = date("Y-m-d");
        $nb = random_int(1,25);
        $req = $pdo->prepare('INSERT INTO `produits` (`id`, `nom`, `description_p`, `token`, `prix`, `stock`, `reference`, `created_at`, `update_at`) VALUES (NULL, "'.$_GET["nom"].'","'.$_GET["description"].'", "'.randomToken($nb).'", "'.$_GET["prix"].'", "'.$_GET["stock"].'", "'.$_GET["reference"].'", "'.$date_create.'", NULL);');
        $req->execute();
        $resultat = array();
        if($req){
            $resultat["ajouté"] = true;
        }else{
            $resultat["ajouté"] = false;
        }
        echo json_encode($resultat);

        }else{
            echo'il manque des informations vous devez rentrer un nom , une description, un prix, un stock, et une reference.';
        }
    }else{
        echo'pas connecté';
    }
    
    function randomToken($car){
        $string ="";
        $chaine ="ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        srand((double) microtime()*1000000);
        for($i=0;$i<$car;$i++){
            $string.=$chaine[rand()%strlen($chaine)];
        }
        return $string;
    }

?>  