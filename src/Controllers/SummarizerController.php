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
                $summary = $this->callOpenAI($inputText);
                if (!$summary) {
                    $error = "Failed to generate summary. Please check your API key or try again later.";
                }
            }
        }

        ob_start();
        require __DIR__ . '/../Views/summarizer.php';
        $content = ob_get_clean();
        
        $title = "AI Content Summarizer - AI Utilities Pro";
        $description = "Summarize long articles and text instantly with our advanced AI tool.";
        
        require __DIR__ . '/../../templates/layout.php';
    }

    private function callOpenAI($text) {
        $apiKey = getenv('OPENAI_API_KEY');
        if (!$apiKey) {
            return "Error: OPENAI_API_KEY not set.";
        }

        $url = 'https://api.openai.com/v1/chat/completions';
        $data = [
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => 'You are a helpful assistant that summarizes text concisely.'],
                ['role' => 'user', 'content' => "Summarize the following text:\n\n" . $text]
            ],
            'max_tokens' => 150
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $apiKey
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlError = curl_error($ch);
        curl_close($ch);

        if ($httpCode === 200) {
            $result = json_decode($response, true);
            return $result['choices'][0]['message']['content'] ?? null;
        } else {
            // Log the error for debugging
            error_log("OpenAI API Error: HTTP $httpCode - Response: $response - Curl Error: $curlError");
            return "Error: HTTP $httpCode. " . ($curlError ? "Curl: $curlError" : "Check logs.");
        }

        return null;
    }
}
?>
