<?php

namespace App\Controllers;

class JsonFormatterController {
    public function index() {
        ob_start();
        ?>
        <div class="tool-container">
            <div class="hero" style="padding: 2rem 0;">
                <h1><span class="gradient-text">JSON Formatter & Validator</span></h1>
                <p>Beautify, validate, and minify your JSON data instantly.</p>
            </div>

            <div class="card" style="max-width: 1000px; margin: 0 auto;">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; height: 500px;">
                    <div style="display: flex; flex-direction: column;">
                        <label for="json-input" style="margin-bottom: 0.5rem; font-weight: 600;">Input JSON</label>
                        <textarea id="json-input" placeholder="Paste your JSON here..." style="flex: 1; padding: 1rem; background: var(--bg-dark); color: var(--text-main); border: 1px solid var(--border-color); border-radius: 8px; resize: none; font-family: monospace;"></textarea>
                    </div>
                    <div style="display: flex; flex-direction: column;">
                        <label for="json-output" style="margin-bottom: 0.5rem; font-weight: 600;">Formatted Output</label>
                        <textarea id="json-output" readonly placeholder="Result will appear here..." style="flex: 1; padding: 1rem; background: var(--bg-dark); color: var(--text-main); border: 1px solid var(--border-color); border-radius: 8px; resize: none; font-family: monospace;"></textarea>
                    </div>
                </div>

                <div style="margin-top: 1rem; display: flex; gap: 1rem; justify-content: center;">
                    <button onclick="formatJson()" class="btn btn-primary">Beautify</button>
                    <button onclick="minifyJson()" class="btn btn-secondary">Minify</button>
                    <button onclick="copyOutput()" class="btn btn-secondary">Copy Output</button>
                    <button onclick="clearAll()" class="btn" style="background: #ef4444; color: white;">Clear</button>
                </div>
                
                <div id="status-msg" style="margin-top: 1rem; text-align: center; font-weight: 600;"></div>
            </div>
        </div>

        <script>
            function formatJson() {
                const input = document.getElementById('json-input').value;
                const output = document.getElementById('json-output');
                const status = document.getElementById('status-msg');

                try {
                    const parsed = JSON.parse(input);
                    output.value = JSON.stringify(parsed, null, 4);
                    status.textContent = "✅ Valid JSON";
                    status.style.color = "#10b981";
                } catch (e) {
                    output.value = "";
                    status.textContent = "❌ Invalid JSON: " + e.message;
                    status.style.color = "#ef4444";
                }
            }

            function minifyJson() {
                const input = document.getElementById('json-input').value;
                const output = document.getElementById('json-output');
                const status = document.getElementById('status-msg');

                try {
                    const parsed = JSON.parse(input);
                    output.value = JSON.stringify(parsed);
                    status.textContent = "✅ Valid JSON (Minified)";
                    status.style.color = "#10b981";
                } catch (e) {
                    output.value = "";
                    status.textContent = "❌ Invalid JSON: " + e.message;
                    status.style.color = "#ef4444";
                }
            }

            function copyOutput() {
                const output = document.getElementById('json-output');
                output.select();
                document.execCommand('copy');
                const status = document.getElementById('status-msg');
                status.textContent = "📋 Copied to clipboard!";
                status.style.color = "var(--primary)";
                setTimeout(() => status.textContent = "", 2000);
            }

            function clearAll() {
                document.getElementById('json-input').value = "";
                document.getElementById('json-output').value = "";
                document.getElementById('status-msg').textContent = "";
            }
        </script>
        <?php
        $content = ob_get_clean();
        $title = "JSON Formatter & Validator - AI Utilities Pro";
        $description = "Free online JSON Formatter, Validator, and Minifier. Debug your JSON data easily.";
        require __DIR__ . '/../../templates/layout.php';
    }
}
?>
