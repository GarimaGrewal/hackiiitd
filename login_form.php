<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1 ">
        <title>User Login</title>
        <link href="css/mystyles.css" rel="stylesheet" type="text/css">
    </head>
    <body onload="loginForm.reset();">
        <section class="entry row">
            <div class="register col-lg-6 col-lg-offeset-3">
                <?php
                /**
                 * Created by PhpStorm.
                 * User: AnushkaM
                 * Date: २७-०६-२०१७
                 * Time: ११:०४
                 */
                    session_start();
                    if(isset($_SESSION['u_name']) && !(empty($_SESSION['u_name']))){
                        header('Location:welcome.php');
                    }
                    else{
                        include "_/includes/session.php";
                    }
                ?>
            </div>
        </section>

        <script src="_/js/myscript.js"></script>

    </body>
</html>

