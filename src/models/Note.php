<?php

namespace Estebanr\Notas\models;

use Estebanr\Notas\libs\Database;

use PDO;

class Note extends Database{

    private string $uuid;

    public function __construct(private string $title='', private string $content = ''){
        parent::__construct();

        $this->uuid = uniqid();
    }

    public function save ()
    {
        $query = $this->connect()->prepare("INSERT INTO notes (uuid, title, content, updated) VALUES (:uuid, :title, :content, NOW() )");
        $query ->execute(['title' => $this->title, 'uuid' => $this->uuid, 'content' => $this->content]);

    }

    public function updated()
    {
        $query = $this->connect()->prepare("UPDATE notes SET title = :title, content = :content, updated = NOW() WHERE uuid = :uuid");
        $query ->execute(['title' => $this->title, 'uuid' => $this->uuid, 'content' => $this->content]);

    }

    public function delete($uuid)
    {
        $query = $this->connect()->prepare("DELETE FROM notes WHERE uuid = :uuid");

        try {

            $query->execute([
                'uuid'=>$uuid
            ]);

            // var_dump($item);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
        // ESTO TE TRAE UN REGISTRO DE LA BD SEGUN EL ID Q LE PASES
        public static function get($uuid){

            $db = new Database();
            $query = $db->connect()->prepare("SELECT*FROM notes WHERE uuid = :uuid");
            $query->execute(['uuid'=> $uuid]);

            // aca le paso a la funcion statica un parametro de tipo note donde en el parametro le paso el query de este mismo metodo, en donde dentro del query busco con el fetch una propiedad en especifico del objeto pdo q puedo usarlo gracias a q instancie la base de datos arriba y es el fetch_assoc q me devolvera el primer registro de una consulta a la bd
            $note = Note::createFromArray($query->fetch(PDO::FETCH_ASSOC));

            return $note;

        }

        // ESTE TE TRAE TODOS LOS REGISTROS DE LA BD
        public static function getAll(){
            $notes = [];
            $db = new Database();
            $query = $db->connect()->query("SELECT*FROM notes");

            while($r = $query->fetch(PDO::FETCH_ASSOC)){
                $note = Note::createFromArray($r);
                array_push($notes, $note);


            }

            return $notes;
        }

        public static function createFromArray($arr):Note
        {
            $note= new Note($arr['title'],$arr['content']);
            $note->setUUID($arr['uuid']);

            return $note;
        }

        public function getUUID(): string
        {
            return $this->uuid;
        }

        public function setUUID ($value)
        {
            $this->uuid = $value;
        }


        public function getTitle(): string
        {
            return $this->title;
        }

        public function setTitle ($value)
        {
            $this->title = $value;
        }


        public function getContent(): string
        {
            return $this->content;
        }

        public function setContent ($value)
        {
            $this->content = $value;
        }
}


// TODO: MIN 54.00


