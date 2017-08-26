
    <?php
    $email = "";
    $mno= "";
    $current_file = $_SERVER['SCRIPT_NAME'];
    $login_fail = false;
    if(isset($_POST['id'])  && isset($_POST['mno'])){
        $email = $_POST['id'];
		$mno= $_POST['mno'];
        if(!(empty($email)) && !(empty($mno))){            
            include "./_/DbConnect/Dbase.php";
            $obDb  = new DbConnect();
            $table = 'user_table';
            $query = "SELECT * FROM `{$table}` where `id`='{$email}' AND `mno`='{$mno}'";
			$runQuery = $obDb->run_query($query);
            $fetch = mysqli_fetch_assoc($runQuery);
            if(empty($fetch)){
                $login_fail=true;
            }
            else{                
				$_SESSION['name'] = $fetch['name'];
				$_SESSION['id'] = $fetch['id'];
				$_SESSION['mno'] = $fetch['mno'];
				$_SESSION['clg'] = $fetch['clg'];
				$_SESSION['year'] = $fetch['year'];
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
		<div>
        <section >
			<label>Email-ID:</label>
			<span class="highlight"></span>
			<span class="bar"></span>
			<input id="id" type="text" name="id" onkeyup="validateForm(this)"  required />
        </section>
        <section >
            <label>Contact No:</label>
			<span class="highlight"></span>
			<span class="bar"></span>
			<input type="text" id="mno" name="mno" onkeyup="validateForm(this)"  required />       
        </section>
        <section>
            <button class="btn btn-info" type="submit" name="submit">Log In</button>
        </section>
            <a class="btn btn-success" href="signup_form.php">Sign Up</a>
		
    </form>
</div>