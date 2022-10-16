<?php
    require 'Autoloader.php';
    use Classes\Connexion;
    use Classes\Validation;
    $co = new Connexion();
 
    $codeError = $nameError = $notesError = $code = $name = $notes = "";

    if(!empty($_POST)) {
        $code        = Validation::trimData($_POST['code']);
        $name              = Validation::trimData($_POST['name']);
        $notes              = Validation::trimData($_POST['notes']);
        $isSuccess          = true;
        
        if (Validation::checkEmpty($code)) {
            $codeError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        else{
            if (Validation::checkLength255($code)){
                $codeError = 'Ce champ ne peut pas contenir plus de 255 caractères.';
                $isSuccess = false;
            }
        }
        if (Validation::checkEmpty($name)) {
            $nameError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        else{
            if (Validation::checkLength255($name)){
                $nameError = 'Ce champ ne peut pas contenir plus de 255 caractères.';
                $isSuccess = false;
            }
        }
        if (Validation::checkEmpty($notes)) {
            $notesError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        else{
            if (Validation::checkLength1000($notes)){
                $notesError = 'Ce champ ne peut pas contenir plus de 1000 caractères.';
                $isSuccess = false;
            }
        }
                
        if($isSuccess) {
            $co->connexionBDD();
            $statement = $co->prepare("INSERT INTO customer (code,name, notes) values(?, ?, ?)");
            $statement->execute(array($code,$name, $notes));
            $co->deconnexion();
            header("Location: Customer.php");
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ajouter un Client</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <script src="jquery.js"></script>
        <script src="JS/main.js"></script>
        <link rel="stylesheet" href="Style.css">
    </head>
    
    <body>

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
                <li><a class="menu__item" href="InsertCustomer.php"><i class="fas fa-user-circle"></i> Ajouter un Client</a></li>
                <li><a class="menu__item" href="Host.php"><i class="fas fa-check-square"></i> Hebergeurs</a></li>
                </ul>
            </div>
        </div>


        <h1 class="text-logo"> Client</h1>
        <div class="container admin">
            <div class="row">
                <h1><strong>Ajouter un Client</strong></h1>
                <br>
                <form class="form" action="InsertCustomer.php" role="form" method="post" enctype="multipart/form-data">
                    <br>
                    <div>
                        <label class="form-label" for="code">Code :</label>
                        <input type="text" class="form-control" id="code" name="code" placeholder="Insérer un code pour le Client" value="<?php echo $code;?>">
                        <span class="help-inline"><?php echo $codeError;?></span>
                    </div>
                    <br>
                    <div>
                        <label class="form-label" for="name">Nom :</label>
                        <input type="text " class="form-control" id="name" name="name" placeholder="Insérer un nom pour le Client" value="<?php echo $name;?>">
                        <span class="help-inline"><?php echo $nameError;?></span>
                    </div>
                    <br>
                    <div>
                    <label class="form-label" for="notes">Notes :</label>
                        <textarea id="notes" name="notes" placeholder="Notes" rows="10" cols="163"><?php echo $notes;?></textarea>
                        <span class="help-inline"><?php echo $notesError;?></span>
                    </div>
                    <br>
                    <div class="form-actions">

                        <button type="submit" class="btn btn-success"><span class="bi-pencil"></span> Ajouter</button>
                        
                    </div>
                </form>
            </div>
        </div>   
    </body>
</html>