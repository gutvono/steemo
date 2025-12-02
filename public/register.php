<?php
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
  <header>
    <div class="menu-bg">
      <div class="menu">
        <div class="menu-logo">
          <a href="../index.html"><img src="../img/logo.png" alt="Steemo Logo"></a>
        </div>
        <nav class="menu-nav">
          <ul>
            <li><a href="../index.html">Home</a></li>
            <li><a href="./login.php">Login</a></li>
            <li><a href="./register.php" aria-current="page">Cadastre-se</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </header>
  <main style="max-width: 480px; margin: 32px auto; padding: 24px;">
    <h1>Cadastro</h1>
    <form method="POST" action="../src/handle_register.php" style="display:flex; flex-direction:column; gap:12px;">
      <label for="nome">Nome completo</label>
      <input type="text" id="nome" name="nome" required>
      <label for="email">Email</label>
      <input type="email" id="email" name="email" required>
      <label for="celular">Celular</label>
      <input type="text" id="celular" name="celular" required>
      <label for="nivel">Nível de acesso</label>
      <select id="nivel" name="nivel" required>
        <option value="usuario">Usuário</option>
        <option value="administrador">Administrador</option>
      </select>
      <label for="senha">Senha</label>
      <input type="password" id="senha" name="senha" required>
      <button type="submit">Cadastrar</button>
    </form>
  </main>
</body>
</html>
