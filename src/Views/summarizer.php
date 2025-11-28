<div class="card">
    <h2>✨ AI Content Summarizer</h2>
    <p class="text-muted" style="margin-bottom: 2rem;">Paste your article, essay, or notes below to get a concise summary instantly.</p>

    <form method="POST" action="/tools/summarizer">
        <div class="form-group">
            <label for="text">Your Text:</label>
            <textarea id="text" name="text" rows="10" placeholder="Paste your text here..."><?= htmlspecialchars($inputText ?? '') ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary" style="width: 100%;">Summarize with AI</button>
    </form>

    <?php if (!empty($error)): ?>
        <div style="margin-top: 1rem; color: #ef4444; background: rgba(239, 68, 68, 0.1); padding: 1rem; border-radius: 8px;">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($summary)): ?>
    <div style="margin-top: 2rem; animation: fadeIn 0.5s ease;">
        <h3 style="margin-bottom: 1rem; color: var(--secondary);">Summary Result</h3>
        <div style="background: var(--bg-input); padding: 1.5rem; border-radius: 8px; border-left: 4px solid var(--secondary); line-height: 1.8;">
            <?= $summary ?>
        </div>
        <div style="margin-top: 1rem; text-align: right;">
            <button class="btn btn-secondary" onclick="copySummary()">Copy Summary</button>
        </div>
    </div>
    <script>
        function copySummary() {
            const text = document.querySelector('div[style*="border-left: 4px solid var(--secondary)"]').innerText;
            navigator.clipboard.writeText(text);
            alert('Summary copied to clipboard!');
        }
    </script>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
    <?php endif; ?>
</div>

<div class="card">
    <h3>How it works</h3>
    <p style="color: var(--text-muted); margin-top: 1rem;">
        Our AI analyzes the semantic meaning of your text and reconstructs the core ideas into a shorter, easier-to-read format. Perfect for research, studying, or quick reading.
    </p>
</div>
