<?php
declare(strict_types=1);

require_once __DIR__ . "/../vendor/autoload.php";


use Ana\FdsApp\Controller\HomeController;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/../templates');
$twig = new Environment($loader);

$controller = new HomeController();

echo $twig->render(
    'home.html.twig',
    $controller -> index()
);
?>