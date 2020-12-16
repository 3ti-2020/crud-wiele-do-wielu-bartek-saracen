<?php
                require_once('../connect.php');
                $post=$conn->query("SELECT `id` as idpost,`name`,`post` FROM post");
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
HTML;
                        $postid=$row['idpost'];
                        $tag=$conn->query("SELECT `tag` FROM `tag`,`post_tag`,`post` where post_tag.tag_id=tag.id AND post_tag.post_id=post.id AND post.id=$postid");
                        while($row1=$tag->fetch_assoc()){
                            echo <<<HTML
                        <a href='#' class="tag">$row1[tag]</a>
HTML;
                    }
                    echo <<<HTML
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