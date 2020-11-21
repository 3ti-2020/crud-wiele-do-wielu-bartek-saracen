<?php
    session_start();
    require_once("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="modallogbackground">
        <div class="modallog">
            <form class="logform" action="logowanie.php" method="post">
            <div class="a1 a"><div class="close">&times;</div></div>
            <div class="a2 a">
                <div><input type="text" name="login" placeholder="login"></div>
                <div><input type="password" name="password" placeholder="haslo"></div>
                <?php
        if(isset($_SESSION['bladlogowania'])) echo "<div>".$_SESSION['bladlogowania']."</div>";
            ?>
            </div>
            <div class="a3 a">
                <div><input type="submit" value="zaloguj" style="cursor:pointer;"></div>
            </div>
            </form>
        </div>
    </div>
    <div class="container">
        <header>
            <a href="https://github.com/3ti-2020/crud-wiele-do-wielu-bartek-saracen" target="_blank"><img class="github" src="https://www.flaticon.com/svg/static/icons/svg/2111/2111425.svg" alt="github"></a>
            <h1>Biblioteka</h1>
        </header>
        <nav>
            <ul>
                <li><a href="https://github.com/3ti-2020/crud-wiele-do-wielu-bartek-saracen" target="_blank">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Github</a></li>
                <li><a href="cards/index.html">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Cards</a></li>
                    <?php
                    if(!isset($_SESSION['zalogowany'])){
                    echo('<li><a class="log-in" style="cursor:pointer;">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Log In</a></li>');
                    }
                    else {
                        echo('<li><a class="log-in" href="wylogowanie.php">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        LogOut</a></li>');
                    }
                    ?>
            </ul>
        </nav>
            <?php
        echo'<div class="left">';
                if(isset($_SESSION['admin'])&&($_SESSION['admin']==1)){
                    echo('<div>
                        <form action="dodajuzytkownika.php" method="post">
                            <div><input type="text" name="nazwauzy" placeholder="nazwa konta"></div>');
                            if(isset($_SESSION['bladuzytkownik'])) echo "<div>".$_SESSION['bladuzytkownik']."</div>";
                           echo('<div><input type="text" name="imieuzy" placeholder="imie użytkownika"></div>
                            <div><input type="text" name="nazwiskouzy" placeholder="nazwisko użytkownika"></div>
                            <div><input type="password" name="haslouzy" placeholder="hasło"></div>
                            <div><input type="submit" value="dodaj"></div>
                        </form>
                    </div>
                    <div>
                    <form action="dadajksiazke.php" method="post">
                    <div><input type="text" name="imieautora" placeholder="imie autora"></div>
                    <div><input type="text" name="nazwiskoautora" placeholder="nazwisko autora"></div>
                    <div><input type="text" name="tytul" placeholder="tytuł"></div>');
                    if(isset($_SESSION['autortytul'])) echo "<div>".$_SESSION['autortytul']."</div>";
                    echo('<div><input type="submit" value="dodaj"></div>
                    </form></div>');
                    echo "<div>
                    <form action='wyporzycksiazke.php' method='POST'>";
                    $sql1="SELECT * FROM users WHERE id!=1 ";
                    $sql2="SELECT la.id as id_autor, lt.id as id_tytul,imie_autor,nazwisko_autor,tytul,lat.id as id_autor_tytul FROM lib_autor la,lib_tytul lt,lib_autor_tytul lat WHERE  la.id=lat.id_autor AND lt.id=lat.id_tytul";
                    $result1=$conn->query($sql1);
                    $result2=$conn->query($sql2);
                    echo"<div><select name='iduser'>";
                    while($row=$result1->fetch_assoc()){
                        echo "<option value='".$row['id']."'>".$row['imie']." ".$row['nazwisko']."</option>";
                    }
                    echo "</select></div>";
                    echo"<div><select name='idksiazka'>";
                    while($row=$result2->fetch_assoc()){
                        echo "<option value='".$row['id_autor_tytul']."'>".$row['imie_autor']." ".$row['nazwisko_autor'].": ".$row['tytul']."</option>";
                    }
                    echo "</select></div>
                    <div><input type='date' name='data_oddania'></div>
                    <div><input type='submit' value='wypożycz'></div>
                    </form>
                    </div>";
                }
                else if(isset($_SESSION['user'])&&$_SESSION['user']==1){
                    echo "<div>
                    <form action='wyporzycksiazkeuser.php' method='POST'>";
                    $sql2="SELECT la.id as id_autor, lt.id as id_tytul,imie_autor,nazwisko_autor,tytul,lat.id as id_autor_tytul FROM lib_autor la,lib_tytul lt,lib_autor_tytul lat WHERE  la.id=lat.id_autor AND lt.id=lat.id_tytul";
                    $result2=$conn->query($sql2);
                    echo"<div><select name='idksiazka'>";
                    while($row=$result2->fetch_assoc()){
                        echo "<option value='".$row['id_autor_tytul']."'>".$row['imie_autor']." ".$row['nazwisko_autor'].": ".$row['tytul']."</option>";
                    }
                    echo "</select></div>
                    <div><input type='date' name='data_oddania'></div>
                    <div><input type='submit' value='wypożycz'></div>
                    </form>
                    </div>";
                }
            if(!isset($_SESSION['zalogowany'])){
                echo "
                    <div>
                    <h3>Lista użytkowników</h3>";
                $result=$conn->query("SELECT nick,password FROM users");
                while($row=$result->fetch_assoc()){
                    echo <<<HTML
                    <ul><li>$row[nick] : $row[password]</li></ul>
HTML;
                }
                echo "</div>";
            }
        echo '</div>
        <main><div>';
        $sql="SELECT lat.id as id_lat,lt.id as id_tytul,imie_autor,nazwisko_autor,tytul FROM lib_autor la,lib_tytul lt,lib_autor_tytul lat WHERE la.id=lat.id_autor AND lt.id=lat.id_tytul ORDER BY id_lat";
        $result=$conn->query($sql);
        echo '<table class="tab1"><tr>
        <th>Id</th>
        <th>Imie autora</th>
        <th>Nazwisko Autora</th>
        <th>Tytuł</th>
        </tr>';
        while($row=$result->fetch_assoc()){
            echo '<tr><td class="id">'.$row['id_lat'].'</td><td>'.$row['imie_autor'].'</td><td>'.$row['nazwisko_autor'].'</td><td>'.$row['tytul'].'</td><td>';
            if(isset($_SESSION['admin'])&&($_SESSION['admin']==1)){
                echo'
                <form action="usuwanieksiazek.php" method="POST">
                    <input type="hidden" name="id_lat" value='.$row["id_lat"].'>
                    <input type="hidden" name="id_lt" value='.$row["id_tytul"].'>
                    <input type="submit" value="usuń">
                </form>';
            }
            echo'</td></tr>';
        }
        echo '</table>';
        echo '</div>';

        if(isset($_SESSION['admin'])&&($_SESSION['admin']==1)&&!isset($_SESSION['user'])){
        echo '<div>';
        $sql="SELECT w.id as id_wyp,CONCAT(u.imie,' ', u.nazwisko) as imie_nazwisko_user,CONCAT(la.imie_autor,' ', la.nazwisko_autor) as imie_nazwisko_autor,tytul,data_wypozyczenia,data_oddania FROM wypozyczenia w,users u,lib_autor la,lib_tytul lt,lib_autor_tytul lat WHERE w.id_user=u.id and lat.id=w.id_ksiazka and lat.id_autor=la.id and lat.id_tytul=lt.id ORDER BY id_wyp";
        $result=$conn->query($sql);
        echo '<table class="tab1"><tr>
        <th>Id</th>
        <th>Autor</th>
        <th>Tytuł</th>
        <th>Wypożyczający</th>
        <th>data wypozyczenia</th>
        <th>data oddania</th>
        </tr>';
        while($row=$result->fetch_assoc()){
            echo '<tr><td class="id">'.$row['id_wyp'].'</td><td>'.$row['imie_nazwisko_autor'].'</td><td>'.$row['tytul'].'</td><td>'.$row['imie_nazwisko_user'].'</td><td>'.$row['data_wypozyczenia'].'</td><td>'.$row['data_oddania'].'</td><td>';
                echo'<form action="oddawanieksiazek.php" method="POST">
                        <input type="hidden" name="id_wyp" value="'.$row['id_wyp'].'">
                        <input type="submit" value="oddaj" style="padding:0.2rem;">
                    </form>';
            }
            echo'</td></tr></table></div>';
        }
        else if(isset($_SESSION['user'])&&$_SESSION['user']==1&&!isset($_SESSION['admin'])){
            echo '<div>';
            $login=$_SESSION['login'];
            $password=$_SESSION['haslo'];
            $sql="SELECT w.id as id_wyp,CONCAT(la.imie_autor,' ', la.nazwisko_autor) as imie_nazwisko_autor,tytul,data_wypozyczenia,data_oddania FROM wypozyczenia w,users u,lib_autor la,lib_tytul lt,lib_autor_tytul lat WHERE w.id_user=u.id and lat.id=w.id_ksiazka and lat.id_autor=la.id and lat.id_tytul=lt.id and u.nick='$login' and u.password='$password' ORDER BY id_wyp";
            $result=$conn->query($sql);
            echo '<table class="tab1"><tr>
            <th>Id</th>
            <th>Autor</th>
            <th>Tytuł</th>
            <th>data wypozyczenia</th>
            <th>data oddania</th>
            </tr>';
            while($row=$result->fetch_assoc()){
                echo '<tr><td class="id">'.$row['id_wyp'].'</td><td>'.$row['imie_nazwisko_autor'].'</td><td>'.$row['tytul'].'</td><td>'.$row['data_wypozyczenia'].'</td><td>'.$row['data_oddania'].'</td><td>';
                    echo'<form action="oddawanieksiazek.php" method="POST">
                            <input type="hidden" name="id_wyp" value="'.$row['id_wyp'].'">
                            <input type="submit" value="oddaj" style="padding:0.2rem;">
                        </form>';
                }
                echo'</td></tr></table></div>';
        }
        echo '</main></div>';
        if(isset($_SESSION['bladuzytkownik'])) unset($_SESSION['bladuzytkownik']);
        if(isset($_SESSION['autortytul'])) unset($_SESSION['autortytul']);
        mysqli_close($conn);
        ?>
    <script src="script.js"></script>
</body>
</html>