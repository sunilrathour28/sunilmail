

<div class="modal fade composeEmail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">



    <div class="modal-dialog modal-lg" role="document">
        <div class="panel panel-primary">
            <div class="panel-heading">Compose mail
            <span class="pull-right" id="timebtn">&times;</span>
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
            <input title="Recipient email address" autocomplete="off" type="text" name="to1" class="form-control" id="to">
            </div>
            <div class="mydrop">
                <ul id="search">

                </ul>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">Subject</div>
            <input title="subject" type="text" class="form-control" name="subject" id="subject1">
            </div>
        </div>

        <div class="form-group">
            <textarea title="Write mail" rows="10" class="form-control" name="message" placeholder="type your message..." id="message"></textarea>
            <input type="hidden" id="hiddenDraft" name="draft" value="draft">

        </div>
        <div class="form-group">

            <span id="attach"><span class="fa fa-file"></span> Attachment</span>
            <span id="imgtext"></span>
            <input type="file" id="img" name="myfile">

        </div>
        <div class="form-group" id="imgResult"></div>

        <div class="form-group">
            <button type="button" id="compose-send"><span class="fa fa-paper-plane"></span> Send</button>
            <button type="button" id="saveToDraft" class="fa fa-cloud-download">Save to draft </button>
        </div>
    </form>
<!--    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>-->
</div>
        </div>
    </div>
        </div>
    </div>
</div>

