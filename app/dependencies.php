<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        LoggerInterface::class => function (ContainerInterface $c) {
            $settings = $c->get('settings');

            $loggerSettings = $settings['logger'];
            $logger = new Logger($loggerSettings['name']);

            $processor = new UidProcessor();
            $logger->pushProcessor($processor);

            $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
            $logger->pushHandler($handler);

            return $logger;
        },
				
        PDO::class => function (ContainerInterface $c){
            //return new PDO('mysql:host=127.0.0.1;dbname=teste', "teste", "");
            $settings = $c->get('settings');
            $dbconfig= $settings['dbconfig'];
            return new PDO($dbconfig['con'], $dbconfig['db'], $dbconfig['password']);
        },
				
    ]);
};
