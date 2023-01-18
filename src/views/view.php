
<?php

use Estebanr\Notas\models\Note;
    if (count($_POST) > 0) {

        // ACTUALIZAR DATOS
        $title = isset($_POST['title']) ? $_POST['title'] : '';
        $content = isset($_POST['content']) ? $_POST['content'] : '';
        $uuid= $_POST['id'];
        
        $note = Note::get($uuid);
        // Aca segun entiendo RECIBE LOS DATOS Q LE LLEGAN POR POST
        $note->setTitle($title);
        $note->setContent($content);

        $note->updated();



    }else if (isset($_GET['uuid'])) { //aca sino se me actualizan los datos lo q hago es q me siga mostrando los datos antes de la actualizacion
        $note = Note::get($_GET['uuid']);
    }else{
        header('Location: https://localhost:PHP-VIDAMRR/10PROYECTOSPHP');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/views/resources/main.css">
    <title>View</title>
</head>
<body>
    <?php require 'resources/navbar.php'?>
    <h1>View</h1>

    <form action="?views=view&uuid=<?php echo $note->getUUID(); ?>" method="POST">
        <input type="text" name="title" placeholder="title..." value="<?php echo $note->getTitle(); ?>">
        <input type="hidden" name="id" value="<?php echo $note->getUUID(); ?>">
        <textarea name="content" id="" cols="30" rows="10"><?php echo $note->getContent(); ?></textarea>
        <input type="submit" value="Update Note">
    </form>
</body>
</html> 