<?php
namespace App\Repository;
use App\Classes\Project;
use App\Connection\Connection;

class ProjectRepository
{

    //liste les clients
    public static function listProject()
    {
        $co = new Connection();
        echo '<table class="table table-striped table-bordered">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Id</th>';
        echo '<th>Name</th>';
        echo '<th>Code</th>';
        echo '<th>Last Pass Folder</th>';
        echo '<th>Link Mock Ups</th>';
        echo '<th>Managed Server</th>';
        echo '<th>Note</th>';
        echo '<th>Host</th>';
        echo '<th>Customer</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        $co->connectionBDD();
        $statement = $co->query('SELECT id, name, code, lastpass_folder, link_mock_ups, managed_server, note, host_id, customer_id  FROM project ORDER BY id ASC');
        while ($item = $statement->fetch()) {
            echo '<tr>';
            echo '<td>' . $item['id'] . '</td>';
            echo '<td>' . $item['name'] . '</td>';
            echo '<td>' . $item['code'] . '</td>';
            echo '<td>' . $item['lastpass_folder'] . '</td>';
            echo '<td>' . $item['link_mock_ups'] . '</td>';
            echo '<td>' . $item['managed_server'] . '</td>';
            echo '<td>' . $item['note'] . '</td>';
            echo '<td>' . $item['host_id'] . '</td>';
            echo '<td>' . $item['customer_id'] . '</td>';
            echo '<td>';
            echo '<a class="btn btn-primary" href="UpdateProject.php?id=' . $item['id'] . '">Modifier</a>';
            echo '<a class="btn btn-primary" href="DeleteProject.php?id=' . $item['id'] . '">Supprimer</a>';
            echo '</td>';
            echo '</tr>';
        }
        $co->deconnectionBDD();
        echo '</tbody>';
        echo '</table>';
    }

    //permet d'insérer un client dans la bdd
    public static function insertProject(Project $myProject): Project
    {
        $co = new Connection();
        $co->connectionBDD();
        $statement = $co->prepare("INSERT INTO project (name, code, lastpass_folder, link_mock_ups, managed_server, note, host_id, customer_id) values(?, ?, ?, ?, ?, ?, ?, ?)");
        $statement->execute(array($myProject->getName(), $myProject->getCode(), $myProject->getLastPassFolder(), $myProject->getLinkMockUps(), $myProject->getManagedServer(),  $myProject->getNote(), $myProject->getHostId(), $myProject->getCustomerId()));
        $co->deconnection();
        return $myProject;
    }

    //permet de sélectionner les données d'un client et de les insérer dans myProject
    public static function selectProject(Project $myProject): Project
    {
        $co = new Connection();
        $co->connectionBDD();
        $statement = $co->prepare("SELECT name, code, lastpass_folder, link_mock_ups, managed_server, note, host_id, customer_id from project WHERE id = ?");
        $statement->execute(array($myProject->getId()));
        $item = $statement->fetch();
        $myProject->setName($item['name']);
        $myProject->setCode($item['code']);
        $myProject->setLastPassFolder($item['lastpass_folder']);
        $myProject->setLinkMockUps($item['link_mock_ups']);
        $myProject->setManagedServer($item['managed_server']);
        $myProject->setNote($item['note']);
        $myProject->setHostId($item['host_id']);
        $myProject->setCustomerId($item['customer_id']);
        $co->deconnectionBDD();
        return $myProject;
    }

    //permet de modifier les données du client mit en paramètre
    public static function updateProject(Project $myProject)
    {
        $co = new Connection();
        $co->connectionBDD();
        $statement = $co->prepare("UPDATE project  set name = ?, code = ?, lastpass_folder = ?, link_mock_ups = ?, managed_server = ?, note = ?, host_id = ?, customer_id = ? WHERE id = ?");
        $statement->execute(array($myProject->getName(), $myProject->getCode(), $myProject->getLastPassFolder(), $myProject->getLinkMockUps(), $myProject->getManagedServer(),  $myProject->getNote(), $myProject->getHostId(), $myProject->getCustomerId(), $myProject->getId()));
        $co->deconnectionBDD();
    }

    //permet d'initialiser l'array utilisé pour deleteCustomer
    public static function initializeArray(): array
    {
        $myArray = array(
            'isSuccess' => 1,
            'projectError' => '',
            'contactError' => '',
        );
        return $myArray;
    }

    //permet de supprimer un utilisateur, sauf si celui-ci est utilisé dans une autre table
    public static function deleteProject(int $id): array
    {

        $myArray = array(
            'isSuccess' => 0,
            'environmentError' => '',

        );
        $isSuccess = true;

        $co = new Connection();
        $co->connectionBDD();
        $statement = $co->prepare("SELECT * FROM environment WHERE project_id = ?");
        $statement->execute(array($id));
        $count = $statement->fetchColumn();

        if ($count > 0) {
            $myArray['projectError'] = 'Ce projet est déjà lié à un ou des environnement(s). Pour le supprimer, supprimez déjà le ou les environnement(s) en question.';
            $isSuccess = false;
        }
        if ($isSuccess) {
            $statement = $co->prepare("DELETE FROM project WHERE id=?");
            $statement->execute(array($id));
        } else {
            $myArray['isSuccess'] = 1;
        }

        $co->deconnectionBDD();
        return $myArray;
    }
}
