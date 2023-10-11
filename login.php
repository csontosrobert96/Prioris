<html>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" id="home">
        <input type="submit" value="Főoldal" class="button" name="homepage">
    </form>
    <h1>Bejelentkezés</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <p>Felhasználónév: </p>
        <input type="text" name="user"><br>
        <p>Jelszó:</p>
        <input type="password" name="password"><br>
        <input type="submit" value="Bejelentkezés" class="button" id="login" name="login">
    </form>
</html>

<?php
    session_start();

    require_once "database.php";

    $_SESSION["username"] = null;
    if (isset($_POST["login"])) {
        $selectUsers -> execute();
        $usersInDatabase = $selectUsers -> fetchAll(PDO::FETCH_ASSOC);
        $users = array();
        for($i = 0; $i < count($usersInDatabase); $i++){
            foreach($usersInDatabase[$i] as $k => $v){
                 $users[] = $v;
            }
       }
       if (strlen($_POST["user"]) != 0) {
            if (in_array($_POST["user"],$users)) {
                $selectPassword -> execute([$_POST["user"]]);
                $passwordInDatabase = $selectPassword ->fetchAll()[0][0];
                if (strlen($_POST["password"])  != 0) {
                    if ($_POST["password"] == $passwordInDatabase) {
                        $_SESSION["username"] = $_POST["user"];
                        $selectDay -> execute([$_POST["user"]]);
                        $_SESSION["day"] = $selectDay -> fetchAll()[0][0];
                        header("Location: protected.php");
                    } else {
                        echo "<p>A megadott jelszó hibás!</p>";
                    }
                } else {
                    echo "<p>Nem adott meg jelszót!</p>";
                }
            } else {
                echo "<p>A megadott felhasználónév nem szerepel az adatbázisban!</p>";
            }
       } else {
        echo "<p>Nem adott meg felhasználónevet!</p>";
       }
    }
    if (isset($_POST["homepage"])) {
        header("Location: public.php");
    }
?>

<style>
    body{
        text-align: center;
    }
    h1 {
        margin-top: 30px;
        margin-bottom: 50px;
    }
    p {
        margin-bottom: 5px;
        font-size: large;
    }
    #login {
        margin-top: 10px;
    }
    .button {
        font-size: medium;
    }
    #home {
        text-align: right;
    }
</style>