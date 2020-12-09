<?php
include_once 'dbConfig.php';

$query = $con->query("SELECT * FROM blog WHERE approved='1'");
   $i=0;
   $no0fBlogs=0;

   if ($query->num_rows > 0)
   {
    while($row = $query->fetch_assoc()) 
    {
        $no0fBlogs++;
        $id[$i] = $row['id'];
        $title[$i] = $row['title'];
        $name[$i] = $row['member_name'];
        $content[$i] = $row['content'];
        $created[$i] = $row['created']; 
        $i++;
    }
   } 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Robotics Club MNNIT</title>
        <link rel="stylesheet" href="mainpage_styles.css">
    </head>
    <body>
        <h1>Blogs</h1>
        <?php

        for($i=0;$i<$no0fBlogs;$i++)
        {
            echo '<div class="blog" id="id',$i,'">',
           '<h2>',$title[$i],'</h2>
            <i>written by </i>',$name[$i],
            '<br>',$created[$i],
            '<div class="content">',$content[$i],
            '</div>
            </div><br>';
        }

        ?>
    </body>
</html>