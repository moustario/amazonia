<head>
  <title>E-shop</title>
</head>

<style>
  <?php include './View/css/Home.css'; ?>
</style>

<body>
  <?php require_once __DIR__ . '/Header.php' ?>

  <div>

    <?php foreach ($data["gigs"] as $gig) : ?>

      <div class="card offset-header">
        <div class="card-title"><?= $gig["category_gig"] ?> : <?= substr($gig["description_gig"], 0, 8) ?> </div>
        <div class="card-description login-box">
          <?= $gig["description_gig"] ?>
        </div>
        <div class="card-footer">
          <b><i>by <?= $data["users"][$gig["id_user"] - 1]["name"] ?> for <?= $gig["price"] ?>€</i></b>
        </div>
        <input id="gig-<?= $gig["id_gig"] ?>-id_user" class="input" type="hidden" value="<?= $_SESSION["user_index"] + 1 ?>"></input>
        <button id="purchase-<?= $gig["id_gig"] ?>-btn" class="btn purchase-btn">Purchase</button>
      </div>

    <?php endforeach ?>

  </div>

</body>

<script>
  <?php include './View/js/Home.js'; ?>
</script>