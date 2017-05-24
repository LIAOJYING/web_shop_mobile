<?php
	include 'db.php';

	if (isset($_POST['login'])) {
		$user = $_POST['email'];
		$pass = $_POST['password'];
		try {
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = "Select  status, email, password From users Where email='$user' And password='$pass'";

			$result = $conn->query($sql);

			if($result->rowcount()>0){
				$rows = $result->fetch();
				if ($rows['status']==0) {
					echo "tai khoan cua ban da bi khoa";
				}
				else{
				session_start();
				$_SESSION['user'] = $rows['email'];
				if (isset($_POST['remember'])){
					setcookie('user', $rows['email'], time()+60*60);
					setcookie('pass', $rows['password'], time()+60*60);			
				}
				header("location: ../view.php");
				}	
			} else {
				setcookie("login",0);
				if(isset($_COOKIE['login'])){
                      if($_COOKIE['login'] < 3){
                           $attempts = $_COOKIE['login'] + 1;
                           setcookie('login', $attempts, time()+60*10); //set the cookie for 10 minutes with the number of attempts stored
                           $errors = 'That email/password combination is incorrect!';
                           echo "$errors";
                      } else{
                      	   $sql2 = "UPDATE users SET status='0' WHERE email='$user'";
                      	   $result2 = $conn->prepare($sql2);
                      	   $result2->execute();
                           echo 'You are banned for 10 minutes. Try again later';
                           header("Location: ban.php");
                      }
            	}
            	header("Location: view.php");
				
			}
		} catch (Exception $e) {
			echo "Lỗi không thể truy câp dữ liệu!";
		}
		 
	} else {
		header("location: index.php");
	}
?>