<?php
session_start();
require_once("include/config.php");
require_once("include/functions.php");

$users = new User();
if(isset($_GET['email'])){
	extract($_GET);
}else{
	extract($_POST);
}
if(isset($_POST['submit']))
{			
		$profile_pic=$_FILES['profile_pic']['name'];
		$lname=($_POST['last_name']);
		$fname=($_POST['first_name']);
		$uname=($_POST['username']);
		//$lname=mysql_real_escape_string($_POST['last_name']);
		//$fname=mysql_real_escape_string($_POST['first_name']);
		//$uname=mysql_real_escape_string($_POST['username']);
		$dob=$_POST['dob'];
		
		$gender=$_POST['gender'];
		$height=$_POST['height'];
		$weight=$_POST['weight'];
		$profession=$_POST['profession'];

		$city=$_POST['city'];
		$country=$_POST['country'];
		$other_city=$_POST['other_city'];
		$phoneno=$_POST['phoneno'];
		$password=base64_encode($_POST['password']);
		
		$pw_confirm=base64_encode($_POST['pw_confirm']);
		
		$email=($_POST['email']);
		$email_confirm=($_POST['email_confirm']);
		
		$religion=($_POST['religion']);		
		$coworker=($_POST['coworker']);
				
		$cell_name=implode(',', $_POST['cell_name']);
		$bio=$_POST['bio'];
		// $education =$_POST['education'];
		// $workhistory=$_POST['workhistory'];
		/*--------Check UserName exits------------*/			
			$where="username = '".$uname."'";
			$fields="*";
			$table="tbl_singup";
			$allredayunm=$users->select_row($table,$fields,$where);
			if($allredayunm)
			{
				$_SESSION['sblock']=1;
  				$_SESSION['error_msg'] = "Username allready exits.";
			   	
			   	echo'<script type="text/javascript">window.location.href="index.php";		   	</script>';

			    exit();
			    
			}	
		/*-------- Check email id exits----------*/
			$where="email = '".$email."'";
			$fields="*";
			$table="tbl_singup";
			$allredayemail=$users->select_row($table,$fields,$where);
			if($allredayemail)
			{
				$_SESSION['sblock']=1;
  				$_SESSION['error_msg'] = "Email already exists.";
			   	echo'<script type="text/javascript">window.location.href="index.php";
			   	</script>';

			    exit();

			}	
		/*-------------------------------------------------*/	
		if($cell_name!=NULL)
			{
				
			/*-------------------------------*/
			$uploaddir = 'uploads/Profile/';
			$profile_pic = basename($_FILES['profile_pic']['name']);
			$exp = explode(".", $profile_pic);
			$ext = end($exp);
			$filename       = time() . mt_rand().".".$ext;
			$uploadfile     = $uploaddir . $filename;
	  
			$tempfile=$_FILES['profile_pic']['tmp_name'];
			/*-----------*/
			




  			if(empty($profile_pic)||empty($lname)||empty($fname)||empty($uname)||empty($dob)||empty($gender)||empty($height)||empty($weight)||empty($profession)||empty($city)||empty($country)||empty($phoneno)||empty($password)||empty($pw_confirm)||empty($email)||empty($email_confirm)||empty($bio)||empty($religion)||empty($coworker))
  			{
  						
  						$_SESSION['sblock']=1;
  						$_SESSION['error_msg'] = "You did not fill out the required fields..";

				    		echo'<script type="text/javascript">window.location.href="index.php";		 
				    		  	</script>';

				      	exit();

  			}
  			else
  			{  				

  				if($password==$pw_confirm)
  				{
			  		if($email==$email_confirm)
			  		{
			  			if(move_uploaded_file($tempfile, $uploadfile))
						{ 
							$profile_pic = "uploads/Profile/".$filename;

							$from = new DateTime($dob);
							$to   = new DateTime('today');
							$age = $from->diff($to)->y;
							
				  			$insert_id = $users->insert_records('tbl_singup',array("profile_path"=>$profile_pic,"last_name"=>$lname,"first_name"=>$fname,"username"=>$uname,"dob"=>$dob,"age"=>$age,"gender"=>$gender,"height"=>$height,"weight"=>$weight,"profession"=>$profession,"city"=>$city,"country"=>$country,"other_city"=>$other_city,"phoneno"=>$phoneno,"password"=>$password,"pw_confirm"=>$pw_confirm,"email"=>$email,"email_confirm"=>$email_confirm,"cell_id"=>$cell_name,"bio"=>$bio,"religion"=>$religion,"coworker"=>$coworker,"add_date"=>date("Y-m-d")));

				  			/*add eduction */
				  			if(isset($_SESSION['school'] , $_SESSION['highschool'] , $_SESSION['institude'] , $_SESSION['collage'] , $_SESSION['univercity']  ))
				  			{
				  				$school = $_SESSION['school'];
				  				$highschool = $_SESSION['highschool'];
				  				$institude = $_SESSION['institude'];
				  				$collage = $_SESSION['collage'];
				  				$univercity = $_SESSION['univercity'];
				  				$technical = $_SESSION['technical'];
				  				$special = $_SESSION['special'];

				  				$add_education = $users->insert_records('tbl_education',array("user_id"=>$insert_id,"school_name"=>$school,"highschool_name"=>$highschool,"institude_name"=>$institude,"collage_name"=>$collage,"univercity_name"=>$univercity,"technical_schedule"=>$technical,"spacial_traning"=>$special,"add_date"=>date("Y-m-d")));
				  			}

				  			/*add work history */	
				  			/*school*/
				  			if(isset($_SESSION['frmdate'] , $_SESSION['todate'] , $_SESSION['workschool'] , $_SESSION['workcity'], $_SESSION['workstate'], $_SESSION['certificates'],$_SESSION['diplomas'],$_SESSION['degress']))
				  			{

								$add_school = $users->insert_records('tbl_workhistory',array("user_id"=>$insert_id,"from_date"=>$_SESSION['frmdate'],"to_date"=> $_SESSION['todate'],"school"=>$_SESSION['workschool'],"city"=>$_SESSION['workcity'],"state"=>$_SESSION['workstate'],"certificates"=>$_SESSION['certificates'],"diplomas"=>$_SESSION['diplomas'],"degress"=>$_SESSION['degress'],"add_date"=>date("Y-m-d")));

                                    unset($_SESSION['frmdate']);
                                    unset($_SESSION['todate']);
                                    unset($_SESSION['workschool']);
                                    unset($_SESSION['workcity']);
                                    unset($_SESSION['workstate']);
                                    unset($_SESSION['certificates']);
                                    unset($_SESSION['diplomas']);
                                    unset($_SESSION['degress']);


				  			}
				  			/*highschool*/

				  			if(isset($_SESSION['highschool'] , $_SESSION['frmdatehigh'] , $_SESSION['todatehigh'] , $_SESSION['highcity'], $_SESSION['highstate'], $_SESSION['highcertificates'],$_SESSION['highdiplomas'],$_SESSION['highdegress']))
				  			{
								$add_highschool = $users->insert_records('tbl_workhistory',array("user_id"=>$insert_id,"from_date"=>$_SESSION['frmdatehigh'],"to_date"=> $_SESSION['todatehigh'],"high_school"=>$_SESSION['highschool'],"city"=>$_SESSION['highcity'],"state"=>$_SESSION['highstate'],"certificates"=>$_SESSION['highcertificates'],"diplomas"=>$_SESSION['highdiplomas'],"degress"=>$_SESSION['highdegress'],"add_date"=>date("Y-m-d")));
									unset($_SESSION['frmdatehigh']);
                                    unset($_SESSION['todatehigh']);
                                    unset($_SESSION['highschool']);
                                    unset($_SESSION['highcity']);
                                    unset($_SESSION['highstate']);
                                    unset($_SESSION['highcertificates']);
                                    unset($_SESSION['highdiplomas']);
                                    unset($_SESSION['highdegress']);
				  			}

				  			/*institutes*/

				  			if(isset($_SESSION['frmdateinstitute'] , $_SESSION['todateinstitute'] , $_SESSION['institutes_nm'] , $_SESSION['institutecity'], $_SESSION['institutestate'], $_SESSION['institutecertificates'],$_SESSION['institutediplomas'],$_SESSION['institutedegress']))
				  			{
								$add_highschool = $users->insert_records('tbl_workhistory',array("user_id"=>$insert_id,"from_date"=>$_SESSION['frmdateinstitute'],"to_date"=> $_SESSION['todateinstitute'],"institute"=>$_SESSION['institutes_nm'],"city"=>$_SESSION['institutecity'],"state"=>$_SESSION['institutestate'],"certificates"=>$_SESSION['institutecertificates'],"diplomas"=>$_SESSION['institutediplomas'],"degress"=>$_SESSION['institutedegress'],"add_date"=>date("Y-m-d")));
									unset($_SESSION['frmdateinstitute']);
                                    unset($_SESSION['todateinstitute']);
                                    unset($_SESSION['institutes_nm']);
                                    unset($_SESSION['institutecity']);
                                    unset($_SESSION['institutestate']);
                                    unset($_SESSION['institutecertificates']);
                                    unset($_SESSION['institutediplomas']);
                                    unset($_SESSION['institutedegress']);

				  			}
				  			/*collage*/
	
							if(isset($_SESSION['frmdateclg'] , $_SESSION['todateclg'] , $_SESSION['clg_name'] , $_SESSION['clg_city'], $_SESSION['clg_state'], $_SESSION['clg_certificates'],$_SESSION['clg_diplomas'],$_SESSION['clg_degress']))
				  			{
								$add_highschool = $users->insert_records('tbl_workhistory',array("user_id"=>$insert_id,"from_date"=>$_SESSION['frmdateclg'],"to_date"=> $_SESSION['todateclg'],"collage"=>$_SESSION['clg_name'],"city"=>$_SESSION['clg_city'],"state"=>$_SESSION['clg_state'],"certificates"=>$_SESSION['clg_certificates'],"diplomas"=>$_SESSION['clg_diplomas'],"degress"=>$_SESSION['clg_degress'],"add_date"=>date("Y-m-d")));

									unset($_SESSION['frmdateclg']);
                                    unset($_SESSION['todateclg']);
                                    unset($_SESSION['clg_name']);
                                    unset($_SESSION['clg_city']);
                                    unset($_SESSION['clg_state']);
                                    unset($_SESSION['clg_certificates']);
                                    unset($_SESSION['clg_diplomas']);
                                    unset($_SESSION['clg_degress']);
				  			}	


				  			/*university*/
	
							if(isset($_SESSION['frmdateuni'] , $_SESSION['todateuni'] , $_SESSION['uni_name'] , $_SESSION['uni_city'], $_SESSION['uni_state'], $_SESSION['uni_certificates'],$_SESSION['uni_diplomas'],$_SESSION['uni_degress']))
				  			{
								$add_highschool = $users->insert_records('tbl_workhistory',array("user_id"=>$insert_id,"from_date"=>$_SESSION['frmdateuni'],"to_date"=> $_SESSION['todateuni'],"university"=>$_SESSION['uni_name'],"city"=>$_SESSION['uni_city'],"state"=>$_SESSION['uni_state'],"certificates"=>$_SESSION['uni_certificates'],"diplomas"=>$_SESSION['uni_diplomas'],"degress"=>$_SESSION['uni_degress'],"add_date"=>date("Y-m-d")));

									unset($_SESSION['frmdateuni']);
                                    unset($_SESSION['todateuni']);
                                    unset($_SESSION['uni_name']);
                                    unset($_SESSION['uni_city']);
                                    unset($_SESSION['uni_state']);
                                    unset($_SESSION['uni_certificates']);
                                    unset($_SESSION['uni_diplomas']);
                                    unset($_SESSION['uni_degress']);
				  			}	

				  			/*Technocal*/
	
							if(isset($_SESSION['frmdatetech'] , $_SESSION['todatetech'] , $_SESSION['tech_name'] , $_SESSION['tech_city'], $_SESSION['tech_state'], $_SESSION['tech_certificates'],$_SESSION['tech_diplomas'],$_SESSION['tech_degress']))
				  			{
								$add_highschool = $users->insert_records('tbl_workhistory',array("user_id"=>$insert_id,"from_date"=>$_SESSION['frmdatetech'],"to_date"=> $_SESSION['todatetech'],"technical"=>$_SESSION['tech_name'],"city"=>$_SESSION['tech_city'],"state"=>$_SESSION['tech_state'],"certificates"=>$_SESSION['tech_certificates'],"diplomas"=>$_SESSION['tech_diplomas'],"degress"=>$_SESSION['tech_degress'],"add_date"=>date("Y-m-d")));
								    unset($_SESSION['frmdatetech']);
                                    unset($_SESSION['todatetech']);
                                    unset($_SESSION['tech_name']);
                                    unset($_SESSION['tech_city']);
                                    unset($_SESSION['tech_state']);
                                    unset($_SESSION['tech_certificates']);
                                    unset($_SESSION['tech_diplomas']);
                                    unset($_SESSION['tech_degress']);
				  			}	

				  			/*Spacial*/
	
							if(isset($_SESSION['frmdatespc'] , $_SESSION['todatespc'] , $_SESSION['spc_training'] , $_SESSION['spc_city'], $_SESSION['spc_state']))
				  			{
								$add_highschool = $users->insert_records('tbl_workhistory',array("user_id"=>$insert_id,"from_date"=>$_SESSION['frmdatespc'],"to_date"=> $_SESSION['todatespc'],"special"=>$_SESSION['spc_training'],"city"=>$_SESSION['spc_city'],"state"=>$_SESSION['spc_state'],"add_date"=>date("Y-m-d")));

								    unset($_SESSION['frmdatespc']);
                                    unset($_SESSION['todatespc']);
                                    unset($_SESSION['spc_training']);
                                    unset($_SESSION['spc_city']);
                                    unset($_SESSION['spc_state']);
                                    
				  			}	

				  				$to = $email;
								$subject = 'Pro167';	
								$message = '<html><body>
							   	<p><b>Dear '.$fname.',</b></p>
							   		<p>Welcome
									<br>You have successfully registered to our Website </p><br>';
							   
							   $message .= '</body></html>';

							    $headers  = 'MIME-Version: 1.0' . "\r\n";
								$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

								
								if(mail($to, $subject, $message, $headers))
								{

				  		 			$_SESSION['sblock']=1;
				  		 			$_SESSION['success_msg'] = "You have successfully Signup.";
					        			echo'<script type="text/javascript">window.location.href="index.php";		   	</script>';

					        		exit();

					        	}
					    }

				 	}
				 	else
				 	{
				 		$_SESSION['sblock']=1;
				 		$_SESSION['error_msg'] = "Emailid do not match.";
				        	echo'<script type="text/javascript">window.location.href="index.php"; 	</script>';

				        exit();

				 	}
				}	
				else 	
				{
					$_SESSION['sblock']=1;
					$_SESSION['error_msg'] = "Passwords do not match.";
				    	echo'<script type="text/javascript">window.location.href="index.php"; 	</script>';

				        exit();
				}
			}
		}
		else
		{
			$_SESSION['sblock']=1;
			$_SESSION['error_msg'] = "You did not fill out the required fields..";
			 		echo'<script type="text/javascript">window.location.href="index.php";	</script>';

			   	exit();

			

		}

}

session_unset();
?>