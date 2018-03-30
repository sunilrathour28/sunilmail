<?php
//error_reporting(E_ALL);
//ini_set('display_errors',1);
$conn = mysqli_connect("localhost","root","ankit@123", "gmail");
$first = $_POST['first'];
$last = $_POST['last'];
$user = $_POST['username'];
$pas = $_POST['password'];

$gen = $_POST['gender'];
$dob = $_POST['dob'];
$phone = $_POST['phone'];
$location = $_POST['location'];
//$name = $_POST['name'];
//$loc = $_POST['loc'];

if(mysqli_query($conn,"insert into signup (first_name, last_name, username, password, gender, dob, phone_no, location) VALUES('$first','$last', '$user','$pas','$gen','$dob','$phone','$location')"))
{
    echo "data inserted ";
}

//if(mysqli_query($conn,"insert into test values('$name','$loc')")){
//    return $msg;
//}
//else
//{
//    return $err;
//}



    if ($_POST['user']) {

        $user = $_POST['user'];

        $sql = mysqli_query($conn, "select username from signup where username like '%$user%' ") or die('not fetched data');
        $arr = mysqli_fetch_array($sql);
        if($user == $arr['username']){
            echo "user already registered";
        }
        else
        {
            for($i=0;$i<5;$i++) {

                $ran = $user . rand(0, 10);
                echo $ran."<br>";
            }
        }

}


