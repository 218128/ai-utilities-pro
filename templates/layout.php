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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Analytics 4 (GA4) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-XXXXXXXXXX');
    </script>
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
            
            <div class="dropdown">
                <button class="dropbtn">AI Tools <i class="fas fa-caret-down"></i></button>
                <div class="dropdown-content">
                    <a href="/tools/chatgpt-summarizer">✨ ChatGPT Summarizer</a>
                    <a href="/tools/google-gemini-summarizer">⚡ Gemini Summarizer</a>
                    <a href="/tools/dalle-3-image-generator">🖼️ DALL-E 3 Generator</a>
                    <a href="/tools/pollinations-ai-image-generator">🎨 Pollinations AI</a>
                    <a href="/tools/seo-tags">🏷️ SEO Tags</a>
                </div>
            </div>

            <div class="dropdown">
                <button class="dropbtn">Dev Tools <i class="fas fa-caret-down"></i></button>
                <div class="dropdown-content">
                    <a href="/tools/json-formatter">🔧 JSON Formatter</a>
                    <a href="/tools/markdown-editor">📝 Markdown Editor</a>
                    <a href="/tools/password-generator">🔐 Password Generator</a>
                    <a href="/tools/qr-code-generator">📱 QR Code</a>
                    <a href="/tools/lorem-ipsum-generator">📝 Lorem Ipsum</a>
                </div>
            </div>

            <div class="dropdown">
                <button class="dropbtn">Calculators <i class="fas fa-caret-down"></i></button>
                <div class="dropdown-content">
                    <a href="/tools/mortgage-calculator">🏠 Mortgage Calc</a>
                    <a href="/tools/bmi-calculator">⚖️ BMI Calc</a>
                    <a href="/tools/unit-converter">📏 Unit Converter</a>
                </div>
            </div>

            <a href="/tools/youtube-thumbnail">YT Thumb</a>
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

            <!-- 2. Share Card -->
            <div class="card card-flow">
                <h3><i class="fas fa-share-alt" style="color: var(--primary);"></i> Share this Tool</h3>
                <p class="text-muted" style="margin-bottom: 1rem;">Help others discover this tool by sharing it with your network.</p>
                <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                    <a href="https://twitter.com/intent/tweet?url=<?= urlencode("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]") ?>&text=<?= urlencode($title ?? 'Check out this AI tool!') ?>" target="_blank" class="btn btn-sm" style="background: #1DA1F2; color: white; flex: 1; text-align: center; min-width: 120px;"><i class="fab fa-twitter"></i> Twitter</a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]") ?>" target="_blank" class="btn btn-sm" style="background: #4267B2; color: white; flex: 1; text-align: center; min-width: 120px;"><i class="fab fa-facebook-f"></i> Facebook</a>
                    <a href="https://api.whatsapp.com/send?text=<?= urlencode(($title ?? 'Check out this AI tool!') . " https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]") ?>" target="_blank" class="btn btn-sm" style="background: #25D366; color: white; flex: 1; text-align: center; min-width: 120px;"><i class="fab fa-whatsapp"></i> WhatsApp</a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= urlencode("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]") ?>" target="_blank" class="btn btn-sm" style="background: #0077b5; color: white; flex: 1; text-align: center; min-width: 120px;"><i class="fab fa-linkedin-in"></i> LinkedIn</a>
                </div>
            </div>

            <!-- 3. Ad Card (In-Feed) -->
            <div class="card card-flow" style="display: flex; justify-content: center; align-items: center; min-height: 100px; background: var(--bg-dark); border: 1px dashed var(--border-color);">
                <span class="text-muted">Ad Space (In-Feed)</span>
            </div>

            <!-- 4. Related Tools Card -->
            <div class="card card-flow">
                <h3 style="margin-bottom: 1.5rem;">🔥 You Might Also Like</h3>
                <div class="tools-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 1rem;">
                    <a href="/tools/chatgpt-summarizer" class="tool-card-mini" style="background: var(--bg-input); padding: 1rem; border-radius: 8px; border: 1px solid var(--border-color); display: block;">
                        <div style="font-size: 1.5rem; margin-bottom: 0.5rem;">✨</div>
                        <div style="font-weight: bold; font-size: 0.9rem;">ChatGPT Summarizer</div>
                    </a>
                    <a href="/tools/dalle-3-image-generator" class="tool-card-mini" style="background: var(--bg-input); padding: 1rem; border-radius: 8px; border: 1px solid var(--border-color); display: block;">
                        <div style="font-size: 1.5rem; margin-bottom: 0.5rem;">🖼️</div>
                        <div style="font-weight: bold; font-size: 0.9rem;">DALL-E 3 Generator</div>
                    </a>
                    <a href="/tools/password-generator" class="tool-card-mini" style="background: var(--bg-input); padding: 1rem; border-radius: 8px; border: 1px solid var(--border-color); display: block;">
                        <div style="font-size: 1.5rem; margin-bottom: 0.5rem;">🔐</div>
                        <div style="font-weight: bold; font-size: 0.9rem;">Password Generator</div>
                    </a>
                    <a href="/tools/json-formatter" class="tool-card-mini" style="background: var(--bg-input); padding: 1rem; border-radius: 8px; border: 1px solid var(--border-color); display: block;">
                        <div style="font-size: 1.5rem; margin-bottom: 0.5rem;">🔧</div>
                        <div style="font-weight: bold; font-size: 0.9rem;">JSON Formatter</div>
                    </a>
                </div>
            </div>

            <!-- 5. Popular Tools Card -->
            <div class="card card-flow">
                <h3>🚀 Popular Tools</h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 1rem; margin-top: 1rem;">
                    <a href="/tools/google-gemini-summarizer" class="btn btn-secondary" style="text-align: left;">⚡ Gemini Summarizer</a>
                    <a href="/tools/seo-tags" class="btn btn-secondary" style="text-align: left;">🏷️ SEO Tag Generator</a>
                    <a href="/tools/pollinations-ai-image-generator" class="btn btn-secondary" style="text-align: left;">🎨 Pollinations AI</a>
                    <a href="/tools/mortgage-calculator" class="btn btn-secondary" style="text-align: left;">🏠 Mortgage Calculator</a>
                    <a href="/tools/qr-code-generator" class="btn btn-secondary" style="text-align: left;">📱 QR Code Generator</a>
                    <a href="/tools/youtube-thumbnail" class="btn btn-secondary" style="text-align: left;">📺 YT Thumbnail</a>
                </div>
            </div>

            <!-- 6. Pro Tips Card -->
            <div class="card card-flow">
                <h3>💡 Pro Tips</h3>
                <ul style="margin-top: 1rem; padding-left: 1.5rem; color: var(--text-muted);">
                    <li style="margin-bottom: 0.5rem;">Bookmark this page (Ctrl+D) to access these tools instantly.</li>
                    <li style="margin-bottom: 0.5rem;">All our AI tools are free to use with no daily limits.</li>
                    <li style="margin-bottom: 0.5rem;">We respect your privacy: data is processed securely and never stored.</li>
                </ul>
            </div>
        </main>

        <aside class="sidebar">
            <div class="ad-slot ad-sidebar">
                <span>Ad Space (Sidebar 300x600)</span>
            </div>


        </aside>
    </div>

    <footer>
        <div class="footer-content" style="max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2rem; text-align: left; padding-bottom: 2rem;">
            
            <div>
                <h4 style="color: var(--text-main); margin-bottom: 1rem;">AI Utilities Pro</h4>
                <p style="font-size: 0.9rem;">Premium AI tools to supercharge your productivity. Free and easy to use.</p>
            </div>

            <div>
                <h4 style="color: var(--text-main); margin-bottom: 1rem;">Quick Links</h4>
                <ul style="list-style: none;">
                    <li style="margin-bottom: 0.5rem;"><a href="/">Home</a></li>
                    <li style="margin-bottom: 0.5rem;"><a href="/tools/chatgpt-summarizer">AI Tools</a></li>
                    <li style="margin-bottom: 0.5rem;"><a href="/tools/json-formatter">Dev Tools</a></li>
                </ul>
            </div>

            <div>
                <h4 style="color: var(--text-main); margin-bottom: 1rem;">Legal</h4>
                <ul style="list-style: none;">
                    <li style="margin-bottom: 0.5rem;"><a href="/privacy-policy">Privacy Policy</a></li>
                    <li style="margin-bottom: 0.5rem;"><a href="/tools/privacy-policy-generator">Policy Generator</a></li>
                </ul>
            </div>

        </div>
        <div style="border-top: 1px solid var(--border-color); padding-top: 2rem; margin-top: 2rem;">
            <p>&copy; <?= date('Y') ?> AI Utilities Pro. All rights reserved.</p>
        </div>
    </footer>
    <script>
        document.getElementById('theme-toggle').addEventListener('click', function() {
            document.documentElement.classList.toggle('dark-mode');
        });
    </script>
</body>
</html>
