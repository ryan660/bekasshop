<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    include_once("config.php");
        
    $username = $_POST['username'];
    $password = $_POST['password'];
        
    if( $username == '' || $password == '' ){
        echo json_encode(array( "status" => "false","message" => "Parameter missing!") );
    }else{
        $query= "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result= mysqli_query($con, $query);
            
        if(mysqli_num_rows($result) > 0){  
            $query= "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $result= mysqli_query($con, $query);
            $emparray = array();
            if(mysqli_num_rows($result) > 0){  
                while ($row = mysqli_fetch_assoc($result)) {
                    $emparray[] = $row;
                }
            }
                echo json_encode(array( "status" => "true","message" => "Login successfully!", "data" => $emparray) );
            }else{ 
                echo json_encode(array( "status" => "false","message" => "Invalid username or password!") );
            }
                mysqli_close($con);
    }
}
else{
    echo json_encode(array( "status" => "false","message" => "Error occured, please try again!") );
}
?>