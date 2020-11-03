<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bartosz Saracen gr 2</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style1.css">
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
                <p>Tabela na stronie jest połączeniem 3 tabel lib_autor, lib_tytul oraz lib_autor_tytul</p>
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
    <div class="card">
        <a href="#" class="forimg"><img src="images/model.png" class="image" alt="model"></a>
        <div class="bg-for-text">
            <div class="item1 item">
                <div class="items1 items">
                    <div class="fol">
                        <span class="followers">1000</span>
                        <a class="follow">Follow</a>
                    </div>
                </div>
                <div class="items2 items"></div>
            </div>
            <div class="item2 item">
                <div class="n1 n">
                    <h3 class="h3n1">Patrick Wood</h3>
                </div>
                <div class="n2 n">
                    <h3 class="h3n2">CEO / Co-Founder</h3>
                </div>
            </div>
            <div class="item3 item">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A nam incidunt omnis maiores obcaecati aut deleniti sunt totam veritatis quibusdam eaque, reiciendis eveniet? A veniam neque placeat incidunt iusto doloribus.</p>
            </div>
            <div class="item4 item">
                <a class="icon1 icons" href="#"><img src="https://www.flaticon.com/svg/static/icons/svg/145/145808.svg" alt="Pinterest"></a>
                <a class="icon2 icons" href="#"><img src="https://www.flaticon.com/svg/static/icons/svg/145/145812.svg" alt="Twitter"></a>
                <a class="icon3 icons" href="#"><img src="https://www.flaticon.com/svg/static/icons/svg/145/145801.svg" alt="Dribbble"></a>
            </div>
        </div>
    </div>
    <?php
    require('connect.php');
    $conn->set_charset('utf8');
    $result=$conn->query("SELECT id_autor_tytul,autor,tytul FROM lib_autor_tytul,lib_autor,lib_tytul WHERE lib_tytul.id_tytul=lib_autor_tytul.id_tytul and lib_autor.id_autor=lib_autor_tytul.id_autor");
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
    <script src="script.js"></script>
</body>
</html>
