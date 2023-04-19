<?php
require_once '../../vendor/autoload.php';
require_once '../../credentials.php';
$client = new FabianBeiner\Todoist\TodoistClient($todoist['api_key']);
if (isset($_POST["taskId"])) {
    $taskId = $_POST["taskId"];
    $result = $client->closeTask($taskId);
    if ($result) {
      $response = array("success" => true);
    } else {
      $response = array("success" => false);
    }
    header('Content-Type: application/json');
    echo json_encode($response);
  }
?>
