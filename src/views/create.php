<?php

use Estebanr\Notas\models\Note;


if (count($_POST) > 0) {    
    $title = isset($_POST['title']) ? $_POST['title'] : 'titulo de prueba';
    $content = isset($_POST['content']) ? $_POST['content'] : 'content test';

    $note = new Note($title, $content);
    $note->save();
    header("Location:?views=home");
    

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/views/resources/main.css">

    <title>Create new note</title>
</head>
<body>
    <?php require 'resources/navbar.php'?>
    <h1>Create note</h1>

    <form action="?views=create" method="POST">
        <input type="text" name="title" placeholder="title...">
        <textarea name="content" id="" cols="30" rows="10">

        </textarea>
        <input type="submit" value="Create Note">
    </form>

</body>
</html>

