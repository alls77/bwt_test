<?php
namespace app\models;
use app\components\Db;
use app\core\Model;

class Feedback extends Model
{
    private static $db;

    function __construct () {
        self::$db = Db::getInstance()->getConnection();
    }

    public static function saveFeedback($name, $email, $message)
    {
        $data = array('name' => $name,
            'email' => $email,
            'message' => $message
        );
        $sql = 'INSERT INTO feedback(name, email, message) VALUES(:name, :email, :message)';
        $insert = self::$db->prepare($sql);
        $insert->execute($data);
    }

    public static function getFeedbacks()
    {
        $sql = 'SELECT * FROM feedback ORDER BY id DESC';
        $result = self::$db->prepare($sql);
        $result->execute();

        $feedbacks = array();
        $i = 0;

        while ($row = $result->fetch()) {

            foreach ($row as $key => $value) {
                $feedbacks[$i][$key] = $value;
            }

            $i++;
        }

        return $feedbacks;
    }
}