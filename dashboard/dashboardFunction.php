<?php
//error_reporting(E_ALL);
//ini_set('display_errors',1);
require_once '../database/dbconnect.php';


class dashboardFunction
{
    public $dbcon;

    function __construct()
    {
        $db1 = new dbConnect();
        $this->dbcon = $db1->conn;
    }
    public function Mail($sender, $receiver, $subject, $message, $imgname, $tmp)
    {
        $rand1 = rand(0,100000);


        $sent = mysqli_query($this->dbcon, "insert into mail(sender, receiver, subject, message, attachment_id) values('$sender', '$receiver', '$subject', '$message',$rand1)") or die('mail not sent');
        $attach1 = mysqli_query($this->dbcon, "insert into attachment(mail_id, user_file) values($rand1,'$imgname')") or die('attachment not inserted');
        if($attach1)
        {
            mkdir("images/$sender", 0777, true);
            chmod("images/$sender", 0777);
            move_uploaded_file($tmp,"images/$sender/$imgname");

        }
        if($sent && $attach1)
        {
            echo "your mail has been sent";
        }
        else
        {
            echo "Mail not sent";
        }

    }
    public function draft($sender, $receiver, $subject, $message)
    {
        $draft = mysqli_query($this->dbcon, "insert into mail(sender, receiver, subject, message, draft_status) values('$sender', '$receiver', '$subject', '$message', 1)") or die('draft not saved');

        if($draft){
            echo "mail saved to draft";
        }
        else
        {
            echo "mail not saved to draft";
        }
    }

    public function inbox($sender1)
    {
        $inbox = mysqli_query($this->dbcon, "select * from mail where receiver = '$sender1' AND draft_status=0 AND trash_status=0 order by id DESC ") or die('inbox query not execute');
        return $inbox;

    }

    public function draftMail($sender1)
    {
        $draft1 = mysqli_query($this->dbcon, "select * from mail where sender = '$sender1' AND  draft_status=1 AND trash_status = 0 order by id DESC ") or die('draft query not execute');
        return $draft1;

    }

    public function sentMail($sender1)
    {
        $sent = mysqli_query($this->dbcon, "select * from mail where sender = '$sender1' AND draft_status=0 and trash_status= 0 ORDER BY ID DESC") or die('sent mail query not execute');
        return $sent;

    }

    public function editInbox($id8)
    {

    $edit = mysqli_query($this->dbcon, "select mail.id, mail.sender, mail.receiver, mail.subject, mail.message, mail.mail_time, attachment.user_file, users.username, user_photo.pic from mail JOIN attachment join users JOIN user_photo on mail.attachment_id = attachment.mail_id and mail.sender = users.email and users.username = user_photo.username where mail.id=$id8 and draft_status=0") or die('edit page query not execute');
    return $edit;

    }
    public function userImage($user)
    {
        $image = mysqli_query($this->dbcon, "select * from user_photo where username = '$user'") or die('image query not execute');
        $array = mysqli_fetch_array($image);
        return $array;

    }
    public function delete1($id6)
    {
        $del = mysqli_query($this->dbcon,"update mail set trash_status=1 where id=$id6") or die('not deleted');
        return $del;
    }

    public function trash($user)
    {
        $trash = mysqli_query($this->dbcon,"select mail.id, mail.sender, mail.receiver, mail.subject, mail.message, mail.mail_time, users.email from mail JOIN users on users.email = mail.sender or users.email = mail.receiver where users.email = '$user' AND (mail.sender = '$user' OR mail.receiver ='$user') AND trash_status=1 AND draft_status=0") or die('trash not selected');
        return $trash;
    }

    public function parmanentDelete($id7)
    {
        $pDelete = mysqli_query($this->dbcon,"delete from mail where id=$id7") or die('mail not selected');
        return $pDelete;
    }

    public function reply($sender, $receiver, $message, $id, $r_subject, $imgname, $tmp)
    {
        $rand3 = rand(0,100000);
        $reply = mysqli_query($this->dbcon,"insert into mail(sender, receiver, subject, message, attachment_id, reply_id) VALUES ('$sender','$receiver','$r_subject','$message',$rand3,$id)") or die('reply query not executed');
        $attach1 = mysqli_query($this->dbcon, "insert into attachment(mail_id, user_file) values($rand3,'$imgname')") or die('attachment not inserted');
        if($attach1)
        {
            mkdir("images/$sender", 0777, true);
            chmod("images/$sender", 0777);
            move_uploaded_file($tmp,"images/$sender/$imgname");

        }
        if($reply && $attach1)
        {
            $this->displayReply($sender, $id);
        }
        else
        {
            echo "Mail not sent";
        }


    }
    public function viewSentMail($id, $sender)
    {
        $view = mysqli_query($this->dbcon, "select mail.id, mail.sender, mail.receiver, mail.subject, mail.message, mail.mail_time, attachment.user_file, users.username, user_photo.pic from mail join attachment JOIN users JOIN user_photo on mail.attachment_id = attachment.mail_id AND (mail.receiver = users.email) AND (users.username = user_photo.username) where mail.id = $id and mail.sender='$sender' and mail.draft_status=0 and mail.trash_status=0 ");
        return $view;
    }

    public function viewTrashMail($id)
    {
      $viewTrash = mysqli_query($this->dbcon, "select mail.id, mail.sender, mail.receiver, mail.subject, mail.message, mail.mail_time, attachment.user_file from mail join attachment on mail.attachment_id = attachment.mail_id where mail.id=$id and trash_status=1");
      return $viewTrash;
    }

    public function editDraft($id)
    {
        $editDraft = mysqli_query($this->dbcon,"select * from mail where id=$id and draft_status=1");
        return $editDraft;
    }
    public function countReply($id)
    {
        $count = mysqli_query($this->dbcon,"select id from mail where reply_id=$id");
        return $count;
    }

    public function readMail($id)
    {
        $read = mysqli_query($this->dbcon,"update mail set read_status=1 where id= $id");
        if($read)
        {
            echo "update successful";
        }
    }

    public function changePassword($newpas, $conpass, $username)
    {
        if($newpas == $conpass) {

            $password = md5($newpas);
            $query = mysqli_query($this->dbcon, "update users set password='$password' where username='$username'") or die('password query not executed');
            if($query)
            {
                echo "<div class='alert alert-danger'>password changed</div>";
            }
        }
        else
        {
            echo "<div class='alert alert-danger'>password and confirm password not matched</div>";
        }
    }

    public function displayReply($sender, $id)
    {
        $ToUser = mysqli_query($this->dbcon, "select * from mail where sender='$sender' AND reply_id=$id") or die('select reply query not executed');
        $fromUser = mysqli_query($this->dbcon, "select * from mail where receiver='$sender' AND reply_id=$id") or die('select reply query not executed');
        if($ToUser)
        {
            while ($arr4 = mysqli_fetch_array($ToUser))
            {

                ?>
                <ul id='replyList'>
                    <li> <strong>to: <?php  echo $arr4['receiver']; ?></strong></li>
                    <li>message:<?php echo $arr4['message']; ?></li>
                </ul>

                <?php

            }
        }
        return $fromUser;
    }

    public function dropdown($input)
    {
        $dropdownValue = mysqli_query($this->dbcon, "select * from users where username like '%$input%'") or die('dropdown not working');
        if($dropdownValue)
        {
            while ($arr8 = mysqli_fetch_array($dropdownValue))
            {
                echo "<li id='list1'>".$arr8['email']."</li>";
            }
            ?>
            <script>
                $("#search li").click(function () {
                  var vall = $(this).html();
                  $('#to').val(vall);
                  $('#search').hide();
                });
            </script>
            <?php

        }

    }

    public function searchMail($search , $email )
    {
        $result = mysqli_query($this->dbcon, "select users.id, users.username, users.email, user_photo.pic from users join user_photo on users.username = user_photo.username  WHERE  users.email like '$search%'") or die('search query not executed');
        if(mysqli_num_rows($result)>0)
        {
            while ($resultArr= mysqli_fetch_array($result))
            {
                extract($resultArr);
                ?>
                <li>
                    <?php
                    if($pic) {

                        ?>
                        <img id="searchPhoto" src="../images/<?php echo "$username/$pic" ?>">
                        <?php
                    }
                    else
                    {
                       ?>
                        <img id="searchPhoto" src="../images/user1.png">
                        <?php
                    }
                        ?>
                    <a href="?page=inbox&data=<?php echo $email;  ?>" id="searchUser"><?php echo $email; ?></a>
                </li>
                <?php
            }
        }
        else
        {
            echo "no User found";
        }
    }
    public function selectUser($srch_data, $user1)
    {
        $data3 = mysqli_query($this->dbcon, "select * from mail where sender = '$srch_data' AND receiver = '$user1' AND draft_status=0 AND trash_status=0 order by id desc");
        return $data3;
    }
}

$dash = new dashboardFunction();
if($_POST['to']) {

    session_start();
    $receiver = $_POST['to'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $sender = $_SESSION['email'];
    $imgname = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];


    $dash->Mail($sender, $receiver, $subject, $message, $imgname, $tmp);
}
if ($_POST['draft1']) {
    session_start();
    $receiver = $_POST['to'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $sender = $_SESSION['email'];

    $dash->draft($sender, $receiver, $subject, $message);
}

if($_POST['replySender'])
{

    $sender = $_POST['replySender'];
    $receiver = $_POST['replyReceiver'];
    $replyMessage = $_POST['message'];
    $rid = $_POST['replyId'];
    $r_subject = $_POST['subject'];
    $imgname = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];
    $dash->reply($sender, $receiver, $replyMessage, $rid, $r_subject, $imgname, $tmp);
}

if($_POST['inputTo'])
{
    $input = $_POST['inputTo'];
    $dash->dropdown($input);
}
if($_POST['id'])
{
    $id = $_POST['id'];
    $dash->readMail($id);
}

if($_POST['search'])
{
    session_start();
    $username = $_SESSION['username'];
    $search = $_POST['search'];
    $dash->searchMail($search, $username );
}
if($_POST['newpass'])
{   session_start();
    $pas = $_POST['newpass'];
    $conpas = $_POST['conpas'];
    $email = $_SESSION['email'];

    $dash->changePassword($pas, $conpas, $email);

}

