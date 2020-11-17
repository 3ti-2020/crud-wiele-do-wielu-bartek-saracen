<?php
    session_start();
    require_once('connect.php');
    $conn->set_charset('utf8');
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
            <div class="a1">
                <div class="circle"></div>
            </div>
            <div class="a2">
                <div class="e1">
                    <form action="login.php" method="POST">
                    <div class="i ii"><input type="text" name="log" class="in" placeholder="login = admin"></div>
                    <div class="i ii"><input type="text" name="pass" class="in" placeholder="password = a"></div>
                    <div class="i"><input class="button" class="button" type="submit" value="Zaloguj"></div>
                    </form>
                </div>
            </div>
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
            <?php
            if ( isset($_SESSION['zalogowany']) && $_SESSION['zalogowany']==1){
             echo("<li><a href='logout.php'>Logout</a></li>");
            }
            else{
                echo("<li><div class='login' id='signin'>Login</div></li>");
            }
            ?>
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
       if ( isset($_SESSION['admin']) && $_SESSION['admin']==1){
        echo "<div class='ins1'>
            <form action='insert.php' method='POST'>
            <div><input type='text' name='imie' placeholder='imie autora'></div>
            <div><input type='text' name='nazwisko' placeholder='nazwisko autora'></div>
            <div><input type='text' name='tytul' placeholder='tytul'></div>
            <div><input style='cursor: pointer;' type='submit' value='Send'></div>
            </form>
        </div>";
       }
        if( (isset($_SESSION['admin']) && $_SESSION['admin']==1) || (isset($_SESSION['editor']) && $_SESSION['editor']==1) ){
        echo("<div class='ins2'><form action='wypozyczenia.php' method='POST'>");
        echo("<div><select name='id_autor_tytul'>");
            $result=$conn->query("SELECT id_autor_tytul,imie_autor,nazwisko_autor,tytul FROM lib_autor_tytul lat,lib_autor la,lib_tytul lt WHERE la.id_autor=lat.id_autor and lt.id_tytul=lat.id_tytul");
            while($row=$result->fetch_assoc()){
                echo("<option value='".$row['id_autor_tytul']."'>".$row['id_autor_tytul'].": ".$row['imie_autor']." ".$row['nazwisko_autor']." : ".$row['tytul']."</option>");
            }
        echo("</select></div>");
        echo "
        <div><input type='text' name='imie' placeholder='imie wypożyczającego'></div>
        <div><input type='text' name='nazwisko' placeholder='nazwisko wypożyczającego'></div>
        ";
        echo("<div><input type='submit' value='wypożycz'></div>");
        echo("</form></div>");
        }
       ?>
       
    </div>
    <main>
    <?php
    echo('<div class="tab1">');
    $result1=$conn->query("SELECT lat.id_autor_tytul,la.id_autor as id_autor,lt.id_tytul as id_tytul,la.imie_autor,la.nazwisko_autor,lt.tytul FROM lib_autor_tytul lat ,lib_autor la ,lib_tytul lt WHERE lt.id_tytul=lat.id_tytul and la.id_autor=lat.id_autor");
    echo("<table class='tab'><tr>
        <th>id</th>
        <th>imie</th>
        <th>nazwisko</th>
        <th>tytul</th>");
    if(!isset($_SESSION['zalogowany']) || (isset($_SESSION['zalogowany']) && $_SESSION['zalogowany']==1) || (isset($_SESSION['editor']) && $_SESSION['editor']==1)){
    echo "</tr>";
    while($row=$result1->fetch_assoc()){
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
    echo("</table></div>");
    }
    if ( isset($_SESSION['admin']) && $_SESSION['admin']==1){
        echo("<th></th></tr>");
    while($row=$result1->fetch_assoc()){
        $str = <<<HTML
        <tr>
            <td>$row[id_autor_tytul]</td>
            <td>$row[imie_autor]</td>
            <td>$row[nazwisko_autor]</td>
            <td>$row[tytul]</td>
            <td>
            <form action="delete.php" method="POST">
            <input type="hidden" name="ia" value="$row[id_autor]">
            <input type="hidden" name="it" value="$row[id_tytul]">
            <input type="hidden" name="idat" value="$row[id_autor_tytul]">
            <input class="deletebtn" type="submit" value="delete">
            </form>
            </td>
        </tr>
HTML;
        echo $str;
    }
    echo("</table></div>");
    }
    ?>
        <?php
        if( (isset($_SESSION['admin']) && $_SESSION['admin']==1) || (isset($_SESSION['editor']) && $_SESSION['editor']==1)){
        echo("<div class='tab2'>");
        $result2=$conn->query("SELECT w.id_wyp,CONCAT(la.imie_autor,' ',la.nazwisko_autor) as autor,lt.tytul,CONCAT(Imie_wyp,' ',Nazwisko_wyp) as wypozyczajacy,data_wypozyczenia,data_oddania FROM lib_autor la, lib_tytul lt,lib_autor_tytul lat,wypozyczenia w WHERE la.id_autor=lat.id_autor and lt.id_tytul=lat.id_tytul and lat.id_autor_tytul=w.id_a_t");
        echo("<table class='tab'><tr>
        <th>id</th>
        <th>autor</th>
        <th>tytuł</th>
        <th>wypożyczający</th>
        <th>data wypożyczenia</th>
        <th>termin</th>
        <th></th></tr>");
    while($row=$result2->fetch_assoc()){
        $str = <<<HTML
        <tr>
            <td>$row[id_wyp]</td>
            <td>$row[autor]</td>
            <td>$row[tytul]</td>
            <td>$row[wypozyczajacy]</td>
            <td>$row[data_wypozyczenia]</td>
            <td>$row[data_oddania]</td>
            <td>
            <form action="wypdelete.php" method="POST">
            <input type="hidden" name="id_wyp" value="$row[id_wyp]">
            <input class="oddaj" type="submit" value="oddaj">
            </form>
            </td>
        </tr>
HTML;
        echo $str;
    }
    echo("</table></div>");
}
mysqli_close($conn);
        ?>
    </main>
    <footer></footer>
    </div>
    <script src="script.js"></script>
</body>
</html>