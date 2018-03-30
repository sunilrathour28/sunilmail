<?php
include_once 'dashboardFunction.php';
$id = $_GET['id'];
$inbox1 = new dashboardFunction();
$editDraft = $inbox1->editDraft($id);
$editArray = mysqli_fetch_array($editDraft);
extract($editArray);


?>
<section id="draft2">
        <div class="panel panel-primary">
            <div class="panel-heading">Compose mail
                <span class="pull-right" id="close1">&times;</span>
            </div>

            <div class="modal-content">
                <div class="panel-body">
                    <div class="compose-form">
                        <div class="compose-head">
                        </div>
                        <div id="compose-result"></div>
                        <form method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">To</div>
                                    <input title="Recipient email address" autocomplete="off" type="text" value="<?php echo $receiver; ?>" name="to1" class="form-control" id="to">
                                </div>
                                <div class="mydrop">
                                    <ul id="search">

                                    </ul>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Subject</div>
                                    <input title="subject" type="text" value="<?php echo $subject; ?>" class="form-control" name="subject" id="subject1">
                                </div>
                            </div>

                            <div class="form-group">
                                <textarea title="Write mail" rows="10" class="form-control" name="message" placeholder="type your message..." id="message"><?php echo $message; ?></textarea>
                                <input type="hidden" id="hiddenDraft" name="draft" value="draft">

                            </div>
                            <div class="form-group">

                                <span id="attach"><span class="fa fa-file"></span> Attachment</span>
                                <span id="imgtext"></span>
                                <input type="file" id="img" name="myfile">

                            </div>

                            <div class="form-group">
                                <button id="compose-send"><span class="fa fa-paper-plane"></span> Send</button>
                            </div>
                        </form>
                        <!--    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>-->
                    </div>
                </div>
            </div>
        </div>
</section>
