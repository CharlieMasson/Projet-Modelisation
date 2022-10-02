<?php

require_once __DIR__.'/Project.php';
require_once __DIR__.'/contact.php';
require_once __DIR__.'/customer.php';
require_once __DIR__.'/environment.php';
require_once __DIR__.'/host.php';

$myCustomer = new Customer(1, "DT2", "Jean-Paul", "notes sur Jean-Paul");
$myHost = new Host(1, "D3Z", "Jean-Marcel", "notes sur Jean-Marcel");
$myProject = new Project(1, "Projet Nom", "D1A", " /dossier", "https:/unlien", true, "notes sur le projet" ,$myHost, $myCustomer);
$myEnvironment = new Environment(1, "Environnement Nom", "unlien", "12.12.12.12", "324", "Jean", "lien phpmyadmin", true, $myProject);
$myContact = new Contact(1, "email@email.com", "03 43 52 87 12", "Administrateur", $myHost, $myCustomer);
echo "<h2> Customer : </h2>";
echo "<ul>";
echo "<li>id : " . $myCustomer->getId() . "</li>";
echo "<li>code : " . $myCustomer->getCode() . "</li>";
echo "<li>nom : " . $myCustomer->getName() . "</li>";
echo "<li>notes : " . $myCustomer->getNotes() . "</li>";
$myCustomer->setName("Jean-Michel");
echo "<li> nouveau nom de myCustomer après setName : " . $myCustomer->getName() . "</li>";
echo "</ul>";

echo "<h2> Host : </h2>";
echo "<ul>";
echo "<li>id : " . $myHost->getId() . "</li>";
echo "<li>code : " . $myHost->getCode() . "</li>";
echo "<li>nom : " . $myHost->getName() . "</li>";
echo "<li>notes : " . $myHost->getNotes() . "</li>";
$myCustomer->setCode("ddd");
echo "<li> nouveau code de myHost après setCode : " . $myCustomer->getCode() . "</li>";
echo "</ul>";

echo "<h2> Project : </h2>";
echo "<ul>";
echo "<li>id : " . $myProject->getId() . "</li>";
echo "<li>code : " . $myProject->getName() . "</li>";
echo "<li>lastpass_folder : " . $myProject->getLastpassFolder() . "</li>";
echo "<li>lien mocks up : " . $myProject->getLinkMockUps() . "</li>";
echo "<li>serveur actif (bool) : " . $myProject->getManagedServer() . "</li>";
echo "<li>notes : " . $myProject->getNotes() . "</li>";
echo "<li>nom Host : " . $myProject->getHost()->getName() . "</li>";
echo "<li>nom Customer : " . $myProject->getCustomer()->getName() . "</li>";
$myCustomer->setId(2);
echo "<li> nouvelle id de myProject après setId : " . $myCustomer->getId() . "</li>";
echo "</ul>";

echo "<h2> Contact : </h2>";
echo "<ul>";
echo "<li>id : " . $myContact->getId() . "</li>";
echo "<li>email : " . $myContact->getEmail() . "</li>";
echo "<li>numéro téléphone : " . $myContact->getPhone_number() . "</li>";
echo "<li>role : " . $myContact->getRole() . "</li>";
echo "<li>nom Host : " . $myContact->getHost()->getName() . "</li>";
echo "<li>nom Customer : " . $myContact->getCustomer()->getName() . "</li>";
$myContact->setEmail("nouvemail@email.com");
echo "<li> nouvelle email de myContact après setEmail : " . $myContact->getEmail() . "</li>";
echo "</ul>";

echo "<h2> Environment : </h2>";
echo "<ul>";
echo "<li>id : " . $myEnvironment->getId() . "</li>";
echo "<li>lien : " . $myEnvironment->getLink() . "</li>";
echo "<li>adresse ip : " . $myEnvironment->getIp_adress() . "</li>";
echo "<li>port ssh : " . $myEnvironment->getSsh_port() . "</li>";
echo "<li>pseudo ssh : " . $myEnvironment->getSsh_username() . "</li>";
echo "<li>lien phpmyadmin : " . $myEnvironment->getPhpmyadmin_link() . "</li>";
echo "<li>restriction adresse ip (bool) : " . $myEnvironment->getIp_restriction() . "</li>";
echo "<li>code projet : " . $myEnvironment->getProject()->getCode() . "</li>";
$myEnvironment->setSsh_port("777");
echo "<li> Nouveau port ssh ip après setSsh_port() : " . $myEnvironment->getSsh_port() . "</li>";
echo "</ul>";

?>