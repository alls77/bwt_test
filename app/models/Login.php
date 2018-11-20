<?php
namespace app\models;
use app\components\Db;
use app\core\Model;

class Login extends Model
{
    private static $db;

    function __construct () {
        self::$db = Db::getInstance()->getConnection();
    }

    public static function signIn($email)
    {
        $result = self::$db->prepare("SELECT * FROM users WHERE email=" . "'$email'");
        $result->execute();
        $login = $result->fetch();
        return $login;
    }

    public static function signUp($name, $surname, $email, $gender, $bday)
    {
        $login = self::signIn($email);

        if (!empty($login['email'])) {
            return 'Username provided is already in use!';
            exit();
        }

        $data = array('name' => $name,
            'surname' => $surname,
            'email' => $email,
            'gender' => $gender,
            'bday' => $bday
        );

        $sql = 'INSERT INTO users(name, surname, email, gender, bday) VALUES(:name, :surname, :email, :gender, :bday)';
        $insert = self::$db->prepare($sql);
        $insert->execute($data);
    }
}