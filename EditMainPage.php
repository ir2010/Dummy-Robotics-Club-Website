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
        <link rel="stylesheet" href="editmainpage_styles.css">
    </head>
    <body>
        <h1>Blogs</h1>
        <?php

        for($i=0;$i<$no0fBlogs;$i++)
        {
            echo "<button id='delete' onclick='";
            echo 'loadDoc("blogQueries.php?id="+';
            echo $id[$i],",", $i;
            echo ', delete_blog)';
            echo "'>Delete permanently</button>",

            "<button id='remove' onclick='";
            echo 'loadDoc("blogQueries.php?id="+';
            echo $id[$i],",", $i;
            echo ', remove_blog)';
            echo "'>Remove from website</button>",
            '<button onclick="func()">Button</button>';

            echo "<div class='blog' id='id",$i,"'  onclick='";
            echo 'loadDoc("Edit Blog.php?id="+';
            echo $id[$i],",", $i;
            echo ', edit_blog)';
            echo "'>",
            '<h2>',$title[$i],'</h2>
            <i>written by </i>',$name[$i],
            '<br>',$created[$i],
            '<div class="content">',$content[$i],
            '</div>
            </div><br>';
        }

        ?>
        <script>
            function loadDoc(url,n, func)
            {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function()
                {
                    if(this.readyState == 4 && this.status == 200)
                    {
                        func(this,n);
                    }
                };
                xhttp.open("POST",url, true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("task="+func.name);
            }
            function edit_blog(xhttp,n)
            {
                //alert(xhttp.responseText);
                //document.getElementById("admin_portal").innerHTML=xhttp.responseText;
                document.write(xhttp.responseText);
                
            }
            function delete_blog(xhttp)
            {
                alert(xhttp.responseText);
                document.getElementById("delete").innerHTML="Deleted successfully<i style=',"'font-size:15px; color:green' class='fas'>&#xf00c;</i>",';
            }
            function remove_blog(xhttp)
            {
                alert(xhttp.responseText);
                document.getElementById("remove").innerHTML="Removed successfully<i style=',"'font-size:15px; color:green' class='fas'>&#xf00c;</i>",';
            }
        </script>
    </body>
</html>