<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bartosz Saracen gr 2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="modal">
        <div class="log">
            <a class="close">+</a>
            <div class="a1 a">
                <div class="circle"></div>
            </div>
            <form action="login.php" method="POST">
            <div class="a2 a">
                <div class="action">
                    <input type="text" name="login" class="login i" placeholder="login">
                    <input type="text" name="password" class="password i" placeholder="password">
                </div>
            </div>
            <div class="a3 a">
                <input class="button" type="submit" value="Zaloguj">
            </div>
            </form>
        </div>
    </div>
    <div class="container">
    <header>
        <h1>Biblioteka</h1>
    </header>
    <nav>
        <ul>
            <li><a href="https://github.com/3ti-2020/crud-wiele-do-wielu-bartek-saracen" target="_blank"><img class="github" src="https://www.flaticon.com/svg/static/icons/svg/2111/2111425.svg" alt="github"></a></li>
            <li><a href="cards/index.html">Cards</a></li>
            <li><a href="#" id="signin">login</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <div class="left-aside">
        <div>
            <details style="cursor: pointer;">
                <summary>Tabela info</summary>
                <p>Tabela na stronie jest połączeniem 3 tabel lib_autor, lib_tytul oraz lib_autor_tytul</p>
            </details>
        </div>
        <?php
        if(isset($_SESSION['login']) {
        echo("
        <div class='ins1'>
            <form action='insert.php' method='POST'>
            <div><input type='text' name='imie' placeholder='imie autora'></div>
            <div><input type='text' name='nazwisko' placeholder='nazwisko autora'></div>
            <div><input type='text' name='tytul' placeholder='tytul'></div>
            <div><input style='cursor: pointer;' type='submit' value='Send'></div>
            </form>
        </div>
        ");
        }
        ?>
    </div>
    <main>
    <?php
    require('connect.php');
    $conn->set_charset('utf8');
    $result=$conn->query("SELECT id_autor_tytul,imie_autor,nazwisko_autor,tytul FROM lib_autor_tytul,lib_autor,lib_tytul WHERE lib_tytul.id_tytul=lib_autor_tytul.id_tytul and lib_autor.id_autor=lib_autor_tytul.id_autor");
    echo("<table class='tab'><tr>
        <th>id</th>
        <th>imie</th>
        <th>nazwisko</th>
        <th>tytul</th>
    </tr>");
    while($row=$result->fetch_assoc()){
        $str = <<<HTML
        <tr>
            <td>$row[id_autor_tytul]</td>
            <td>$row[imie_autor]</td>
            <td>$row[nazwisko_autor]</td>
            <td>$row[tytul]</td>
        </tr>
HTML;
        echo $str;
    }
    echo("</table>");
    ?>
    </main>
    <footer></footer>
    </div>
    <script src="script.js"></script>
</body>
</html>
