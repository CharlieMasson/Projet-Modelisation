<table>
    <thead>
        <tr>
            <th>
                email
            </th>
            <th>
                phone_number
            </th>
            <th>
                role
            </th>
            <th>
                host_id
            </th>
            <th>
                customer_id
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once __DIR__.'/../Connexion/Connexion.php';
        $co = connexionBdd();
        $cat = $co->query('SELECT *
            FROM contact
            ORDER BY id DESC');
        while ($result = $cat->fetch()) {
            echo '<tr>';
            echo '<td>' .$result['email'] . '</td>';
            echo '<td>' .$result['phone_number'] . '</td>';
            echo '<td>' .$result['role'] . '</td>';
            echo '<td>' .$result['host_id'] . '</td>';
            echo '<td>' .$result['customer_id'] . '</td>';


            echo '<td width=340>';
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>

</table>
    <table>
        <thead>
        <tr>
            <th>
                code
            </th>
            <th>
                name
            </th>
            <th>
                notes
            </th>
        </tr>
        </thead>
        <tbody>
<?php
$co = connexionBdd();
$cat = $co->query('SELECT *
            FROM customer
            ORDER BY id DESC');
while ($result = $cat->fetch()) {


echo '<td>' .$result['code'] . '</td>';
echo '<td>' .$result['name'] . '</td>';
echo '<td>' .$result['notes'] . '</td>';


    echo '<td width=340>';
    echo "</td>";
    echo "</tr>";
}
?>
        </tbody>

    </table>
    <table>
        <thead>
        <tr>
            <th>
                name
            </th>
            <th>
                link
            </th>
            <th>
                ip_adress
            </th>
            <th>
                ssh_port
            </th>
            <th>
                ssh_username
            </th>
            <th>
                phpmyadmin_link
            </th>
            <th>
                ip_restriction
            </th>
            <th>
                project_id
            </th>
        </tr>
        </thead>
        <tbody>
<?php
$co = connexionBdd();
$cat = $co->query('SELECT *
            FROM environment
            ORDER BY id DESC');
while ($result = $cat->fetch()) {

    echo '<td>' . $result['name'] . '</td>';
    echo '<td>' . $result['link'] . '</td>';
    echo '<td>' . $result['ip_adress'] . '</td>';
    echo '<td>' . $result['ssh_port'] . '</td>';
    echo '<td>' . $result['ssh_username'] . '</td>';
    echo '<td>' . $result['phpmyadmin_link'] . '</td>';
    echo '<td>' . $result['ip_restriction'] . '</td>';
    echo '<td>' . $result['project_id'] . '</td>';


    echo '<td width=340>';
    echo "</td>";
    echo "</tr>";
}
    ?>
        </tbody>
    </table>
    <table>
        <thead>
        <tr>
            <th>
                code
            </th>
            <th>
                name
            </th>
            <th>
                note
            </th>
        </tr>
        </thead>
        <tbody>
    <?php
    $co = connexionBdd();
    $cat = $co->query('SELECT *
            FROM host
            ORDER BY id DESC');
    while ($result = $cat->fetch()) {
        echo '<td>' . $result['code'] . '</td>';
        echo '<td>' . $result['name'] . '</td>';
        echo '<td>' . $result['note'] . '</td>';


        echo '<td width=340>';
        echo "</td>";
        echo "</tr>";
    }
    ?>
        </tbody>
    </table>
        <table>
            <thead>
            <tr>
                <th>
                    name
                </th>
                <th>
                    code
                </th>
                <th>
                    lastpass_folder
                </th>
                <th>
                    link_mock_ups
                </th>
                <th>
                    managed_server
                </th>
                <th>
                    note
                </th>
                <th>
                    host_id
                </th>
                <th>
                    customer_id
                </th>
            </tr>
            </thead>
            <tbody>
        <?php
        $co = connexionBdd();
        $cat = $co->query('SELECT *
            FROM project
            ORDER BY id DESC');
        while ($result = $cat->fetch()) {
            echo '<td>' . $result['name'] . '</td>';
            echo '<td>' . $result['code'] . '</td>';
            echo '<td>' . $result['lastpass_folder'] . '</td>';
            echo '<td>' . $result['link_mock_ups'] . '</td>';
            echo '<td>' . $result['managed_server'] . '</td>';
            echo '<td>' . $result['note'] . '</td>';
            echo '<td>' . $result['host_id'] . '</td>';
            echo '<td>' . $result['customer_id'] . '</td>';

            echo '<td width=340>';
            echo "</td>";
            echo "</tr>";
        }
        $co = deconnexion();
        ?>
            </tbody>
        </table>
 </body>
</html>