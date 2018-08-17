 <?php

        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'chat';

        try
        {
            $db= new PDO("mysql:dbhost=$dbhost;dbname=$dbname","$dbuser","$dbpass");
        }
        catch(PDOException $e)      
        {
            echo $e->getMessage();
        }
?>