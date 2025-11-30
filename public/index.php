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

// Homepage - Dashboard Grid
$router->get('/', function() {
    ob_start();
    ?>
    <div class="hero-section" style="text-align: center; padding: 4rem 0; background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); color: white; border-radius: var(--radius); margin-bottom: 3rem;">
        <h1 style="font-size: 2.5rem; margin-bottom: 1rem;">Supercharge Your Workflow</h1>
        <p style="font-size: 1.2rem; opacity: 0.9; max-width: 600px; margin: 0 auto;">Access a suite of premium AI and utility tools designed to boost your productivity.</p>
    </div>

    <div class="dashboard-grid">
        
        <!-- AI Tools Section -->
        <div class="category-section" style="margin-bottom: 3rem;">
            <h2 style="border-bottom: 2px solid var(--primary-color); padding-bottom: 0.5rem; margin-bottom: 1.5rem; display: inline-block;">🤖 AI Power Tools</h2>
            <div class="tools-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 1.5rem;">
                
                <a href="/tools/chatgpt-summarizer" class="tool-card">
                    <div class="icon">✨</div>
                    <h3>ChatGPT Summarizer</h3>
                    <p>Summarize long text instantly using OpenAI's GPT models.</p>
                </a>

                <a href="/tools/google-gemini-summarizer" class="tool-card">
                    <div class="icon">⚡</div>
                    <h3>Gemini Summarizer</h3>
                    <p>Free, fast summarization powered by Google's Gemini AI.</p>
                </a>

                <a href="/tools/dalle-3-image-generator" class="tool-card">
                    <div class="icon">🖼️</div>
                    <h3>DALL-E 3 Generator</h3>
                    <p>Create stunning high-quality images from text prompts.</p>
                </a>

                <a href="/tools/pollinations-ai-image-generator" class="tool-card">
                    <div class="icon">🎨</div>
                    <h3>Pollinations AI</h3>
                    <p>Generate unlimited free AI images instantly.</p>
                </a>

                <a href="/tools/seo-tags" class="tool-card">
                    <div class="icon">🏷️</div>
                    <h3>SEO Tag Generator</h3>
                    <p>Generate optimized meta tags for better search rankings.</p>
                </a>
            </div>
        </div>

        <!-- Developer Tools Section -->
        <div class="category-section" style="margin-bottom: 3rem;">
            <h2 style="border-bottom: 2px solid var(--secondary-color); padding-bottom: 0.5rem; margin-bottom: 1.5rem; display: inline-block;">🛠️ Developer Tools</h2>
            <div class="tools-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 1.5rem;">
                
                <a href="/tools/json-formatter" class="tool-card">
                    <div class="icon">🔧</div>
                    <h3>JSON Formatter</h3>
                    <p>Validate, prettify, and minify JSON data.</p>
                </a>

                <a href="/tools/markdown-editor" class="tool-card">
                    <div class="icon">📝</div>
                    <h3>Markdown Editor</h3>
                    <p>Write and preview Markdown in real-time.</p>
                </a>

                <a href="/tools/password-generator" class="tool-card">
                    <div class="icon">🔐</div>
                    <h3>Password Generator</h3>
                    <p>Create strong, secure passwords instantly.</p>
                </a>

                <a href="/tools/qr-code-generator" class="tool-card">
                    <div class="icon">📱</div>
                    <h3>QR Code Generator</h3>
                    <p>Generate downloadable QR codes for any URL.</p>
                </a>
            </div>
        </div>

        <!-- Utility Tools Section -->
        <div class="category-section">
            <h2 style="border-bottom: 2px solid #2ecc71; padding-bottom: 0.5rem; margin-bottom: 1.5rem; display: inline-block;">🧮 Calculators & Utilities</h2>
            <div class="tools-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 1.5rem;">
                
                <a href="/tools/mortgage-calculator" class="tool-card">
                    <div class="icon">🏠</div>
                    <h3>Mortgage Calculator</h3>
                    <p>Estimate monthly payments and interest costs.</p>
                </a>

                <a href="/tools/bmi-calculator" class="tool-card">
                    <div class="icon">⚖️</div>
                    <h3>BMI Calculator</h3>
                    <p>Calculate Body Mass Index for health tracking.</p>
                </a>

                <a href="/tools/unit-converter" class="tool-card">
                    <div class="icon">📏</div>
                    <h3>Unit Converter</h3>
                    <p>Convert Length, Weight, and Temperature units.</p>
                </a>

                <a href="/tools/youtube-thumbnail" class="tool-card">
                    <div class="icon">📺</div>
                    <h3>YT Thumbnail Downloader</h3>
                    <p>Download high-res thumbnails from YouTube videos.</p>
                </a>
            </div>
        </div>

    </div>

    <style>
        .tool-card {
            background: var(--bg-card);
            padding: 1.5rem;
            border-radius: var(--radius);
            border: 1px solid var(--border-color);
            text-decoration: none;
            color: var(--text-primary);
            transition: transform 0.2s, box-shadow 0.2s;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        .tool-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            border-color: var(--primary-color);
        }
        .tool-card .icon {
            font-size: 2rem;
            margin-bottom: 1rem;
        }
        .tool-card h3 {
            margin: 0 0 0.5rem 0;
            font-size: 1.2rem;
        }
        .tool-card p {
            margin: 0;
            font-size: 0.9rem;
            opacity: 0.8;
            line-height: 1.4;
        }
    </style>
    <?php
    $content = ob_get_clean();
    $title = "Home - AI Utilities Pro";
    require __DIR__ . '/../templates/layout.php';
});

// Define Routes
$router->get('/tools/password-generator', 'PasswordController@index');
$router->post('/tools/password-generator', 'PasswordController@index');

$router->get('/tools/summarizer', 'SummarizerController@index');
$router->post('/tools/summarizer', 'SummarizerController@index');
$router->get('/tools/chatgpt-summarizer', 'SummarizerController@chatgpt');
$router->post('/tools/chatgpt-summarizer', 'SummarizerController@chatgpt');

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

$router->get('/tools/markdown-editor', 'MarkdownEditorController@index');
$router->post('/tools/markdown-editor', 'MarkdownEditorController@index');

$router->get('/tools/unit-converter', 'UnitConverterController@index');
$router->post('/tools/unit-converter', 'UnitConverterController@index');

$router->get('/privacy-policy', 'SitePrivacyPolicyController@index');

$router->resolve();
