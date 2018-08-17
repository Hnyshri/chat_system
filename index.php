<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Chat system</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="main.js"></script>
</head>
<body>
        <?php include("header.php");?>
        <div id="wrapper" class="container">        
            <h3>Welcome <?php session_start(); echo $_SESSION['username']; ?></h3>            
            <div class="chat_wrapper">
                <div id="abc"></div>
                <div id="chat"></div>

                <form method="post" class="form" id="messageForm">
                    <textarea name="message" cols="30" rows="5" class="textarea" placeholder="Please Type a message to send"></textarea>
                </form>
            </div>
        </div>

        <script>
            LoadChat();

                setInterval(function(){
                    LoadChat();
                },1000);

                function LoadChat()
                {
                    $.post('handler/message.php?action=getMessages',function(response){

                        var scrollpos = $('#chat').scrollTop();
                        var scrollpos = parseInt(scrollpos) + 420;
                        var scrollHeight = $('#chat').prop('scrollHeight');
                        
                        $('#chat').html(response);

                        if(scrollpos < scrollHeight)
                        {

                        }
                        else{
                            $('#chat').scrollTop($('#chat').prop('scrollHeight'));    
                        }                        
                    });
                }

            $('.textarea').keyup(function(e){
                // alert($(this).val());
                if(e.which == 13)
                {
                    $('form').submit();
                }
            });

            $('form').submit(function(){
                var message = $('.textarea').val();
                
                $.post('handler/message.php?action=sendMessage&message='+message,function(response){
                    if(response == 1)
                    {
                        LoadChat();
                        document.getElementById('messageForm').reset();
                    }                    
                    // alert(response);                    
                });

                return false;
            });
        </script>     
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/vendor/holder.min.js"></script>
        <script src="js/ie10-viewport-bug-workaround.js"></script>               
    </body>
</html>
