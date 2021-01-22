<?php 
include_once 'blogSaveToDatabase.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Write Blogs...</title>
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
        <h1>Write Blogs...</h1>
        <form action="blogSaveToDatabase.php" method="POST" target="_blank">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required autofocus placeholder="Your full name...">   
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required placeholder="Title of the blog...">   
            <label for="editor">Start writing...</label> 
            <br>
            <br>
            <textarea name="editor"></textarea>
            <br>
            <input type="submit" name="submit" value="Save">
        </form>
        <script>
            CKEDITOR.replace('editor');
        </script>
    </body>
</html>