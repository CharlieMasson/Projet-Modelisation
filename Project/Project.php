<?php

require '../src/Autoloader.php';
require '../vendor/autoload.php';

use App\Connection\Connection;
use App\Repository\ProjectRepository;

?>

<!doctype html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <title>Gestion de Projets MentalWorks</title>
    <link rel="stylesheet" href="../src/CSS/Style.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
          integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <script src="../JS/main.js"></script>

</head>

<main>

    <?php include '../Layout/Menu.php'; ?>
    <div class="container">
        <h1><strong>Liste des Projets</strong></h1>
        <?php
        //fonction pour lister directement les clients
        ProjectRepository::listProject();
        ?>
    </div>

</main>

</html>