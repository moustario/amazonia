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

      <!-- TODO add purchasing gig ability -->
      <div class="card offset-header">
        <div class="card-title"><?= $gig["category_gig"] ?> : <?= substr($gig["description_gig"], 0, 8) ?> </div>
        <div class="card-description login-box">
          <?= $gig["description_gig"] ?>
        </div>
        <div class="card-footer">
          <b><i>by <?= $data["users"][$gig["id_user"] - 1]["name"] ?> for <?= $gig["price"] ?>€</i></b>
        </div>
      </div>

    <?php endforeach ?>

  </div>

</body>