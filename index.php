 <?php include 'database.php' ;?>
<!DOCTYPE html>
<html>
<head>
	<title>Resume Landing Page</title>
	<meta  content="width=device-width, initial-scale=1.0" name="viewport" charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="profile">
		<img src="images/person.png">
		
	</div>
	<div class="profile-info">
		<h1>Chuks Aninye</h1>
		<p class="about">Software Developer with expertise in PHP(laravel)</p>
			<div class="social-media">
				<a href="https://ingressive.org"><img src="images/ifg.png"></a>
				<a href="https://hng.tech"><img src="images/hng.png"></a>
				<a href="https://training.zuri.team"><img src="images/zuri.png"></a>
		
	</div>

	<h2>Expertise</h2>
	<div class="expertise">
		<a href="https://hng.tech"><img src="images/hng.png"></a>		
		<p><b>PHP Laravel</b></p>
		<small>
			Software Developer with expertise in PHP(laravel)		
		</small>
		
	</div>
	<div class="expertise">
		<a href="https://training.zuri.team"><img src="images/zuri.png"></a>		
		<p><b>HTML</b></p>
		<small>
			Software Developer with expertise in HTML		
		</small>
		
	</div>
	<div class="expertise">
		<a href="https://ingressive.org"><img src="images/ifg.png"></a>		
		<p><b>Digital Marketing</b></p>
		<small>
			Software Developer with expertise in CSS		
		</small>
		
	</div>
<h2>My Project work</h2>
       <div class="projects">
       	<a href="">
        <img src="images/pjt1.png">
       	<img src="images/pjt1.png">
       	<img src="images/pjt1.png">
       	<img src="images/ifg.png">
       	<img src="images/ifg.png">
       	<img src="images/ifg.png"></a>
       	
       	
       </div>
 <h2>Contact Me</h2>
       <div class="form-box">
       	<form method="post" action="index.php">
       		<div class="input-group">
       			<input name="firstName" type="text" name="" placeholder="First Name" required>
       			<input name="lastName" type="text" name="" placeholder="Last Name" required>
       		</div>
       		<div class="input-group">
       			<input name="phoneNumber" type="number" name="" placeholder="Phone Number" required>
       			<input name="emailAddress" type="email" name="" placeholder="Email Address" required>
       		</div>
       		<div class="text-area">
       			<textarea name="message" rows="4" placeholder="Your Message" required></textarea>
       		<button class="submit-btn" name="submit" type="submit"> SEND MESSAGE
       			
       		</button>
       			
       		</div>
       		
       	</form>
       	
       </div>
       <div class="contact">
       	<span><a href=""><img src="images/gmail.png">dikeaninye@gmail.com</a></span>  	 
       	 <span><a href=""><img src="images/phone.png">+23488880000000</a></span>
       	 
       </div>
       <p class="copyright">Designed by Tshux Tech</p>
	</div>



</body>
</html>


  <?php  

if(isset($_POST['submit'])) 
{
  $errorMessage = "";
  if(empty($_POST['firstName'])) 
  {
    $errorMessage .="<li>You forgot to enter your firstName</li>";
  }
  if(empty($_POST['lastName'])) 
  {
    $errorMessage .="<li>You forgot to enter your lastName</li>";
  }
  if(empty($_POST['phoneNumber'])) 
  {
    $errorMessage .="<li>You forgot to enter your email</li>";
  }
  if(empty($_POST['emailAddress'])) 
  {
    $errorMessage .="<li>You forgot to enter your password</li>";
  }
  if(empty($_POST['message'])) 
  {
    $errorMessage .="<li>kindly enter same password</li>";
  }
    
      $firstName = mysqli_real_escape_string($connect,$_POST['firstName']);
      $lastName = mysqli_real_escape_string($connect,$_POST['lastName']);
      $phoneNumber = mysqli_real_escape_string($connect,$_POST['phoneNumber']);
      $emailAddress = mysqli_real_escape_string($connect,($_POST['emailAddress']));
      $message = mysqli_real_escape_string($connect,($_POST['message']));
  

  // normally we cout just set the code as $_POST['user'], but it is better we use a string, therefore we use $user=$_POST['user'] then we add the msqli real escape command to strip the code off any excesses and always do not forget to include yout connection string along side

  }

  // step3; we use this codeline to validate the users info input(||(double pipes represent or))

  if(!isset($firstName) || $firstName == '' || !isset($lastName) || $lastName == '' || !isset($phoneNumber) || $phoneNumber == '' || !isset($emailAddress) || $emailAddress == '' || !isset($message) || $message == ''){
       // echo "bad";
    // the below code line is to display an error message when the form isint properly filled
    $error = 'Thank You';
    // the below code is for redirection draging the possible error along
    echo ("<p>Succesfully Submitted</p>\n");
      echo ("<ul>" .$error . "</ul>\n");
  }

       else {
         // echo "good"; we first used echo to test, then since it worked, we now set it to populate the query row in our database using the code below NB same comma order should be followed in both places
        $query = "insert into messages(firstName,lastName,phoneNumber,emailAddress,message)VALUES('$firstName','$lastName','$phoneNumber','$emailAddress','$message')";
        // Else, if it didnt insert we use the !mysqli_connect funtion to ascertain 
        if (!mysqli_query($connect, $query)) {
          die('Error:'.mysqli_error($connect));
        }
        // Else redirect us back to our index page
        else {
           echo "Message Submitted,  Thank You.<br>".$firstName;
                header('Refresh: 2; URL = index.php');
          exit();
      }
    }

  ?>