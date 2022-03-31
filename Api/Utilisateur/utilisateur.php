<?php
    header('Content-Type: application/json');
    include('../bdd.php');
    $req = $pdo->prepare("SELECT * FROM users");
    $req->execute();
    $reqs = $req->fetchAll();
    $utilisateur["utilisateurs"]["count"] = count($reqs);
    $utilisateur["utilisateurs"]["utilisateur"]= $reqs;

    echo json_encode($utilisateur);


?>   