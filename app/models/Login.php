<?php
namespace app\models;
use app\components\Db;
use app\core\Model;

class Login extends Model
{

    public static function signIn($email)
    {
        $db = Db::getInstance()->getConnection();

        $result = $db->prepare("SELECT * FROM users WHERE email=" . "'$email'");
        $result->execute();
        $login = $result->fetch();
        return $login;
    }

    public static function signUp($name, $surname, $email, $gender, $bday)
    {
        $db = Db::getInstance()->getConnection();

        $login = Login::signIn($email);

        if (!empty($login['email'])) {
            //echo '<h3 style="color:green;text-align:center" >Username provided is already in use!</h3>';
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
        $insert = $db->prepare($sql);
        $insert->execute($data);
    }
}