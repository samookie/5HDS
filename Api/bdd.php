<?php 
try{
    $pdo = new PDO('mysql:host=localhost;port=8889;dbname=api_5HDS_gestion_stock;','user','');
}catch( Exception $e){
    echo 'PAS CONNECTé';
}