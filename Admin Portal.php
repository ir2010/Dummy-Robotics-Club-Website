<?php
   include_once 'dbConfig.php';
   $query = $con->query("SELECT * FROM blog WHERE approved='0'");
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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->
        <title>Admin Portal</title>
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

            .heading
            {
                text-align: center;
		        font-family: Cursive;
		        font-size: 20px;
		        font-weight: bold;
		        
            }

            .pending
            {
                
                padding-bottom:30px;
            }

            .blogs
            {
                

            }

            .blogs, .projects
            {
               
            }

            .blogs, .projects, .ci
            {
                border-top: 1px solid #15365f;
                border-bottom: 1px solid #15365f;
                border-right: 1px solid #15365f;
	            border-radius: 15px;
	            text-align: left;
	            
	            padding-top: 10px;
                padding-left: 8px;
                padding-bottom: 20px;
	            
	            margin-top: 60px;
	            
	            line-height: 25px;
            }

            .blog
            {
                width: 100%;
                padding-bottom: 10px;
                margin-left: 5px;

                border: 2px solid #15365f;
	            border-radius: 15px;
	            text-align: left;
	            
	            padding-top: 10px;
                padding-left: 8px;
                padding-bottom: 10px;
	            
	            margin-top: 60px;
	            margin-right: 50px;
	            line-height: 25px;
            }

            .blog > #blog 
            {
                border-radius: 5px;
                background-color: #f2f2f2;
                padding: 5px;
                height: 100px;
                font-family: 'Cursive';
                font-size: 25px;
            } 

            button
            {
                text-align: center;
                background-color: #0484f1;
                border: none;
                color: white;
                border-radius: 5px;
                padding: 15px 32px 20px 32px;
                text-decoration: none;
                display: inline-block;
                font-size: /16px;/
                margin: 4px 2px;
                cursor: pointer;
                width: 180px;
                height: 50px;
            }

            button:hover
            {
                background-color: grey;
		        border-color: grey;
		    }

            .blog > .approve
            {
                background-color: green;        
            }

            .approve:hover
            {
                background-color: grey;
		        border-color: grey;
            }

            .all
            {
                background-color: green;
                width: 90%;
                margin-left: 20px;
            }

            hr
            {
                background-color:#15365f;
            }

            .change
            {
                margin-left: 20px;
            }

            .change_after_upload
            {
                width: 45%;
                height: 50px;
            }

            #rearrange
            { 
                font-size: 12px;
                padding-left: 16.5px;
                padding-right: 16.5px;
                text-align: center;
                margin-left: 30px;
            }

            a
            {
                text-decoration: none;
            }

            a:link 
            {
                color: #ffffff;
            }
            
            a:visited 
            {
                color: #ffffff;
            }    
        </style>
    </head>
    <body>
        <div class="container-fluid" id="admin_portal">
            <h1><i>Admin Portal</i></h1>
            <br>
            <div class="pending row">
                <div class="blogs col-xs-12 col-sm-6 col-lg-4">
                    <div class="heading">Pending Blogs...</div>
                    <div id="bloglist">
                        <?php
                        if($no0fBlogs==0)
                        {
                            echo "<div class='blog row' style='color: blue;'>No Pending Blogs!</div>";
                        }
                        for($i=0;$i<$no0fBlogs;$i++)
                        {
                           echo "<div class='blog row' id='id",$i,"'>",
                           "<div class='col-sm-9 col-xs-9 col-lg-9' id='blog' onclick='";
                           echo 'loadDoc("Edit Blog.php?id="+';
                           echo $id[$i],",", $i;
                           echo ', edit_blog)';

                           echo "'><strong>",$title[$i],"</strong><br><br>
                           <div style='font-size:12px; font-family: Cursive;'>submitted by <i>",$name[$i],"</i><br>"
                           ,$created[$i],"</div></div> 
                           <button class='col-sm-3 col-xs-3 col-lg-3 approve'";
                           echo "<button onclick='";
                           echo 'loadDoc("blogQueries.php?id="+';
                           echo $id[$i],",", $i;
                           echo ', approve_blog)';
                           echo "'>Approve</button><br><br><br>";

                           echo "<button class='col-sm-3 col-xs-3 col-lg-3 delete'";
                           echo "<button onclick='";
                           echo 'loadDoc("blogQueries.php?id="+';
                           echo $id[$i],",", $i;
                           echo ', delete_blog)';
                           echo "'>Delete</button></div>";
                        }
                        ?>
                        <br>
                        <button class="approve all" onclick="loadDoc('blogQueries.php',0,approve_all_blogs)">Approve All</button>
                        <hr style="color: #15365f;">
                        <div class="change">
                        <h3>Change Blogs after upload</h3>
                        <a href="EditMainPage.php"><button class="change_after_upload" id="edit">Edit Blog</button></a>
                        <button class="change_after_upload" id="rearrange">Rearrange Blogs </button>
                        </div>
                    </div>
                </div>
                <div class="projects col-xs-12 col-sm-6 col-lg-4">
                <div class="heading">Pending Projects...</div>
                    <div id="prolist">
                    <?php
                        if($no0fBlogs==0)
                        {
                            echo "<div class='blog row' style='color: blue;'>No Pending Blogs!</div>";
                        }
                        for($i=0;$i<$no0fBlogs;$i++)
                        {
                           echo "<div class='blog row'> 
                           <div class='col-sm-9 col-xs-9 col-lg-9' id='blog' onclick='edit_blog()'>
                           <strong>",$title[$i],"</strong><br><br>
                           <div style='font-size:12px; font-family: Cursive;'>submitted by <i>",$name[$i],"</i><br>"
                           ,$created[$i],"</div></div> 
                           <form method='post'>
                           <input type='submit' name='approve_2_$i' class='button' value='Approve'/>
                           <input type='submit' name='delete_2_$i' class='button' value='Delete'/>
                           </form>
                           </div>";
                           //echo "<button onclick='approve_blog(2)'>ji</button>";
                        }
                        ?>
                        <button onclick='approve_blog(2)'>j\i</button>
                    </div>
                </div>
                <div class="ci col-xs-12 col-sm-6 col-lg-4">
                <div class="heading">Pending Component Issue...</div>
                    <div id="cilist">
                        <?php
                        for($i=0;$i<$no0fBlogs;$i++)
                        {
                           echo "<div class='blog row'> <div class='col-sm-10 col-xs-10 col-lg-10' id='blog'>",$title[$i],"</div> <button class='col-sm-2 col-xs-2 col-lg-2 approve'>Approve</button></div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
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
            function approve_blog(xhttp,n)
            {
                //alert(xhttp.responseText); 
                document.getElementById("id"+n).innerHTML="Approved and added to website successfully<i style='font-size:15px; color:green' class='fas'>&#xf00c;</i>";
                
            }
            function delete_blog(xhttp,n)
            {
                //alert(xhttp.responseText);
                document.getElementById("id"+n).innerHTML="Deleted successfully<i style='font-size:15px; color:green' class='fas'>&#xf00c;</i>";
            }
            function approve_all_blogs(xhttp,n)
            {
                alert(xhttp.responseText);
                var x =  document.getElementsByClassName("blog row");
                for(var i=0;i<x.length;i++)
                {
                    x[i].innerHTML="Approved and added to website successfully<i style='font-size:15px; color:green' class='fas'>&#xf00c;</i>";
                }
            }
        </script>
    </body>
</html>
  