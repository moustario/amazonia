<style>
    <?php include './View/css/Header.css'; ?>
</style>

<div id="header">
    <span id="span-home">
        <h1>Amazonia</h1>
    </span>
    <div class="search-bar">
        <input class="input"></input>
        <button class="btn"><img id="search-icon" src="http://localhost:8000/public/loupe.png" /></button>
    </div>
    <button id="btn-login" class="btn"><?= ($_SESSION["is_connected"]) ? $_SESSION["name"] : "Login"; ?></button>
</div>

<script>
    <?php include './View/js/Header.js'; ?>
</script>