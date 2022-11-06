<?php
require '../src/Autoloader.php';
require '../vendor/autoload.php';

use App\Connection\Connection;
use App\Repository\ProjectRepository;
use App\Validators\ProjectValidator;
use App\Classes\Project;
use App\Classes\Host;
use App\Classes\Customer;
use App\Repository\HostRepository;
use App\Repository\CustomerRepository;

//récupération de l'id en get, si il n'y en a pas l'utilisateur est redirigé
if(!empty($_GET['id']))
{
    $id = ProjectValidator::trimData($_GET['id']);
}
else{
    header("Location: Project.php");
}
$myCustomer = new Customer ( 0, "", "", "");
$myHost = new Host (0, "","","");
//initialisation de myCustomer
$myProject = new Project($id,"","","", "", "", "", $myHost, $myCustomer);
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
    $myProject->setHost(ProjectValidator::trimData($_POST['hostId']));
    $myProject->setCustomer(ProjectValidator::trimData($_POST['customerId']));

    //la fonction validatesCustomer est utilisé. Cette fonction retourne un array listant les possibles
    //erreurs retournés des données du formulaire
    $myArray = ProjectValidator::validateProject($myProject);

    if ($myArray['isSuccess'] == 0){ //si l'attribut isSuccess de myArray est 0 alors validatesCustomer n'a trouvé aucune erreur
        ProjectRepository::updateProject($myProject);
        header("Location: Project.php");
    }

}
else{
    //si POST est vide les données du customer avec l'id renseigné sont selectionnés
    $myProject = ProjectRepository::selectProject($myProject);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title> Modifier un Projet </title>
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
    <link rel="stylesheet" href="../src/CSS/Style.css">
</head>

<body>

<?php include '../Layout/Menu.php'; ?>

<h1 class="text-logo"> Projet </h1>
<div class="container admin">
    <div class="row">
        <h1><strong>Modifier un Projet</strong></h1>
        <br>
        <form class="form" role="form" method="post">
            <br>
            <div>
                <label class="form-label" for="name">Nom :</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Modifier un name pour le projet" value="<?php echo $myProject->getName();?>">
                <span class="help-inline"><?php echo $myArray['nameError'];?></span>
            </div>
            <br>
            <div>
                <label class="form-label" for="code">Code :</label>
                <input type="text " class="form-control" id="code" name="code" placeholder="Modifier un code pour le projet" value="<?php echo $myProject->getCode();?>">
                <span class="help-inline"><?php echo $myArray['codeError'];?></span>
            </div>
            <br>
            <div>
                <label class="form-label" for="lastPassFolder">dernier dossier de passe  :</label>
                <input type="text " class="form-control" id="lastPassFolder" name="lastPassFolder" placeholder="Modifier un last Pass Folder pour le projet" value="<?php echo $myProject->getLastPassFolder();?>">
                <span class="help-inline"><?php echo $myArray['lastPassFolderError'];?></span>
            </div>
            <br>
            <div>
                <label class="form-label" for="linkMockUps">lien Maquettes :</label>
                <input type="text " class="form-control" id="linkMockUps" name="linkMockUps" placeholder="Modifier un link Mock Ups pour le projet" value="<?php echo $myProject->getLinkMockUps();?>">
                <span class="help-inline"><?php echo $myArray['linkMockUpsError'];?></span>
            </div>
            <br>
            <div>
                <label class="form-label" for="managedServer">Serveur géré :</label>
                <input type="text " class="form-control" id="managedServer" name="managedServer" placeholder="Modifier un managed server pour le projet" value="<?php echo $myProject->getManagedServer();?>">
                <span class="help-inline"><?php echo $myArray['managedServerError'];?></span>
            </div>
            <br>
            <div>
                <label class="form-label" for="notes">Notes :</label>
                <textarea id="notes" name="notes" placeholder="Modifier les Notes" rows="10" cols="173"><?php echo $myProject->getNotes();?></textarea>
                <span class="help-inline"><?php echo $myArray['notesError'];?></span>
            </div>
            <br>
            <div>
                <div>
                    <?php hostRepository::createdHost()?>
                    <span class="help-inline"><?php echo $myArray['hostIdError'];?></span>
                </div>
            </div>
            <br> <div>
                <?php CustomerRepository::createdCustomer()?>
                <span class="help-inline"><?php echo $myArray['customerIdError'];?></span>
            </div>
            <div class="form-actions">

                <button type="submit" class="btn btn-success"><span class="bi-pencil"></span> Modifier</button>
                <a class="btn btn-secondary" href="Project.php"> Annuler </a>

            </div>
        </form>
    </div>
</div>
</body>
</html>