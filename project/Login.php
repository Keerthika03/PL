<?php
$conn = mysqli_connect("localhost","root","","17PCSA516");
        session_start();                                                     if(isset($_GET['login_submit']))
        {
            $email=$_GET['email'];
            $pass=$_GET['pass'];
            if(!$conn)
            {
                die ('could not connect'.mysql_error());
            }
            $query=mysqli_query($conn,"SELECT * FROM Register WHERE Email='$email' and Password='$pass'");
            $v = "SELECT * FROM Register WHERE Email='$email' and Password='$pass'";
            $num=mysqli_fetch_array($query);
            if($num>0)
            {
                $extra="Booking_Form.php";//
                $host=$_SERVER['HTTP_HOST'];
                $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
                header("location:http://$host$uri/$extra");
                exit();
            }
            else
            {
                $_SESSION['errmsg']="Invalid Email no or Password";
                //$error = "Invalid Email no or Password";
                /*$extra="Login.php";
                $host  = $_SERVER['HTTP_HOST'];
                $uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
                header("location:http://$host$uri/$extra");
                exit();*/
            }
        }
        ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <!-- Sidebar (hidden by default) -->
        <nav class="sidebar bar-block card top animate-left" style="display:none;z-index:2;width:5%;min-width:200px;height: auto;background-color: black;color: white;margin-left: -8px" id="mySidebar">
            <br>
            <a href="javascript:void(0)" onclick="w3_close()" class="bar-item button" style="color: #9F8B27;font-size: 20px">☰</a>
            <a href="Rooms.html" onclick="w3_close()" class="bar-item button">ROOMS</a>
            <a href="#Location" onclick="w3_close()" class="bar-item button">LOCATION</a>
            <a href="#Gallery" onclick="w3_close()" class="bar-item button">GALLERY</a>
            <a href="#FAQ" onclick="w3_close()" class="bar-item button">FAQ</a>
            <a href="#Contact" onclick="w3_close()" class="bar-item button">CONTACT US</a>
        </nav>
        
        <!-- Top menu -->
        <section class="head">
            <div style="max-width:1200px;">
                <div class="button padding-16 left" onclick="w3_open()" style="font-size: 20px">☰</div>
                <div class="left padding-16" style="font-size: 14px; margin-top: 5px;"><strong>FURAMA RIVERFRONT</strong></div>
                <div class="center padding-16">
                    <a href="Main.html">
                    <img src="Images/logo.png" height="30px">
                    </a>
                </div>
            </div>
            <img src="Images/nw_h_Rooms.jpg" width="101.2%" height="440px" style="margin-left: -8px;box-shadow: 2px -1px 2px 1px black">
        </section>
        <br>
        <section style="padding-left: 10%;">
            <a href="Login.php" class="href_style" style="background-color: #C5A978">Login</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="Register.php" class="href_style" style="background-color: #C5A978">Sign Up</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </section>
        <br>
        <br>
        <!--Login Details-->
        <section>
            <form method="GET" novalidate>
                <center>
                    <table>
                        <tr>
                            <td>E-Mail</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td><input type="email" name="email" id="email" required>
                                <p class="p1" id="err1"></p>
                            </td>
                        </tr>
                        <tr>
                            <td><br></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td><input type="password" name="pass" id="pass" required>
                                <p class="p1" id="err2"></p>
                            </td>
                        </tr>
                        <tr>
                            <td><br></td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo htmlentities($_SESSION['errmsg']); ?>
                                <?php echo htmlentities($_SESSION['errmsg']="");?>
                            </td>
                        </tr>
                        <tr>
                            <td><br></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="login_submit" id="login_submit" value="Login" style="background-color: #C5A978;font-size: 17px;padding: 15px 50px;text-align: center;border-radius: 10px;"></td>
                        </tr>
                    </table>
                </center>
            </form>
        </section>
        <br>
        <!--Footer-->
        <footer style="background-color: #B3B1B1;margin-left: -8px;margin-right: -8px;">
            <br>
            <br>
            <p style="margin-left: 25px;">OUR BRANDS</p>
            <br>
            <img src="Images/logo.png" width="10%">
            <img src="Images/xclusive.png" width="10%"><img src="Images/fx.png" width="3%">
           <table style="margin-top: -80px;margin-left: 530px;">
               <tr>
                   <td style="font-size: 20px;">FURAMA RIVERFRONT</td>
               </tr>
               <tr>
                   <td>405 Havelock Road, Singapore 169633</td>
               </tr>
               <tr>
                   <td><strong>Tel</strong> (65) 6333 8898 Fax (65) 6733 1588</td>
               </tr>
               <tr>
                   <td><strong>Email</strong> riverfront@furama.com</td>
               </tr>
            </table>
            <br>
            <br>
        </footer>

        <script>
            // Script to open and close sidebar
            function w3_open()
            {
                document.getElementById("mySidebar").style.display = "block";
            }

            function w3_close()
            {
                document.getElementById("mySidebar").style.display = "none";
            }
            
            //Error Message
            var btns=document.getElementById('login_submit');
            function checking()
            {
                var checkes=1;
                var email=document.getElementById('email');
                if(email.checkValidity)
                {
                    document.getElementById("err1").innerHTML=email.validationMessage;
                    if(email.validationMessage.toString().length!=0)
                        checkes=0;
                }
                var pass=document.getElementById('pass');
                if(pass.checkValidity)
                {
                    document.getElementById("err2").innerHTML=pass.validationMessage;
                    if(pass.validationMessage.toString().length!=0)
                        checkes=0;
                }
                if(checkes==0)
                {
                    return false;
                }
                else
                {
                    return true;
                }
           
            };
            btns.onclick=function(e)
            { 
                var checkes=checking();
                if(checkes==false)
                    {
                        e.preventDefault();
                    }
            };
        </script>
    </body>
</html>

