<?php

namespace App\Controllers;

class SummarizerController {
    
    // Route: /tools/chatgpt-summarizer
    public function chatgpt() {
        $this->renderPage('ChatGPT', 'gpt-3.5-turbo');
    }

    // Route: /tools/google-gemini-summarizer
    public function gemini() {
        $this->renderPage('Google Gemini', 'gemini-pro');
    }

    // Legacy Route: /tools/summarizer (Defaults to ChatGPT)
    public function index() {
        $this->renderPage('AI', 'gpt-3.5-turbo');
    }

    private function renderPage($providerName, $model) {
        $summary = '';
        $inputText = '';
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $inputText = $_POST['text'] ?? '';
            
            if (empty($inputText)) {
                $error = "Please enter some text to summarize.";
            } else {
                if ($model === 'gemini-pro') {
                    $summary = $this->callGemini($inputText);
                } else {
                    $summary = $this->callOpenAI($inputText);
                }

                if (!$summary) {
                    $error = "Failed to generate summary. Please check your API key or try again later.";
                }
            }
        }

        // Dynamic View Data
        $pageTitle = "$providerName Summarizer - Free Online Tool";
        $pageDescription = "Summarize text instantly using $providerName. Free, fast, and accurate AI summaries.";
        $formAction = $_SERVER['REQUEST_URI']; // Post back to the same URL

        ob_start();
        ?>
        <div class="tool-container">
            <div class="hero" style="padding: 2rem 0;">
                <h1><span class="gradient-text"><?= htmlspecialchars($providerName) ?> Summarizer</span></h1>
                <p>Summarize long articles and text instantly with <strong><?= htmlspecialchars($providerName) ?></strong>.</p>
            </div>

            <div class="card" style="max-width: 800px; margin: 0 auto;">
                <form method="post" action="<?= htmlspecialchars($formAction) ?>">
                    <div class="form-group">
                        <label for="text">Enter Text to Summarize</label>
                        <textarea id="text" name="text" rows="10" placeholder="Paste your article or text here..." required><?= htmlspecialchars($inputText) ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Summarize with <?= htmlspecialchars($providerName) ?></button>
                </form>

                <?php if ($error): ?>
                    <div style="margin-top: 1rem; color: #ef4444; text-align: center;">
                        <?= htmlspecialchars($error) ?>
                    </div>
                <?php endif; ?>

                <?php if ($summary): ?>
                    <div style="margin-top: 2rem;">
                        <h3 style="margin-bottom: 1rem;">Summary Result</h3>
                        <div style="background: var(--bg-dark); padding: 1.5rem; border-radius: 8px; border: 1px solid var(--border-color); line-height: 1.6;">
                            <?= nl2br(htmlspecialchars($summary)) ?>
                        </div>
                        <button onclick="navigator.clipboard.writeText(`<?= addslashes($summary) ?>`)" class="btn btn-secondary" style="margin-top: 1rem;">Copy Summary</button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php
        $content = ob_get_clean();
        
        $title = $pageTitle;
        $description = $pageDescription;
        
        require __DIR__ . '/../../templates/layout.php';
    }

    private function callOpenAI($text) {
        $apiKey = getenv('OPENAI_API_KEY');
        if (!$apiKey) return "Error: OPENAI_API_KEY not set.";

        $url = 'https://api.openai.com/v1/chat/completions';
        $data = [
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => 'You are a helpful assistant that summarizes text concisely.'],
                ['role' => 'user', 'content' => "Summarize the following text:\n\n" . $text]
            ],
            'max_tokens' => 300
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
            error_log("OpenAI Error: $httpCode - $response - $curlError");
            return "Error: HTTP $httpCode. Check logs.";
        }
    }

    private function callGemini($text) {
        $apiKey = getenv('GOOGLE_API_KEY');
        if (!$apiKey) return "Error: GOOGLE_API_KEY not set.";

        // Updated to gemini-2.5-flash as per latest API availability (Nov 2025)
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=" . $apiKey;
        $data = [
            'contents' => [
                ['parts' => [['text' => "Summarize the following text:\n\n" . $text]]]
            ]
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlError = curl_error($ch);
        curl_close($ch);

        if ($httpCode === 200) {
            $result = json_decode($response, true);
            return $result['candidates'][0]['content']['parts'][0]['text'] ?? null;
        } else {
            error_log("Gemini Error: $httpCode - $response - $curlError");
            return "Error: HTTP $httpCode. Check logs.";
        }
    }
}
?>
