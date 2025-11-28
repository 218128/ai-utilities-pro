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
            <a href="/tools/password-generator">Password Gen</a>
            <a href="/tools/summarizer">AI Summarizer</a>
            <a href="/tools/seo-tags">SEO Tags</a>
            <a href="/tools/image-generator">Image Generator</a>
            <a href="/tools/mortgage-calculator">Mortgage Calc</a>
            <a href="/tools/bmi-calculator">BMI Calc</a>
            <a href="/tools/qr-code-generator">QR Gen</a>
            <a href="/tools/youtube-thumbnail">YT Thumb</a>
            <a href="/tools/privacy-policy-generator">Privacy Gen</a>
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

            <div class="card">
                <h3>Popular Tools</h3>
                <ul style="list-style: none; margin-top: 1rem;">
                    <li style="margin-bottom: 0.5rem;"><a href="/tools/password-generator">🔐 Password Generator</a></li>
                    <li style="margin-bottom: 0.5rem;"><a href="/tools/summarizer">✨ AI Summarizer</a></li>
                    <li><a href="/tools/seo-tags">🏷️ SEO Tag Generator</a></li>
                    <li><a href="/tools/image-generator">🖼️ Image Generator</a></li>
                    <li><a href="/tools/mortgage-calculator">🏠 Mortgage Calculator</a></li>
                    <li><a href="/tools/bmi-calculator">⚖️ BMI Calculator</a></li>
                    <li><a href="/tools/qr-code-generator">📱 QR Code Generator</a></li>
                    <li><a href="/tools/youtube-thumbnail">📺 YT Thumbnail Downloader</a></li>
                    <li><a href="/tools/privacy-policy-generator">⚖️ Privacy Policy Generator</a></li>
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
