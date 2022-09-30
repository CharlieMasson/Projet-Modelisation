<?php

require_once __DIR__.'/Project.php';


$project = new Project();
$project->setId(1);
$project->setName('Jeff');
$project->setCode('blablacar');
$project->setLastpassFolder('bonjour');
$project->setLinkMockUps('www.fr');
$project->setManagedServer(true);
$project->setNote("bonjour je suis nicolas sarkozy et j'ai l'honneur de vous presenter le temps des tempettes");



$project->getId();
$project->getName();
$project->getCode();
$project->getLastpassFolder();
$project->getLinkMockUps();
$project->getManagedServer();
$project->getNote();