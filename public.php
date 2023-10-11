<html>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" id="form">
        <input type="submit" value="Bejelentkezés" id="loginButton" name="login">
    </form>
</html>
<?php
echo '<h1>Üdvüzlöm</h1>';
echo '<p>A hét napjai a következő napokból állnak:</p>';
echo '<div><ul>';
$napok = array("hétfő", "kedd", "szerda", "csütörtök", "péntek", "szombat", "vasárnap");
foreach ($napok as $nap) {
    echo '<li>' . $nap . '</li>';
}
echo '</ul></div>';
echo '<p>Személyes információért kérem jelentkezzen be.</p>';
if (isset($_POST["login"])) {
    header("Location: login.php");
}
?>

<style>
    body {
        background-color: #997950;
    }
    #form {
        text-align: right;
    }
    #loginButton {
        text-align: right;
        font-size: 16px;
    }
    h1, p {
        text-align: center;
        color: lawngreen;
    }
    h1 {
        margin-top: 50px;
        
    }
    p {
        font-size: large;
    }
    div {
        text-align: center;
    }
    ul {
        display: inline-block;
        text-align: left;
        font-weight: bold;
    }
</style>