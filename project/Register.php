<!DOCTYPE html>
<html>
    <head>
        <title>Register Page</title>
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
        <section>
            <form method="get" novalidate>
                <center>
                    <table>
                        <tr>
                            <td>Name:</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td><input type="text" id="uname" name="uname" pattern="[a-zA-Z]*$" required>
                                <p class="p1" id="err1"></p>
                            </td>
                        </tr>
                        <tr>
                            <td><br></td>
                        </tr>
                        <tr>
                            <td>E-Mail</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td><input type="email" name="email" id="email" required>
                                <p class="p1" id="err2"></p>
                            </td>
                        </tr>
                        <tr>
                            <td><br></td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td><input type="tel" name="number" id="number" pattern="[0-9]{10}" required>
                                <p class="p1" id="err3"></p>
                            </td>
                        </tr>
                        <tr>
                            <td><br></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td><input type="password" name="pass" id="pass" minlength="3" maxlength="10" required>
                                <p class="p1" id="err4"></p>
                            </td>
                        </tr>
                        <tr>
                            <td><br></td>
                        </tr>
                        <tr>
                            <td>Confirm Password</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td><input type="password" name="cpass" id="cpass" minlength="3" maxlength="10" required>
                                <p class="p1" id="err5"></p>
                            </td>
                        </tr>
                        <tr>
                            <td><br></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="reg_submit" id="reg_submit" value="Register" style="background-color: #C5A978;font-size: 17px;padding: 15px 50px;text-align: center;border-radius: 10px;"></td>
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
        <?php
        if(isset($_GET['reg_submit']))
        {
            $conn = mysqli_connect("localhost","root","","17PCSA516");
            $name = $_GET['uname'];
            $mail = $_GET['email'];
            $number = $_GET['number'];
            $pass = $_GET['pass'];
            $cpass = $_GET['cpass'];
            if(!$conn)
            {
                die ('could not connect'.mysql_error());
            }
            $query ="INSERT INTO Register (Name,Email,Number,Password,CPassword) VALUES ('$name','$mail','$number','$pass','$cpass')";
            mysqli_query($conn,$query);
            //$_SESSION['User']=$_GET['uname'];
            //echo 'Inserted Successfully';
        }
        ?>
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
            var btns=document.getElementById('reg_submit');
            function checking()
            {
                var checkes=1;
                var names=document.getElementById('uname');
                if(names.checkValidity)
                {
                    document.getElementById("err1").innerHTML=names.validationMessage;
                    if(names.validationMessage.toString().length!=0)
                        checkes=0;
                }
                var email=document.getElementById('email');
                if(email.checkValidity)
                {
                    document.getElementById("err2").innerHTML=email.validationMessage;
                    if(email.validationMessage.toString().length!=0)
                        checkes=0;
                }
                var phone=document.getElementById('number');
                if(phone.checkValidity)
                {
                    document.getElementById("err3").innerHTML=phone.validationMessage;
                    if(phone.validationMessage.toString().length!=0)
                        checkes=0;
                }
                if(phone.validity.patternMismatch)
                {
                    document.getElementById("err3").innerHTML="Invalid Number";
                }
                var pass=document.getElementById('pass');
                if(pass.checkValidity)
                {
                    document.getElementById("err4").innerHTML=pass.validationMessage;
                    if(pass.validationMessage.toString().length!=0)
                        checkes=0;
                }
                var cpass=document.getElementById('cpass');
                if(cpass.checkValidity)
                {
                    document.getElementById("err5").innerHTML=cpass.validationMessage;
                    if(cpass.validationMessage.toString().length!=0)
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