<?php


class signup{
    public $status = "";
}


    include 'DBcon.php';
    $conn = getConnection();

    $signUp = new signup();
    $email = strtolower($_POST['email']);
    $password=$_POST['password'];

    $sql = "SELECT email FROM users WHERE email='$email'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) == 0){
        //email doesn't exist.good to go...

        $emailDelimit = explode("@",$email);
        $usrName = $emailDelimit[0];
        $passwordDB = md5($password);
        $sql1 = "INSERT INTO users (uName, email,pwd) VALUES ('$usrName','$email','$passwordDB')";

        if (mysqli_query($conn, $sql1)) {
            // User successfully added
            $signUp -> status = "sucess";
            echo json_encode($signUp);
        } else {
            $signUp -> status = "error";
            echo json_encode($signUp);
        }

    }else {
        //email exist
        $signUp -> status = "exist";
        echo json_encode($signUp);
    }

    mysqli_close($conn);

?>