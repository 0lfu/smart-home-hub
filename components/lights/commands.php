<?php
require_once '../../vendor/autoload.php';
require_once '../../credentials.php';
$client = new \tuyapiphp\TuyaApi($tuya);
$token = $client->token->get_new()->result->access_token;
$command = $_POST['command'];
$value = $_POST['value'];
if ($command == 'switch_led'){
    $bool_value = filter_var($value, FILTER_VALIDATE_BOOLEAN);
    for ($i = 0; $i < count($bulbs); $i++) {
        $client->devices($token)->post_commands($bulbs[$i], ['commands' => [['code' => $command, 'value' => $bool_value]]]);
    }
}
if ($command == 'bright_value_v2'){
    for ($i = 0; $i < count($bulbs); $i++) {
        $t=$client->devices($token)->post_commands($bulbs[$i], ['commands' => [['code' => $command, 'value' => $value*10]]]);
    }
}
if ($command == 'temp_value_v2'){
    for ($i = 0; $i < count($bulbs); $i++) {
        $t=$client->devices($token)->post_commands($bulbs[$i], ['commands' => [['code' => $command, 'value' => $value*10]]]);
    }
}
?>
