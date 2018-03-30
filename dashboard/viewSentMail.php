<?php
include_once 'dashboardFunction.php';

$user_pic = $_SESSION['username'];
$uemail = $_SESSION['email'];
$id = $_GET['id'];
$inboxMail = new dashboardFunction();
$editInbox = $inboxMail->viewSentMail($id, $uemail);
$inboxDisplay = mysqli_fetch_array($editInbox);
$receiver =$inboxDisplay['receiver'];
$user_file = $inboxDisplay['user_file'];
$trash_id = $inboxDisplay['trash_status'];
$sender = $inboxDisplay['sender'];
$profile_pic = $inboxDisplay['pic'];
$username = $inboxDisplay['username'];


    ?>
    <script>
        $('#sent span').css('color', '#e07a04');
        $('#sent').css({'background-color': '#d6d5d4'});
    </script>


<div id="forDisplayEmail">

        <div id="photo">
            <img id="inbox_pic" class="img-responsive" src="../images/<?php echo "$username/$profile_pic";  ?>">
            <div id="from"><strong>To:&nbsp;</strong><span id="receiver"><?php echo $inboxDisplay['receiver'];  ?></span></div>
        </div>
    <div id="inbox_detail">

        <p><span id="mailTime"><?php echo $inboxDisplay['mail_time'];  ?></span></p>
        <p><strong>subject:&nbsp;</strong><?php echo $inboxDisplay['subject'];  ?></p>
        <p><strong>message:&nbsp;</strong><?php echo $inboxDisplay['message'];  ?></p>


    </div>
    <div id="displayAttach" >
        <?php
        if($user_file)
        {
            ?>
            <img id="user_file" class="img-responsive" src="images/<?php echo "$sender/$user_file"; ?>">
            <?php
        }
        ?>
    </div>
</div>