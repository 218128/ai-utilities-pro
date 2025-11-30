<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'AI Utilities Pro' ?></title>
    <meta name="description" content="<?= $description ?? 'Premium AI and Utility Tools' ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/style.css">
    <!-- Plausible Analytics -->
    <script async defer data-domain="example.com" src="https://plausible.io/js/plausible.js"></script>
    <!-- Google AdSense -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1658375151633555"
     crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar">
        <button id="theme-toggle" style="margin-right:1rem;">🌓</button>
        <a href="/" class="logo">AI Utilities Pro</a>
        <div class="nav-links">
            <a href="/">Home</a>
            <a href="/tools/chatgpt-summarizer">ChatGPT</a>
            <a href="/tools/google-gemini-summarizer">Gemini</a>
            <a href="/tools/dalle-3-image-generator">DALL-E 3</a>
            <a href="/tools/pollinations-ai-image-generator">Pollinations</a>
            <a href="/tools/password-generator">Pass Gen</a>
            <a href="/tools/seo-tags">SEO</a>
            <a href="/tools/mortgage-calculator">Mortgage</a>
            <a href="/tools/bmi-calculator">BMI</a>
            <a href="/tools/qr-code-generator">QR</a>
            <a href="/tools/youtube-thumbnail">YT</a>
            <a href="/tools/json-formatter">JSON</a>
        </div>
    </nav>

    <!-- Top Ad Banner -->
    <div class="container" style="max-width: 1200px; margin: 2rem auto 0; padding: 0 2rem;">
        <div class="ad-slot ad-banner">
            <span>Ad Space (Top Banner 728x90)</span>
        </div>
    </div>

    <div class="main-container">
        <main class="content-area">
            <?= $content ?? '' ?>
        </main>

        <aside class="sidebar">
            <div class="ad-slot ad-sidebar">
                <span>Ad Space (Sidebar 300x600)</span>
            </div>

            <div class="card" style="margin-bottom: 2rem;">
                <h3>Share this Tool</h3>
                <div class="share-buttons" style="display: flex; gap: 0.5rem; flex-wrap: wrap; margin-top: 1rem;">
                    <a href="https://twitter.com/intent/tweet?url=<?= urlencode("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]") ?>&text=<?= urlencode($title ?? 'Check out this AI tool!') ?>" target="_blank" class="btn btn-sm" style="background: #1DA1F2; color: white; flex: 1; text-align: center;">Twitter</a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]") ?>" target="_blank" class="btn btn-sm" style="background: #4267B2; color: white; flex: 1; text-align: center;">Facebook</a>
                    <a href="https://api.whatsapp.com/send?text=<?= urlencode(($title ?? 'Check out this AI tool!') . " https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]") ?>" target="_blank" class="btn btn-sm" style="background: #25D366; color: white; flex: 1; text-align: center;">WhatsApp</a>
                </div>
            </div>

            <div class="card">
                <h3>Popular Tools</h3>
                <ul style="list-style: none; margin-top: 1rem;">
                    <li style="margin-bottom: 0.5rem;"><a href="/tools/password-generator">🔐 Password Generator</a></li>
                    <li style="margin-bottom: 0.5rem;"><a href="/tools/chatgpt-summarizer">✨ ChatGPT Summarizer</a></li>
                    <li style="margin-bottom: 0.5rem;"><a href="/tools/google-gemini-summarizer">⚡ Gemini Summarizer (Free)</a></li>
                    <li><a href="/tools/seo-tags">🏷️ SEO Tag Generator</a></li>
                    <li><a href="/tools/dalle-3-image-generator">🖼️ DALL-E 3 Generator</a></li>
                    <li><a href="/tools/pollinations-ai-image-generator">🎨 Pollinations AI (Free)</a></li>
                    <li><a href="/tools/mortgage-calculator">🏠 Mortgage Calculator</a></li>
                    <li><a href="/tools/bmi-calculator">⚖️ BMI Calculator</a></li>
                    <li><a href="/tools/qr-code-generator">📱 QR Code Generator</a></li>
                    <li><a href="/tools/youtube-thumbnail">📺 YT Thumbnail Downloader</a></li>
                    <li><a href="/tools/privacy-policy-generator">⚖️ Privacy Policy Generator</a></li>
                    <li><a href="/tools/json-formatter">🔧 JSON Formatter</a></li>
                    <li><a href="/tools/markdown-editor">📝 Markdown Editor</a></li>
                    <li><a href="/tools/unit-converter">⚖️ Unit Converter</a></li>
                    <li><a href="/tools/lorem-ipsum-generator">📝 Lorem Ipsum Generator</a></li>
                    <li><a href="/privacy-policy">🔒 Privacy Policy</a></li>
                </ul>
            </div>
        </aside>
    </div>

    <footer>
        <p>&copy; <?= date('Y') ?> AI Utilities Pro. All rights reserved.</p>
    </footer>
    <script>
        document.getElementById('theme-toggle').addEventListener('click', function() {
            document.documentElement.classList.toggle('dark-mode');
        });
    </script>
</body>
</html>
