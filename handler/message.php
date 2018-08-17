<?php
    include("../config.php");
    switch($_REQUEST['action'])
    {
        case "sendMessage":                            
                            session_start(); 
                            $query = $db->prepare("insert into messages set username=?, message=?");    // new version of php have                         
                            $run = $query->execute([$_SESSION['username'],$_REQUEST['message']]);   // already prepare and execute function
            
                            if($run)
                            {
                                echo 1;
                                exit();
                            }
                            break;

        case "getMessages":                  
                            session_start();                            
                            $query = $db->prepare("SELECT * FROM messages");
                            $run = $query->execute();
                            $rs = $query->fetchAll(PDO::FETCH_OBJ);
                            $chat = '';
                            foreach($rs as $message)
                            {                                                
                                $chat .= '<div class="single '.(($_SESSION['username']==$message->username)?'right':'left').'">
                                            <strong>'.$message->username.': </strong><br /><p>'.$message->message.'</p>                                            
                                            <span>'.date('h:i a', strtotime($message->date)).'</span>
                                            </div>
                                            <div class="clear"></div>';
                            }
                            echo $chat;
                            break;
    }
?>