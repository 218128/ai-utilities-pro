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
$router->get('/tools/chatgpt-summarizer', 'SummarizerController@chatgpt');
$router->post('/tools/chatgpt-summarizer', 'SummarizerController@chatgpt');
$router->get('/tools/google-gemini-summarizer', 'SummarizerController@gemini');
$router->post('/tools/google-gemini-summarizer', 'SummarizerController@gemini');

$router->get('/tools/seo-tags', 'SeoController@index');
$router->post('/tools/seo-tags', 'SeoController@index');

$router->get('/tools/image-generator', 'ImageGeneratorController@index');
$router->post('/tools/image-generator', 'ImageGeneratorController@index');
$router->get('/tools/dalle-3-image-generator', 'ImageGeneratorController@dalle');
$router->post('/tools/dalle-3-image-generator', 'ImageGeneratorController@dalle');
$router->get('/tools/pollinations-ai-image-generator', 'ImageGeneratorController@pollinations');
$router->post('/tools/pollinations-ai-image-generator', 'ImageGeneratorController@pollinations');

$router->get('/tools/mortgage-calculator', 'MortgageController@index');
$router->post('/tools/mortgage-calculator', 'MortgageController@index');

$router->get('/tools/bmi-calculator', 'BmiController@index');
$router->post('/tools/bmi-calculator', 'BmiController@index');

$router->get('/tools/qr-code-generator', 'QrCodeController@index');
$router->post('/tools/qr-code-generator', 'QrCodeController@index');

$router->get('/tools/youtube-thumbnail', 'YoutubeThumbnailController@index');
$router->post('/tools/youtube-thumbnail', 'YoutubeThumbnailController@index');

$router->get('/tools/privacy-policy-generator', 'PrivacyPolicyController@index');
$router->post('/tools/privacy-policy-generator', 'PrivacyPolicyController@index');

$router->get('/tools/json-formatter', 'JsonFormatterController@index');
$router->post('/tools/json-formatter', 'JsonFormatterController@index');

$router->get('/tools/lorem-ipsum-generator', 'LoremIpsumController@index');
$router->post('/tools/lorem-ipsum-generator', 'LoremIpsumController@index');

$router->get('/privacy-policy', 'SitePrivacyPolicyController@index');

$router->resolve();
