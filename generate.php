<?php
$model = new \Modules\BaseX\Model;
$model->class = "Api";
$model->namespace = $this->model["namespace"];
$model->username = $this->basex["username"];
$model->password = $this->basex["password"];
$model->host = $this->basex["database"];
$model->query = $this->basex["path"];   
$model->tag = $this->model["tag"];

$model->setup();
echo sprintf("%s\%s", $model->namespace, $model->class) . PHP_EOL;
ob_flush();

