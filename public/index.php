<html>

<body>
testaze

<?php

require_once("../app/db/connDB.php");

//A CHANGER
$user= 'root';
$pass='0000';
$dsn='mysql:host=localhost;dbname=2dolist';
try{
    $con=new Connection($dsn,$user,$pass);

    $query = "INSERT INTO users (username,mail,password) VALUES ('Lucas','lucas.delanier@etu.uca.fr','0000')";


    $con->executeQuery($query);

    $results=$con->getResults();
    Foreach ($results as $row)
        print $row['titre'];


}
catch( PDOException $Exception ) {
    echo 'erreur';
    echo $Exception->getMessage();}
?>

</body>
</html>
