<?php
namespace App\Repository;
use App\Classes\Customer;
use App\Connection\Connection;
echo(":D");

class CustomerRepository
{

    public static function listCustomer(){
        $co = new Connection();
        echo '<table class="table table-striped table-bordered">';
            echo '<thead>';
                echo '<tr>';
                    echo'<th>id</th>';
                    echo'<th>Code</th>';
                    echo'<th>Name</th>';
                    echo'<th>Notes</th>';
                    echo'<th>Actions</th>';
                echo'</tr>';
            echo'</thead>';
            echo'<tbody>';
                $co->connectionBDD();
                $statement = $co->query('SELECT id, code, name, notes FROM customer ORDER BY id ASC');
                while($item = $statement->fetch()) {
                    echo '<tr>';
                    echo '<td>'. $item['id'] . '</td>';
                    echo '<td>'. $item['code'] . '</td>';
                    echo '<td>'. $item['name'] . '</td>';
                    echo '<td>'. $item['notes'] . '</td>';
                    echo '<td>';
                    echo '<a class="btn btn-primary" href="UpdateCustomer.php?id=' . $item['id'] . '">Modifier</a>';
                    echo '<a class="btn btn-primary" href="DeleteCustomer.php?id=' . $item['id'] . '">Supprimer</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                $co->deconnectionBDD();
            echo'</tbody>';
        echo'</table>';
    }

    public static function insertCustomer(Customer $myCustomer): Customer{
        $co = new Connection();
        $co->connectionBDD();
        $statement = $co->prepare("INSERT INTO customer (code, name, notes) values(?, ?, ?)");
        $statement->execute(array($myCustomer->getCode(), $myCustomer->getName(), $myCustomer->getNotes()));
        $co->deconnection();
        return $myCustomer;
    }

    public static function selectCustomer(Customer $myCustomer): Customer {
        $co = new Connection();
        $co->connectionBDD();
        $statement = $co->prepare("SELECT code, name, notes from customer WHERE id = ?");
        $statement->execute(array($myCustomer->getId()));
        $item = $statement->fetch();
        $myCustomer->setCode($item['code']);
        $myCustomer->setNotes($item['notes']);
        $myCustomer->setName($item['name']);
        $co->deconnectionBDD();
        return $myCustomer;
    }

    public static function updateCustomer(Customer $myCustomer){
        $co = new Connection();
        $co->connectionBDD();
        $statement = $co->prepare("UPDATE customer  set code = ?, name = ?, notes = ? WHERE id = ?");
        $statement->execute(array($myCustomer->getCode(), $myCustomer->getName(), $myCustomer->getNotes(), $myCustomer->getId()));
        $co->deconnectionBDD();
    }

    public static function deleteCustomer(int $id): array{

        $myArray = array(
            'isSuccess' => 0,
            'projectError' => '',
            'contactError' => '',
        );
        $isSuccess = true;

        $co = new Connection();
        $co->connectionBDD();
        $statement = $co->prepare("SELECT * FROM project WHERE customer_id = ?");
        $count = rowCount($statement->execute(array($id)));

        if($count>0){
            $myArray['projectError'] = 'Ce client est déjà lié à un ou des projet(s). Pour le supprimer, supprimez déjà le ou les projet(s) en question.';
            $isSuccess = false;
        }

        $statement = $co->prepare("SELECT * FROM contact WHERE customer_id = ?");
        $count = rowCount($statement->execute(array($id)));

        if($count>0){
            $myArray['contactError'] = 'Ce client est déjà lié à un ou des contact(s). Pour le supprimer, supprimez déjà le ou les contact(s) en question.';
            $isSuccess = false;
        }

        if($isSuccess){
            //$statement = $co->prepare("DELETE customer WHERE id=?");
            //$statement->execute(array($id));
            //$myArray['isSuccess'] = 0;
        }
        else{
            $myArray['isSucess'] = 1;
        }

        $co->deconnectionBDD();
        return $myArray;
    }
}