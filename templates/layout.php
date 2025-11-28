<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'AI Utilities Pro' ?></title>
    <meta name="description" content="<?= $description ?? 'Premium AI and Utility Tools for Professionals' ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
    <nav class="navbar">
        <a href="/" class="logo">AI Utilities Pro</a>
        <div class="nav-links">
            <a href="/">Home</a>
            <a href="/tools/password-generator">Password Gen</a>
            <a href="/tools/summarizer">AI Summarizer</a>
            <a href="/tools/seo-tags">SEO Tags</a>
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
                </ul>
            </div>
        </aside>
    </div>

    <footer>
        <p>&copy; <?= date('Y') ?> AI Utilities Pro. All rights reserved.</p>
    </footer>
</body>
</html>
