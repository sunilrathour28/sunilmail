<?php

require_once ('header.php');
$value = $_GET['page'];
$email= $_SESSION['email'];

$inboxMail = new dashboardFunction();
$num=$inboxMail->inbox($email);
$sent=$inboxMail->sentMail($email);
$draft=$inboxMail->draftMail($email);
$trash=$inboxMail->trash($email);
$num_value =mysqli_num_rows($num);
$sent_value = mysqli_num_rows($sent);
$draft_value = mysqli_num_rows($draft);
$trash_value = mysqli_num_rows($trash);
?>
<div class="container">
    <div class="row myrow">
        <div class="col-md-3">
            <div class="sidebar">
                <ul>
                    <li><span data-toggle="modal" data-target=".composeEmail" id="compose">Compose</span> </li>
                    <li id="inbox"><span>Inbox</span> <span class="badge"><?php echo $num_value; ?></span> </li>
                    <li id="sent"><span >Sent mail</span><span class="badge"><?php echo $sent_value; ?></span> </li>
                    <li id="draft"><span>Draft</span> <span class="badge"><?php echo $draft_value; ?></span></li>
                    <li id="trash"><span>Trash</span> <span class="badge"><?php echo $trash_value; ?></span> </li>

                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="content-page">
                <?php
                switch ($value)
                {
                    case 'compose':{
                        include_once 'compose.php';
                        break;
                    }
                    case 'inbox':{
                        include_once 'inbox.php';
                        break;
                    }
                    case 'draft':{
                        include_once 'draft.php';
                        break;
                    }
                    case 'sent':{
                        include_once 'sentmail.php';
                        break;
                    }
                    case 'editPage':{
                        include_once 'editPage.php';
                        break;
                    }

                    case 'trash':{
                        include_once 'trash.php';
                        break;
                    }
                    case 'viewSent':{
                        include_once 'viewSentMail.php';
                        break;
                    }
                    case 'viewTrash':{
                        include_once 'viewTrash.php';
                        break;
                    }
                    case 'viewDraft':{
                        include_once 'viewDraft.php';
                        break;
                    }
                    case 'viewProfile':{
                        include_once 'profile.php';
                        break;
                    }
                    case 'password':{
                        include_once 'changePassword.php';
                        break;
                    }
                }

                include 'compose.php';
                ?>
            </div>
        </div>
    </div>
</div>
