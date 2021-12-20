<head>
  <title>Amazonia : Profile</title>
  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<style>
  <?php include './View/css/Profile.css';
  ?>
</style>

<!-- TODO delete gig proposed -->
<!-- TODO history of sold gigs -->
<!-- TODO history of purchased gigs -->

<body>
  <?php require_once __DIR__ . '/Header.php' ?>
  <div class="card offset-header">
    <div class="card-icon">
      <i class="fas fa-user fa-4x"></i>
    </div>
    <div class="card-title"><?= $_SESSION["name"] ?></div>
    <div class="card-description login-box">
      <input id="profile-name" class="input" type="text" value="<?= $data["users"][$_SESSION["user_index"]]["name"] ?>"></input>
      <input id="profile-wallet" class="input" type="number" value="<?= $data["users"][$_SESSION["user_index"]]["wallet"] ?>"></input>
      <input id="profile-password" class="input" type="password" value="<?= $data["users"][$_SESSION["user_index"]]["password"] ?>"></input>
      <input id="profile-id" class="input" type="hidden" value="<?= $_SESSION["user_index"] + 1 ?>"></input>
    </div>
    <div>
      <button id="disconnect-btn" class="btn">Disconnect</button>
      <button id="update-btn" class="btn">Update</button>
    </div>
  </div>
  <hr>
  <div class="card offset-header login-box">
    <div class="card-title">New gig</div>
    <div class="card-description">
      <input id="gig-create-price" class="input" type="number" placeholder="100"></input>
      <input id="gig-create-description" class="input" type="text" placeholder="Description ..."></input>
      <input id="gig-create-category" class="input" type="text" placeholder="Category"></input>
      <input id="gig-create-id_user" class="input" type="hidden" value="<?= $_SESSION["user_index"] + 1 ?>"></input>
    </div>
    <div>
      <button id="create-gig-btn" class="btn">Create</button>
    </div>
  </div>
  <h1>Your gigs.</h1>
  <?php foreach ($data["gigs"] as $gig) : ?>
    <div class="card offset-header">
      <div class="card-title"><?= $gig["category_gig"] ?> : <?= substr($gig["description_gig"], 0, 8) ?> </div>
      <div class="card-description login-box">
        <input id="gig-<?= $gig["id_gig"] ?>-price" class="input" type="number" value="<?= $gig["price"] ?>"></input>
        <input id="gig-<?= $gig["id_gig"] ?>-description" class="input" type="text" value="<?= $gig["description_gig"] ?>" maxlength="240"></input>
        <input id="gig-<?= $gig["id_gig"] ?>-category" class="input" type="text" value="<?= $gig["category_gig"] ?>" maxlength="13"></input>
        <input id="gig-<?= $gig["id_gig"] ?>-id_gig" class="input" type="hidden" value="<?= $gig["id_gig"] ?>"></input>
      </div>
      <button id="update-gig-<?= $gig["id_gig"] ?>-btn" class="btn update-gig-btn">Update</button>
    </div>
  <?php endforeach ?>


</body>

<script>
  <?php include './View/js/Profile.js'; ?>
</script>