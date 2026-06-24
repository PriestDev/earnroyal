<?php
date_default_timezone_set("Europe/London");

// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 3600);

// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(3600);

session_start();

include('../database/db_config.php');
require '../details.php';
require '../admin.php';

if ($conn) {
		//echo "successful";
 } else {
 	header('location: ../database/db_config.php');
 }
	
if (!$_SESSION['user_id']) {

	header('location: ../user/login.php');

} elseif (isset($_SESSION['user_id']) && $_SESSION['user_id'] != null) {

	$user = $_SESSION['user_id'];
	$sql = " SELECT * FROM user WHERE acct_id = '$user' ";
 	$run = mysqli_query($conn, $sql);
 	$result = $run->fetch_array(MYSQLI_ASSOC);

 	if ($result['status'] == 2) {
 		$_SESSION['status'] = "Complete registration to verify your account";
 		header('location: ../user/user-data.php');

 	} elseif ($result['status'] == 0){

 		header('location: blocked.php');

 	} elseif ($result['status'] == 3){
 	    
 	    function get_ip() {
            global $ip;
            if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
            {
              $ip=$_SERVER['HTTP_CLIENT_IP'];
            }
            elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
            {
              $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            else
            {
              $ip=$_SERVER['REMOTE_ADDR'];
            }
            return $ip;
        }
    
        $user_ip = get_ip();
 	    
 	    $sql = "SELECT * FROM user WHERE acct_id = '$user'";
        $run = mysqli_query($conn, $sql);
        $u = $run->fetch_array(MYSQLI_ASSOC);
 	    $user_1 = $u['first_name'];
 	    $user_2 = $u['last_name'];
 		$sql_ = "INSERT INTO banned_ip (first_name, last_name, ip_address) VALUES ('$user_1', '$user_2', '$user_ip')";
 		$run_ = mysqli_query($conn, $sql_);
 		
 		if ($run_) {
 		    unset($_SESSION['user_id']);
 		    header('location: https://www.404.com/');
 		} else {
 		    $to = Admin_Email;
	        $subject = "Error with banned ip";
	        
	        $message = '
                <div style="background-color: rgb(175, 175, 175); padding: 30px;">
                    <div style="text-align: center; max-width: 500px; margin:auto; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); padding: 30px;">
                        <h6 style="text-align: center; background-color: rgb(175, 175, 175); padding: 15px; margin: 6px -12px;">Notification</h6>
                        <center>
                            <img src="https://'.DOMAIN.'/uploads/'.LOGO.'" width="100%" height="180" alt="LOGO">
                        </center>
                        <h4>Hello Admin</h4><br>
                        <p style="color: red;">ALERT!!</p>
                        <p>An banned ip error in your codes.</p>
                        <br>
                        <br>
                        <p style="text-align: center; font-size: 10px;">&copy; '.NAME.', '.date('Y').'</p>
                    </div>
                </div>
	        ';
	        
	        // Always set content-type when sending HTML email
	        $headers = "MIME-Version: 1.0" . "\r\n";
	        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	        
	        // More headers
	        $headers .= 'From:'.NAME.' <'.EMAIL.'>' . "\r\n";
	        
	        mail($to,$subject,$message,$headers);
 		}
 	
 	
 	} else {
 	    
 	}
}


$user = $_SESSION['user_id'];
$c_date = date('Y-m-d h:i:s');
$sql = "SELECT * FROM trade WHERE user = '$user' ORDER BY id DESC";
$run = mysqli_query($conn, $sql);
$result = $run->fetch_array(MYSQLI_ASSOC);
if ($run && isset($result['id'])) {
	$e_date = date('Y-m-d h:i:s', strtotime($result['end_date']));

	if ($result['wth_trade'] == 0 && $result['id'] != null) {
		$id = $result['id'];
		if ($c_date > $e_date) {
			$sql = "UPDATE trade SET status = 2, wth_trade = 1 WHERE id = '$id'";
			$run_p = mysqli_query($conn, $sql);
			$profit = $result['profit'];
			$trade_amt = $result['amount'];
		// 	$trx_id = $result['trx_id'];
				
			if ($run_p) {
				$sql = "SELECT * FROM user WHERE acct_id = '$user'";
				$run = mysqli_query($conn, $sql);
				$row = $run->fetch_array(MYSQLI_ASSOC);
				
				$new_profit = $row['profit'] + $profit;
				$new_bal = $row['balance'] + $trade_amt;
				
				$sql = "UPDATE user SET profit = '$new_profit', balance = '$new_bal' WHERE acct_id = '$user'";
				$run = mysqli_query($conn, $sql);
				
				if ($run) {
				//   echo 'Success';
				//email to user
				$email = $row['email'];
				
				$to = $email;
					$subject = "Trade Alert";
					
					$message = '
						<div style="background-color: rgb(175, 175, 175); padding: 30px;">
							<div style="text-align: center; max-width: 500px; margin:auto; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); padding: 30px;">
								<h6 style="text-align: center; background-color: rgb(175, 175, 175); padding: 15px; margin: 6px -12px;">Notification</h6>
								<center>
									<img src="https://'.DOMAIN.'/uploads/'.LOGO.'" width="100%" height="180" alt="LOGO">
								</center>
								<h4>Hello '.$row['first_name'].' '.$row['last_name'].'</h4><br>
								<p style="color: red;">ALERT!!</p>
								<p>Your Automated Trading session was successful and your profit has been added to your account.</p>
								<br>
								<br>
								<p style="text-align: center; font-size: 10px;">&copy; '.NAME.', '.date('Y').'</p>
							</div>
						</div>
					';
					
					// Always set content-type when sending HTML email
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					
					// More headers
					$headers .= 'From:'.NAME.' <'.EMAIL.'>' . "\r\n";
					
					mail($to,$subject,$message,$headers);
				} else {
				//   echo 'Error';
				}
			} else {
				// echo 'error';
			}
		
		} elseif ($c_date < $e_date) {
			$sql = "UPDATE trade SET status = 1 WHERE id = '$id'";
			$run_p = mysqli_query($conn, $sql);
		}

	} else {
		// echo $e_date;
		// echo '<br>';
		// echo $ae_date;
		// echo '<br>';
		// echo $c_date;
	}
} else {
	
}


	
?>