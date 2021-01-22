<?php

require_once 'dbConfig.php';

$content = $msg = ' ';

if(isset($_POST['submit']))
{
    $content = $_POST["editor"];
    $blog_id = $_POST["id"];
    $title = $_POST["title"];
    echo $content;
    echo $blog_id;

    if(!empty($content))
    {
        $query = $con->query("UPDATE blog SET content='$content', approved='1', title='$title' WHERE id = $blog_id;");

        if($query)
        {
            $msg = "Saved successfully!";
        }
        else
            $msg = "Couldn't be saved!";
    }else 
    $msg="Please add content in the editor!";
    echo $msg;
}
echo "not set";

?>