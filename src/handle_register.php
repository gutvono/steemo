<?php
require_once __DIR__ . '/db.php';
$nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$celular = isset($_POST['celular']) ? trim($_POST['celular']) : '';
$nivel = isset($_POST['nivel']) ? trim($_POST['nivel']) : '';
$senha = isset($_POST['senha']) ? trim($_POST['senha']) : '';
$erros = [];
if ($nome === '') { $erros[] = 'Nome é obrigatório'; }
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) { $erros[] = 'Email inválido'; }
if ($celular === '') { $erros[] = 'Celular é obrigatório'; }
if ($nivel !== 'usuario' && $nivel !== 'administrador') { $erros[] = 'Nível inválido'; }
if ($senha === '') { $erros[] = 'Senha é obrigatória'; }
if (count($erros) === 0) {
  try {
    $pdo = db();
    $stmt = $pdo->prepare('INSERT INTO usuarios (nome, email, celular, nivel, senha) VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$nome, $email, $celular, $nivel, $senha]);
    $msg = 'Cadastro realizado com sucesso';
  } catch (Throwable $e) {
    $msg = 'Erro ao cadastrar: ' . $e->getMessage();
  }
} else {
  $msg = implode(' | ', $erros);
}
?><!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,100..1000&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <main style="max-width: 640px; margin: 32px auto; padding: 24px;">
    <h1>Cadastro</h1>
    <p><?php echo htmlspecialchars($msg, ENT_QUOTES, 'UTF-8'); ?></p>
    <p><a href="../public/register.php">Voltar</a> | <a href="../public/login.php">Ir para Login</a></p>
  </main>
</body>
</html>
