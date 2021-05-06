<?php

require 'App/Bootstrap.php';

class Send extends Bootstrap
{
    public function execute(): void
    {
        $files = $_FILES;
        if (is_uploaded_file($files['file']['tmp_name'])) {
            $this->persister->saveFormFile($files);
            $this->redirectToList();
        }

        $postData = $_POST;

        $this->persister->saveFormData($postData);
        $this->redirectToList();
    }

    private function redirectToList(): void
    {
        header('Location: /list.php');
        exit;
    }
}

$app = new Send();
$app->execute();