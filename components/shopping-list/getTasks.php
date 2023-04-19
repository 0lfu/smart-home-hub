<?php
require_once 'vendor/autoload.php';
require_once 'credentials.php';
$client = new FabianBeiner\Todoist\TodoistClient($todoist['api_key']);
$projectId = $shoppinglist['project'];
$tasks = $client->getAllTasks(['project_id' => $projectId]);