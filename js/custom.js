$(document).ready(function () {

    $('form').submit(function (e) {
        e.preventDefault();
    });
    $('#first').keyup(function () {
        var first = $('#first');
        var regex = /^[a-zA-Z]+$/;
        if(!(first.val().match(regex)))
        {
            $('#firstname').text('first name should only contain characters');
            return false;

        }
        else
        {
            $('#firstname').html("<span style='color: green'>OK</span>");
        }
    });

    $('#last').keyup(function () {
        var last = $('#last');
        var regex = /^[a-zA-Z]+$/;
        if(!(last.val().match(regex)))
        {
            $('#lastname').text('last name should only contain characters');
            return false;

        }
        else
        {
            $('#lastname').html("<span style='color: green'>OK</span>");
        }
    });

   $('#username').keyup(function () {
       $('#list').show();
     var user = $('#username').val();
       var userRejex = /^\S*$/;
     if(user.length<4)
     {
         $('#list').html("<span style='color: red'>Username atleast 3 character long</span>");
         return false;
     }
     if(!user.match(userRejex))
     {
         $('#list').html("<span style='color: red' >space not allowed in username</span>");
         return false;
     }
     if($.isNumeric(user))
     {
         $('#list').html("<span style='color: red' >Username can not be numeric</span>");
         return false;
     }
     $.ajax({
         type:'POST',
         url:'signupFunction.php',
         data:"user="+user,
         success: function (data) {
             $('#list').html(data);
         }
     })
   });

   $('#pas').keyup(function () {
       var pas = $('#pas');
       var pasRejex = /^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})/;
       if ((pas.val().match(pasRejex)))
       {

           $('#pasdiv').html("<span style='color: green'>strong password</span>");

       }
       else
       {
           $('#pasdiv').text('week password');
       }
   });

   $('#cpas').keyup(function () {
       var pas = $('#pas');
      var cpas = $('#cpas');
       if(pas.val()!=cpas.val()){
           $('#confirmdiv').text('password and confirm password is not matched');
           return false;
       }
       else
       {
           $('#confirmdiv').html("<span style='color: green' >password matched</span>");
       }
   });

   $('#phone').keyup(function () {
      var phone1 = $('#phone');
      var phoneRejex1 = /^[0-9]{10}$/;


       if(!(phone1.val().match(phoneRejex1)))
       {
           $('#phonediv').text('Phone number should contain only 10 digits');
           return false;
       }
       else
       {
           $('#phonediv').html("<span style='color: green; font-size: 16px; font-weight: bolder'>ok</span>")
       }

   });


       $('input[type=file]').change(function () {

               var size = parseFloat($("#img")[0].files[0].size / 512).toFixed(2);
               var val = $("#img").val().toLowerCase(),
                   regex = new RegExp("(.*?)\.(jpeg|jpg|png)$");
               if(size>512)
               {
                   $(this).val('');
                   $('#attachResult').val('');
                   $('#attachResult').html('file size exceeded by 512kb');
                   return false;
               }

               if (!(regex.test(val))) {
                   $(this).val('');
                   $('#attachResult').val('');
                   $('#attachResult').html('only jpg, jpeg and png image allow');
                   return false;
               }

       });


    $('#suggest').click(function(){
        var value1 = $(this).val();
        alert(value1);
        $('#username').text(value1);

    });


   $('#sub').click(function () {
        var first = $('#first');
       var regex = /^[a-zA-Z]+$/;
        var last = $('#last');
        var username = $('#username');
       var user = /^\S*$/;
        var pas = $('#pas');
        var confirm = $('#cpas');
        var dob = $('#dob');
        var phone = $('#phone');
       var phoneRejex1 = /^[0-9]{10}$/;
        var location = $('#location');
      if(first.val() == "" || last.val()=="" || username.val()=="" || pas.val() == "" || confirm.val() == "" || dob.val()=="" || phone.val() == "" || location.val() == ""){
          alert('Any of fields can not be empty');
          return false;
      }


      if((first.val().match(regex)) && (last.val().match(regex)) && (username.val().match(user)) && (pas.val() == confirm.val()) && (phone.val().match(phoneRejex1)) )
      {
          $('#firstname').text('');
          $('#lastname').text('');
          $('#list').text('');
          $('#confirmdiv').text('');
          var first = $('#first').val();
          var last =$('#last').val();
          var username = $('#username').val();
          var password = $('#pas').val();
          var confirm = $('#cpas').val();
          // var gender = $('#male').val();
          var dat = $('#dob').val();
          var phone = $('#phone').val();
          var location = $('#location').val();

          var filedata1 = $('#img').prop('files')[0];
          var form_data = new FormData();

          form_data.append('file', filedata1);
          form_data.append('first', first);
          form_data.append('last', last);
          form_data.append('username', username);
          form_data.append('pas', password);
          form_data.append('cpas', confirm);
          form_data.append('dob', dat);

          form_data.append('phone', phone);
          form_data.append('location', location);
          $.ajax({
              type: "POST",
              url: "signupFunction.php",
              cache: false,
              contentType: false,
              processData: false,
              //data: "first="+first+"&last="+last+"&username="+username+"&password="+password+"&confirm="+confirm+"&gender="+gender+"&dob="+dat+"&phone="+phone+"&location="+location,
              data:form_data,
              success: function (data) {
                  $('#result1').html(data);
              }


          });

      }
      else
      {
          return false;
      }
   });
   //js for login
   $('#login1').click(function () {
      var email = $('#email').val();
      var pas = $('#pas1').val();

      if(email == "" && pas == ""){
          alert('email and password fields can not be empty');
          return false;
      }

      $.ajax({
          type:'POST',
          url: 'signupFunction.php',
          data:"email="+email+"&password="+pas,
          success: function (data) {
              $('#loginmsg').html(data);
          }
      })
   });

    $('#attach').click(function () {
        $('#img').click();
    });
    $('#img').change(function () {
        $('#imgtext').text($('#img')[0].files[0].name);
    });

    $('#signInBtn').click(function () {
       $('.loginContainer').hide('slow');
       $('#sign_section').show('slow');
    });

    $('#loginbtn').click(function () {
        $('#sign_section').hide('slow');
        $('.loginContainer').show('slow');

    });

    $('#signUp').click(function () {
        $('.loginContainer').hide();
        $('#sign_section').show('slow');

    });

    $('#username').change(function () {
        $('#list').hide();
    });
    $('body').click(function () {
       $('#list').hide();
    });




}); // end of document ready