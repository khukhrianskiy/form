<?php

namespace App\Repository;

use App\Model\FormData;

interface FormDataRepositoryInterface
{
    public function save(FormData $formData): void;

    /**
    * @return FormData[]
    */
    public function getAllFormData(): array;
}