<?php

// Simple Autoloader
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/../src/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

use App\Core\Router;

$router = new Router();

// Define Routes
$router->get('/', function() {
    // Temporary Home Page
    ob_start();
    ?>
    <div class="hero">
        <h1>Welcome to <span class="gradient-text">AI Utilities Pro</span></h1>
        <p>Supercharge your workflow with our premium AI and utility tools.</p>
        <div class="cta-group">
            <a href="/tools/password-generator" class="btn btn-primary">Try Password Generator</a>
            <a href="/tools/summarizer" class="btn btn-secondary">Try AI Summarizer</a>
        </div>
    </div>
    <?php
    $content = ob_get_clean();
    $title = "Home - AI Utilities Pro";
    require __DIR__ . '/../templates/layout.php';
});

// We will add more routes as we build controllers
$router->get('/tools/password-generator', 'PasswordController@index');
$router->post('/tools/password-generator', 'PasswordController@index');

$router->get('/tools/summarizer', 'SummarizerController@index');
$router->post('/tools/summarizer', 'SummarizerController@index');

$router->get('/tools/seo-tags', 'SeoController@index');
$router->post('/tools/seo-tags', 'SeoController@index');

$router->resolve();
