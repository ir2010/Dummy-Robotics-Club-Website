<?php

require_once 'dbConfig.php';

$content = $msg = ' ';

if(isset($_POST['submit']))
{
    $content = $_POST["editor"];
    $name = $_POST['name'];
    $title = $_POST['title'];

    if(!empty($content))
    {
        $query = $con->query("INSERT INTO blog(content, created, member_name, title) VALUES(' ".$content." ',NOW(),' " .$name." ',' " .$title."')");

        if($query)
        {
            $msg = "Saved successfully!";
        }
        else
            $msg = "Couldn't be saved!";
    }else 
    $msg="Please add content in the editor!";
}

?>