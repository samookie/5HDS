<?php
    header('Content-Type: application/json');
    include('../bdd.php');
    if($pdo){
        if(!empty($_GET["nom"]) && !empty($_GET["prenom"]) && !empty($_GET["role_u"]) ){  
        $date_create = date("Y-m-d");
        $nb = random_int(1,25);
        $req = $pdo->prepare('INSERT INTO `users` (`id`, `nom`, `prenom`, `role_u`, `token`, `create_at`, `update_at`) VALUES (NULL, "'.$_GET["nom"].'","'.$_GET["prenom"].'", "'.$_GET["role_u"].'", "'.randomToken($nb).'", "'.$date_create.'", NULL);');
        $req->execute();
        $resultat = array();
        if($req){
            $resultat["ajouté"] = true;
        }else{
            $resultat["ajouté"] = false;
        }
        echo json_encode($resultat);

        }else{
            echo'il manque des informations vous devez rentrer un nom , un prénom, et un role.';
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