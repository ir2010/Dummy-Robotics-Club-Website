<?php
require_once 'dbConfig.php';

$blog_id = $_REQUEST["id"];
//echo $blog_id;
//$content = $_REQUEST["content"];
$query = "SELECT * FROM blog WHERE id=?";
$stmt = $con->prepare($query);
$stmt->bind_param("s", $blog_id);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $content, $created, $name, $title, $approved, $position);
$stmt->fetch();
$stmt->close();
echo $id, $content, $created, $name, $title, $approved; 



echo '<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Edit Blogs...</title>
        <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
        <style>
            body
            {
                background-image: url("bg.jpg");
	            background-size: cover;
	            margin-top: 0;
	            overflow-x: hidden;
            }
            
            input[type=text]
            {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }
        </style>
    </head>
    <body>
            <h1>Edit Blog...</h1>
            <form action="EditBlogToDatabase.php" method="POST" target="_blank">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" disabled value=',$name,'>   
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value=',$title,'>   
                <label for="editor">Content</label> 
                <br>
                <br>
                <textarea name="editor" rows="18" cols="200">'; 
                echo $content;
                echo '</textarea>
                <br>
                <input type="submit" name="submit" value="Approve and Add to Website">
                <input type="hidden" name="id" value=',$id,'>
            </form>',
            '<script>
                CKEDITOR.replace("editor");
             </script>
    </body>
</html>';
?>