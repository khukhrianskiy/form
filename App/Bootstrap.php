<?php

use App\Repository\FormDataRepositoryInterface;
use App\Repository\SqLiteFormDataRepository;
use App\Service\PersisterInterface;
use App\Service\SqLitePersister;

class Bootstrap
{
    private const ROOT_PATH = __DIR__ . '/..';

    protected FormDataRepositoryInterface $formDataRepository;
    protected PersisterInterface $persister;

    public function __construct()
    {
        spl_autoload_register(['static','loadClass']);

        $this->formDataRepository = new SqLiteFormDataRepository();
        $this->persister = new SqLitePersister($this->formDataRepository);
    }

    public static function loadClass(string $className): void
    {
        $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);

        require_once sprintf('%s.php', self::ROOT_PATH.DIRECTORY_SEPARATOR.$className);
    }

    protected function render(string $viewName, array $params): string
    {
        extract($params);

        $viewFile = self::ROOT_PATH.DIRECTORY_SEPARATOR.$viewName.'.php';

        ob_start();

        require $viewFile;

        return ob_get_clean();
    }
}
