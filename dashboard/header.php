<?php
session_start();
$user = $_SESSION['username'];
$first = $_SESSION['first'];
$image = $_SESSION['image'];

include_once 'dashboardFunction.php';
$img = new dashboardFunction();
$userimage = $img->userImage($user);
extract($userimage);
$_SESSION['image1']=$pic;

if($user == "")
{
    header('location:../index.php');
}
else {


}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hestamail dashboard</title>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/dashboard.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dashboard.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



</head>
<body>

<header>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="logo">
                    <img src="images/logo2.png" id="companyLogo">
                </div>
            </div>

            <div class="col-md-8">
                <div class="search">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control input-md" id="searchMail" placeholder="search..">
                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
                    <div class="form-group">
                        <ul class="searchResult">

                        </ul>
                    </div>
                </div>
                <div class="userPic">
                    <div class="dropdown">
                        <?php
                        if ($pic)
                        {

                            ?>
                            <img data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                 src="../images/<?php echo "$user/$pic"; ?>" class="profile-circle"/>
                            <?php
                        }
                        else
                        {
                           ?>
                            <img data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                 src="../images/user1.png" class="profile-circle"/>
                        <?php
                        }
                        ?>
                        <ul class="dropdown-menu" >
                            <li><a href="?page=viewProfile"><span class="fa fa-user"></span>Profile</a> </li>
                            <li><a href="?page=password"><span class="fa fa-key"></span>change password</a> </li>
                            <li><a href="logout.php"><span class="fa fa-sign-out"></span>Sign out</a> </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</header>


