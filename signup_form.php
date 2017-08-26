<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1 ">
        <link href="_/css/bootstrap.css" rel="stylesheet" media="screen">
        <!--<link href="_/css/mystyles.css" rel="stylesheet" media="screen">-->
        <title>User Login</title>
    </head>
    <body onload="signupForm.reset()">

        <section class="entry">

            <div>
                <?php
                $u_name="";
                $f_name = "";
                $email = "";
                $pass="";
                $c_pass="";
                if(isset($_POST['u_name']) && isset($_POST['f_name']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['c_pass'])){
                    $u_name = $_POST['u_name'];
                    $f_name = $_POST['f_name'];
                    $email = $_POST['email'];
                    $pass= $_POST['pass'];
                    $c_pass= $_POST['c_pass'];

                    if(!(empty($u_name)) && !(empty($f_name)) && !(empty($email)) && !(empty($pass)) && !(empty($c_pass))){
                        $pass = sha1($pass);
                        $c_pass = sha1($c_pass);
                        if($c_pass!=$pass){
                            ?><script type="text/javascript">alert("Passwords Strings NOT Equal")</script><?php
                        }else{
                            include "_/DbConnect/Dbase.php";
                            $objDb = new DbConnect();
                            $objDb->prepare_Insert(array(
                                'user_name' => $u_name,
                                'full_name' => $f_name,
                                'email_id' => $email,
                                'password' => $pass
                            ));
                            $objDb->insert('user_table') || die("Request couldn't be processed");
                            ?><script type="text/javascript">alert("Form submited")</script><?php
                            header("Location: login_form.php");
                        }
                    }else{
                        ?><script type="text/javascript">alert("All the fields are mandatory")</script><?php
                    }
                }
                ?>
               <form  id="signupForm" method="post">
                   <legend style="margin-bottom: 2%;" ><strong>Sign Up</strong></legend>
                   <section>
                       <label>User Name:</label>
                       <input id="u_name" type="text" name="u_name" onkeyup="validateForm(this)" placeholder="Username" required />
                   </section>
                   <section>
                       <label>Full Name:</label>
                       <input id="f_name" type="text" name="f_name" onkeyup="validateForm(this)" placeholder="Full name" required />
                   </section>
                   <section>
                       <label>Email Id:</label>
                       <input type="text" id="email" name="email" onkeyup="validateForm(this)" placeholder="Email-ID" required />
                   </section>
                   <section>
                       <label>Password:</label>
                       <input type="password" id="pass" name="pass" minlegth="" onkeyup="validateForm(this)" placeholder="Username" required />
                   </section>
                   <section>
                       <label>Confirm Password:</label>
                       <input type="password" id="c_pass" name="c_pass" onkeyup="validateForm(this)" placeholder="Username" required />
                   </section>
                   <section>
                       <input type="submit" value="Submit" name="submit" />
                   </section>
                   <a href="login_form.php">Log In</a>
               </form>

            </div>
        </section>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="_/js/bootstrap.js"></script>
        <script src="_/js/myscript.js"></script>

        <script src="_/js/npm.js"></script>

    </body>
</html>

