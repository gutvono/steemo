<?php
?><!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,100..1000&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
  <header>
    <div class="menu-bg">
      <div class="menu">
        <div class="menu-logo">
          <a href="/index.html"><img src="/img/logo.png" alt="Steemo Logo"></a>
        </div>
        <nav class="menu-nav">
          <ul>
            <li><a href="/index.html">Home</a></li>
            <li><a href="./login.php" aria-current="page">Login</a></li>
            <li><a href="./register.php">Cadastre-se</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </header>
  <main class="pagina container">
    <section class="form-card card p-3">
      <h1>Login</h1>
      <form method="POST" action="./handle_login.php" class="needs-validation" novalidate>
        <div class="form-row">
          <label for="email">Email</label>
          <input class="input-text form-control" type="email" id="email" name="email" required>
        </div>
        <div class="form-row">
          <label for="senha">Senha</label>
          <input class="input-text form-control" type="password" id="senha" name="senha" required>
        </div>
        <div class="form-actions">
          <button class="btn btn-primario btn btn-primary" type="submit">Login</button>
          <a class="btn btn-link" href="./register.php">Cadastre-se</a>
        </div>
      </form>
    </section>
  </main>
  <footer>
    <p>&copy; 2023 Steemo. Todos os direitos reservados.</p>
  </footer>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const menuHamburguer = document.querySelector('.menu-hamburguer');
      const menuNav = document.querySelector('.menu-nav');
      if (menuHamburguer && menuNav) {
        menuHamburguer.addEventListener('click', function() {
          menuHamburguer.classList.toggle('ativo');
          menuNav.classList.toggle('ativo');
        });
        const menuLinks = document.querySelectorAll('.menu-nav a');
        menuLinks.forEach(link => {
          link.addEventListener('click', function() {
            menuHamburguer.classList.remove('ativo');
            menuNav.classList.remove('ativo');
          });
        });
      }
    });
  </script>
</body>
</html>
