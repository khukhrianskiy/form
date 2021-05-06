<?php

namespace App\Service;

interface PersisterInterface
{
    public function saveFormData(array $data): void;

    public function saveFormFile(array $data): void;
}