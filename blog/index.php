<?php
                require_once('../connect.php');
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
    <header>
        <h1>BLOG</h1>
    </header>
        <nav>
            <a href="../index.php">powrót</a>
        </nav>
        <main>
        <?php
                if(isset($_GET['action'])){
                    $gettag = $_GET['action'];
                    $post = $conn->query("SELECT `post`.`id`, `name`, `post` FROM `post_tag`, `post`, `tag` WHERE `post_tag`.`post_id` = `post`.`id` AND `post_tag`.`tag_id` = `tag`.`id` AND `tag` = '$gettag'"); 
                }else{
                    $post = $conn->query("SELECT `id`,`name`, `post` FROM `post`");
                }
                while($row=$post->fetch_assoc()){
                    echo <<<HTML
                        <div class="POST">
                            <div>
                                <h1 class="h1__post">$row[name]</h1>
                                <div class="tags">
HTML;
                                    $posts = $row["id"];
                                    $tag = $conn->query("SELECT `tag` FROM `post_tag`, `post`, `tag` WHERE `post_tag`.`post_id` = `post`.`id` AND `post_tag`.`tag_id` = `tag`.`id` AND `post_tag`.`post_id` = $posts");
                                    while($row1=$tag->fetch_assoc()){
                                        echo <<<HTML
                                        <a class='tag' href='?action=$row1[tag]'>$row1[tag],</a>
HTML;
                                    }
                    echo <<<HTML
                                </div>
                            </div>
                            <div class="posts">
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