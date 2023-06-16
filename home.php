<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f6f8;
        }

        header {
            background-color: #cee3f8;
            padding: 20px;
            text-align: center;
        }

        h1 {
            margin: 0;
            color: #1a1a1b;
        }

        .container {
            display: flex;
            max-width: 1200px;
            margin: 0 auto;
        }

        .sidebar {
            width: 20%;
            background-color: #f0f2f5;
            padding: 20px;
        }

        .sidebar h2 {
            margin-top: 0;
            color: #0079d3;
            font-size: 20px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 20px 0;
        }

        .sidebar li {
            margin-bottom: 10px;
        }

        .sidebar li a {
            color: #0079d3;
            text-decoration: none;
            font-weight: bold;
        }

        .sidebar li a:hover {
            text-decoration: underline;
        }

        .content {
            flex: 1;
            padding: 20px;
        }

        .post {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
        }

        h2 {
            margin: 0;
            color: #0079d3;
        }

        p {
            margin: 0;
            color: #555;
        }

        .score {
            font-weight: bold;
        }

        .success {
            color: green;
            margin-top: 10px;
        }

        .error {
            color: red;
            margin-top: 10px;
        }

        .vote {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .vote .count {
            margin-right: 10px;
        }

        .vote .upvote,
        .vote .downvote {
            font-size: 20px;
            color: #0079d3;
            cursor: pointer;
        }

        .vote .upvote:hover,
        .vote .downvote:hover {
            color: #0056a3;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 999;
        }

        .popup {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            max-width: 400px;
            width: 80%;
        }

        .popup h2 {
            margin-top: 0;
        }

        .popup input[type="text"],
        .popup textarea {
            width: 100%;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-top: 5px;
        }

        .popup input[type="submit"] {
            background-color: #0079d3;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        form {
            margin-top: 20px;
        }

        form label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }

        footer {
            background-color: #f5f6f8;
            padding: 10px;
            text-align: center;
            color: #555;
            margin-top: 20px;
        }
    </style>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.open-popup').click(function() {
                $('.overlay').fadeIn();
            });

            $('.close-popup').click(function() {
                $('.overlay').fadeOut();
            });
        });

        $(document).ready(function() {
            $('.upvote').click(function() {
                var postID = $(this).data('post-id');
                var scoreElement = $(this).siblings('.count');

                var currentScore = parseInt(scoreElement.text());
                var newScore = currentScore + 1;
                scoreElement.text(newScore);

            });

            $('.downvote').click(function() {
                var postID = $(this).data('post-id');
                var scoreElement = $(this).siblings('.count');

                var currentScore = parseInt(scoreElement.text());
                var newScore = currentScore - 1;
                scoreElement.text(newScore);
            });
        });
    </script>
</head>
<body>
    <header>
        <h1 class="display-4 fw-bolder">
            <!-- Titolo dell'header -->
        </h1>
    </header>

    <div class="container">
        <div class="sidebar">
            <h2>Menu</h2>
            <ul>
                <li><a href="#">Elemento 1</a></li>
                <li><a href="#">Elemento 2</a></li>
                <li><a href="#">Elemento 3</a></li>
                <li><a href="#">Elemento 4</a></li>
            </ul>
            <button class="open-popup">Nuovo Post</button>
        </div>

        <div class="content">
            <?php
                $postsJson = file_get_contents('post.json');
                $posts = json_decode($postsJson, true);

                foreach ($posts as $post) {
                    echo '<div class="post">';
                    echo '<h2>' . $post['title'] . '</h2>';
                    echo '<p>Autore: ' . $post['author'] . '</p>';
                    echo '<p>' . $post['content'] . '</p>';
                    echo '<div class="vote">';
                    echo '<span class="count">' . $post['score'] . '</span>';
                    echo '<span class="upvote" data-post-id="' . $post['id'] . '">&#9650;</span>';
                    echo '<span class="downvote" data-post-id="' . $post['id'] . '">&#9660;</span>';
                    echo '</div>';
                    echo '</div>';
                }


            ?>
            <!--<div class="post">
                <h2>Titolo del post</h2>
                <p>Contenuto del post...</p>
                <div class="vote">
                    <div class="count">5</div>
                    <div class="upvote" data-post-id="1">↑</div>
                    <div class="downvote" data-post-id="1">↓</div>
                </div>
            </div>

            <div class="post">
                <h2>Titolo del post</h2>
                <p>Contenuto del post...</p>
                <div class="vote">
                    <div class="count">3</div>
                    <div class="upvote" data-post-id="2">↑</div>
                    <div class="downvote" data-post-id="2">↓</div>
                </div>
            </div>-->
        </div>
    </div>

    <div class="overlay">
        <div class="overlay">
    <div class="popup">
        <h2>Nuovo Post</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="title">Titolo:</label>
            <input type="text" id="title" name="title">
            <label for="author">Autore:</label>
            <input type="text" id="author" name="author">
            <label for="content">Contenuto:</label>
            <textarea id="content" name="content"></textarea>
            <input type="submit" value="Pubblica">
        </form>
    </div>
</div>

    </div>

    <footer>
        <p>© </p>
    </footer>
</body>
</html>
