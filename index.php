<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <header>
        <h1>Książki</h1>
    </header>
    <nav>
        <ul>
            <li><a href="#">link</a></li>
            <li><a href="#">link</a></li>
            <li><a href="#">link</a></li>
        </ul>
    </nav>
    <div class="left-aside">
        <div>
            <details>
                <summary>Tabela info</summary>
                <p>Tabela na stronie jest widokiem połączenie 3 tabelek lib_autor, lib_tytul, lib_autor_tytul</p>
            </details>
        </div>
        <div class="ins1">
            <form action="insert.php" method="POST">
            <div><input type="text" name="nazwisko" placeholder="nazwisko autora"></div>
            <div><input type="text" name="tytul" placeholder="tytul"></div>
            <div><input type="submit" value="Send"></div>
            </form>
        </div>
    </div>
    <main>
    <?php
    $conn=new mysqli('remotemysql.com','PDsWaSTZR9','6Xi9F82obS','PDsWaSTZR9');
    $conn->set_charset('utf8');
    $result=$conn->query("SELECT id_autor_tytul,autor,tytul FROM lib_tytul,lib_autor_tytul,lib_autor where lib_autor.id_autor=lib_autor_tytul.id_autor_tytul and lib_tytul.id_tytul=lib_autor_tytul.id_tytul;");
    echo("<table class='tab'><tr>
        <th>id</th>
        <th>autor</th>
        <th>tytul</th>
    </tr>");
    while($row=$result->fetch_assoc()){
        $str = <<<HTML
        <tr>
            <td>$row[id_autor_tytul]</td>
            <td>$row[autor]</td>
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