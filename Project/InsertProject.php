<?php
require '../src/Autoloader.php';
require '../vendor/autoload.php';

use App\Connection\Connection;
use App\Repository\ProjectRepository;
use App\Validators\ProjectValidator;
use App\Classes\Project;

//initialisation de myCustomer
$myProject = new Project(0,"","","", "", "", "", "","");
//initialisation de l'array utilisé pour retourner les erreurs
$myArray = ProjectValidator::initializeArray();

if(!empty($_POST)) {

    //myCustomer reçoit les données du formulaire
    $myProject->setName(ProjectValidator::trimData($_POST['name']));
    $myProject->setCode(ProjectValidator::slugifyData($_POST['code']));
    $myProject->setLastPassFolder(ProjectValidator::trimData($_POST['lastPassFolder']));
    $myProject->setLinkMockUps(ProjectValidator::trimData($_POST['linkMockUps']));
    $myProject->setManagedServer(ProjectValidator::slugifyData($_POST['managedServer']));
    $myProject->setNote(ProjectValidator::trimData($_POST['notes']));
    $myProject->setHostId(ProjectValidator::trimData($_POST['hostId']));
    $myProject->setCustomerId(ProjectValidator::trimData($_POST['customerId']));

    //la fonction static validateCustomer est utilisé. Cette fonction retourne un array listant les possibles
    //erreurs retournés des données du formulaire
    $myArray = ProjectValidator::validateProject($myProject);

    if ($myArray['isSuccess'] == 0){ //si l'attribut isSuccess de myArray est 0 alors validatesCustomer n'a trouvé aucune erreur
        ProjectRepository::insertProject($myProject);
        header("Location: Project.php");
    }

}

?>

<!DOCTYPE html>
<html>
<head>
    <title> Ajouter un Projet </title>
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

<h1 class="text-logo"> Projet </h1>
<div class="container admin">
    <div class="row">
        <h1><strong>Ajouter un Projet</strong></h1>
        <br>
        <form class="form" role="form" method="post">
            <br>
            <div>
                <label class="form-label" for="name">Nom :</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Insérer un name pour le projet" value="<?php echo $myProject->getName();?>">
                <span class="help-inline"><?php echo $myArray['nameError'];?></span>
            </div>
            <br>
            <div>
                <label class="form-label" for="code">Code :</label>
                <input type="text " class="form-control" id="code" name="code" placeholder="Insérer un code pour le projet" value="<?php echo $myProject->getCode();?>">
                <span class="help-inline"><?php echo $myArray['codeError'];?></span>
            </div>
            <br>
            <div>
                <label class="form-label" for="lastPassFolder">last Pass Folder :</label>
                <input type="text " class="form-control" id="lastPassFolder" name="lastPassFolder" placeholder="Insérer un last Pass Folder pour le projet" value="<?php echo $myProject->getLastPassFolder();?>">
                <span class="help-inline"><?php echo $myArray['lastPassFolderError'];?></span>
            </div>
            <br>
            <div>
                <label class="form-label" for="linkMockUps">link Mock Ups :</label>
                <input type="text " class="form-control" id="linkMockUps" name="linkMockUps" placeholder="Insérer un link Mock Ups pour le projet" value="<?php echo $myProject->getLinkMockUps();?>">
                <span class="help-inline"><?php echo $myArray['linkMockUpsError'];?></span>
            </div>
            <br>
            <div>
                <label class="form-label" for="managedServer">managed Server :</label>
                <input type="text " class="form-control" id="managedServer" name="managedServer" placeholder="Insérer un managed server pour le projet" value="<?php echo $myProject->getManagedServer();?>">
                <span class="help-inline"><?php echo $myArray['managedServerError'];?></span>
            </div>
            <br>
            <div>
                <label class="form-label" for="notes">Notes :</label>
                <textarea id="notes" name="notes" placeholder="Notes" rows="10" cols="173"><?php echo $myProject->getNotes();?></textarea>
                <span class="help-inline"><?php echo $myArray['notesError'];?></span>
            </div>
            <br>
            <div>
                <label class="form-label" for="hostId">Host Id :</label>
                <textarea id="hostId" name="hostId" placeholder="Id de host pour un projet" rows="10" cols="173"><?php echo $myProject->getHostId();?></textarea>
                <span class="help-inline"><?php echo $myArray['hostIdError'];?></span>
            </div>
            <br> <div>
                <label class="form-label" for="customerId">Customer Id :</label>
                <textarea id="customerId" name="customerId" placeholder="Id de customer pour un projet" rows="10" cols="173"><?php echo $myProject->getCustomerId();?></textarea>
                <span class="help-inline"><?php echo $myArray['customerIdError'];?></span>
            </div>
            <div class="form-actions">

                <button type="submit" class="btn btn-success"><span class="bi-pencil"></span> Ajouter</button>
                <a class="btn btn-secondary" href="Project.php"> Annuler </a>

            </div>
        </form>
    </div>
</div>
</body>
</html>
