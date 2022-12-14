<?php

/**
 * Classe modèle pour l'utilisateur
 */
class UserModel
{
    /**
     * @return User|null
     *
     * Renvoie une instance d'utilisateur si il est connecté
     */
    public static function getUserInstance(): ?User
    {
        if (isset($_SESSION['user-id']) && $_SESSION['user-id'] != null && isset($_SESSION['user-name']) && $_SESSION['user-name'] != null) {
            $id = Validation::clean($_SESSION['user-id']);
            $name = Validation::clean($_SESSION['user-name']);
            return new User($id, $name);
        } else return null;
    }

    /**
     * @param $name
     * @param $passwd
     * @return User|null
     *
     * Gestion de la connexion
     */
    public function login($name, $passwd): ?User
    {
        global $dsn, $user, $pass;
        // TODO : validate fields
        $gw = new UserGateway(new Connection($dsn, $user, $pass));
        $passwdFromDB = $gw->getPasswd($name);
        if ($passwdFromDB == null) {
            return null;
        }
        if (password_verify($passwd, $passwdFromDB)) {
            $id = $gw->getId($name);
            $_SESSION['user-id'] = $id;
            $_SESSION['user-name'] = $name;
            return new User($id, $name);
        }
        return null;
    }

    /**
     * @return void
     *
     * Gestion de la déconnexion
     */
    public function logout(): void
    {
        session_unset();
        session_destroy();
        $_SESSION = array();
    }
}