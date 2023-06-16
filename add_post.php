<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $newPost = [
        'id' => uniqid(), // Genera un ID univoco per il nuovo post
        'title' => $_POST['title'],
        'author' => $_POST['author'],
        'content' => $_POST['content'],
        'score' => 0
    ];

    $posts = []; // Array vuoto per contenere tutti i post

    if (file_exists('post.json')) {
        // Carica i post esistenti dal file JSON
        $postsData = file_get_contents('post.json');
        $posts = json_decode($postsData, true);
    }

    // Aggiungi il nuovo post all'array dei post
    $posts[] = $newPost;

    // Salva l'array aggiornato nel file JSON
    file_put_contents('post.json', json_encode($posts));

    // Reindirizza alla pagina home.php
    header('Location: home.php');
    exit;
}
?>
