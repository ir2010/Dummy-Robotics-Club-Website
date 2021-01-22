<?php
require_once 'dbConfig.php';

$blog_id = $_REQUEST["id"];
echo $blog_id;
$task = $_POST["task"];
echo $task;
if($task == "delete_blog")
{
    //$delete_query = $con->query("DELETE FROM blog WHERE id=$blog_id;");
}
elseif($task == "approve_blog")
{
    $approve_query = $con->query("UPDATE blog SET approved = '1' WHERE id=$blog_id;");
}
elseif($task == "approve_all_blogs")
{
    //$approve_all_query = $con->query("UPDATE blog SET approved = '1' WHERE approved='0';");
}
elseif($task == "remove_blog")
{
    $disapprove_query = $con->query("UPDATE blog SET approved = '0' WHERE id=$blog_id;");
}

//

/*$delete = $con->query("DELETE * FROM blog WHERE id=$blog_id");*/

?>