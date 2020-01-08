<?php

namespace App\Service;

use App\Utils;
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
            Utils::redirect('Form.php');
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

    public function deleteByCheck()
    {
        if (isset($_POST['id'])) {
            $tab = $_POST['id'];
            foreach ($tab as $id) {
                $sql = "DELETE FROM newsletter WHERE id = $id";
                $delete = $this->db->query($sql);
                $delete->execute();
            }
            echo count($_POST['id']);
            unset($_POST['id']);
        }
    }
}
