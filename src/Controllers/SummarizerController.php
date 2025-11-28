<?php

namespace App\Controllers;

class SummarizerController {
    public function index() {
        $summary = '';
        $inputText = '';
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $inputText = $_POST['text'] ?? '';
            
            if (empty($inputText)) {
                $error = "Please enter some text to summarize.";
            } else {
                // TODO: Replace with real API call (e.g., OpenAI or Gemini)
                // For now, we simulate a summary for demonstration.
                $summary = $this->mockSummarize($inputText);
            }
        }

        ob_start();
        require __DIR__ . '/../Views/summarizer.php';
        $content = ob_get_clean();
        
        $title = "AI Content Summarizer - AI Utilities Pro";
        $description = "Summarize long articles and text instantly with our advanced AI tool.";
        
        require __DIR__ . '/../../templates/layout.php';
    }

    private function mockSummarize($text) {
        // Simple mock logic: take the first few sentences or generate a placeholder
        $sentences = explode('.', $text);
        $preview = implode('.', array_slice($sentences, 0, 2)) . '.';
        
        return "<strong>[AI Mock Summary]</strong>: This is a simulated summary of your text. In a production environment, this would call an LLM API. <br><br> Key points extracted from your text:<br>• " . $preview;
    }
}
