<?php
require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . '/../');
$dotenv->load();

/* gitlab deploy webhook */
/* file.php?token=oGN3YTBuPizLa5Pwgx8ICvoNn3OqFVFKBOxtwchjs2a8z8vOdEqcUiLWsvjfz5j */
/* security */
$access_token = getenv('GITLAB_TOKEN');
$access_ip = ['8.34.208.0/20', '8.35.192.0/21', '8.35.200.0/23', '108.59.80.0/20', '108.170.192.0/20',
'108.170.208.0/21', '162.216.148.0/22', '162.222.176.0/21', '173.255.112.0/20', '192.158.28.0/22', '199.192.112.0/22',
'199.223.232.0/22', '199.223.236.0/23', '23.236.48.0/20', '23.251.128.0/19', '35.200.0.0/13', '35.208.0.0/13',
'107.167.160.0/19', '107.178.192.0/18', '146.148.2.0/23', '146.148.4.0/22', '146.148.8.0/21', '146.148.16.0/20',
'146.148.32.0/19', '146.148.64.0/18', '34.104.0.0/14', '130.211.8.0/21', '130.211.16.0/20', '130.211.32.0/19',
'130.211.64.0/18', '130.211.128.0/17', '104.154.0.0/15', '104.196.0.0/14', '208.68.108.0/23', '35.184.0.0/14',
'35.188.0.0/15', '35.216.0.0/15', '35.190.0.0/17', '35.190.128.0/18', '35.190.192.0/19', '35.235.224.0/20',
'35.192.0.0/14', '35.196.0.0/15', '35.198.0.0/16', '35.199.0.0/17', '35.199.128.0/18', '35.235.216.0/21', '35.190.224.0/20'
];
/* get user token and ip address */
$client_token = isset($_SERVER["HTTP_X_GITLAB_TOKEN"]) ? $_SERVER["HTTP_X_GITLAB_TOKEN"] : false;
$client_ip = $_SERVER['REMOTE_ADDR'];

function ipCIDRCheck ($IP, $CIDR) {
//    var_dump( $CIDR); exit;
    list ($net, $mask) = preg_split ("//", $CIDR);

    $ip_net = ip2long ($net);
    $ip_mask = ~((1 << (32 - $mask)) - 1);

    $ip_ip = ip2long ($IP);

    $ip_ip_net = $ip_ip & $ip_mask;

    return ($ip_ip_net == $ip_net);
}
/* create open log */
$fs = fopen('./webhook.log', 'a');
fwrite($fs, 'Request on ['.date("Y-m-d H:i:s").'] from ['.$client_ip.']'.PHP_EOL);
/* test token */
if ($client_token !== $access_token)
{
    echo "error 403";
    fwrite($fs, "Invalid token [{$client_token}]".PHP_EOL);
    exit(0);
}
/* test ip */
$is_allow_ip = false;
foreach ($access_ip as $cur_ip) {
    if (ipCIDRCheck ($client_ip, $cur_ip)) {
        $is_allow_ip = true;
        break;
    }
}
//if ( ! in_array($client_ip, $access_ip))
if ( !$is_allow_ip)
{
    echo "error 503";
    fwrite($fs, "Invalid ip [{$client_ip}]".PHP_EOL);
    exit(0);
}
/* get json data */
$json = file_get_contents('php://input');
//fwrite($fs, 'DATA: '.print_r($json, true).PHP_EOL);
$data = json_decode($json, true);
/* get branch */
$branch = $data["ref"];
fwrite($fs, '======================================================================='.PHP_EOL);
/* if you need get full json input */
//fwrite($fs, 'DATA: '.print_r($data, true).PHP_EOL);
/* branch filter */
if ($branch === 'refs/heads/main')
{
    /* if master branch*/
    fwrite($fs, 'BRANCH: '.print_r($branch, true).PHP_EOL);
    /* then pull master */
    $res_git = shell_exec("cd ". getenv('APP_ROOT')." && git pull 2>&1");
    fwrite($fs, $res_git.PHP_EOL);
//    shell_exec("cd /var/www/china.doramy-online.ru/ && git pull >> /var/www/china.doramy-online.ru/deploy.log");
//    exec("/var/www/china.doramy-online.ru/deploy/master_deploy.sh");
    fwrite($fs, '======================================================================='.PHP_EOL);
    $fs and fclose($fs);
}
else
{
    /* if devel branch */
    fwrite($fs, 'BRANCH: '.print_r($branch, true).PHP_EOL);
    fwrite($fs, '======================================================================='.PHP_EOL);
    $fs and fclose($fs);
    /* pull devel branch */
  //  exec("/var/www/china.doramy-online.ru/deploy/devel_deploy.sh");
}
?>