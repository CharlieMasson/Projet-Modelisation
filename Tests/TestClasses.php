<?php
require '../Autoloader.php';
    use Classes\Customer;
    use Classes\Host;
    use Classes\Project;
    use Classes\Environment;
    use Classes\Contact;

$myCustomer = new Customer(1, "DT2", "Jean-Paul", "notes sur Jean-Paul");
$myHost = new Host(1, "D3Z", "Jean-Marcel", "notes sur Jean-Marcel");
$myProject = new Project(1, "Projet Nom", "D1A", " /dossier", "https:/unlien", true, "notes sur le projet" ,$myHost, $myCustomer);
$myEnvironment = new Environment(1, "Environnement Nom", "unlien", "12.12.12.12", "324", "Jean", "lien phpmyadmin", true, $myProject);
$myContact = new Contact(1, "email@email.com", "03 43 52 87 12", "Administrateur", $myHost, $myCustomer);
$objects = array($myCustomer, $myHost, $myProject, $myEnvironment, $myContact);

foreach($objects as $object){
    $object->echoAll();
}
?>