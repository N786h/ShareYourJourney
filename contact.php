<!DOCTYPE html>
<html>
    <head>
        <title>ShareYourJourney</title>
            <link href="https://fonts.googleapis.com/css?family=Nova+Square" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <div class="container">
            <header class="boxed">
                <nav>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="signin.php">SignIn</a></li>
                        <li><a href="registration.php">SingUp</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </nav>
                <div>
                    <a href="index.html"><img src="images/logo.jpg" height=100 width=100 border=5/></a>
                </div>
            </header>

            <section id="main" class="boxed">
                <marquee direction=right scrollamount=10 bgcolor=#ffc456><h2>CONTACT US</h2></marquee>
                <div id="section">

                <div class="login-form boxed">
                    <?php
                    if(isset($_POST['submit'])){
                         $subject = $_POST['name'];
                         $to = 'shareyourjourney03@gmail.com';
                         $message = $_POST['message'];
                        if(mail($to,$subject,$message,'Reply-To: '.$_POST['email']))
                        {?>
                            <script>
                                alert("Mail send");
                            </script>
                        <?php }
                        else
                        {?>
                            <script>
                                alert("Failed");
                            </script>
                        <?php }
                    }
                    ?>
                    <form id="loginForm" method="post" action="#" enctype="multipart/form-data">
                        <input name="name" type="text" placeholder="Your Name" required autofocus=""><br>    
                        <input name="email" type="email" placeholder="Your Email" required><br> 
                        <textarea name="message" placeholder="Message" rows="4" required></textarea><br>
                        <input type="submit" value="SEND MESSAGE" name="submit">
                    </form>
                    <fieldset>
                        <legend><span style="color:#BDBDBD;font-size:40px">CONTACT</span></legend>
                        <span style="color:#00B0FF;font-size:20px;text-decoration: underline">MOBILE NO:</span><br>
                        +919554082634<br>
                        +918896987271<br>
                        +918799271243<br>
                        <span style="color:#00B0FF;font-size:20px;text-decoration: underline">Email ID:</span><br>
                        <a href="https://www.gmail.com">shareyourjourney03@gmail.com</a>
                        <span style="color:#00B0FF;font-size:20px;text-decoration: underline">Whatsapp No.:</span><br>
                        +918799271243<br>
                        <span style="color:#00B0FF;font-size:20px;text-decoration: underline">ADDRESS:</span><br>
                        B-646, G.T.B. NAGAR,<br>
                        KARELI, ALLAHABAD<hr>
                        <marquee><span style="color:#FF9E80;font-size:25px">Thank You for visiting our website</span></marquee><hr>
                    </fieldset>
                </div>
            </section>
            <footer class="boxed">
                copyright &copy; 2018 All Rights Reserverd email : shareyourjourney03@gmail.com
            </footer>
        </div>
    </body>
</html>