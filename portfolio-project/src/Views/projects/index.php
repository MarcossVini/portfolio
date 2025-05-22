<?php
// This file is responsible for listing projects in the portfolio.

require_once '../../Models/Project.php';

// Fetch projects from the database
$projects = Project::all();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>
    <header>
        <h1>My Projects</h1>
    </header>
    <main>
        <ul>
            <?php foreach ($projects as $project): ?>
                <li>
                    <a href="/projects/show.php?id=<?= $project->id ?>">
                        <?= htmlspecialchars($project->title) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </main>
    <footer>
        <p>&copy; <?= date('Y') ?> My Portfolio</p>
    </footer>
    <script src="/assets/js/main.js"></script>
</body>
</html>