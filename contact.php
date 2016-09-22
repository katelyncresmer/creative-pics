<!doctype html>
<html>
<head>
<link rel="stylesheet"  href="css/reset.css">
<link rel="stylesheet"  href="css/style.css">
<meta charset="utf-8">
<title>Creative Pics</title>
<link href="img/logo.png" type="image/x-icon" rel="icon"/>
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700|Expletus+Sans' rel='stylesheet' type='text/css'>
<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body id="aboutbody">
<header>
<h1>Contact Creative Pics</h1>
</header>
 <?php
                if (isset($_REQUEST['email']))
        //if "email" is filled out, send email
                {
        //send email
                    $name = $_REQUEST['name'] ;
                    $phone = $_REQUEST['phone'] ;
                     $email = $_REQUEST['email'] ;
                     $subject = $_REQUEST['subject'] ;
                     $message = $_REQUEST['message']."     Name: ".$name ."     Phone Number: ".$phone ."     Email: ".$email." " ;
                     mail("creativepics@katelynhare.com", $subject, $message, "From:" . $email);
                     echo "<h3>Thank you for your contacting Creative Pics</h3> ";
                }
                else
        //if "email" is not filled out, display the form
                {
                    echo "<form method='post' action='contact.php'>
                    
                        <p class='form-p'>Name:<br><input name='name' type='text'></p>
                        <p class='form-p'>Phone Number:<br><input name='phone' placeholder='(xxx)xxx-xxxx' type='text'></p>
                        <p class='form-p'>Email Address:<br><input name='email' type='email' ></p>
                        <p class='form-p'>Subject:<br><input name='subject' type='text'></p>
                        <p class='form-p'>Message:</p>
                          <textarea name='message' rows='10' cols='40'></textarea>
                          <br>
                          <input type='submit'>
                          </form>";
                }
                
            ?>
</ul>
</body>
</html>