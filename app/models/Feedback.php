<?php
namespace app\models;
use app\components\Db;
use app\core\Model;

class Feedback extends Model
{
    public static function saveFeedback($name, $email, $message)
    {
        $db = Db::getInstance()->getConnection();

        $data = array('name' => $name,
            'email' => $email,
            'message' => $message
        );
        $sql = 'INSERT INTO feedback(name, email, message) VALUES(:name, :email, :message)';
        $insert = $db->prepare($sql);
        $insert->execute($data);
    }

    public static function getFeedbacks()
    {
        $db = Db::getInstance()->getConnection();

        $sql = 'SELECT * FROM feedback ORDER BY id DESC';
        $result = $db->prepare($sql);
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