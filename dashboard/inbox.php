<?php
include_once 'dashboardFunction.php';

$inbox1 = new dashboardFunction();


if($_GET['data'] == null)
{
    $user = $user."@hestamail.com";
    $data1 = $inbox1->inbox($user);
}
else
{
    $user2 = $_GET['data'];
    $user1 = $user."@hestamail.com";
    $data1 = $inbox1->selectUser($user2, $user1);
}



$date1 = date("y-m-d H:i:s");
extract($_POST);

if(isset($submit1))
{

        $count=array();
    $count=count($id);

    for($i=0;$i<$count; $i++){
        $del_id = $id[$i];
        $inbox1->delete1($del_id);
        if($inbox1){
            echo "<script>location.href='?page=inbox';</script>";
        }
        else{
            echo "<script>alert('email not deleted')</script>";
        }
    }



}

?>
<div class="inbox_class"></div>
<div id="myrow">
<div class="row">
    <div class="col-md-1">
        <button class="selectAll">
           <span class="fa fa-check"></span>
        </button>
    </div>
<form method="post" action="">
    <div class="col-md-1">
        <button type="submit" name="submit1" class="delete">
            <span class="fa fa-trash"></span>
        </button>
    </div>

</div>
</div>
<div class="table-responsive">
<table class="table table-striped table-hover " id="inbox_table">

    <?php
    if(mysqli_num_rows($data1) > 0) {

        while ($arr1 = mysqli_fetch_array($data1)) {
            $countReply = $inbox1->countReply($arr1['id']);
            $count1 = mysqli_num_rows($countReply);

            $date2 = $arr1['mail_time'];
            $datediff = intval((strtotime($date1) - strtotime($date2)) / 60);
            $hours = intval($datediff / 60);
            $days = intval($hours / 24);
            $minutes = $datediff % 60;

            ?>
            <tr>

                <td id="check"><input type="checkbox" name="id[]" id="hiddenId" value="<?php echo $arr1['id']; ?>"></td>
                <td id="td1"><strong><?php if ($count1 != 0) {
                            echo "($count1)  ";
                        }
                        echo $arr1['sender']; ?></strong>
                    <input type="hidden" id="hidden" value="<?php echo $arr1['id']; ?>">
                    <input type="hidden" id="read" value="<?php echo $arr1['read_status']; ?>">
                </td>
                <td id="td2"><?php echo "<span id='subject'>" . $arr1['subject'] . "-</span>" . "<span id='msg'>" . substr($arr1['message'], 0, 30) . "..." . "</span>"; ?>
                    <input type="hidden" id="hidden" value="<?php echo $arr1['id']; ?>"></td>
                <td id="td3">
                    <span id="inbox_time"><?php echo $hours . " hrs " . $minutes . " min ago"; ?></span>
                    <input type="hidden" id="hidden" value="<?php echo $arr1['id']; ?>">
                </td>
            </tr>

            <?php
        }
    }
    else
    {
        echo "<div class='alert alert-danger'>No mail found</div>";
    }
    ?>
    </form>
</table>
</div>

<script>
    $('#inbox span').css('color','#ce183d');
    $('#inbox').css({'background-color':'#d6d5d4'});
</script>
