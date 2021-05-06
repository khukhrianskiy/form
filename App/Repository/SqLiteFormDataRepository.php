<?php

namespace App\Repository;

use App\Model\FormData;
use PDO;

class SqLiteFormDataRepository implements FormDataRepositoryInterface
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("sqlite:" . "./db/form.sqlite");
    }

    public function save(FormData $formData): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO form_data (title, description, author) VALUES (:title, :description, :author)");
        $stmt->execute([
            ':title' => $formData->getTitle(),
            ':description' => $formData->getDescription(),
            ':author' => $formData->getAuthor(),
        ]);
    }

    /**
     * @return FormData[]
     */
    public function getAllFormData(): array
    {
        $stmt = $this->pdo->query('SELECT title, description, author FROM form_data');

        $formDataList = [];
        while ($row = $stmt->fetchObject()) {
            $formDataList[] = new FormData($row->title, $row->description, $row->author);
        }

        return $formDataList;
    }
}
