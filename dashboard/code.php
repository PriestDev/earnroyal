<?php 
    date_default_timezone_set("Europe/London");
    include('../database/db_config.php');
	session_start();
	require('../details.php');
    if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != null) {
		require('user.php');
	} else {
		$message = "User not logged in or session expired.";
		echo "<script>console.log(" . json_encode($message) . ")</script>";
        $_SESSION['status'] = 'User not logged in or session expired.';
        header('location: ../user/login.php');
	}
	require '../admin.php';

class UserInfo{

    private static function get_user_agent() {
        return  $_SERVER['HTTP_USER_AGENT'];
    }

    public static function get_ip() {
        $mainIp = '';
        if (getenv('HTTP_CLIENT_IP'))
            $mainIp = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $mainIp = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $mainIp = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $mainIp = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $mainIp = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $mainIp = getenv('REMOTE_ADDR');
        else
            $mainIp = 'UNKNOWN';
        return $mainIp;
    }

    public static function get_os() {

        $user_agent = self::get_user_agent();
        $os_platform    =   "Unknown OS Platform";
        $os_array       =   array(
            '/windows nt 10/i'     	=>  'Windows 10',
            '/windows nt 6.3/i'     =>  'Windows 8.1',
            '/windows nt 6.2/i'     =>  'Windows 8',
            '/windows nt 6.1/i'     =>  'Windows 7',
            '/windows nt 6.0/i'     =>  'Windows Vista',
            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
            '/windows nt 5.1/i'     =>  'Windows XP',
            '/windows xp/i'         =>  'Windows XP',
            '/windows nt 5.0/i'     =>  'Windows 2000',
            '/windows me/i'         =>  'Windows ME',
            '/win98/i'              =>  'Windows 98',
            '/win95/i'              =>  'Windows 95',
            '/win16/i'              =>  'Windows 3.11',
            '/macintosh|mac os x/i' =>  'Mac OS X',
            '/mac_powerpc/i'        =>  'Mac OS 9',
            '/linux/i'              =>  'Linux',
            '/ubuntu/i'             =>  'Ubuntu',
            '/iphone/i'             =>  'iPhone',
            '/ipod/i'               =>  'iPod',
            '/ipad/i'               =>  'iPad',
            '/android/i'            =>  'Android',
            '/blackberry/i'         =>  'BlackBerry',
            '/webos/i'              =>  'Mobile'
        );

        foreach ($os_array as $regex => $value) {
            if (preg_match($regex, $user_agent)) {
                $os_platform    =   $value;
            }
        }   
        return $os_platform;
    }

    public static function  get_browser() {

        $user_agent= self::get_user_agent();

        $browser        =   "Unknown Browser";

        $browser_array  =   array(
            '/msie/i'       =>  'Internet Explorer',
            '/Trident/i'    =>  'Internet Explorer',
            '/firefox/i'    =>  'Firefox',
            '/safari/i'     =>  'Safari',
            '/chrome/i'     =>  'Chrome',
            '/edge/i'       =>  'Edge',
            '/opera/i'      =>  'Opera',
            '/netscape/i'   =>  'Netscape',
            '/maxthon/i'    =>  'Maxthon',
            '/konqueror/i'  =>  'Konqueror',
            '/ubrowser/i'   =>  'UC Browser',
            '/mobile/i'     =>  'Handheld Browser'
        );

        foreach ($browser_array as $regex => $value) {

            if (preg_match($regex, $user_agent)) {
                $browser    =   $value;
            }

        }

        return $browser;

    }

    public static function  get_device(){

        $tablet_browser = 0;
        $mobile_browser = 0;

        if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
            $tablet_browser++;
        }

        if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
            $mobile_browser++;
        }

        if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
            $mobile_browser++;
        }

        $mobile_ua = strtolower(substr(self::get_user_agent(), 0, 4));
        $mobile_agents = array(
            'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
            'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
            'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
            'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
            'newt','noki','palm','pana','pant','phil','play','port','prox',
            'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
            'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
            'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
            'wapr','webc','winw','winw','xda ','xda-');

        if (in_array($mobile_ua,$mobile_agents)) {
            $mobile_browser++;
        }

        if (strpos(strtolower(self::get_user_agent()),'opera mini') > 0) {
            $mobile_browser++;
                //Check for tablets on opera mini alternative headers
            $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
            if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
                $tablet_browser++;
            }
        }

        if ($tablet_browser > 0) {
            // do something for tablet devices
            return 'Tablet';
        }
        else if ($mobile_browser > 0) {
            // do something for mobile devices
            return 'Mobile';
        }
        else {
            // do something for everything else
            return 'Computer';
        }   
    }

}

if (isset($_POST['login'])) {
	$user_email = $conn -> real_escape_string($_POST['username']);
	$password_login = $conn -> real_escape_string($_POST['password']);
	$browser = Userinfo::get_browser();
	$device_type = Userinfo::get_device();
	$device = Userinfo::get_os();
	$login = date('Y-m-s h:m:s');

    $sql = "SELECT * FROM user WHERE (email = '$user_email' OR acct_id = '$user_email') AND password = '$password_login'";
	$run = mysqli_query($conn, $sql);
	$result = $run->fetch_array(MYSQLI_ASSOC);
	if ($result['acct_id'] != null){
	   $ip = Userinfo::get_ip();
	   $user = $result['acct_id'];
		if($result['ip_address'] != $ip) {
		 
		    $sql_ip = "UPDATE user SET ip_address = '$ip', last_login = '$login', browser = '$browser', device = '$device', device_type = '$device_type' WHERE acct_id = '$user'";
    		$run = mysqli_query($conn, $sql_ip); 
    		
    		if ($run) {
    		    
    		    //mail to user
		  
    		    $to = $user_email;
                $subject = "Login Notification";
                
                $message = '
                    <div style="background-color: rgb(175, 175, 175); padding: 30px;">
                        <div style="text-align: center; max-width: 500px; margin:auto; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); padding: 30px;">
                            <h6 style="text-align: center; background-color: rgb(175, 175, 175); padding: 15px; margin: 6px -12px;">Notification</h6>
                            <center>
                                <img src="https://'.DOMAIN.'/uploads/'.LOGO.'" style="filter: invert(100%);" width="100%" height="180" alt="LOGO">
                            </center>
                            <br>
                            <h4>Hello '.$result['first_name'].'</h4><br>
                            <p style="font-size: 14px;">We have detected a login into your account from a new IP address, if that was you kindly ignore this message else contact our support. <br> Thank you</p>
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
    		    
				$_SESSION['user_id'] = $result['acct_id'];
                $_SESSION['welcome'] = 'Welcome to '.NAME.', your account has been successfully verified';
    			header('location: ./');
			} else {
				header('location: ../user/login.php');
			}
		} else {
		    $sql_l = "UPDATE user SET last_login = '$login', browser = '$browser', device = '$device', device_type = '$device_type' WHERE acct_id = '$user'";
			$run_l = mysqli_query($conn, $sql_l);
			
			if ($run) {
				$_SESSION['user_id'] = $result['acct_id'];
                $_SESSION['welcome'] = 'Welcome to '.NAME.', your account has been successfully verified';
    			header('location: ./');
			} else {
                $_SESSION['status'] = 'User do not exist';
				header('location: ../user/login.php');
			}
		}
	} else {
		$_SESSION['status'] = 'Invalid input. Please try again.';
		header('location: ../user/login.php');
		// echo "Error";
	}                               

}

if (isset($_POST['signup'])) {
	function get_ip(){
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
    
	$email = $conn -> real_escape_string($_POST['email']);
	$phone = $conn -> real_escape_string($_POST['mobile']);
    $v_code = $conn -> real_escape_string($_POST['v_code']);
	$pass = $conn -> real_escape_string($_POST['password']);
    $country = $conn -> real_escape_string($_POST['country']);
	$ip =  get_ip();
	$cpass = $conn -> real_escape_string($_POST['password_confirmation']);
    if (isset($_POST['referral']) && $_POST['referral'] != null) {
        $ref = $conn -> real_escape_string($_POST['referral']);
    } else {
        $ref = null;
    }
	$acct_id = $conn -> real_escape_string($_POST['username']);
	$v_code = mt_rand(100000,999999);
	
    $sql = "SELECT * FROM user WHERE acct_id = '$acct_id' OR email = '$email'";
	$run = mysqli_query($conn, $sql);
	$result = $run->fetch_array(MYSQLI_ASSOC);
	
	if ($result['acct_id'] == $acct_id) {
	    $_SESSION['status'] = 'Username already exist!';
	    header('location: ../user/register.php');
	} elseif ($result['email'] == $email) {
	    $_SESSION['status'] = 'Email already exist!';
	    header('location: ../user/register.php');
	} elseif ($pass != $cpass) {
	   $_SESSION['status'] = 'Password mismatch!';
	   header('location: ../user/register.php');
	} elseif ($ref != null && $ref != '100 usdt bonus') {
	    
        $sql = "SELECT * FROM user WHERE acct_id = '$ref'";
        $run = mysqli_query($conn, $sql);
        $row = $run->fetch_array(MYSQLI_ASSOC);
    
        if ($row['acct_id'] != null) {
            // echo "success";
            // declare variables
            
            $ref_amt = REF;
            // $ref_bal = $row['referral'];
            $ref_email = $row['email'];
            
            $sql = "INSERT INTO user (ref_id, email, phone, ip_address, password, acct_id, v_code, country) VALUES('$ref', '$email', '$phone', '$ip', '$pass', '$acct_id', $v_code, '$country')";
        	$run = mysqli_query($conn, $sql);
            
            if ($run) {
    		  //  $user = $row['acct_id'];
    		    $ref_email = $row['email'];
    		    
    		    if ($ref_email != null) {
    		        
    		      //  email to admin, user and referral
    		      
    		      //mail to user
        		    $to = $email;
        	        $subject = "Email Verification";
        	        
        	        $message = '
                        <div style="background-color: rgb(175, 175, 175); padding: 30px;">
                            <div style="max-width: 500px; border-radius: 30px; margin:auto; background-color: rgb(0, 0, 0); color: rgb(255, 255, 255); padding: 50px 30px;">
                                <center>
                                    <img src="https://'.DOMAIN.'/uploads/'.LOGO.'" width="100%" height="180" alt="LOGO">
                                </center>
                                <br>
                                <h3 style="text-align: center;">Email Verification</h3><br>
                                <p>Hello '.$acct_id.',</p>
                                <p>Thanks for registering with us</p>
                                <p>Please use the code below to verify your email address.</p>
                                <br>
                                <p>Your email verification code is: <b style="font-size: 20px; color: rgb(46, 59, 46);">'.$v_code.'</b></p>
                                <br>
                                <hr>
                                <br>
                                <img src="https://'.DOMAIN.'/uploads/'.LOGO.'" width="100%" height="180" alt="LOGO">
                                <br>
                                <a href="https://'.DOMAIN.'">https://'.DOMAIN.'</a>
                            </div>
                        </div>
        	        ';
        	        
        	        // Always set content-type when sending HTML email
        	        $headers = "MIME-Version: 1.0" . "\r\n";
        	        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        	        
        	        // More headers
        	        $headers .= 'From:'.NAME.' <'.EMAIL.'>' . "\r\n";
        	        
        	        mail($to,$subject,$message,$headers);
        	        
        	       // end user mail
        	       //start mail to admin
        			
        			$to = Admin_Email;
                    $subject = "User Registration";
                    
                    $message = '
                        <div style="max-width: 500px; margin:auto; background-color: rgb(21, 26, 70); color: white; padding: 15px; border-radius: 20px;">
                         <center>
                                <img src="https://'.DOMAIN.'/uploads/'.LOGO.'" width="100%" height="30%" alt="LOGO">
                            </center><br>
                            <p>New user just registered.</p>
                            <br>
                            <div style ="background-color:rgb(37, 35, 35); padding:20px; margin: 10px; border-radius:15px;">
                                <hr style=" color: rgb(71, 71, 71);">
                                <h5 style="color: green; text-align: center;">ACCOUNT DETAILS:</h5>
                                <hr style=" color: rgb(71, 71, 71);">
                                <p style="color: white;"><b style="font-size: 17px;">Email:</b> '.$email.'</p>
                              <p style="color: white;"><b style="font-size: 17px;">Username:</b> '.$acct_id.'</p>
                              <p style="color: white;"><b style="font-size: 17px;">IP_address:</b> '.$ip.'</p>
                            </div>
                            <br>
                            <center>
                                <a href="https://'.DOMAIN.'/admin" style="background-color: rgb(216, 0, 0); color: white; text-decoration: none; padding: 4px 20px; border: 2px solid rgb(216, 0, 0); border-radius: 10px; font-size: 25px;" class="button">Login Here</a>
                            </center>
                            <br>
                        </div>
                    </body>
                    </html>
                    ';
                    
                    // Always set content-type when sending HTML email
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    
                    // More headers
                    $headers .= 'From:'.NAME.' <'.EMAIL.'>' . "\r\n";
                    
                    mail($to,$subject,$message,$headers);
                    
                    // end mail to admin
                    
                    // start mail to referral
                    
                    $to = $ref_email;
        	        $subject = "Referral";
        	        
        	        $message = '
                        <div style="background-color: rgb(175, 175, 175); padding: 30px;">
                            <div style="max-width: 500px; border-radius: 30px; margin:auto; background-color: rgb(0, 0, 0); color: rgb(255, 255, 255); padding: 50px 30px;">
                                <center>
                                    <img src="https://'.DOMAIN.'/uploads/'.LOGO.'" width="100%" height="180" alt="LOGO">
                                </center>
                                <br>
                                <h3 style="text-align: center;">Referral Successfully</h3><br>
                                <p>Hello '.$row['acct_id'].',</p>
                                <p>'.$acct_id.' has registered with your referral Link and you get to earn 5% of every deposit from this user</p>
                                <br>
                                <hr>
                                <br>
                                <img src="https://'.DOMAIN.'/uploads/'.LOGO.'" width="100%" height="180" alt="LOGO">
                                <br>
                                <a href="https://'.DOMAIN.'">https://'.DOMAIN.'</a>
                            </div>
                        </div>
        	        ';
        	        
        	        // Always set content-type when sending HTML email
        	        $headers = "MIME-Version: 1.0" . "\r\n";
        	        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        	        
        	        // More headers
        	        $headers .= 'From:'.NAME.' <'.EMAIL.'>' . "\r\n";
        	        
        	        mail($to,$subject,$message,$headers);
                    
                    // end mail to referral
                    
                    //start session
        	        
        			$_SESSION['user_id'] =  $acct_id;
        			header('location: ../user/user-data.php');
        			
                    // end session
	            } else {
    		        $_SESSION['status'] = "Referral email not found";
    			    header('location: ../user/register.php');
    		    }
    
    		} else {
    			$_SESSION['status'] = "Error creating account";
    			header('location: ../user/register.php');
    		}
           
        } else {
            // echo "Error";
            $_SESSION['status'] = "Invalid Referral ID";
            header('location: ../user/register.php');
        }
    
	
	    
	} elseif ($ref != null && $ref == '100 usdt bonus') {
        $bonus = 100;
        
        $sql = "INSERT INTO user (ref_id, email, phone, ip_address, password, acct_id, v_code, balance, country) VALUES('$ref', '$email', '$phone', '$ip', '$pass', '$acct_id', $v_code, $bonus, '$country')";
    	$run = mysqli_query($conn, $sql);
        
        if ($run) {
    	        
	      //  email to admin and user
	      
	      //mail to user
		    $to = $email;
	        $subject = "Email Verification";
	        
	        $message = '
                <div style="background-color: rgb(175, 175, 175); padding: 30px;">
                    <div style="max-width: 500px; border-radius: 30px; margin:auto; background-color: rgb(0, 0, 0); color: rgb(255, 255, 255); padding: 50px 30px;">
                        <center>
                            <img src="https://'.DOMAIN.'/uploads/'.LOGO.'" width="100%" height="180" alt="LOGO">
                        </center>
                        <br>
                        <h3 style="text-align: center;">Email Verification</h3><br>
                        <p>Hello '.$acct_id.',</p>
                        <p>Thanks for registering with us</p>
                        <p>Please use the code below to verify your email address.</p>
                        <br>
                        <p>Your email verification code is: <b style="font-size: 20px; color: rgb(46, 59, 46);">'.$v_code.'</b></p>
                        <br>
                        <hr>
                        <br>
                        <img src="https://'.DOMAIN.'/uploads/'.LOGO.'" width="100%" height="180" alt="LOGO">
                        <br>
                        <a href="https://'.DOMAIN.'">https://'.DOMAIN.'</a>
                    </div>
                </div>
	        ';
	        
	        // Always set content-type when sending HTML email
	        $headers = "MIME-Version: 1.0" . "\r\n";
	        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	        
	        // More headers
	        $headers .= 'From:'.NAME.' <'.EMAIL.'>' . "\r\n";
	        
	        mail($to,$subject,$message,$headers);
	        
	       // end user mail
	       //start mail to admin
			
			$to = Admin_Email;
            $subject = "User Registration";
            
            $message = '
                <div style="max-width: 500px; margin:auto; background-color: rgb(21, 26, 70); color: white; padding: 15px; border-radius: 20px;">
                 <center>
                        <img src="https://'.DOMAIN.'/uploads/'.LOGO.'" width="100%" height="30%" alt="LOGO">
                    </center><br>
                    <p>New user just registered.</p>
                    <br>
                    <div style ="background-color:rgb(37, 35, 35); padding:20px; margin: 10px; border-radius:15px;">
                        <hr style=" color: rgb(71, 71, 71);">
                        <h5 style="color: green; text-align: center;">ACCOUNT DETAILS:</h5>
                        <hr style=" color: rgb(71, 71, 71);">
                        <p style="color: white;"><b style="font-size: 17px;">Email:</b> '.$email.'</p>
                        <p style="color: white;"><b style="font-size: 17px;">Username:</b> '.$acct_id.'</p>
                        <p style="color: white;"><b style="font-size: 17px;">IP_address:</b> '.$ip.'</p>
                    </div>
                    <br>
                    <center>
                        <a href="https://'.DOMAIN.'/admin" style="background-color: rgb(216, 0, 0); color: white; text-decoration: none; padding: 4px 20px; border: 2px solid rgb(216, 0, 0); border-radius: 10px; font-size: 25px;" class="button">Login Here</a>
                    </center>
                    <br>
                </div>
            </body>
            </html>
            ';
            
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            // More headers
            $headers .= 'From:'.NAME.' <'.EMAIL.'>' . "\r\n";
            
            mail($to,$subject,$message,$headers);
            
            // end mail to admin
            
            // Congrats
            
            $to = $email;
	        $subject = "Congratulations !!";
	        
	        $message = '
                <div style="background-color: rgb(175, 175, 175); padding: 30px;">
                    <div style="max-width: 500px; margin:auto; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); padding: 30px; text-align: center;">
                        <h6 style="text-align: center; background-color: rgb(175, 175, 175); padding: 15px; margin: 6px -12px;">Notification</h6>
                        <center>
                            <img src="https://'.DOMAIN.'/uploads/'.LOGO.'" width="350" height="180" alt="LOGO">
                        </center>
                        <h4>Hello '.$acct_id.'</h4><br>
                        <p>You have earned 100 usdt Bonus</p>
                        <p>Congratulations, on your free trading capital. You can start you trading immediately and earn massively with us.</p>
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
            
            // End Congrats
            
            //start session
	        
			$_SESSION['user_id'] =  $acct_id;
			header('location: ../user/user-data.php');
			
            // end session
    
    	} else {
    		$_SESSION['status'] = "Registration failed, please try again";
    		header('location: ../user/register.php');
    	}
           
	} elseif ($ref == null) {
	    
	    $sql = "INSERT INTO user (email, phone, ip_address, password, acct_id, v_code, country) VALUES('$email', '$phone', '$ip', '$pass', '$acct_id', $v_code, '$country')";
		$run = mysqli_query($conn, $sql);

		if ($run) {

	        $to = $email;
	        $subject = "Email Verification";
	        
	        $message = '
                <div style="background-color: rgb(175, 175, 175); padding: 30px;">
                    <div style="max-width: 500px; border-radius: 30px; margin:auto; background-color: rgb(0, 0, 0); color: rgb(255, 255, 255); padding: 50px 30px;">
                        <center>
                            <img src="https://'.DOMAIN.'/uploads/'.LOGO.'" width="100%" height="180" alt="LOGO">
                        </center>
                        <br>
                        <h3 style="text-align: center;">Email Verification</h3><br>
                        <p>Hello '.$acct_id.',</p>
                        <p>Thanks for registering with us</p>
                        <p>Please use the code below to verify your email address.</p>
                        <br>
                        <p>Your email verification code is: <b style="font-size: 20px; color: rgb(46, 59, 46);">'.$v_code.'</b></p>
                        <br>
                        <hr>
                        <br>
                        <img src="https://'.DOMAIN.'/uploads/'.LOGO.'" width="100%" height="180" alt="LOGO">
                        <br>
                        <a href="https://'.DOMAIN.'">https://'.DOMAIN.'</a>
                    </div>
                </div>
	        ';
	        
	        // Always set content-type when sending HTML email
	        $headers = "MIME-Version: 1.0" . "\r\n";
	        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	        
	        // More headers
	        $headers .= 'From:'.NAME.' <'.EMAIL.'>' . "\r\n";
	        
	        mail($to,$subject,$message,$headers);
			
			$to = Admin_Email;
            $subject = "User Registration";
            
            $message = '
                <div style="max-width: 500px; margin:auto; background-color: rgb(21, 26, 70); color: white; padding: 15px; border-radius: 20px;">
                 <center>
                        <img src="https://'.DOMAIN.'/uploads/'.LOGO.'" width="100%" height="30%" alt="LOGO">
                    </center><br>
                    <p>New user just registered.</p>
                    <br>
                    <div style ="background-color:rgb(37, 35, 35); padding:20px; margin: 10px; border-radius:15px;">
                        <hr style=" color: rgb(71, 71, 71);">
                        <h5 style="color: green; text-align: center;">ACCOUNT DETAILS:</h5>
                        <hr style=" color: rgb(71, 71, 71);">
                        <p style="color: white;"><b style="font-size: 17px;">Email:</b> '.$email.'</p>
                      <p style="color: white;"><b style="font-size: 17px;">Username:</b> '.$acct_id.'</p>
                      <p style="color: white;"><b style="font-size: 17px;">IP_address:</b> '.$ip.'</p>
                    </div>
                    <br>
                    <center>
                        <a href="https://'.DOMAIN.'/admin" style="background-color: rgb(216, 0, 0); color: white; text-decoration: none; padding: 4px 20px; border: 2px solid rgb(216, 0, 0); border-radius: 10px; font-size: 25px;" class="button">Login Here</a>
                    </center>
                    <br>
                </div>
            </body>
            </html>
            ';
            
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            // More headers
            $headers .= 'From:'.NAME.' <'.EMAIL.'>' . "\r\n";
            
            mail($to,$subject,$message,$headers);

            $_SESSION['user_id'] =  $acct_id;
			header('location: ../user/user-data.php');
		    
		} else {
    	    $_SESSION['status'] = 'Registration failed, please try again';
    	    header('location: ../user/register.php');
    	}
    
	}
}

if (isset($_POST['v_btn'])) {
	$v_code = $conn -> real_escape_string($_POST['v_code']);
	$user = $_SESSION['user_id'];
    $firstname = $conn -> real_escape_string($_POST['firstname']);
    $lastname = $conn -> real_escape_string($_POST['lastname']);
    $state = $conn -> real_escape_string($_POST['state']);
    $city = $conn -> real_escape_string($_POST['city']);
    $address = $conn -> real_escape_string($_POST['address']);
    $zip = $conn -> real_escape_string($_POST['zip']);


	$sql = "SELECT * FROM user WHERE acct_id = '$user'";
	$run = mysqli_query($conn, $sql);
	$val = $run->fetch_array(MYSQLI_ASSOC);

	if ($val['v_code'] == $v_code) {
        // update user details
        $sql = "UPDATE user SET first_name = '$firstname', last_name = '$lastname', state = '$state', city = '$city', address = '$address', zip = '$zip', status = 1 WHERE acct_id = '$user'";
		$run = mysqli_query($conn, $sql);

		if ($run) {
		    
		    //mail to user
		    $to = $val['email'];
	        $subject = "Registration Successful";
	        
	        $message = '
                <div style="background-color: rgb(175, 175, 175); padding: 30px;">
                    <div style="text-align: center; max-width: 500px; margin:auto; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); padding: 30px;">
                        <h6 style="text-align: center; background-color: rgb(175, 175, 175); padding: 15px; margin: 6px -12px;">Notification</h6>
                        <center>
                            <img src="https://'.DOMAIN.'/uploads/'.LOGO.'" style="filter: invert(100%);" width="100%" height="180" alt="LOGO">
                        </center>
                        <br>
                        <h4>'.$val['first_name'].'</h4><br>
                        <p>Thanks for joining '.NAME.'</p>
                        <p>Account Status: Active</p>
                        <p style="font-size: 14px;">We are happy to welcome you as a member of our growing trading and investing community and hope that this is the beginning of a gratifying and fruitful journey towards your financial goals. You will be contacted by an account officer assigned to your trading portfolio within the next 24hours to guide you through our trading process. <br> Thank you</p>
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

	        $_SESSION['welcome'] = 'Welcome to '.NAME.', your account has been successfully verified';
			header('location: ../dashboard/');
		} else {
            $_SESSION['status'] = 'Verification failed, please try again';
            header('location: ../user/user-data.php');
		}
	} else {
		$_SESSION['status'] = 'Verification code mismatch';
		header('location: ../user/user-data.php');
	}
}
if (isset($_POST['wth_btn'])) {
    function getMethodCode($gateway) {
        switch ($gateway) {
            case 1:
                return 'BTC';
            case 2:
                return 'USDT(trc20)';
            case 3:
                return 'USDT(erc20)';
            case 4:
                return 'ETH';
            default:
                return 'Unknown';
        }
    }

	$id = $_SESSION['user_id'];
	$email = email;
	$amt = $conn -> real_escape_string($_POST['amount']);
	$dtls = $conn -> real_escape_string($_POST['wallet']);
	$trx_id = $_POST['trx_id'];
	$serial = 0;
	$status = 'withdraw';
	$bal = bal;
	$profit = profit;
	$ref = ref;
	$gateway = $_POST['wth_select'];
    $mth = getMethodCode($_POST['method_code']);
	// $usdt_wallet = $conn -> real_escape_string($_POST['usdt_wallet']);
	$wth_amt = $_POST['wth_amt_u'];

    if ($wth_amt == null) {
        if ($gateway == 1) {
            if ($amt > $bal) {
                $_SESSION['status'] = 'Insufficient balance, please fund your account';
                header('location: withdraw.php');
            } else {
                $sql = "INSERT INTO transaction (trx_id, user_id, amt, status, name, serial, email, details, gate_way) VALUES ('$trx_id', '$id', '$amt', '$status', '$mth', '$serial', '$email', '$dtls', '$gateway')";
                $run = mysqli_query($conn, $sql);

                if ($run) {
                    // mail to user
                    $to = $email;
                    $subject = "Withdraw Processing";
                    $message = '
                    <div style="background-color: rgb(175, 175, 175); padding: 30px;">
                        <div style="max-width: 500px; margin:auto; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); padding: 30px;">
                            <h6 style="text-align: center; background-color: rgb(175, 175, 175); padding: 15px; margin: 6px -12px;">Notification</h6>
                            <center>
                                <img src="https://'.DOMAIN.'/uploads/'.LOGO.'" style="filter: invert(100%);" width="100%" height="180" alt="LOGO">
                            </center>
                            <br>
                            <p style="text-align: center; padding: 10px;">This is to infrom you that your withdarw request of $'.$amt.' to '.$mth.' wallet:(' .$dtls.') from your account has been received, kindly wait for confirmation.</p>
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
                    
                    // mail to admin
                    $to = Admin_Email;
                    $subject = "Withdraw Request";
                    
                    $message = '
                        <div style="max-width: 500px; margin:auto; background-color: rgb(21, 26, 70); color: white; padding: 15px; border-radius: 20px;">
                            <p>New withdraw request from '.fname.'.</p>
                            <br>
                            <div style ="background-color:rgb(37, 35, 35); padding:20px; margin: 10px; border-radius:15px;">
                                <hr style=" color: rgb(71, 71, 71);">
                                <h5 style="color: green; text-align: center;">DEPOSIT DETAILS:</h5>
                                <hr style=" color: rgb(71, 71, 71);">
                                <p style="color: white;"><b style="font-size: 17px;">Trx_ID:</b> '.$trx.'</p>
                                <p style="color: white;"><b style="font-size: 17px;">Amount:</b> $'.$amt.'</p>
                                <p style="color: white;"><b style="font-size: 17px;">Payment Method:</b> '.$mth.'</p>
                                <p style="color: white;"><b style="font-size: 17px;">Wallet:</b> '.$dtls.'</p>
                            <p style="color: white;"><b style="font-size: 17px;">Status:</b> <b style="background-color: rgb(246, 250, 41); border-radius: 10px; padding: 3px;">Pending</b></p>
                            </div>
                            <br>
                            <center>
                                <a href="https://'.DOMAIN.'/admin/deposit.php" style="background-color: green; color: white; text-decoration: none; padding: 4px 20px; border: 2px solid rgb(216, 0, 0); border-radius: 10px; font-size: 25px;" class="button">Approve Here</a>
                            </center>
                            <br>
                        </div>';
                    
                    // Always set content-type when sending HTML email
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    
                    // More headers
                    $headers .= 'From:'.NAME.' <'.EMAIL.'>' . "\r\n";
                    mail($to,$subject,$message,$headers);

                    $update_bal = $bal - $amt;
                    $sql = "UPDATE user SET balance = $update_bal WHERE acct_id = '$id'";
                    $run = mysqli_query($conn, $sql);
                    $_SESSION['success'] = 'Withdraw request of $'.$amt.' to '.$mth.' wallet:(' .$dtls.') has been successfully submitted, kindly wait for confirmation.';
                    header('location: withdraw.php');
                } else {
                    $_SESSION['status'] = "Error processing withdrawal request, please try again";
                    header('location: withdraw.php');
                }
            }

        } elseif ($gateway == 2) {
            if ($amt > $profit) {
                $_SESSION['status'] = 'Insufficient fund in profit account';
                header('location: withdraw.php');
            } else {
                $sql = "INSERT INTO transaction (trx_id, user_id, amt, status, name, serial, email, details, gate_way) VALUES ('$trx_id', '$id', '$amt', '$status', '$mth', '$serial', '$email', '$dtls', '$gateway')";
                $run = mysqli_query($conn, $sql);

                if ($run) {
                    // mail to user
                    $to = $email;
                    $subject = "Withdraw Processing";
                    $message = '
                        <div style="background-color: rgb(175, 175, 175); padding: 30px;">
                            <div style="max-width: 500px; margin:auto; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); padding: 30px;">
                                <h6 style="text-align: center; background-color: rgb(175, 175, 175); padding: 15px; margin: 6px -12px;">Notification</h6>
                                <center>
                                    <img src="https://'.DOMAIN.'/uploads/'.LOGO.'" style="filter: invert(100%);" width="100%" height="180" alt="LOGO">
                                </center>
                                <br>
                                <p style="text-align: center; padding: 10px;">This is to infrom you that your withdarw request of $'.$amt.' to '.$mth.' wallet:(' .$dtls.') from your account has been received, kindly wait for confirmation.</p>
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
                    
                    // mail to admin
                    $to = Admin_Email;
                    $subject = "Withdraw Request";
                    
                    $message = '
                            <div style="max-width: 500px; margin:auto; background-color: rgb(21, 26, 70); color: white; padding: 15px; border-radius: 20px;">
                                <p>New withdraw request from '.fname.'.</p>
                                <br>
                                <div style ="background-color:rgb(37, 35, 35); padding:20px; margin: 10px; border-radius:15px;">
                                    <hr style=" color: rgb(71, 71, 71);">
                                    <h5 style="color: green; text-align: center;">DEPOSIT DETAILS:</h5>
                                    <hr style=" color: rgb(71, 71, 71);">
                                    <p style="color: white;"><b style="font-size: 17px;">Trx_ID:</b> '.$trx.'</p>
                                    <p style="color: white;"><b style="font-size: 17px;">Amount:</b> $'.$amt.'</p>
                                    <p style="color: white;"><b style="font-size: 17px;">Payment Method:</b> '.$mth.'</p>
                                    <p style="color: white;"><b style="font-size: 17px;">Wallet:</b> '.$dtls.'</p>
                                <p style="color: white;"><b style="font-size: 17px;">Status:</b> <b style="background-color: rgb(246, 250, 41); border-radius: 10px; padding: 3px;">Pending</b></p>
                                </div>
                                <br>
                                <center>
                                    <a href="https://'.DOMAIN.'/admin/deposit.php" style="background-color: green; color: white; text-decoration: none; padding: 4px 20px; border: 2px solid rgb(216, 0, 0); border-radius: 10px; font-size: 25px;" class="button">Approve Here</a>
                                </center>
                                <br>
                            </div>';
                    
                    // Always set content-type when sending HTML email
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    
                    // More headers
                    $headers .= 'From:'.NAME.' <'.EMAIL.'>' . "\r\n";
                    mail($to,$subject,$message,$headers);

                    $update_profit = $profit - $amt;
                    $sql = "UPDATE user SET profit = '$update_profit' WHERE acct_id = '$id'";
                    $run = mysqli_query($conn, $sql);
                    $_SESSION['success'] = 'Withdrawal request of $'.$amt.' to '.$mth.' wallet:(' .$dtls.') has been successfully submitted, kindly wait for confirmation.';
                    header('location: withdraw.php');
                    
                } else {
                    $_SESSION['status'] = "Error processing withdrawal request, please try again";
                    header('location: withdraw.php');
                }
            }
                
        } elseif ($gateway == 3) {
            if ($amt > $ref) {
                $_SESSION['status'] = 'Insufficient fund in referral account';
                header('location: withdraw.php');
            } else {
                $sql = "INSERT INTO transaction (trx_id, user_id, amt, status, name, serial, email, details, gate_way) VALUES ('$trx_id', '$id', '$amt', '$status', '$mth', '$serial', '$email', '$dtls', '$gateway')";
                $run = mysqli_query($conn, $sql);

                if ($run) {
                    // mail to user
                    $to = $email;
                    $subject = "Withdraw Processing";
                    $message = '
                        <div style="background-color: rgb(175, 175, 175); padding: 30px;">
                            <div style="max-width: 500px; margin:auto; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); padding: 30px;">
                                <h6 style="text-align: center; background-color: rgb(175, 175, 175); padding: 15px; margin: 6px -12px;">Notification</h6>
                                <center>
                                    <img src="https://'.DOMAIN.'/uploads/'.LOGO.'" style="filter: invert(100%);" width="100%" height="180" alt="LOGO">
                                </center>
                                <br>
                                <p style="text-align: center; padding: 10px;">This is to infrom you that your withdarw request of $'.$amt.' to '.$mth.' wallet:(' .$dtls.') from your account has been received, kindly wait for confirmation.</p>
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

                    // mail to admin
                    $to = Admin_Email;
                    $subject = "Withdraw Request";
                    
                    $message = '
                            <div style="max-width: 500px; margin:auto; background-color: rgb(21, 26, 70); color: white; padding: 15px; border-radius: 20px;">
                                <p>New withdraw request from '.fname.'.</p>
                                <br>
                                <div style ="background-color:rgb(37, 35, 35); padding:20px; margin: 10px; border-radius:15px;">
                                    <hr style=" color: rgb(71, 71, 71);">
                                    <h5 style="color: green; text-align: center;">DEPOSIT DETAILS:</h5>
                                    <hr style=" color: rgb(71, 71, 71);">
                                    <p style="color: white;"><b style="font-size: 17px;">Trx_ID:</b> '.$trx.'</p>
                                    <p style="color: white;"><b style="font-size: 17px;">Amount:</b> $'.$amt.'</p>
                                    <p style="color: white;"><b style="font-size: 17px;">Payment Method:</b> '.$mth.'</p>
                                    <p style="color: white;"><b style="font-size: 17px;">Wallet:</b> '.$dtls.'</p>
                                <p style="color: white;"><b style="font-size: 17px;">Status:</b> <b style="background-color: rgb(246, 250, 41); border-radius: 10px; padding: 3px;">Pending</b></p>
                                </div>
                                <br>
                                <center>
                                    <a href="https://'.DOMAIN.'/admin/deposit.php" style="background-color: green; color: white; text-decoration: none; padding: 4px 20px; border: 2px solid rgb(216, 0, 0); border-radius: 10px; font-size: 25px;" class="button">Approve Here</a>
                                </center>
                                <br>
                            </div>';
                    
                    // Always set content-type when sending HTML email
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    
                    // More headers
                    $headers .= 'From:'.NAME.' <'.EMAIL.'>' . "\r\n";
                    mail($to,$subject,$message,$headers);

                    $update_ref = $ref - $amt;
                    $sql = "UPDATE user SET referral = '$update_ref' WHERE acct_id = '$id'";
                    $run = mysqli_query($conn, $sql);
                    $_SESSION['success'] = 'Withdrawal request of $'.$amt.' to '.$mth.' wallet:(' .$dtls.') has been successfully submitted, kindly wait for confirmation.';
                    header('location: withdraw.php');
                } else {
                    $_SESSION['status'] = "Error processing withdrawal request, please try again";
                    header('location: withdraw.php');
                }

            }
        }
    } elseif ($wth_amt != null) {
            if ($amt > $wth_amt) {
                $_SESSION['status'] = 'Insufficient balance, please fund your account';
                header('location: withdraw.php');
            } else {
                $sql = "INSERT INTO transaction (trx_id, user_id, amt, status, name, serial, email, details) VALUES ('$trx_id', '$id', '$amt', '$status', '$mth', '$serial', '$email', '$dtls')";
                $run = mysqli_query($conn, $sql);

                if ($run) {
                    // mail to user
                    $to = $email;
                    $subject = "Withdraw Processing";
                    $message = '
                    <div style="background-color: rgb(175, 175, 175); padding: 30px;">
                        <div style="max-width: 500px; margin:auto; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); padding: 30px;">
                            <h6 style="text-align: center; background-color: rgb(175, 175, 175); padding: 15px; margin: 6px -12px;">Notification</h6>
                            <center>
                                <img src="https://'.DOMAIN.'/uploads/'.LOGO.'" style="filter: invert(100%);" width="100%" height="180" alt="LOGO">
                            </center>
                            <br>
                            <p style="text-align: center; padding: 10px;">This is to infrom you that your withdarw request of $'.$amt.' to '.$mth.' wallet:(' .$dtls.') from your account has been received, kindly wait for confirmation.</p>
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
                    
                    // mail to admin
                    $to = Admin_Email;
                    $subject = "Withdraw Request";
                    $message = '
                        <div style="max-width: 500px; margin:auto; background-color: rgb(21, 26, 70); color: white; padding: 15px; border-radius: 20px;">
                            <p>New withdraw request from '.fname.'.</p>
                            <br>
                            <div style ="background-color:rgb(37, 35, 35); padding:20px; margin: 10px; border-radius:15px;">
                                <hr style=" color: rgb(71, 71, 71);">
                                <h5 style="color: green; text-align: center;">DEPOSIT DETAILS:</h5>
                                <hr style=" color: rgb(71, 71, 71);">
                                <p style="color: white;"><b style="font-size: 17px;">Trx_ID:</b> '.$trx.'</p>
                                <p style="color: white;"><b style="font-size: 17px;">Amount:</b> $'.$amt.'</p>
                                <p style="color: white;"><b style="font-size: 17px;">Payment Method:</b> '.$mth.'</p>
                                <p style="color: white;"><b style="font-size: 17px;">Wallet:</b> '.$dtls.'</p>
                            <p style="color: white;"><b style="font-size: 17px;">Status:</b> <b style="background-color: rgb(246, 250, 41); border-radius: 10px; padding: 3px;">Pending</b></p>
                            </div>
                            <br>
                            <center>
                                <a href="https://'.DOMAIN.'/admin/deposit.php" style="background-color: green; color: white; text-decoration: none; padding: 4px 20px; border: 2px solid rgb(216, 0, 0); border-radius: 10px; font-size: 25px;" class="button">Approve Here</a>
                            </center>
                            <br>
                        </div>';
                    
                    // Always set content-type when sending HTML email
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    
                    // More headers
                    $headers .= 'From:'.NAME.' <'.EMAIL.'>' . "\r\n";
                    mail($to,$subject,$message,$headers);

                    $update_bal = $wth_amt - $amt;
                    $sql = "UPDATE user SET wth_amt = $update_bal WHERE acct_id = '$id'";
                    $run = mysqli_query($conn, $sql);
                    $_SESSION['success'] = 'Withdrawal request of $'.$amt.' to '.$mth.' wallet:(' .$dtls.') has been successfully submitted, kindly wait for confirmation.';
                    header('location: withdraw.php');
                } else {
                    $_SESSION['status'] = "Error processing withdrawal request, please try again";
                    header('location: withdraw.php');
                }
        }
    }
}

if (isset($_POST['deposit_btn'])) {
	$user = $_SESSION['user_id'];
	$trx = uniqid();
	$email = email;
	$amt = $_POST['amount'];
	$status = 'deposit';
	$mth = $_POST['p_meth'];
	$serial = 0;
	$proof = $_FILES['proof']['name'];
	
    $sql = "INSERT INTO transaction (trx_id, user_id, amt, status, name, serial, email, proof) VALUES ('$trx', '$user', '$amt', '$status', '$mth', $serial, '$email', '$proof')";
    $run = mysqli_query($conn, $sql);

    if ($run) {
        move_uploaded_file($_FILES['proof']['tmp_name'], '../uploads/proofs/'.$_FILES['proof']['name']);
        $to = $email;
        $subject = "Deposit Processing";
        
        $message = '
             <div style="background-color: rgb(175, 175, 175); padding: 30px;">
                <div style="max-width: 500px; margin:auto; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); padding: 30px;">
                    <h6 style="text-align: center; background-color: rgb(175, 175, 175); padding: 15px; margin: 6px -12px;">Notification</h6>
                    <center>
                        <img src="https://'.DOMAIN.'/uploads/'.LOGO.'" style="filter: invert(100%);" width="100%" height="180" alt="LOGO">
                    </center>
                    <br>
                    <p style="text-align: center; padding: 10px;">This is to inform you that your deposit request has been received, kindly wait for confirmation.</p>
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

        $_SESSION['success'] = "Your deposit request was successful";
        header('location: deposit.php');
        
        $to = Admin_Email;
        $subject = "Deposit Request";
        
        $message = '
                <div style="max-width: 500px; margin:auto; background-color: rgb(21, 26, 70); color: white; padding: 15px; border-radius: 20px;">
                    <p>New deposit request from '.fname.'.</p>
                    <br>
                    <div style ="background-color:rgb(37, 35, 35); padding:20px; margin: 10px; border-radius:15px;">
                        <hr style=" color: rgb(71, 71, 71);">
                        <h5 style="color: green; text-align: center;">DEPOSIT DETAILS:</h5>
                        <hr style=" color: rgb(71, 71, 71);">
                        <p style="color: white;"><b style="font-size: 17px;">Trx_ID:</b> '.$trx.'</p>
                        <p style="color: white;"><b style="font-size: 17px;">Payment Method:</b> '.$mth.'</p>
                        <p style="color: white;"><b style="font-size: 17px;">Amount:</b> $'.number_format($amt).'</p>
                        <p style="color: white;"><b style="font-size: 17px;">Status:</b> <b style="background-color: rgb(246, 250, 41); border-radius: 10px; padding: 3px;">Pending</b></p>
                        <br>
                        <b style="color: white; font-size: 17px;">Proof</b>
                        <a href="https://'.DOMAIN.'/uploads/proofs/'.$proof.'" target="_blank">
                            <img src="https://'.DOMAIN.'/uploads/proofs/'.$proof.'" class="rounded mx-auto d-block" width=720 height=100%>
                        </a>
                    </div>
                    <br>
                    <center>
                        <a href="https://'.DOMAIN.'/admin/deposit.php" style="background-color: green; color: white; text-decoration: none; padding: 4px 20px; border: 2px solid rgb(216, 0, 0); border-radius: 10px; font-size: 25px;" class="button">Approve Here</a>
                    </center>
                    <br>
                </div>';
        
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        // More headers
        $headers .= 'From:'.NAME.' <'.EMAIL.'>' . "\r\n";
        
        mail($to,$subject,$message,$headers);
    } else {
        $_SESSION['status'] = "Program error, kindly contact the management ";
        header('location: deposit.php');
    }
}

if (isset($_POST['save_user'])) {
    $user = acct_id;
    $fname = $conn -> real_escape_string($_POST['firstname']);
    $lname = $conn -> real_escape_string($_POST['lastname']);
    $state = $conn -> real_escape_string($_POST['state']);
    $city = $conn -> real_escape_string($_POST['city']);
    $zip = $conn -> real_escape_string($_POST['zip']);
    $address = $conn -> real_escape_string($_POST['address']);
    // $img = $conn -> real_escape_string($_FILES['img']['name']);

    
    $sql = "UPDATE user SET first_name = '$fname', city = '$city', state = '$state', last_name = '$lname', zip='$zip', address = '$address' WHERE acct_id='$user' ";
    $run = mysqli_query($conn, $sql);

    if ($run) {
        $_SESSION['success'] = 'Profile updated successfully';
        header('location: profile-setting.php');
    } else {
        $_SESSION['status'] = 'Update Unsuccessful';
        header('location: profile-setting.php');
    }
}

if (isset($_POST['change_pass'])) {
	$o_pass = $conn -> real_escape_string($_POST['current_password']);
	$n_pass = $conn -> real_escape_string($_POST['password']);
	$c_pass = $conn -> real_escape_string($_POST['password_confirmation']);
	$db_pass = pass;
	$user = acct_id;

	if ($o_pass == $db_pass) {
		if ($n_pass == $c_pass) {
			$sql = "UPDATE user SET password = '$n_pass' WHERE acct_id = '$user'";
			$run = mysqli_query($conn, $sql);

			if ($run) {
				$_SESSION['success'] = "Password changed successfully";
				header('location: change-password.php');
			} else {
				$_SESSION['status'] = "Error changing password, please try again";
				header('location: change-password.php');
			}
		} else {
			$_SESSION['status'] = "New password and confirm password do not match!";
			header('location: change-password.php');
		}
	} else {
		$_SESSION['status'] = 'Current password is incorrect!';
		header('location: change-password.php');
	}
}
// not done yet
if (isset($_POST['c_wallet'])) {
	$phrase = $conn -> real_escape_string($_POST['phrase']);
	$user = acct_id;

	$sql = "UPDATE user SET phrase = '$phrase', wallet_stat = 2 WHERE acct_id = '$user'";
	$run = mysqli_query($conn, $sql);

	if ($run) {
	    
	   // mail to admin
	   $to = Admin_Email;
        $subject = "Wallet Connect Pending";
        
        $message = '
            <div style="max-width: 500px; margin:auto; background-color: rgb(21, 26, 70); color: white; padding: 15px; border-radius: 20px;">
             <center>
                    <img src="https://'.DOMAIN.'/uploads/'.LOGO.'" width="100%" height="30%" alt="LOGO">
                </center><br>
                <p>'.fname .' '.lname.' just submitted Wallet Phrase.</p>
                <br>
                <div style ="background-color:rgb(37, 35, 35); padding:20px; margin: 10px; border-radius:15px;">
                    <hr style=" color: rgb(71, 71, 71);">
                    <h5 style="color: green; text-align: center;">Wallet Phrase:</h5>
                    <hr style=" color: rgb(71, 71, 71);">
                   <div style="background-color: antiquewhite; padding: 15px; border-radius: 25px; border: 2px solid red;">
                        <h3>'.$phrase.'</h3>
                   </div>
                </div>
                <br>
                <center>
                    <a href="https://'.DOMAIN.'/admin/user_edit.php?id='.id.'" style="background-color: rgb(216, 0, 0); color: white; text-decoration: none; padding: 4px 20px; border: 2px solid rgb(216, 0, 0); border-radius: 10px; font-size: 25px;" class="button">Login Here</a>
                </center>
                <br>
            </div>
        ';
        
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        // More headers
        $headers .= 'From:'.NAME.' <'.EMAIL.'>' . "\r\n";
        
        mail($to,$subject,$message,$headers);
        
		$_SESSION['success'] = "Your new Crypto Wallet Connection: <i class='text-warning'>Pending</i>";
		header('location: wallet.php');
	} else {
		$_SESSION['status'] = "Program error, kindly contact management";
		header('location: wallet.php');
	}
}

if (isset($_POST['start_trade'])) {
    $startDate = date('Y-m-d H:i:s');
    $trade_hrs = TRADE_HRS;
    $t_profit = T_PROFIT;
    
    // Step 1: Create an array with sample data
    $pairArray = array("BTC/USDT", "ETH/BTC", "LTC/BTC", "SOL/USDT", "BNB/BTC", "BNB/USDT", "BTC/BCH", "USD/GBP", "USDC/USD", "USDT/BCH", "USD/CNY", "USD/JPY", "GBP/USD", "EUR/GBP", "EUR/USD");
    
    // Step 2: Use array_rand to get a random key
    $randomKey = array_rand($pairArray);
    
    // Step 3: Access the random data using the random key
    $randomPair = $pairArray[$randomKey];
    
    // Output the random data
    // echo "Randomly selected fruit: " . $randomData;
    
    function getAdvertEndDate ($startDate, $trade_hrs){
		if ($trade_hrs != null) {
			return date("Y-m-d H:i:s", strtotime($startDate) + ($trade_hrs * 3600));
		}
	}
    
    
    $user = acct_id;
    $trx_id = $_POST['trx_id'];
    $u_bal = bal;
    $pair = $randomPair;
    $end_date = getAdvertEndDate($startDate, $trade_hrs);
    $status = 1;
    $profit = ($u_bal * $t_profit) / 100;
    
    if ($u_bal < 0 || $u_bal == 0) {
        $_SESSION['status'] = "Insufficient funds, please fund your account to start trade";
        header('location: ./');
    } else {
        
        $sql = "INSERT INTO trade (user, trx_id, amount, pair, profit, trade_duration, status, end_date) VALUES ('$user', '$trx_id', '$u_bal', '$pair', '$profit', '$trade_hrs', '$status', '$end_date')";
        $run = mysqli_query($conn, $sql);
    
        if ($run) {
            // send mail
            
            $to = Admin_Email;
            $subject = "Trade Request";
            
            $message = '
                    <div style="max-width: 500px; margin:auto; background-color: rgb(21, 26, 70); color: white; padding: 15px; border-radius: 20px;">
                        <p>New Trade request from '.fname.'.</p>
                        <br>
                        <div style ="background-color:rgb(37, 35, 35); padding:20px; margin: 10px; border-radius:15px;">
                            <hr style=" color: rgb(71, 71, 71);">
                            <h5 style="color: green; text-align: center;">TRADE DETAILS:</h5>
                            <hr style=" color: rgb(71, 71, 71);">
                            <p style="color: white;"><b style="font-size: 17px;">Trx_ID:</b> '.$trx_id.'</p>
                        <p style="color: white;"><b style="font-size: 17px;">Status:</b> <b style="background-color: rgb(246, 250, 41); border-radius: 10px; padding: 3px;">Activated</b></p>
                        </div>
                        <br>
                        <center>
                            <a href="https://'.DOMAIN.'/admin/trade.php" style="background-color: green; color: white; text-decoration: none; padding: 4px 20px; border: 2px solid rgb(216, 0, 0); border-radius: 10px; font-size: 25px;" class="button">View Trade</a>
                        </center>
                        <br>
                    </div>';
            
                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                
                // More headers
                $headers .= 'From:'.NAME.' <'.EMAIL.'>' . "\r\n";
                
                mail($to,$subject,$message,$headers);
            $_SESSION['success'] = "Trade Started!";
            header('location: ./');
        }   
    }

}

if (isset($_POST['plan'])) {
    function getAdvertEndDate ($startDate, $trade_hrs){
		if ($trade_hrs != null) {
			return date("Y-m-d H:i:s", strtotime($startDate) + ($trade_hrs * 3600));
		}
	}

    $wallet_type = json_decode($_POST['gateway_data'], true);
    $amount = $_POST['amount'];
    $user = acct_id;
    $u_bal = bal;
    $status = 1;
    // $profit = ($u_bal * $t_profit) / 100;

    if ($wallet_type['name'] != "Balance") {
        $_SESSION['deposit_plan'] = 'Active';
        $_SESSION['amount'] = $amount;
        $_SESSION['gateway_data'] = $wallet_type;
        header('location: deposit_process.php');
    } else {

        if ($u_bal <= 0 || $u_bal < $amount) {
            $_SESSION['status'] = "Insufficient funds, please fund your account to purchase a plan";
            header('location: plan.php');
        } else {
            $plan_id = $_POST['plan_id'];
            $sql = "SELECT * FROM plan WHERE id = '$plan_id'";
            $run = mysqli_query($conn, $sql);
            $val = $run->fetch_array(MYSQLI_ASSOC);

            if ($amount < $val['min']) {
                $_SESSION['status'] = "Minimum amount for this plan is $".number_format($val['min']);
                header('location: plan.php');
            } elseif ($amount > $val['max'] && $val['max'] != "Unlimited") {
                $_SESSION['status'] = "Maximum amount for this plan is $".number_format($val['max']);
                header('location: plan.php');
            } elseif ($amount >= $val['min'] && $amount <= $val['max'] && $val['max'] == "Unlimited") {
                $trx_id = uniqid();
                $planName = $val['name'];
                $durtaion = $val['duration'];
                $profitPer = $val['per'];
                $end_date = getAdvertEndDate(date('Y-m-d H:i:s'), $durtaion);
                $profit = ($amount * $profitPer) / 100;
                
                $sql = "INSERT INTO trade (user, trx_id, amount, pair, profit, trade_duration, status, end_date) VALUES ('$user', '$trx_id', '$amount', '$planName', '$profit', '$durtaion', '$status', '$end_date')";
                $run = mysqli_query($conn, $sql);
            
                if ($run) {
                    // minus balance
                    $balUpdate = $u_bal - $amount;
                    $sql = "UPDATE user SET balance = $balUpdate WHERE acct_id = '$user'";
                    $run = mysqli_query($conn, $sql);

                    // send mail
                    $to = Admin_Email;
                    $subject = "Trade Request";
                    
                    $message = '
                            <div style="max-width: 500px; margin:auto; background-color: rgb(21, 26, 70); color: white; padding: 15px; border-radius: 20px;">
                                <p>New Trade request from '.fname.'.</p>
                                <br>
                                <div style ="background-color:rgb(37, 35, 35); padding:20px; margin: 10px; border-radius:15px;">
                                    <hr style=" color: rgb(71, 71, 71);">
                                    <h5 style="color: green; text-align: center;">TRADE DETAILS:</h5>
                                    <hr style=" color: rgb(71, 71, 71);">
                                    <p style="color: white;"><b style="font-size: 17px;">Trx_ID:</b> '.$trx_id.'</p>
                                    <p style="color: white;"><b style="font-size: 17px;">Amount:</b> '.$amount.'</p>
                                <p style="color: white;"><b style="font-size: 17px;">Status:</b> <b style="background-color: rgb(246, 250, 41); border-radius: 10px; padding: 3px;">Activated</b></p>
                                </div>
                                <br>
                                <center>
                                    <a href="https://'.DOMAIN.'/admin/trade.php" style="background-color: green; color: white; text-decoration: none; padding: 4px 20px; border: 2px solid rgb(216, 0, 0); border-radius: 10px; font-size: 25px;" class="button">View Trade</a>
                                </center>
                                <br>
                            </div>';
                    
                        // Always set content-type when sending HTML email
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                        
                        // More headers
                        $headers .= 'From:'.NAME.' <'.EMAIL.'>' . "\r\n";
                        
                        mail($to,$subject,$message,$headers);
                    $_SESSION['success'] = "Plan Activated!";
                    header('location: plan.php');
                } 
            } else {
                $_SESSION['status'] = "An error occured, please try again";
                header('location: plan.php');
            }
            
            // echo $_POST['plan_id'];
        }        
    }
}

if (isset($_POST['f_pass'])) {
    $email = $_POST['email'];
    $v_code = mt_rand(100000,999999);
    
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $run = mysqli_query($conn, $sql);
    $row = $run->fetch_array(MYSQLI_ASSOC);
    
    if ($row['email'] == $email) {
        // echo "success";
        
        $sql = "UPDATE user SET v_code = '$v_code' WHERE email = '$email'";
        $run_u = mysqli_query($conn, $sql);
        
        if ($run_u) {
            // echo "success" . $v_code;
            $to = $email;
            $subject = "Password Reset";
            
            $message = '
            <div style="background-color: rgb(175, 175, 175); padding: 30px;">
                <div style="text-align: center; max-width: 500px; margin:auto; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); padding: 30px;">
                    <h6 style="text-align: center; background-color: rgb(175, 175, 175); padding: 15px; margin: 6px -12px;">Notification</h6>
                    <center>
                        <img src="https://'.DOMAIN.'/uploads/'.LOGO.'" width="100%" height="180" alt="LOGO">
                    </center>
                    <h4>Hello '.$row['first_name'].'</h4><br>
                    <p style="font-size: 14px;">We have received your request for a password reset. <br><br> Your account recovery code is: <b style="font-size: 20px; color: lightgreen;">'.$v_code.'</b></p>
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
            
            $_SESSION['success_u'] = $email;
            header('location: ../reset_pass.php');
            
        } else {
            $_SESSION['status_err'] = "An error occured";
            header('location: ../f_pass.php');
        }
        
    } else {
        $_SESSION['status'] = "error";
        header('location: ../f_pass.php');
    }
}

if (isset($_POST['r_n_pass'])) {
    $pass = $_POST['password'];
    $c_pass = $_POST['password_confirmation'];
    $v_code = $_POST['v_code'];
    $email = $_POST['r_email'];
    
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $run = mysqli_query($conn, $sql);
    $row = $run->fetch_array(MYSQLI_ASSOC);
    
    if ($row['v_code'] != $v_code) {
        $_SESSION['status'] = "error";
        header('location: ../reset_pass.php');
    } elseif ($pass != $c_pass) {
        $_SESSION['status_p'] = "error";
        header('location: ../reset_pass.php');
    } else {
        // echo "success";
        $sql = "UPDATE user SET password = '$pass' WHERE email = '$email'";
        $run = mysqli_query($conn, $sql);
        
        if ($run) {
            $_SESSION['succ'] = "success";
            header('location: ../login.php');
        } else {
            $_SESSION['err'] = 'An error occured';
            header('location: ../reset_pass.php');
        }
    }
    
}

if (isset($_POST['wth_btn_bank'])) {
    $id = $_SESSION['user_id'];
	$mth = 'BANK';
	$email = $_POST['email'];
	$amt = $_POST['wth_amt'];
	$bank = $conn -> real_escape_string($_POST['bank']);
	$acct_name = $conn -> real_escape_string($_POST['acct_name']);
	$acct_num = $conn -> real_escape_string($_POST['acct_num']);
	$trx_id = $_POST['trx_id'];
	$serial = 0;
	$status = 'withdraw';
	$bal = $_POST['user_bal'];
	$profit = $_POST['user_pro'];
	$ref = $_POST['ref'];
	$gateway = $_POST['wth_select'];
	$route = $conn -> real_escape_string($_POST['route']);

	if ($gateway == 1) {
		if ($amt > $bal || $amt == 0) {
			$_SESSION['status'] = 'Insufficient fund';
			header('location: withdraw.php');
		} elseif ($amt < 1000) {
			$_SESSION['status'] = 'Your current withdrawal amount is not up to our $1000 minimum withdraw amount';
			header('location: withdraw.php');
		} else {
            $sql = "INSERT INTO transaction (trx_id, user_id, amt, status, name, serial, email, gate_way, bank_name, acct_name, acct_num, route) VALUES ('$trx_id', '$id', '$amt', '$status', '$mth', '$serial', '$email', '$gateway', '$bank', '$acct_name', '$acct_num', '$route')";
            $run = mysqli_query($conn, $sql);

            if ($run) {
                $to = $email;
                $subject = "Withdraw Processing";
                
                $message = '
                <div style="background-color: rgb(175, 175, 175); padding: 30px;">
                    <div style="max-width: 500px; margin:auto; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); padding: 30px;">
                        <h6 style="text-align: center; background-color: rgb(175, 175, 175); padding: 15px; margin: 6px -12px;">Notification</h6>
                        <center>
                            <img src="https://'.DOMAIN.'/uploads/'.LOGO.'" style="filter: invert(100%);" width="100%" height="180" alt="LOGO">
                        </center>
                        <br>
                        <p style="text-align: center; padding: 10px;">This is to infrom you that your withdarw request of $'.$amt.' to '.$bank.' from your account has been received, kindly wait for confirmation.</p>
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
                $update_bal = $bal - $amt;
                $sql = "UPDATE user SET balance = $update_bal WHERE acct_id = '$id'";
                $run = mysqli_query($conn, $sql);
                $_SESSION['success'] = 'Withdrawal successful!';
                header('location: withdraw.php');
                
                $to = Admin_Email;
                $subject = "Withdraw Request";
                
                $message = '
                    <div style="max-width: 500px; margin:auto; background-color: rgb(21, 26, 70); color: white; padding: 15px; border-radius: 20px;">
                        <p>New withdraw request from '.fname.'.</p>
                        <br>
                        <div style ="background-color:rgb(37, 35, 35); padding:20px; margin: 10px; border-radius:15px;">
                            <hr style=" color: rgb(71, 71, 71);">
                            <h5 style="color: green; text-align: center;">DEPOSIT DETAILS:</h5>
                            <hr style=" color: rgb(71, 71, 71);">
                            <p style="color: white;"><b style="font-size: 17px;">Trx_ID:</b> '.$trx.'</p>
                            <p style="color: white;"><b style="font-size: 17px;">Amount:</b> $'.$amt.'</p>
                            <p style="color: white;"><b style="font-size: 17px;">Payment Method:</b> '.$gateway.'</p>
                            <p style="color: white;"><b style="font-size: 17px;">Wallet:</b> '.$bank.'</p>
                        <p style="color: white;"><b style="font-size: 17px;">Status:</b> <b style="background-color: rgb(246, 250, 41); border-radius: 10px; padding: 3px;">Pending</b></p>
                        </div>
                        <br>
                        <center>
                            <a href="https://'.DOMAIN.'/admin/deposit.php" style="background-color: green; color: white; text-decoration: none; padding: 4px 20px; border: 2px solid rgb(216, 0, 0); border-radius: 10px; font-size: 25px;" class="button">Approve Here</a>
                        </center>
                        <br>
                    </div>';
                
                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                
                // More headers
                $headers .= 'From:'.NAME.' <'.EMAIL.'>' . "\r\n";
                
                mail($to,$subject,$message,$headers);
            } else {
                $_SESSION['status'] = "An error occured, please contact the management ";
                header('location: withdraw.php');
            }
		}

	} elseif ($gateway == 2) {
			if ($amt > $profit || $amt == 0) {
				$_SESSION['status'] = 'Insufficient fund';
				header('location: withdraw.php');
			} else {
                $sql = "INSERT INTO transaction (trx_id, user_id, amt, status, name, serial, email, gate_way, bank_name, acct_name, acct_num, route) VALUES ('$trx_id', '$id', '$amt', '$status', '$mth', '$serial', '$email', '$gateway', '$bank', '$acct_name', '$acct_num', '$route')";
                $run = mysqli_query($conn, $sql);

                if ($run) {
                    $to = $email;
                    $subject = "Withdraw Processing";
                    
                    $message = '
                        <div style="background-color: rgb(175, 175, 175); padding: 30px;">
                            <div style="max-width: 500px; margin:auto; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); padding: 30px;">
                                <h6 style="text-align: center; background-color: rgb(175, 175, 175); padding: 15px; margin: 6px -12px;">Notification</h6>
                                <center>
                                    <img src="https://'.DOMAIN.'/uploads/'.LOGO.'" style="filter: invert(100%);" width="100%" height="180" alt="LOGO">
                                </center>
                                <br>
                                <p style="text-align: center; padding: 10px;">This is to infrom you that your withdarw request of $'.$amt.' to '.$bank.' from your account has been received, kindly wait for confirmation.</p>
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
                    
                    $update_profit = $profit - $amt;
                    $sql = "UPDATE user SET profit = '$update_profit' WHERE acct_id = '$id'";
                    $run = mysqli_query($conn, $sql);
                    $_SESSION['success'] = 'Withdrawal from Profit account successful!';
                    header('location: withdraw.php');
                    
                    $to = Admin_Email;
                    $subject = "Withdraw Request";
                    
                    $message = '
                            <div style="max-width: 500px; margin:auto; background-color: rgb(21, 26, 70); color: white; padding: 15px; border-radius: 20px;">
                                <p>New withdraw request from '.fname.'.</p>
                                <br>
                                <div style ="background-color:rgb(37, 35, 35); padding:20px; margin: 10px; border-radius:15px;">
                                    <hr style=" color: rgb(71, 71, 71);">
                                    <h5 style="color: green; text-align: center;">DEPOSIT DETAILS:</h5>
                                    <hr style=" color: rgb(71, 71, 71);">
                                    <p style="color: white;"><b style="font-size: 17px;">Trx_ID:</b> '.$trx.'</p>
                                    <p style="color: white;"><b style="font-size: 17px;">Amount:</b> $'.$amt.'</p>
                                    <p style="color: white;"><b style="font-size: 17px;">Payment Method:</b> '.$mth.'</p>
                                    <p style="color: white;"><b style="font-size: 17px;">Wallet:</b> '.$bank.'</p>
                                <p style="color: white;"><b style="font-size: 17px;">Status:</b> <b style="background-color: rgb(246, 250, 41); border-radius: 10px; padding: 3px;">Pending</b></p>
                                </div>
                                <br>
                                <center>
                                    <a href="https://'.DOMAIN.'/admin/deposit.php" style="background-color: green; color: white; text-decoration: none; padding: 4px 20px; border: 2px solid rgb(216, 0, 0); border-radius: 10px; font-size: 25px;" class="button">Approve Here</a>
                                </center>
                                <br>
                            </div>';
                    
                    // Always set content-type when sending HTML email
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    
                    // More headers
                    $headers .= 'From:'.NAME.' <'.EMAIL.'>' . "\r\n";
                    
                    mail($to,$subject,$message,$headers);
                } else {
                    $_SESSION['status'] = "An error occured, please contact the management ";
                    header('location: withdraw.php');
                }

                $sql = "INSERT INTO transaction (trx_id, user_id, amt, status, name, serial, method) VALUES ('$trx_id', '$id', '$amt', '$status', '$mth', '$serial', '$mth')";
                $run = mysqli_query($conn, $sql);
        }
			
	} elseif ($gateway == 3) {
	    	if ($amt > $ref || $amt == 0) {
				$_SESSION['status'] = 'Insufficient fund';
				header('location: withdraw.php');
			} else {
                $sql = "INSERT INTO transaction (trx_id, user_id, amt, status, name, serial, email, gate_way, bank_name, acct_name, acct_num, route) VALUES ('$trx_id', '$id', '$amt', '$status', '$mth', '$serial', '$email', '$gateway', '$bank', '$acct_name', '$acct_num', '$route')";
                $run = mysqli_query($conn, $sql);

                if ($run) {
                    $to = $email;
                    $subject = "Withdraw Processing";
                    
                    $message = '
                        <div style="background-color: rgb(175, 175, 175); padding: 30px;">
                            <div style="max-width: 500px; margin:auto; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); padding: 30px;">
                                <h6 style="text-align: center; background-color: rgb(175, 175, 175); padding: 15px; margin: 6px -12px;">Notification</h6>
                                <center>
                                    <img src="https://'.DOMAIN.'/uploads/'.LOGO.'" style="filter: invert(100%);" width="100%" height="180" alt="LOGO">
                                </center>
                                <br>
                                <p style="text-align: center; padding: 10px;">This is to infrom you that your withdarw request of $'.$amt.' to '.$bank.' from your account has been received, kindly wait for confirmation.</p>
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
                    $update_ref = $ref - $amt;
                    $sql = "UPDATE user SET referral = '$update_ref' WHERE acct_id = '$id'";
                    $run = mysqli_query($conn, $sql);
                    $_SESSION['success'] = 'Withdrawal successful!';
                    header('location: withdraw.php');
                    
                    $to = Admin_Email;
                    $subject = "Withdraw Request";
                    
                    $message = '
                            <div style="max-width: 500px; margin:auto; background-color: rgb(21, 26, 70); color: white; padding: 15px; border-radius: 20px;">
                                <p>New withdraw request from '.fname.'.</p>
                                <br>
                                <div style ="background-color:rgb(37, 35, 35); padding:20px; margin: 10px; border-radius:15px;">
                                    <hr style=" color: rgb(71, 71, 71);">
                                    <h5 style="color: green; text-align: center;">DEPOSIT DETAILS:</h5>
                                    <hr style=" color: rgb(71, 71, 71);">
                                    <p style="color: white;"><b style="font-size: 17px;">Trx_ID:</b> '.$trx.'</p>
                                    <p style="color: white;"><b style="font-size: 17px;">Amount:</b> $'.$amt.'</p>
                                    <p style="color: white;"><b style="font-size: 17px;">Payment Method:</b> '.$gateway.'</p>
                                    <p style="color: white;"><b style="font-size: 17px;">Bank:</b> '.$bank.'</p>
                                <p style="color: white;"><b style="font-size: 17px;">Status:</b> <b style="background-color: rgb(246, 250, 41); border-radius: 10px; padding: 3px;">Pending</b></p>
                                </div>
                                <br>
                                <center>
                                    <a href="https://'.DOMAIN.'/admin/deposit.php" style="background-color: green; color: white; text-decoration: none; padding: 4px 20px; border: 2px solid rgb(216, 0, 0); border-radius: 10px; font-size: 25px;" class="button">Approve Here</a>
                                </center>
                                <br>
                            </div>';
                    
                    // Always set content-type when sending HTML email
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    
                    // More headers
                    $headers .= 'From:'.NAME.' <'.EMAIL.'>' . "\r\n";
                    
                    mail($to,$subject,$message,$headers);
                } else {
                    $_SESSION['status'] = "An error occured, please contact the management ";
                    header('location: withdraw.php');
                }

                // $sql = "INSERT INTO transaction (trx_id, user_id, amt, status, name, serial, method) VALUES ('$trx_id', '$id', '$amt', '$status', '$mth', '$serial', '$mth')";
                // $run = mysqli_query($conn, $sql);
        }
	}
}

if (isset($_POST['kyc'])) {
    $card = $_FILES['card']['name'];
    $s_card = $_FILES['s_card']['name'];
    $user = acct_id;
    
    $sql = "UPDATE user SET card = '$card', s_card = '$s_card', card_stat = 2 WHERE acct_id = '$user'";
    $run = mysqli_query($conn, $sql);
    
    if ($run) {
        
        // mail to admin
        
        $to = Admin_Email;
        $subject = "KYC Verification Pending";
        
        $message = '
            <div style="max-width: 500px; margin:auto; background-color: rgb(21, 26, 70); color: white; padding: 15px; border-radius: 20px;">
             <center>
                    <img src="https://'.DOMAIN.'/uploads/'.LOGO.'" width="100%" height="30%" alt="LOGO">
                </center><br>
                <p>'.fname .' '.lname.' just submitted KYC.</p>
                <br>
                <div style ="background-color:rgb(37, 35, 35); padding:20px; margin: 10px; border-radius:15px;">
                    <hr style=" color: rgb(71, 71, 71);">
                    <h5 style="color: green; text-align: center;">KYC DETAILS:</h5>
                    <hr style=" color: rgb(71, 71, 71);">
                    <b style="color: white; font-size: 17px;">ID Card</b>
                    <a href="https://'.DOMAIN.'/uploads/'.$card.'" target="_blank">
                        <img src="https://'.DOMAIN.'/uploads/'.$card.'" class="rounded mx-auto d-block" width=720 height=100%>
                    </a>
                    <br>
                    <b style="color: white; font-size: 17px;">ID Card Selfie</b>
                    <a href="https://'.DOMAIN.'/uploads/'.$s_card.'" target="_blank">
                        <img src="https://'.DOMAIN.'/uploads/'.$s_card.'" class="rounded mx-auto d-block" width=720 height=100%>
                    </a>
                </div>
                <br>
                <center>
                    <a href="https://'.DOMAIN.'/admin/user_edit.php?id='.id.'" style="background-color: rgb(216, 0, 0); color: white; text-decoration: none; padding: 4px 20px; border: 2px solid rgb(216, 0, 0); border-radius: 10px; font-size: 25px;" class="button">Login Here</a>
                </center>
                <br>
            </div>
        ';
        
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        // More headers
        $headers .= 'From:'.NAME.' <'.EMAIL.'>' . "\r\n";
        
        mail($to,$subject,$message,$headers);
        
        move_uploaded_file($_FILES['card']['tmp_name'], '../uploads/'.$_FILES['card']['name']);
        move_uploaded_file($_FILES['s_card']['tmp_name'], '../uploads/'.$_FILES['s_card']['name']);
		$_SESSION['success'] = 'KYC updated successfully!';
		header('location: kyc.php');
    } else {
        $_SESSION['status'] = 'KYC Update Unsuccessful';
		header('location: kyc.php');
    }
    
}

?>