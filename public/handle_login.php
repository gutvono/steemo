<?php
$handler = __DIR__ . '/../src/handle_login.php';
if (!file_exists($handler)) {
  http_response_code(404);
  echo 'Erro: recurso de login não encontrado.';
  exit;
}
require_once $handler;
