<?php

namespace App\Service;

use App\Factory\FormDataFactory;
use App\Model\FormData;
use App\Repository\FormDataRepositoryInterface;

class SqLitePersister implements PersisterInterface
{
    private FormDataRepositoryInterface $formDataRepository;

    public function __construct(FormDataRepositoryInterface $formDataRepository)
    {
        $this->formDataRepository = $formDataRepository;
    }

    public function saveFormData(array $data): void
    {
        $title = $data['title'];
        $description = $data['description'];
        $author = $data['author'];

        $formData = new FormData($title, $description, $author);

        $this->formDataRepository->save($formData);
    }

    public function saveFormFile(array $files): void
    {
        $file = $files['file'];
        $fileContent = file_get_contents($file['tmp_name']);

        $factory = new FormDataFactory();

        switch ($file['type']) {
            case "application/json" :
                $formData = $factory->fromJsonFile($fileContent);
                break;
            case "application/octet-stream" :
                $formData = $factory->fromCsvFile($fileContent);
                break;
            case "text/yaml" :
                $formData = $factory->fromYamlFile($fileContent);
                break;
            default: // throw some exception
        }


        $this->formDataRepository->save($formData);
    }
}
