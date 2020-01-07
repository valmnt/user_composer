<?php

namespace App\Service;

use PDO;

class FormService extends AbstractService
{
    public function sendMail()
    {
        if (!empty($_POST['mail'])) {
            $post = $_POST['mail'];
            $STH = $this->db->prepare('INSERT INTO newsletter(mail) VALUES (:post)');
            $STH->bindParam(':post', $post);
            $STH->execute();
            header('Location: Form.php');
        }
    }

    public function findAllMail(): array
    {
        $answer = "SELECT * FROM newsletter ORDER BY id";
        $rows = $this->db->query($answer);
        return $rows->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteByID()
    {
        if (isset($_GET['delete_id'])) {
            $id = $_GET['delete_id'];
            $delete = $this->db->query("DELETE FROM newsletter WHERE id = $id");
            $delete->execute();
        }
    }
}
