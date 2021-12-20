<head>
    <title>Amazonia : Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<style>
    <?php include './View/css/Register.css'; ?>
</style>

<body>
    <?php require_once __DIR__ . '/Header.php' ?>

    <div class="card offset-header">
        <div class="card-icon">
            <i class="fas fa-user fa-4x"></i>
        </div>
        <div class="card-title">🔥 Register</div>
        <div class="card-description register-box">
            <input id="register-name" class="input" placeholder="name ..." type="text"></input>
            <input id="register-password" class="input" placeholder="password ..." type="password"></input>
            <input id="register-wallet" class="input" placeholder="100 ..." type="number"></input>
            <button class="btn" id="register-btn">Register</button>
        </div>
    </div>


</body>

<script>
    <?php include './View/js/Register.js'; ?>
</script>