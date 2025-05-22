<?php
// This file is responsible for displaying a single project.
// It retrieves the project data and renders it in a structured format.

require_once '../../Models/Project.php';

// Assuming a project ID is passed via the URL
$projectId = $_GET['id'] ?? null;

if ($projectId) {
    $project = new Project();
    $projectData = $project->find($projectId);

    if ($projectData) {
        ?>
        <h1><?php echo htmlspecialchars($projectData['title']); ?></h1>
        <p><?php echo nl2br(htmlspecialchars($projectData['description'])); ?></p>
        <img src="<?php echo htmlspecialchars($projectData['image']); ?>" alt="<?php echo htmlspecialchars($projectData['title']); ?>">
        <a href="<?php echo htmlspecialchars($projectData['link']); ?>">View Project</a>
        <?php
    } else {
        echo "<p>Project not found.</p>";
    }
} else {
    echo "<p>No project ID provided.</p>";
}
?>