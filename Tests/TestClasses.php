<?php
require_once __DIR__.'/../Interfaces/AllInterface.php';
require_once __DIR__.'/../Traits/HasId.php';
require_once __DIR__.'/../Traits/HasCode.php';
require_once __DIR__.'/../Traits/HasName.php';
require_once __DIR__.'/../Traits/HasNotes.php';
require_once __DIR__.'/../Classes/Project.php';
require_once __DIR__.'/../Classes/Contact.php';
require_once __DIR__.'/../Classes/Customer.php';
require_once __DIR__.'/../Classes/Environment.php';
require_once __DIR__.'/../Classes/Host.php';

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