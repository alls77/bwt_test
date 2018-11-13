<?php

class Feedback
{
	public static function saveFeedback($name,$email,$message)
	{
		$db = Db::getConnection();
        
        $data = array('name' => $name,
					  'email' => $email,
					  'message' => $message
        );

        $sql = 'INSERT INTO feedback(name, email, message) VALUES(:name, :email, :message)';
		$insert = $db->prepare($sql);
		$insert->execute($data);
	}
}