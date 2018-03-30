
$(document).ready(function()
{
    $('button[type=button]').click(function (e) {
        e.preventDefault();
    });

    $('input[type=file]').change(function () {
        var size = parseFloat($("#img")[0].files[0].size / 512).toFixed(2);
        if(size>512)
        {
            $('#img').val('');
            $('#imgResult').html('file size exceed by 512KB');
        }

    });


    $('#attach').click(function () {
       $('#img').click();
    });
    $('#img').change(function () {
       $('#imgtext').text($('#img')[0].files[0].name);
    });

    //for sent mail

    $('#compose-send').click(function () {

       var to1 = $('#to').val();
       var subject = $('#subject1').val();
       var message = $('#message').val();
        var filedata = $('#img').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', filedata);
        form_data.append('to', to1);
        form_data.append('subject', subject);
        form_data.append('message', message);

        $.ajax({
            type:"POST",
            url:"dashboardFunction.php",
            cache: false,
            contentType: false,
            processData: false,
            data:form_data,
            success: function (data) {
                // $('#compose-result').html(data);
                $('#to').val("");
                $('#subject1').val("");
                $('#message').val();
                $('.composeEmail').modal('hide');
                window.location.href ='?page=inbox';

            }
        });
    });


    $('#messageSubmit').click(function () {

        var sender = $('#replySender').val();
        var receiver = $('#replyReceiver').val();
        var message = $('#replyMessage').val();
        var id = $('#mailId').val();
        var subject = $('#replySubject').val();
        var filedata = $('#replyFile').prop('files')[0];
        var form_data = new FormData();
        form_data.append('replySender',sender);
        form_data.append('replyReceiver',receiver);
        form_data.append('message', message);
        form_data.append('replyId',id);
        form_data.append('subject', subject);
        form_data.append('file', filedata);
        if(message == "")
        {
            alert('type a message');
            return false;
        }
        else
        {

        $.ajax({
            type:"POST",
            url:"dashboardFunction.php",
            cache: false,
            contentType: false,
            processData: false,
            data:form_data,
            success: function (data) {
                $('#forReply').html(data);
                $('#replyMessage').val("");
            }
        });
        }
    });


    $('#timebtn, #saveToDraft').click(function () {

        var to1 = $('#to').val();
        var subject = $('#subject1').val();
        var message = $('#message').val();
        var draft1 = $('#hiddenDraft').val();
        var form_data = new FormData();
        form_data.append('to', to1);
        form_data.append('subject', subject);
        form_data.append('message', message);
        form_data.append('draft1',draft1);


        $.ajax({
            type:"POST",
            url:"dashboardFunction.php",
            cache: false,
            contentType: false,
            processData: false,
            data:form_data,
            success: function (data) {
                // $('.inbox_class').html(data);
                console.log(data);
            }
        });

        location.href='?page=inbox';


    });

    $('#td1, #td2, #td3').click(function () {
        var id = $(this).find('#hidden').val();
        $.ajax({
           type:'POST',
           url:'dashboardFunction.php',
           data:"id="+id,
           success:function (data) {
               console.log(data);
               window.location.href = '?page=editPage&id='+id;
           }
        });

    });

    $('#sent1, #sent2, #sent3').click(function () {
        var id = $(this).find('#hidden').val();
        window.location.href = '?page=viewSent&id='+id;
    });

    $('#trash1, #trash2, #trash3').click(function () {
        var id = $(this).find('#hidden').val();
        window.location.href = '?page=viewTrash&id='+id;
    });
    $('#draft1, #draft2, #draft3').click(function () {
        var id = $(this).find('#hidden').val();
        window.location.href = '?page=viewDraft&id='+id;
    });

    $('.selectAll').click(function () {

       $("input[type='checkbox']").click();
    });

    $("#inbox_table input[type='checkbox'] , #draft_table input[type='checkbox']").click(function () {
        $('#myrow').show(100);
    });

    $('#to').keyup(function () {
       var to = $('#to').val();
       $('.mydrop').show();
       $.ajax({
          type:"POST",
          url:"dashboardFunction.php",
          data:"inputTo="+to,
          success:function (data) {
              $('#search').html(data);
              // console.log(data);
          }
       });
    });

$('#sent').click(function () {
    window.location.href ='?page=sent';
});
    $('#inbox').click(function () {
        window.location.href ='?page=inbox';
    });
    $('#draft').click(function () {
        window.location.href ='?page=draft';
    });
    $('#trash').click(function () {
        window.location.href ='?page=trash';
    });

    $('#replyAttach').click(function () {
       $("#replyFile").click();
    });
    $('#replyFile').change(function () {
       $('#replyAttachText').text($('#replyFile')[0].files[0].name)
    });

    $('#close1').click(function () {
        window.location.href='?page=draft';
    });

    $('#searchMail').keyup(function () {
        var search = $('#searchMail').val();
        if(search== null){
            $('.searchResult').hide();
        }
        else {

            $('.searchResult').show();
            $.ajax({
                type: 'POST',
                url: 'dashboardFunction.php',
                data: "search=" + search,
                success: function (data) {
                    $('.searchResult').html(data)
                }
            });
        }

    });

    $('#reset').click(function () {
        var newpas = $('#newPass').val();
        var conpas = $('#cPass').val();

        $.ajax({
            type:"POST",
            url:"dashboardFunction.php",
            data:"newpass="+newpas+"&conpas="+conpas,
            success:function (data) {
                $('.passwordResult').html(data);
                // console.log(data);
            }
        });
    });

    $('body').click(function () {
       $('.searchResult').hide();
    });
}); //end of document ready

