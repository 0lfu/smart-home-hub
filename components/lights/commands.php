<?php
require '../../vendor/autoload.php';

$config = [
    'accessKey' => '79emhsekqvfcwh49e5qf',
    'secretKey' => '7aa77a44941749e69557b5a37c6317fd',
    'baseUrl' => 'https://openapi.tuyaeu.com'
];
$bulbs = [
    'bf107508a1f5e55266rwmf',
    'bfea2bcfee238d9efetlqi',
    'bff953e9efb2c12e69qnts',
    'bff2ebfe13b2d29ef4diep'
];
$tuya = new \tuyapiphp\TuyaApi($config);
$token = $tuya->token->get_new()->result->access_token;
$command = $_POST['command'];
$value = $_POST['value'];
if ($command == 'switch_led'){
    $bool_value = filter_var($value, FILTER_VALIDATE_BOOLEAN);
    for ($i = 0; $i < count($bulbs); $i++) {
        $tuya->devices($token)->post_commands($bulbs[$i], ['commands' => [['code' => $command, 'value' => $bool_value]]]);
    }
}
if ($command == 'bright_value_v2'){
    for ($i = 0; $i < count($bulbs); $i++) {
        $t=$tuya->devices($token)->post_commands($bulbs[$i], ['commands' => [['code' => $command, 'value' => $value*10]]]);
    }
}
?>
