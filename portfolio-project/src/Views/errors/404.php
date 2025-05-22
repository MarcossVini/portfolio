<?php
// Page title can be set here or passed
$title = $title ?? 'Error 404';
?>

<div class="error-container">
    <div class="error-code">404</div>
    <div class="error-message">
        <?php echo isset($message) ? htmlspecialchars($message) : 'Page not found'; ?>
    </div>
    <div class="error-actions">
        <a href="/" class="btn btn-primary">Back to Home</a>
        <a href="/projects" class="btn btn-secondary">View Projects</a>
    </div>
</div>

<style>
    .error-container {
        text-align: center;
        padding: 50px 0;
    }
    .error-code {
        font-size: 120px;
        font-weight: bold;
        color: #e74c3c;
        margin-bottom: 20px;
    }
    .error-message {
        font-size: 24px;
        margin-bottom: 30px;
    }
    .error-actions {
        margin-top: 30px;
    }
    .btn {
        display: inline-block;
        padding: 10px 20px;
        margin: 0 10px;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s;
    }
    .btn-primary {
        background-color: #3498db;
        color: white;
    }
    .btn-secondary {
        background-color: #7f8c8d;
        color: white;
    }
</style>
