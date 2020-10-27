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
        <details>
            <summary>Tabela info</summary>
            <p>Tabela na stronie jest widokiem połączenie 3 tabelek lib_autor, lib_tytul, lib_autor_tytul</p>
        </details>
    </div>
    <main>
    <?php
    $conn=new mysqli('127.0.0.1','root','','bartek');
    $conn->set_charset('utf8');
    $result=$conn->query("SELECT * FROM ksiazki");
    echo("<table class='tab'><tr>
        <th>autor</th>
        <th>tytul</th>
    </tr>");
    while($row=$result->fetch_assoc()){
        $str = <<<HTML
        <tr>
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