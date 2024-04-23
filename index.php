<?php

// Liste des films
$films = [
    'Avatar',
    'Titanic',
    'Star Wars',
    'Jurassic Park',
    'The Lion King',
    'The Dark Knight',
    'The Avengers',
    'The Lord of the Rings',
    'Harry Potter',
    'The Matrix',
    'Inception',
    'The Godfather',
    'Pulp Fiction',
    'American Gangster',
    'Taxi Driver',
];

// Utilisateurs
$utilisateurs = [
    'Alice',
    'Bob',
    'Charlie',
    'David',
    'Eve',
    'Frank',
    'Grace',
    'Heidi',
    'Ivan',
    'Judy',
    'Mallory',
    'Oscar',
    'Peggy',
    'Trent',
    'Walter',
];

// Notes
$notesUtilisateurs = [];

foreach ($utilisateurs as $user) {
    $notesUtilisateurs[$user] = [];
    foreach ($films as $film) {
        $notesUtilisateurs[$user][$film] = rand(0, 5);
    }
} // Cette boucle permet de générer des notes aléatoires de chaque utilisateur pour chaque film

// Recommandations
$recommandations = [];


/**
 * Réalise ton implémentation ici, tu peux utiliser les variables $films, $utilisateurs $notesUtilisateurs et $recommandations :
 * - $films est un tableau contenant la liste des films
 * - $utilisateurs est un tableau contenant la liste des utilisateurs
 * - $notesUtilisateurs est un tableau associatif contenant les notes de chaque utilisateur pour chaque film
 * - $recommandations est le tableau dans lequel tu dois stocker les recommandations
 * 
 * Tout le code de la partie front-end est déjà écrit, tu n'as pas besoin de t'en occuper.
 */



































?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Algorithme de recommandation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" />
    <link rel="shortcut icon" href="https://api.iconify.design/logos:netflix-icon.svg" type="image/x-icon">
</head>

<body>
    <main class="container">
        <div class="grid">
            <div></div>
            <div style="text-align: center">
                <img src="https://api.iconify.design/logos:netflix.svg" width="100">
            </div>
            <div></div>
        </div>

        <hr>
        <div  style="text-align: center">
            <h1>Algorithme de reco à la Netflix</h1>
            <p>
                Bienvenue, attribuez une note au film que vous venez de regarder. Nous vous recommanderons des films qui pourraient vous plaire.
            </p>
        </div>

        <hr>
        <div class="grid">
            <div></div>
            <div>
                <form action="/" method="post">
                    <select name="film" required>
                        <option selected disabled value="">
                            Quel film avez-vous regardé ?
                        </option>
                        <?php foreach ($films as $film) : ?>
                            <option value="<?= $film ?>"><?= $film ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="note">Notez le film</label>
                    <input type="number" name="note" id="note" min="0" max="5" placeholder="5" required>
                    <button type="submit">Noter</button>
                </form>
            </div>
            <div></div>
        </div>

        <hr>
        <h2>Recommandations</h2>
        <p>Voici les films que nous vous recommandons :</p>
        <ul>
            <?php
            if (!empty($recommandations)) {
                foreach ($recommandations as $film) {
                    echo "<li>" . $film . "</li>";
                }
            } else {
                echo "<li>Aucune recommandation pour le moment.</li>";
            }
            ?>
        </ul>

        <hr>
        <h5>Les films les plus appréciés</h5>
        <p>Voici les films les plus appréciés par nos utilisateurs :</p>
        <table>
            <thead>
                <tr>
                    <th>Film</th>
                    <th>Note moyenne</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($films as $film) {
                    $total = 0;
                    $count = 0;
                    foreach ($notesUtilisateurs as $user => $notes) {
                        if (array_key_exists($film, $notes)) {
                            $total += $notes[$film];
                            $count++;
                        }
                    }
                    $average = round($total / $count, 1);
                    echo '<tr><td><em>' . $film . '</em></td><td><svg xmlns="http://www.w3.org/2000/svg" width="18" height="32" viewBox="0 0 24 24"><path fill="#101010" d="M7.625 6.4L12 .725L16.375 6.4l6.85 2.3l-4.325 6.125l.175 6.825L12 19.675L4.925 21.65L5.1 14.8L.8 8.7z"/></svg> ' . $average . '</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>