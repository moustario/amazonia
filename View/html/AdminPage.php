<head>
  <title>Amazonia : Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<style>
  <?php include './View/css/Admin.css'; ?>
</style>

<body>
  <?php require_once __DIR__ . '/Header.php' ?>

  <?php foreach ($data["users"] as $user) : ?>
    <div class="card offset-header">
      <div class="card-title">User <?= $user["name"] ?> : <?= $user["wallet"] ?>€ </div>
      <div class="card-description login-box">
        <button id="switch-<?= $user["id_user"] ?>-btn" class="btn switch-btn">Take Control</button>
      </div>
    </div>
  <?php endforeach ?>
</body>

<script>
  <?php include './View/js/Admin.js'; ?>
</script>