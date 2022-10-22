<?php
    require '../src/Autoloader.php';
    use App\Connection\Connection;
    use App\Repository\CustomerRepository;
    use App\Validators\CustomerValidator;
    use App\Classes\Customer;

    //initialisation de myCustomer
    $myCustomer = new Customer(0,"","","");
    //initialisation de l'array utilisé pour retourner les erreurs
    $myArray = CustomerValidator::initializeArray();

    if(!empty($_POST)) {

        //myCustomer reçoit les données du formulaire
        $myCustomer->setCode(CustomerValidator::trimData($_POST['code']));
        $myCustomer->setName(CustomerValidator::trimData($_POST['name']));
        $myCustomer->setNotes(CustomerValidator::trimData($_POST['notes']));
       
        //la fonction static validateCustomer est utilisé. Cette fonction retourne un array listant les possibles
        //erreurs retournés des données du formulaire
        $myArray = CustomerValidator::validateCustomer($myCustomer);

        if ($myArray['isSuccess'] == 0){ //si l'attribut isSuccess de myArray est 0 alors validatesCustomer n'a trouvé aucune erreur
            CustomerRepository::insertCustomer($myCustomer);
            header("Location: Customer.php");
        }

    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Ajouter un Client </title>
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
                <h1><strong>Ajouter un Client</strong></h1>
                <br>
                <form class="form" role="form" method="post">
                    <br>
                    <div>
                        <label class="form-label" for="code">Code :</label>
                        <input type="text" class="form-control" id="code" name="code" placeholder="Insérer un code pour le Client" value="<?php echo $myCustomer->getCode();?>">
                        <span class="help-inline"><?php echo $myArray['codeError'];?></span>
                    </div>
                    <br>
                    <div>
                        <label class="form-label" for="name">Nom :</label>
                        <input type="text " class="form-control" id="name" name="name" placeholder="Insérer un nom pour le Client" value="<?php echo $myCustomer->getName();?>">
                        <span class="help-inline"><?php echo $myArray['nameError'];?></span>
                    </div>
                    <br>
                    <div>
                    <label class="form-label" for="notes">Notes :</label>
                        <textarea id="notes" name="notes" placeholder="Notes" rows="10" cols="173"><?php echo $myCustomer->getNotes();?></textarea>
                        <span class="help-inline"><?php echo $myArray['notesError'];?></span>
                    </div>
                    <br>
                    <div class="form-actions">

                        <button type="submit" class="btn btn-success"><span class="bi-pencil"></span> Ajouter</button>
                        <a class="btn btn-secondary" href="Customer.php"> Annuler </a>
                        
                    </div>
                </form>
            </div>
        </div>   
    </body>
</html>