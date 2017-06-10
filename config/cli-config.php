<?php

use Suntransfers\Doctrine\EntityManager\SuntransfersEntityManagerFactory;

$emStaticProxy = new \Suntransfers\Doctrine\EntityManager\EntityManagerStaticProxy();
$driverManager = new \Suntransfers\Doctrine\Connection\SuntransfersDriverManager();

// Get vars from ENV.
$mysqlHost = (getenv('MYSQL_HOST') !== false )
    ? getenv('MYSQL_HOST')
    : 'stdb1';

$connParams = [
    'host' => $mysqlHost,
    'dbname' => 'travelgroup',
    'driver' => 'mysqli',
    'port' => '3306',
    'user' => 'travelgroup_dba',
    'password' => 'JWi28GsqgqGNOihZ',
];

$connection = new \Suntransfers\Doctrine\Connection\SuntransfersConnection($driverManager, $connParams);

$suntransfersSetup = new \Suntransfers\Doctrine\ORM\Tools\SetupStaticProxy();

$mapping = [__DIR__ . '/../src/Suntransfers/VendorNamw/Infrastructure/Persistence/Doctrine/Mapping'];

$iterator = new RecursiveDirectoryIterator(__DIR__ . '/../vendor/suntransfers/');
foreach (new RecursiveIteratorIterator($iterator) as $filename => $file) {
    if ($file->isDir() && preg_match('/Mapping\/.$/i', $filename)) {
        $mapping[] = $filename;
    }
}

$emFactory = new SuntransfersEntityManagerFactory($emStaticProxy, $connection, $suntransfersSetup, $mapping);

$em = $emFactory->create(true);

$em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');

$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
));

return $helperSet;
