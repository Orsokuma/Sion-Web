<?php
$authCode = 'X7h2Ypfl3r0CoBbeVnXhy4WP';
if (isset($argv)) {
    parse_str($argv[1], $param);
} else {
    $param = [
        'code' => array_key_exists('code', $_GET) ? $_GET['code'] : null,
    ];
}
if ($param['code'] !== $authCode) {
    header('HTTP/1.1 403 Forbidden');
    exit;
}
$command = '~/pull-sd-site';
$tmp = system($command);
$log = '####### ' . date('Y-m-d H:i:s') . ' #######' . PHP_EOL .
    '$ ' . $command . PHP_EOL . trim($tmp) . str_repeat(PHP_EOL, 2);
file_put_contents(dirname(__DIR__) . '/logs/deploy-log.txt', $log, FILE_APPEND);
echo 'Done';