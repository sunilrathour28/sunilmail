<?php
//error_reporting(E_ALL);
//ini_set('display_errors',1);
require_once ('database/dbconnect.php');




    class signupFunction
    {
        public $sql;

        function __construct()
        {
            $db = new dbConnect();
            $this->sql = $db->conn;
        }

        public function getLogin($email, $password, $imgname)
        {
            $password = md5("$password");
            $select = mysqli_query($this->sql,"select * from users where username = '$email' or email = '$email'") or die('login query not working');
            $array = mysqli_fetch_array($select);


            if(($array['email']==$email || $array['username']== $email) && ($array['password']==$password))
            {
                session_start();
                $_SESSION['username']=$array['username'];
                $_SESSION['email']=$array['email'];
                $_SESSION['first']= $array['first_name'];
                $_SESSION['last']= $array['last_name'];
                $_SESSION['phone']= $array['phone_no'];
                $_SESSION['location']= $array['location'];
                $_SESSION['image'] = $imgname;
                echo "<script>location.href='dashboard/index.php?page=inbox';</script>";
            }
            else
            {
                echo "<div class='alert alert-danger' >username/Email and password not matched</div>";
            }
        }

        function signup($first, $last, $user, $pas, $confirm, $dob, $phone, $location, $imgname, $tmp)
        {

            $email = $user."@hestamail.com";
            if ($pas == $confirm) {
                $password = md5("$pas");
                $insert =mysqli_query($this->sql, "insert into users (first_name, last_name, username, email, password, dob, phone_no, location) VALUES('$first','$last', '$user','$email','$password','$dob','$phone','$location')") or die('not inserted ');
                $attach1 = mysqli_query($this->sql, "insert into user_photo(username, pic) values('$user','$imgname')") or die('attachment not inserted');
                if($attach1)
                {
                    mkdir("images/$user", 0777, true);
                    chmod("images/$user", 0777);
                    move_uploaded_file($tmp,"images/$user/$imgname");

                }
                if($insert && $attach1)
                {
                    $this->getLogin($user, $pas, $imgname);
                }
            }
            else {

                echo "password and confirm password not matched";
            }
        }

        public function checkAvailability($user)
        {
            $check = mysqli_query($this->sql, "select username, last_name, first_name, location from users where username like '%$user%'");
            $arr = mysqli_fetch_array($check);
            if($arr['username']== $user)
            {
                echo "<div class='alert alert-danger'>username already taken</div>"."Suggested usernames";
                    for($i=0;$i<3;$i++)
                    {

                        $arr_rand = array($arr['last_name'], $arr['first_name'], $arr['location']);
                        $ar = $arr_rand[rand(0, 3)];
                        $suggestion = $user . $ar . rand(10, 1000);
                        $check2 = mysqli_query($this->sql, "select username from users where username like '%$suggestion%'");
                        $checkarr = mysqli_fetch_array($check2);
                        if ($checkarr['username'] == "") {
                            ?>

                            <li id='suggest'><?php echo $suggestion;?></li>

                            <script>
                                $('#list li').click(function () {
                                   var username1 = $(this).html();
                                   $('#username').val(username1);
                                   $('#list').hide();
                                });
                            </script>
                    <?php
                        }
                    }
                    ?>
<?php

            }
            else
            {
                echo "<span style='color: green; font-size: 17px; font-weight: bolder'>Username available</span>";
            }
        }




    }

    $sign = new signupFunction();

if($_POST['first']) {

    $first = $_POST['first'];
    $last = $_POST['last'];
    $user = $_POST['username'];
    $pas = $_POST['pas'];
    $confirm = $_POST['cpas'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];
    $imgname = $_FILES['file']['name'];

    $tmp = $_FILES['file']['tmp_name'];


    $sign->signup($first, $last, $user, $pas, $confirm, $dob, $phone, $location, $imgname, $tmp);
}

if($_POST['user'])
{
    $checkUser = $_POST['user'];
    $sign->checkAvailability($checkUser);
}

if($_POST['email']){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sign->getLogin($email, $password);
}
