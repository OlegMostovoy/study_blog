<?php
        $server="localhost";
        $database="profiles";
        $login ="root";
        $password="";
        
        $db_connection=mysql_connect($server,$login,$password);
        $db_select=mysql_select_db($database);
        echo" connectron: ".$db_connection."<br/>";
        echo" select: ".$db_select."<br/>";
        //$query="SELECT * FROM profiles_tab WHERE id=".(integer)$_POST["id"];

        $update_query="UPDATE profiles_tab SET 
        name='".$_POST["name"]."', 
        login='".$_POST["login"]."', 
        password='".$_POST["password"]."', 
        email='".$_POST["email"]."',
        role='".$_POST["role"]."' WHERE id=".(integer)$_POST["id"];
        
         //$update_query="UPDATE `profiles_tab` SET `name`=".$_POST["name"].",`login`=".$_POST["login"].",`password`=".$_POST["password"].",`email`=".$_POST["email"].",`role`=".$_POST["role"]." WHERE id=".$_POST["id"];


        echo  $update_query; 
        $result=mysql_query($update_query);
        $_POST["UPDATE"]="Data was updated";
        header( 'Location: http://mysite.site/index.php');
?>
 