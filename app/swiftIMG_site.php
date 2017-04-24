<?php
    
    namespace app;
use Mysqli;
	class swiftIMG_site {
		protected $mysqli = false;

		function __construct() {
            $this->connectDB();
        }

        function __destruct() {
            $this->disconnectDB();
        }

        function connectDB() {
            $this->mysqli = new mysqli('eu-cdbr-west-01.clearbd.com', 'b88386567900a1', 'f1ef4302', "heroku_277db8570804040");
		    $this->mysqli->query("SET NAMES 'utf8'");
        }

        function disconnectDB() {
            mysqli_close($this->mysqli);
        }

        function getUser($full_name, $social_id) {
            $result = $this->mysqli->query("SELECT * FROM `users` WHERE `full_name` = '$full_name' AND `social_id` = '$social_id'");

            if (mysqli_num_rows($result) == 0) {
                $user_id = $this->setUser($full_name, $social_id);

                if ($user_id) {
                    mkdir($_SERVER['DOCUMENT_ROOT'].'/testheroku/public/users/user-'.$user_id, 0755, true);
                    $this->getUser($full_name, $social_id);
                }
            }

            return $result->fetch_assoc();
        }

        function setUser($full_name, $social_id) {
            $this->mysqli->query("INSERT INTO `users` SET `full_name` = '$full_name', `social_id` = '$social_id'");

            return mysqli_insert_id($this->mysqli);
        }

        function sendComment($name, $email, $message) {
            $this->mysqli->query("INSERT INTO `comments` SET `name` = '$name', `email` = '$email', `message` = '$message'");
            $comment_id = mysqli_insert_id($this->mysqli);

            if ($comment_id > 0) {
                $msg = $name." відправив відгук.\n";
                $msg .= $message."\n";
                mail("vmudrij0508@gmail.com", "swiftIMG - Новий відгук", $msg, $email);

                return 1;
            }

            return 0;
        }

        function getApps($user_id) {
        	$result = $this->mysqli->query("SELECT `id`, `name`, `work`, `key` FROM `apps` WHERE `user_id` = $user_id");

            return $this->resultToArray($result);
        }

        function getAppByKey($key, $user_id) {
            $result = $this->mysqli->query("SELECT `id`, `name`, `domain`, `work`
                                            FROM `apps`
                                            WHERE `key` = '$key' AND `user_id` = $user_id");

            return $result->fetch_assoc();
        }

        function getImagesByAppId($app_id) {
            $result = $this->mysqli->query("SELECT `id`, `original_name`, `name`, DATE_FORMAT(`date_time` , '%d.%m.%Y') AS `date` 
                                            FROM `images` 
                                            WHERE `app_id` = $app_id 
                                            ORDER BY `id` DESC");

            return $this->resultToArray($result);
        }

        function createApp($name, $domain, $user_id) {
        	$this->mysqli->query("INSERT INTO `apps` SET `name` = '$name', `domain` = '$domain', `user_id` = $user_id");
        	$app_id = mysqli_insert_id($this->mysqli);
        	$key = md5($app_id);
        	$this->mysqli->query("UPDATE `apps` SET `key` = '$key' WHERE `id` = $app_id");

        	if ($app_id > 0) {
                mkdir($_SERVER['DOCUMENT_ROOT'].'/public/users/user-'.$user_id.'/app-'.$app_id, 0755, true);

        		return 1;
        	}

        	return 0;
        }

        function updateApp($app_id, $name, $domain, $work, $user_id) {
        	$this->mysqli->query("UPDATE `apps` SET `name` = '$name', `domain` = '$domain', `work` = $work WHERE `id` = $app_id AND `user_id` = $user_id");

        	if (mysqli_affected_rows($this->mysqli) == 1) { 
                return 1;
            }

            return 0;
        }

        function deleteApp($app_id, $user_id) {
        	$this->mysqli->query("DELETE FROM `apps` WHERE `id` = $app_id AND `user_id` = $user_id");

        	if (mysqli_affected_rows($this->mysqli) == 1) { 
                rmdir($_SERVER['DOCUMENT_ROOT'].'/public/users/user-'.$user_id.'/app-'.$app_id);

                return 1;
            }

            return 0;
        }

        function saveImage($name, $key, $domain) {
        	$result = $this->mysqli->query("SELECT DISTINCT `apps`.`id` AS `id`
			        						FROM `apps` INNER JOIN `images` ON `apps`.`id` = `images`.`app_id`
			        						WHERE `apps`.`key` = '$key' AND `apps`.`domain` = '$domain'");

        	if (mysqli_num_rows($result) == 1) {
        		$result = $result->fetch_assoc();
                $id = $result["id"];
        		$this->mysqli->query("INSERT INTO `images` SET `original_name` = 'test',  `name` = '$name',  `date_time` = '2017-04-15 16:58:07' , `app_id` = $id");

        		return true;
        	} 

        	return false;
        }

        function deleteImage($image_id, $app_id, $src) {
            $this->mysqli->query("DELETE FROM `images` WHERE `id` = $image_id AND `app_id` = $app_id");

            if (mysqli_affected_rows($this->mysqli) == 1) {
                if (unlink($_SERVER['DOCUMENT_ROOT'].$_POST["src"])) {
                    return 1;
                }
            }

            return 0;
        }

        function isExistImage($name, $key) {
            $result = $this->mysqli->query("SELECT `images`.`name`
                                            FROM `apps` INNER JOIN `images` ON `apps`.`key` = '$key' AND `apps`.id = `images`.`app_id` 
                                            WHERE `images`.`name` = '$name'");

            if (mysqli_num_rows($result) == 1) {
                return true;
            }

            return false;
        }

        function pathToSaveServer($key) {
            $result = $this->mysqli->query("SELECT `id`, `user_id` 
                                            FROM `apps` 
                                            WHERE `key` = '$key'");
            $res = $result->fetch_assoc();
            $path = 'E://OpenServer/domains/localhost/testheroku/public/users/user-' . $res['user_id'] . '/app-' . $res['id'] . '/';

            return $path;
        }

        function resultToArray($result) {
            $array = array();

            while (($row = $result->fetch_assoc()) != false) {
                $array[] = $row;
            }

            return $array;
        }
	}
?>