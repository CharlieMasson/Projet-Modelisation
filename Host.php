<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>PortFolio</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <!--MetaName-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <script src="jquery.js"></script>
    <script src="JS/main.js"></script>

  </head>

  <div class="container1">
    <img src="Images/logo_main.png"> 
    <div class="hamburger-menu">
        <input id="menu__toggle" type="checkbox" />
        <label class="menu__btn" for="menu__toggle">
        <span></span>
        </label>

        <ul class="menu__box">
        <li><a class="menu__item"><i class="fas fa-home"></i> Tableau de bord</a></li>
        <li><a class="menu__item" href="Index.php"><i class="fas fa-user-circle"></i> Projets</a></li>
        <li><a class="menu__item" href="Customer.php"><i class="fas fa-user-circle"></i> Clients</a></li>
        <li><a class="menu__item" href="Host.php"><i class="fas fa-check-square"></i> Hebergeurs</a></li>
        </ul>
    </div>
</div>
<div class="container">
<div class="container_admin">
        <div class="row">
            <h1><strong>Liste des Hébergeurs</strong></h1>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Notes</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    require 'Connexion/Connexion.php';
                    $co = connexionBdd();
                    $statement = $co->query('SELECT id, code, name, note FROM host ORDER BY id ASC');
                    while($item = $statement->fetch()) {
                        echo '<tr>';
                        echo '<td>'. $item['id'] . '</td>';
                        echo '<td>'. $item['code'] . '</td>';
                        echo '<td>'. $item['name'] . '</td>';
                        echo '<td>'. $item['note'] . '</td>';
                        echo '</tr>';
                    }
                    $co = deconnexion();
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>





<footer>


</footer>
