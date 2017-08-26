<div class="register">
    <?php
    $u_name = "";
    $pass= "";
    $current_file = $_SERVER['SCRIPT_NAME'];
    $login_fail = false;
    if(isset($_POST['u_name'])  && isset($_POST['pass'])){
        $u_name = $_POST['u_name'];
        $pass = $_POST['pass'];
        if(!(empty($u_name)) && !(empty($pass))){
            $pass = sha1($pass);
            include "./_/DbConnect/Dbase.php";
            $obDb  = new DbConnect();
            $table = "user_table";
            $query = "SELECT * FROM `{$table}` where `user_name`='{$u_name}' AND `password`='{$pass}'";
            $testQuery = $obDb->run_query($query);
            $fetchAll = mysqli_fetch_assoc($testQuery);
            if(empty($fetchAll)){
                $login_fail=true;
            }
            else{
                $_SESSION['u_name'] = $fetchAll['user_name'];
                header('Location:./welcome.php');
            }
        }
    }
    ?>
    <form id="loginForm" action="<?php echo $current_file; ?>" method="POST">
        <legend style="margin-bottom: 2%;" ><strong>Login</strong></legend>
        <?php
            if($login_fail){
                ?>
                <p style="color: red;">Incorrect username/password</p>
            <?php
            }
        ?>
        <section >

            <label >Username:</label>
            <div >
                <input  type="text" name="u_name" placeholder="Username" required>
            </div>
        </section>
        <section >
            <label >Password:</label>
            <div >
                <input  type="password" name="pass" placeholder="Password" required>
            </div>
        </section>
        <section >
            <button type="submit" >Login</button>
        </section>
        <section>
            <a href="signup_form.php">Sign Up</a>
        </section>
    </form>
</div>