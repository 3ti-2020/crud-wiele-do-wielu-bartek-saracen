<?php
                require_once('connect.php');
                $post = $conn->query("SELECT `name`,`post` FROM `post`");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="blogstyle.css">
</head>
<body>
    <div class="container">
        <nav>
            <a href="../index.php">powrót</a>
        </nav>
        <main>
        <?php
                while($row=$post->fetch_assoc()){
                   echo <<<HTML
                    <div class="POST">
                    <div>
                        <h1 class="h1__post">$row[name]</h1>
                    </div>
                    <div>
                        <p class="p__post">$row[post]</p>
                    </div>
                    </div>
HTML;
                }

            ?>
        </main>
    </div>
</body>
</html>