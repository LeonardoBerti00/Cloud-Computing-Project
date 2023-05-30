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
            background-color: #f0f2f5;
            width: 20%;
            padding: 20px;
            border-right: 1px solid #ccc;
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

        form {
            margin-top: 20px;
        }

        form label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }

        form input[type="text"],
        form textarea {
            width: 100%;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-top: 5px;
        }

        form input[type="submit"] {
            background-color: #0079d3;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
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
        // JavaScript code for upvote and downvote functionality
        $(document).ready(function() {
            $('.upvote').click(function() {
                var postID = $(this).data('post-id');
                var scoreElement = $(this).siblings('.count');

                // Simulate the upvoting 
                var currentScore = parseInt(scoreElement.text());
                var newScore = currentScore + 1;
                scoreElement.text(newScore);

                // Send the upvoted post ID to the server 
                // $.post('upvote.php', { postID: postID }, function(data) {
                //     // Handle the server response if needed
                // });
            });

            $('.downvote').click(function() {
                var postID = $(this).data('post-id');
                var scoreElement = $(this).siblings('.count');

                // Simulate the downvoting 
                var currentScore = parseInt(scoreElement.text());
                var newScore = currentScore - 1;
                scoreElement.text(newScore);

                // Send the downvoted post ID to the server 
                // $.post('downvote.php', { postID: postID }, function(data) {
                //     // Handle the server response if needed
                // });
            });
        });
    </script>
</head>
<body>
    <header>
        <h1>Home Page</h1>
    </header>

    <div class="container">
        <div class="sidebar">
            <h2>Menu</h2>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Popular</a></li>
                <li><a href="#">Trending</a></li>
                <li><a href="#">Subsections</a></li>
            </ul>
        </div>

        <div class="content">
            <?php
                // Function to handle form submission and add a new post
                function handleFormSubmission() {
                    // Check 
                    if ($_SERVER["REQUEST_METHOD"] === "POST") {
                        // Retrieve the form data
                        $title = $_POST["title"];
                        $author = $_POST["author"];
                        $content = $_POST["content"];
                        $score = 0; // Set the initial score to 0

                        // Validate the data 
                        if (!empty($title) && !empty($author) && !empty($content)) {
                            // Create a new post array
                            $newPost = [
                                'title' => $title,
                                'author' => $author,
                                'content' => $content,
                                'score' => $score
                            ];

                            // Add the new post to the existing posts array
                            $posts[] = $newPost;

                            // Display a success message
                            echo '<p class="success">Post uploaded successfully!</p>';
                        } else {
                            // Display an error message 
                            echo '<p class="error">Please fill in all the fields.</p>';
                        }
                    }
                }

                // it works only with existing posts
                $posts = [
                    [
                        'id' => 1,
                        'title' => 'Post 1',
                        'author' => 'giuseppe',
                        'content' => 'cloud computing fa schifo',
                        'score' => 10
                    ],
                    [
                        'id' => 2,
                        'title' => 'Post 2',
                        'author' => 'costantino',
                        'content' => 'casalicchio miglior professore di sempre',
                        'score' => 5
                    ],
                    //TODO: funct to add posts
                ];

                handleFormSubmission();

                // Loop to display posts
                foreach ($posts as $post) {
                    echo '<div class="post">';
                    echo '<h2>' . $post['title'] . '</h2>';
                    echo '<p>Posted by ' . $post['author'] . '</p>';
                    echo '<p>' . $post['content'] . '</p>';
                    echo '<div class="vote">';
                    echo '<span class="count">' . $post['score'] . '</span>';
                    echo '<span class="upvote" data-post-id="' . $post['id'] . '">&#9650;</span>';
                    echo '<span class="downvote" data-post-id="' . $post['id'] . '">&#9660;</span>';
                    echo '</div>';
                    echo '</div>';
                }
            ?>

            <!-- HTML form for uploading a new post -->
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <h2>Upload Post</h2>
                <label for="title">Title:</label>
                <input type="text" name="title" required>
                <br>
                <label for="author">Author:</label>
                <input type="text" name="author" required>
                <br>
                <label for="content">Content:</label>
                <textarea name="content" required></textarea>
                <br>
                <input type="submit" value="Upload">
            </form>
        </div>
    </div>

    <footer>
        <p></p>
    </footer>
</body>
</html>
