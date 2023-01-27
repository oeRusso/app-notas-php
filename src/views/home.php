<?php

use Estebanr\Notas\models\Note;

$notes = Note::getAll();

if (isset($_GET['metodo']) && isset($_GET['uuid'])) {
    
    $note = new Note();
    $note->delete($_GET['uuid']);
    header('location:./?views=home');
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/views/resources/main.css">
    <title>Home</title>
</head>
<body>
    <?php require 'resources/navbar.php'?>
    <h1>HOME</h1>
<div class="note-contenainer">

    <?php
    foreach ($notes as $note) {
       $uuid=  $note->getUUID();
    ?>
        <a href="?views=view&uuid=<?php echo $uuid; ?>">
            <div class="note-preview">
                <div class="title"><?php echo $note->getTitle(); ?></div>
            </div>
        </a>
        <br>
        <div>
                <a href="./<?php echo '?metodo=delete&uuid='.$uuid ?>">Borrar</a>
        </div>
            
    <?php
    }
    ?>
</div>
</body>
</html>