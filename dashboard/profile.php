<?php
session_start();
$first = $_SESSION['first'];
$last = $_SESSION['last'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$phone = $_SESSION['phone'];
$location = $_SESSION['location'];
$img = $_SESSION['image1'];
?>

<div class="col-md-6 myProfile">
<h3>User Information</h3>
<div class="userImage">
    <img src="../images/<?php echo "$username/$img"; ?>" id="userImg">
</div>
<table class="table">
    <tr>
        <td>Full Name</td>
        <td><?php echo $first." $last";  ?></td>
    </tr>
    <tr>
        <td>Username</td>
        <td><?php echo $username;  ?></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><?php echo $email;  ?></td>
    </tr>
    <tr>
        <td>Contact no.</td>
        <td><?php echo $phone;  ?></td>
    </tr>
    <tr>
        <td>location</td>
        <td><?php echo $location;  ?></td>
    </tr>
</table>
</div>
