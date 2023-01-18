<?php

use Estebanr\Notas\models\Note;

$notes = Note::getAll();


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
    ?>
        <a href="?views=view&uuid=<?php echo $note->getUUID(); ?>">
            <div class="note-preview">
                <div class="title"><?php echo $note->getTitle(); ?></div>
            </div>
        </a>
            
    <?php
    }
    ?>
</div>
</body>
</html>