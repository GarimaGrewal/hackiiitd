

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
            include "Dbase.php";
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

