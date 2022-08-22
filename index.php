<?php

declare(strict_types=1);

use League\Flysystem\Filesystem;
use League\Flysystem\PhpseclibV3\SftpAdapter;
use League\Flysystem\PhpseclibV3\SftpConnectionProvider;
use League\Flysystem\PhpseclibV3\SimpleConnectivityChecker;

require __DIR__ . '/vendor/autoload.php';

$filesystem = new Filesystem(new SftpAdapter(
    connectionProvider: new SftpConnectionProvider(
        host: getenv('SFTP_HOST'),
        username: getenv('SFTP_USER'),
        privateKey: __DIR__ . '/private.key',
        connectivityChecker: new SimpleConnectivityChecker(),
    ),
    root: '/'
));

var_dump($filesystem->listContents('', true)->toArray());
