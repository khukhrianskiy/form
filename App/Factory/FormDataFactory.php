<?php

namespace App\Factory;

use App\Model\FormData;

class FormDataFactory
{
    public function fromJsonFile(string $fileContent): FormData
    {
        $formDataObject = json_decode($fileContent);

        return new FormData($formDataObject->title, $formDataObject->description, $formDataObject->author);
    }

    public function fromCsvFile(string $fileContent): FormData
    {
        $formDataArray = str_getcsv($fileContent);

        return new FormData($formDataArray[0], $formDataArray[1], $formDataArray[2]);
    }

    public function fromYamlFile(string $fileContent): FormData
    {
        $formDataArray = yaml_parse($fileContent);

        return new FormData($formDataArray['title'], $formDataArray['description'], $formDataArray['author']);
    }
}
