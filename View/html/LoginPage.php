<head>
  <title>Amazonia : Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<style>
  <?php include './View/css/Login.css'; ?>
</style>

<body>
  <?php require_once __DIR__ . '/Header.php' ?>
  <div class="card offset-header">
    <div class="card-icon">
      <i class="fas fa-user fa-4x"></i>
    </div>
    <div class="card-title">🔥 Login</div>
    <div class="card-description login-box">
      <input id="login-name" class="input" placeholder="name ..." type="text"></input>
      <input id="login-password" class="input" placeholder="password ..." type="password"></input>
      <button id="login-btn" class="btn">Login</button>
      <p>No account ? Please register <span id="register-link">here</span></p>
    </div>

</body>

<script>
  <?php include './View/js/Login.js'; ?>
</script>