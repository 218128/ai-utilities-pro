<div class="card">
    <h2>🔐 Secure Password Generator</h2>
    <p class="text-muted" style="margin-bottom: 2rem;">Create strong, uncrackable passwords to keep your accounts safe.</p>

    <form method="POST" action="/tools/password-generator">
        <div class="form-group">
            <label for="length">Password Length: <span id="length-val"><?= $length ?></span></label>
            <input type="range" id="length" name="length" min="8" max="64" value="<?= $length ?>" oninput="document.getElementById('length-val').textContent = this.value">
        </div>

        <div class="form-group" style="display: flex; gap: 1rem; flex-wrap: wrap;">
            <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                <input type="checkbox" name="uppercase" <?= $useUppercase ? 'checked' : '' ?>> Include Uppercase
            </label>
            <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                <input type="checkbox" name="numbers" <?= $useNumbers ? 'checked' : '' ?>> Include Numbers
            </label>
            <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                <input type="checkbox" name="symbols" <?= $useSymbols ? 'checked' : '' ?>> Include Symbols
            </label>
        </div>

        <button type="submit" class="btn btn-primary" style="width: 100%;">Generate Password</button>
    </form>

    <?php if ($password): ?>
    <div style="margin-top: 2rem; background: var(--bg-input); padding: 1.5rem; border-radius: 8px; border: 1px solid var(--primary); position: relative;">
        <label>Your Secure Password:</label>
        <div style="display: flex; gap: 1rem; margin-top: 0.5rem;">
            <input type="text" value="<?= htmlspecialchars($password) ?>" id="password-result" readonly style="font-family: monospace; font-size: 1.2rem; letter-spacing: 1px;">
            <button type="button" class="btn btn-secondary" onclick="copyPassword()">Copy</button>
        </div>
    </div>
    <script>
        function copyPassword() {
            var copyText = document.getElementById("password-result");
            copyText.select();
            copyText.setSelectionRange(0, 99999); 
            navigator.clipboard.writeText(copyText.value);
            
            const btn = document.querySelector('button[onclick="copyPassword()"]');
            const originalText = btn.textContent;
            btn.textContent = "Copied!";
            setTimeout(() => btn.textContent = originalText, 2000);
        }
    </script>
    <?php endif; ?>
</div>

<div class="card">
    <h3>Why use a strong password?</h3>
    <p style="color: var(--text-muted); margin-top: 1rem;">
        Using a unique, complex password for every account is the best defense against hackers. 
        Our generator creates random strings that are mathematically difficult to guess.
    </p>
</div>
