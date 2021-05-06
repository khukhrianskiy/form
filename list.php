<?php

use App\Repository\SqLiteFormDataRepository;

require 'App/Bootstrap.php';

class ListData extends Bootstrap
{
    public function execute(): void
    {
        $repository = new SqLiteFormDataRepository();

        $formDataList = $repository->getAllFormData();

        echo $this->render('view/list', ['formDataList' => $formDataList]);
    }
}

$app = new ListData();
$app->execute();