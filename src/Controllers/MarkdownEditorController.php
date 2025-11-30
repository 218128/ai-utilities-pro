<?php

namespace App\Controllers;

class MarkdownEditorController {
    public function index() {
        $title = "Online Markdown Editor - Live Preview | AI Utilities Pro";
        $description = "Free online Markdown editor with live preview. Write, edit, and export Markdown to HTML instantly.";
        
        ob_start();
        require __DIR__ . '/../Views/markdown-editor.php';
        $content = ob_get_clean();

        require __DIR__ . '/../../templates/layout.php';
    }
}
