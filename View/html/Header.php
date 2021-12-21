<style>
    <?php include './View/css/Header.css'; ?>
</style>

<div id="header">
    <span id="span-home">
        <h1>Amazonia</h1>
    </span>
    <div class="search-bar">
        <input class="input" disabled></input>
        <button class="btn"><img id="search-icon" src="http://localhost:8000/public/loupe.png" /></button>
    </div>
    <div>
        <button id="btn-login" class="btn"><?= ($_SESSION["is_connected"]) ? $_SESSION["name"] : "Login"; ?></button>
        <?php if ($_SESSION['use_to_be_admin']) : ?>
            <input id="admin-id" type="hidden" value="<?= $_SESSION['use_to_be_admin_id'] ?>"></input>
            <button id="btn-back-admin" class="btn">Back to admin</button>
        <?php endif ?>
    </div>
</div>

<script>
    <?php include './View/js/Header.js'; ?>
</script>