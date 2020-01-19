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
        <style>
            body 
            {
                background-image: url("bg.jpg");
	            background-size: cover;
	            margin-top: 0;
	            overflow-x: hidden;
            }

            h1 
            {
                text-align:center; 
                color: black; 
                font-family: 'Times New Roman';
                font-size: 50px;
                font-weight: bold;
                text-shadow: 4px 1px gray;
            }
            .content
            {
                border-top: 1px solid #15365f;
                border-bottom: 1px solid #15365f;
                border-right: 1px solid #15365f;
	            border-radius: 15px;
	            text-align: left;
	            
	            padding-top: 10px;
                padding-left: 8px;
                padding-bottom: 20px;
	            
	            margin-top: 20px;
	            
	            line-height: 25px;
            }
        </style>
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