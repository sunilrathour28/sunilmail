<?php
include_once 'dashboardFunction.php';

//$user_pic = $_SESSION['username'];
$uemail = $_SESSION['email'];
$id = $_GET['id'];
$inboxMail = new dashboardFunction();
$editInbox = $inboxMail->editInbox($id);
$inboxDisplay = mysqli_fetch_array($editInbox);
$receiver =$inboxDisplay['receiver'];
$sender =$inboxDisplay['sender'];
$user_file = $inboxDisplay['user_file'];
$username = $inboxDisplay['username'];
$sender_profile = $inboxDisplay['pic'];
$download = rand(0,10000);

?>
<script>
    $('#inbox span').css('color','#ce183d');
    $('#inbox').css({'background-color':'#d6d5d4'});
</script>

<div id="forDisplayEmail">

        <div id="photo">
            <?php
            if($sender_profile) {

                ?>
                <img id="inbox_pic" class="img-responsive" src="../images/<?php echo "$username/$sender_profile"; ?>">
                <?php
            }
            else
            {
                ?>
                <img id="inbox_pic" class="img-responsive" src="../images/user1.png">
            <?php

            }
            ?>
            <div id="from"><strong>from:&nbsp;</strong><span id="receiver"><?php echo $inboxDisplay['sender'];  ?></span></div>
        </div>
    <div id="inbox_detail">


        <p><strong>subject:&nbsp;</strong><?php echo $inboxDisplay['subject'];  ?></p>
        <p><strong>message:&nbsp;</strong><?php echo $inboxDisplay['message'];  ?></p>
        <p><span id="mailTime"><?php echo $inboxDisplay['mail_time'];  ?></span></p>

    </div>
    <div id="displayAttach" >
        <a  href="images/<?php echo "$sender/$user_file";  ?>" id="down" download="<?php echo $sender.$download;  ?>">
        <img id="user_file" class="img-responsive" src="images/<?php echo "$sender/$user_file";  ?>" alt="<?php echo $sender;  ?>">
            <span id="download1" class="material-icons">file_download</span>
        </a>

    </div>
</div>

<div id="forReply">

    <?php
    $ToReply = $inboxMail->displayReply($uemail, $id);

    while($arr6 = mysqli_fetch_array($ToReply))
    {

    ?>
    <ul id='replyList'>

        <li>
            To: <?php echo $arr6['receiver']; ?></li>
        <li>message:<?php echo $arr6['message']; ?></li>
    </ul>

<?php
}
?>
</div>
<div id="reply">
    <form method="post">
        <input type="hidden" id="replySender" value="<?php echo $inboxDisplay['receiver']; ?>">
        <input type="hidden" id="replyReceiver" value="<?php echo $inboxDisplay['sender']; ?>">
        <input type="hidden" id="mailId" value="<?php echo $inboxDisplay['id']; ?>">
        <input type="hidden" id="replySubject" value="<?php echo $inboxDisplay['subject']; ?>">
        <div class="form-group">
            <label class="control-label">Reply to <span id="chatSender"><?php echo $inboxDisplay['sender'];   ?></span></label>
            <textarea name="replyMessage" class="form-control" rows="5" id="replyMessage" placeholder="type message..."></textarea>
        </div>
        <div class="form-group">
            <span id="replyAttach" class="material-icons">attachment</span>
            <span id="replyAttachText"></span>
            <input type="file" name="replyFile" id="replyFile">
        </div>
        <div class="form-group">
            <button type="button" id="messageSubmit">Send</button>
        </div>
    </form>
</div>

