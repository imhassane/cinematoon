<?php

// Configuration pour l'upload de fichiers.
$MAX_IMAGE_SIZE = 3000;
$IMAGE_UPLOAD_DIR = '../img/';

function newConnection($host='obiwan2.univ-brest.fr', $username='zsowth000', $password='7pmwcmb1', $database='zfl2-zsowth000') {
    return  new mysqli($host, $username, $password, $database);
}

function closeConnection($connection) {
    return $connection->close();
}