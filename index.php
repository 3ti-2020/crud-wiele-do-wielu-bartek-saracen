<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bartosz Saracen gr 2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <header>
        <h1>Biblioteka</h1>
    </header>
    <nav>
        <ul>
            <li><a href="#">link</a></li>
            <li><a href="cards/index.html">Cards</a></li>
            <li><a href="#">link</a></li>
        </ul>
    </nav>
    <div class="left-aside">
        <div>
            <details>
                <summary>Tabela info</summary>
                <p>Tabela na stronie jest połączeniem 3 tabel lib_autor, lib_tytul oraz lib_autor_tytul</p>
            </details>
        </div>
        <div class="ins1">
            <form action="insert.php" method="POST">
            <div><input type="text" name="imie" placeholder="imie autora"></div>
            <div><input type="text" name="nazwisko" placeholder="nazwisko autora"></div>
            <div><input type="text" name="tytul" placeholder="tytul"></div>
            <div><input type="submit" value="Send"></div>
            </form>
        </div>
    </div>
    <main>
    <?php
    require('connect.php');
    $conn->set_charset('utf8');
    $result=$conn->query("SELECT id_autor_tytul,imie,nazwisko,tytul FROM lib_autor_tytul,lib_autor,lib_tytul WHERE lib_tytul.id_tytul=lib_autor_tytul.id_tytul and lib_autor.id_autor=lib_autor_tytul.id_autor");
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
            <td>$row[imie]</td>
            <td>$row[nazwisko]</td>
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
</body>
</html>
