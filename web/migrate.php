<?php
require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . '/../');
$dotenv->load();

$client_ip = $_SERVER['REMOTE_ADDR'];

/* create open log */
$fs = fopen('./migrate.log', 'a');
fwrite($fs, 'Request on ['.date("Y-m-d H:i:s").'] from ['.$client_ip.']'.PHP_EOL);
/* test token */
fwrite($fs, '======================================================================='.PHP_EOL);
/* if you need get full json input */
//fwrite($fs, 'DATA: '.print_r($data, true).PHP_EOL);
/* branch filter */
    /* if master branch*/
    /* then pull master */
$res_php = shell_exec("cd ". getenv('APP_ROOT')." && php yii migrate --interactive=0 2>&1");
fwrite($fs, $res_php.PHP_EOL);
fwrite($fs, '======================================================================='.PHP_EOL);
$fs and fclose($fs);

?>
<pre>
<?php print_r($res_php) ?>
</pre>
