<html>

<body>
test<br/>

<?php

require_once("../app/db/connDB.php");
require_once("../app/models/User.php");
require_once("../app/models/UserGateway.php");
require_once("../app/models/ListTask.php");
require_once("../app/models/Task.php");

$user= 'root';
$pass='0000';
$dsn='mysql:host=localhost;dbname=2dolist';


try{
    $con=new Connection($dsn,$user,$pass);
    $userGateway= new UserGateway($con);
    $user = new User('Audric','12345','audric.sabatier@etu.uca.fr');
    $list = new ListTask('Devoirs');
    $userGateway->select();

    $results=$con->getResults();
    Foreach ($results as $row){
        print $row['id'];
        print '<br/>';
        print $row['username'];
        print '<br/>';
        print $row['mail'];
        print '<br/>';
        print $row['password'];
        print '<br/><br/><br/>';
    }

    print $list->getTitle();
    print '<br/>';
    print $list->getDateOfCreation();


}
catch( PDOException $Exception ) {
    echo 'erreur';
    echo $Exception->getMessage();}
?>

</body>
</html>
