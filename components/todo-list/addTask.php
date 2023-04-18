<?php
require_once '../../vendor/autoload.php';
require_once '../../credentials.php';
$client = new FabianBeiner\Todoist\TodoistClient($todoist['api_key']);
$projectId = $todoist['project'];
$optionalParams = [
    'project_id' => $projectId,
];
if (isset($_POST["content"])) {
    $content = $_POST["content"];
    $result = $client->createTask($content, ['project_id' => $projectId]);
    if ($result) {
      $response = array("success" => true, "taskId" => $result['id'], "content" => $result['content']);
    } else {
      $response = array("success" => false);
    }
    header('Content-Type: application/json');
    echo json_encode($response);
  }