<div class="card">
    <h2>🏷️ SEO Meta Tag Generator</h2>
    <p class="text-muted" style="margin-bottom: 2rem;">Generate perfect meta tags to help your website rank higher on Google and look great on social media.</p>

    <form method="POST" action="/tools/seo-tags">
        <div class="form-group">
            <label for="title">Page Title (Max 60 chars recommended)</label>
            <input type="text" id="title" name="title" maxlength="70" value="<?= htmlspecialchars($title ?? '') ?>" placeholder="e.g., Best Pizza in New York - Joe's Pizza" required>
        </div>

        <div class="form-group">
            <label for="description">Meta Description (Max 160 chars recommended)</label>
            <textarea id="description" name="description" rows="3" maxlength="160" placeholder="e.g., Order the best authentic NY style pizza online..."><?= htmlspecialchars($description ?? '') ?></textarea>
        </div>

        <div class="form-group">
            <label for="keywords">Keywords (Comma separated)</label>
            <input type="text" id="keywords" name="keywords" value="<?= htmlspecialchars($keywords ?? '') ?>" placeholder="pizza, nyc, delivery, italian food">
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <div class="form-group">
                <label for="author">Author (Optional)</label>
                <input type="text" id="author" name="author" value="<?= htmlspecialchars($author ?? '') ?>" placeholder="Joe Smith">
            </div>
            <div class="form-group">
                <label for="url">Website URL (Optional)</label>
                <input type="text" id="url" name="url" value="<?= htmlspecialchars($url ?? '') ?>" placeholder="https://joespizza.com">
            </div>
        </div>

        <button type="submit" class="btn btn-primary" style="width: 100%;">Generate Meta Tags</button>
    </form>

    <?php if (!empty($generatedTags)): ?>
    <div style="margin-top: 2rem; animation: fadeIn 0.5s ease;">
        <h3 style="margin-bottom: 1rem; color: var(--secondary);">Your Meta Tags</h3>
        <div style="position: relative;">
            <textarea id="seo-result" rows="12" readonly style="font-family: monospace; font-size: 0.9rem; color: #a5b4fc;"><?= htmlspecialchars($generatedTags) ?></textarea>
            <button class="btn btn-secondary" onclick="copyTags()" style="position: absolute; top: 10px; right: 10px; padding: 0.5rem 1rem; font-size: 0.8rem; background: rgba(0,0,0,0.5);">Copy</button>
        </div>
    </div>
    <script>
        function copyTags() {
            const text = document.getElementById('seo-result');
            text.select();
            navigator.clipboard.writeText(text.value);
            alert('Tags copied to clipboard!');
        }
    </script>
    <?php endif; ?>
</div>

<div class="card">
    <h3>SEO Tips</h3>
    <ul style="color: var(--text-muted); margin-top: 1rem; margin-left: 1.5rem;">
        <li>Keep titles under 60 characters so they don't get cut off in search results.</li>
        <li>Descriptions should be actionable and under 160 characters.</li>
        <li>Keywords are less important for Google now, but still useful for other engines.</li>
    </ul>
</div>
