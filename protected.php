<html>
    <body>
        <?php session_start(); if (isset($_SESSION["username"])) : ?>
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" id="home">
                <input type="submit" value="Kijelentkezés" id="button" name="logout">
            </form>
        <?php endif ?>
    </body>
</html>
<?php
    if (isset($_SESSION["username"])) {
        echo '<h1>Sikeres bejelentkezés!</h1>';
        echo '<p>Üdvözlöm ' . $_SESSION["username"] . '!</p>';
        if (strlen($_SESSION["day"])  != 0) {
            echo '<p>Az Ön kedvenc napja a héten: ' . $_SESSION["day"] . '</p>';
        } else {
            echo '<p>Az adatbázis szerint Önnek nincs kedvenc napja.';
        }
    } else {
        echo '<p>Önnek nincs joga ehhez az oldalhoz</p>';
    }
    if (isset($_POST["logout"])) {
        session_unset();
        header("Location: public.php");
    }
?>

<style>
    h1 {
        text-align: center;
    }
    p {
        font-size: large;
    }
    #home {
        text-align: right;
    }
    #button {
        font-size: medium;
    }
</style>