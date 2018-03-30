<?php
include_once 'dashboardFunction.php';

$user =$user."@hestamail.com";
$inbox1 = new dashboardFunction();
$data1 = $inbox1->sentMail($user);
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
            echo "<script>location.href='?page=sent';</script>";
        }
        else{
            echo "<script>alert('email not deleted')</script>";
        }
    }



}

?>

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
<table class="table table-striped table-hover" id="inbox_table">

    <?php
    while ($arr1= mysqli_fetch_array($data1))
    {
        $date2 =$arr1['mail_time'];
        $datediff = intval((strtotime($date1)- strtotime($date2))/60);
        $hours = intval($datediff/60);
        $days = intval($hours/24);
        $minutes = $datediff%60;



        ?>

        <tr>

            <td id="check"><input type="checkbox" name="id[]" id="hiddenId" value="<?php echo $arr1['id']; ?>"></td>
            <td id="sent1"><strong><?php echo $arr1['receiver']; ?></strong>
                <input type="hidden" id="hidden"  value="<?php echo $arr1['id']; ?>">
            </td>
            <td id="sent2">
                    <?php echo "<span id='subject'>".$arr1['subject']."-</span>"."<span id='msg'>".substr($arr1['message'], 0, 30)."..."."</span>";  ?>
                    <input type="hidden" id="hidden"  value="<?php echo $arr1['id']; ?>">
            </td>
            <td id="sent3"><?php
                if($hours<24) {
                    echo $hours."<span class='small'> hrs </span>".$minutes." <span class='small'> min ago</span>";
                }
                else
                {
                    echo $date2;
                }

                ?>
                <input type="hidden" id="hidden"  value="<?php echo $arr1['id']; ?>">
            </td>
        </tr>

        <?php
    }
    ?>
    </form>
</table>
</div>


<script>
    $('#sent span').css('color','#ce183d');
    $('#sent').css({'background-color':'#d6d5d4'});
</script>
