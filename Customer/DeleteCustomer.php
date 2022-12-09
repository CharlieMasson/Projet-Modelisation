<?php
    require '../src/Autoloader.php';
    require '../vendor/autoload.php';
    
    use App\Connection\Connection;
    use App\Repository\CustomerRepository;
    use App\Validators\CustomerValidator;
    use App\Classes\Customer;
    
    //récupération de l'id en get, si il n'y en a pas l'utilisateur est redirigé
    if(isset($_GET['id']))
    {
        $id = CustomerValidator::trimData($_GET['id']);
    }
    else{
        header("Location: Customer.php");
    }

    $myArray = CustomerRepository::initializeArray();
    $myCustomer = new Customer($id, "", "", "");
    $myCustomer = CustomerRepository::selectCustomer($myCustomer);

    if(!empty($_POST)) {
        //si POST n'est pas vide on essaye de supprimer customer avec deleteCustomer. Cette fonction peut retourner
        //une erreur si le customer en question est utilisé dans d'autres tables. Les erreurs sont gérés plus bas.
        $myArray = CustomerRepository::deleteCustomer($id);
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Supprimer un Client </title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <script src="JS/main.js"></script>
        <link rel="stylesheet" href="../CSS/Style.css">
    </head>
    
    <body>

    <?php include '../Layout/Menu.php'; ?>

        <h1 class="text-logo"> Client </h1>
        <div class="container admin">
            <div class="row">
                <h1><strong> Supression d'un Client </strong></h1>
                <br>
                <form class="form" role="form" method="post">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <br>
                    <?php

                    if (empty($_POST)){
                        //si post est vide alors le premier message est affiché

                        echo "<p> Voulez-vous vraiment supprimer le client " . $myCustomer->getName() . " ? Cette action est définitive. </p>";
                        echo "<div class='form-actions'>";
                        echo "<button type='submit' class='btn btn-danger'> Supprimer </button> <a class='btn btn-secondary btnAnnuler' href='Customer.php'> Annuler </a>";
                        echo "</div>";

                    }
                    else{
                        //en fonction de si l'utilisateur est utilisé dans d'autre table ou non il sera soit supprimé avec succès (isSuccess = 0)
                        //ou la page retournera une ou des erreurs à partir de myArray

                        if ($myArray['isSuccess'] == 0){

                            echo "<br>";
                            echo "Client supprimé avec succès.";
                            echo "<a class='btn btn-warning' href='Customer.php'> Retour </a>";

                        }

                        else{

                            echo"Erreur(s):";
                            //liste toutes les variables de myArray sauf celles ayant pour clé isSuccess
                            foreach($myArray as $key=>$value){
                                if ($key != 'isSuccess'){
                                    echo "<br>";
                                    echo $myArray[$key];
                                }
                            }
                            echo "<br>";
                            echo "<a class='btn btn-warning' href='Customer.php'> Retour </a>";

                        }

                    }

                    ?>

                </form>
            </div>
        </div>   
    </body>
</html>