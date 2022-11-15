<?php
require_once("model/Connection.php");
require_once("model/gateway/UserGateway.php");
require_once("model/business/User.php");


$pseudo = $_POST['pseudo'];
$mail = $_POST['mail'];
$pass = $_POST['pass'];

$user = 'root';
$pass = '0000';
$dsn = 'mysql:host=localhost;dbname=2dolist';


$con = new Connection($dsn, $user, $pass);
$userGateway = new UserGateway($con);
$result = $userGateway->checkNameAvailable($pseudo);

if ($result == 0) {
    $result = $userGateway->checkMailAvailable($mail);
    if ($result == 0) {
        echo 'Inscription réussite!';
        $user = new User($pseudo, $pass, $mail);
        $result = $userGateway->insert($user);

    } else {
        echo 'Mail deja utilisé!';
    }
} else {
    echo 'Nom deja utilisé!';
}


?>
