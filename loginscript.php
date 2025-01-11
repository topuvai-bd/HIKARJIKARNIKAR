
<script>  
    $(document).ready(function(){  
         $('#otpdg').click(function(){  
              var loginnumber = $('#loginnumber').val();  
              var otpd = $('#otpd').val();  
              if(loginnumber == '' || otpd == '' )  
              {  
                   $('#response').html('<span class="btn btn-danger">Please Enter OTP</span>');  
              }  
              else  
              {  
                   $.ajax({  
                        url:"logindata.php",  
                        method:"POST",  
                        data:$('#submit_form').serialize(),  
                        beforeSend:function(){  
                             $('#response').html('<span class="text-info">User Details Verify Please Wait...</span>');  
                        },  
                        success:function(data){  
                             $('form').trigger("reset");  
                             $('#response').fadeIn().html(data);  
                             setTimeout(function(){  
                                  $('#response').fadeOut("slow");  
                             }, 80000);  
                        }  
                   });  
              }  
         });  
    });  
    </script>  

<script>  
    $(document).ready(function(){  
         $('#loginpassword').click(function(){  
              var mobile = $('#mobile').val();  
             
              if(mobile == '')  
              {  
                $('#response').html('<span class="btn btn-danger">Please Enter Mobile Number</span>');  
              }  
              else  
              {  
                   $.ajax({  
                        url:"numberverify.php",  
                        method:"POST",  
                        data:$('#submit_form').serialize(),  
                        beforeSend:function(){  
                             $('#response').html('<span class="text-info">User Details Verify Please Wait...</span>');  
                        },  
                        success:function(data){  
                             $('form').trigger("reset");  
                             $('#response').fadeIn().html(data);  
                             setTimeout(function(){  
                                  $('#response').fadeOut("slow");  
                             }, 800000);  
                        }  
                   });  
              }  
         });  
    });  
    </script>  



<script>  
    $(document).ready(function(){  
         $('#resend').click(function(){  
              var mobiled = $('#mobiled').val();  

              if(mobiled== '')  
              {  
                $('#response').html('<span class="btn btn-danger">Please Enter 4 Digits Password</span>');  
              }  
              else  
              {  
                   $.ajax({  
                        url:"numberverify.php",  
                        method:"POST",  
                        data:$('#submit_form').serialize(),  
                        beforeSend:function(){  
                             $('#response').html('<span class="text-info">User Details Verify Please Wait...</span>');  
                        },  
                        success:function(data){  
                             $('form').trigger("reset");  
                             $('#response').fadeIn().html(data);  
                             setTimeout(function(){  
                                  $('#response').fadeOut("slow");  
                             }, 80000);  
                        }  
                   });  
              }  
         });  
    });  
    </script>  
