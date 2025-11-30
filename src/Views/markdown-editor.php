<div class="tool-container">
    <div class="tool-header">
        <h1>📝 Online Markdown Editor</h1>
        <p>Write Markdown on the left, see the result on the right.</p>
    </div>

    <div class="markdown-editor-container" style="display: flex; gap: 1rem; height: 70vh; margin-top: 1rem;">
        <div class="editor-pane" style="flex: 1; display: flex; flex-direction: column;">
            <label for="markdown-input" style="font-weight: bold; margin-bottom: 0.5rem;">Markdown Input</label>
            <textarea id="markdown-input" style="flex: 1; width: 100%; padding: 1rem; border: 1px solid var(--border-color); border-radius: var(--radius); background: var(--bg-card); color: var(--text-primary); font-family: monospace; resize: none;" placeholder="# Hello World&#10;&#10;Start typing **Markdown** here..."></textarea>
        </div>
        <div class="preview-pane" style="flex: 1; display: flex; flex-direction: column;">
            <label style="font-weight: bold; margin-bottom: 0.5rem;">Live Preview</label>
            <div id="markdown-preview" style="flex: 1; width: 100%; padding: 1rem; border: 1px solid var(--border-color); border-radius: var(--radius); background: var(--bg-card); overflow-y: auto;"></div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
<script>
    const input = document.getElementById('markdown-input');
    const preview = document.getElementById('markdown-preview');

    function updatePreview() {
        const markdownText = input.value;
        preview.innerHTML = marked.parse(markdownText);
    }

    input.addEventListener('input', updatePreview);

    // Initial render
    updatePreview();
</script>
