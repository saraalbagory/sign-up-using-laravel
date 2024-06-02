<?php
/*function connectDb(){
   
}
*/
function register($conn)
{
    echo "entered";
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
       
        $fullname=mysqli_real_escape_string($conn,$_POST['full-name']);
        $username=mysqli_real_escape_string($conn,$_POST["user-name"]) ;
        $pwd=mysqli_real_escape_string($conn,$_POST['password']);
        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $phone=mysqli_real_escape_string($conn,$_POST['phone']);
        $birthday=$_POST['birthday'];
        $_address=$_POST['address'];
    

        $sql_insert="INSERT INTO users (username,fullname,pwd,email,birthday,address,phone) VALUES ( '$username','$fullname','$pwd','$email','$birthday','$_address','$phone') ";

        mysqli_query($conn,$sql_insert);
        mysqli_close($conn);
       header("Location: ../index.php?sinup=success");

    }
}


    $dbServername="localhost";
    $dbUsername="root";
    $password="";
    $dbName="usersdb";

    $conn=mysqli_connect($dbServername,$dbUsername,$password,$dbName);
    if (!$conn) {
        echo "faild";
    die("Connection failed: " . mysqli_connect_error());
    }
   /* $sql="SELECT * FROM users";
      $result =mysqli_query($conn,$sql);
      $resultCheck= mysqli_num_rows($result);
   if($resultCheck>0)
      {
        //fetch data and insert each row to $row as an array
        while ($row=mysqli_fetch_assoc($result))
        {
            echo $row['username'];
        }
      }*/
    register($conn);

