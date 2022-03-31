<?php
    header('Content-Type: application/json');
    include('../bdd.php');
    $req = $pdo->prepare("SELECT * FROM produits");
    $req->execute();
    $reqs = $req->fetchAll();
    $produit["produits"]["count"] = count($reqs);
    $produit["produits"]["produit"]= $reqs;

    echo json_encode($produit);


?> 