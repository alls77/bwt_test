<?php

class Feedbacks
{

    public static function getFeedbacks()
    {
        $db = Db::getConnection();
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