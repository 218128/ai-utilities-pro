<?php

namespace App\Controllers;

class ImageGeneratorController {
    
    // Route: /tools/dalle-3-image-generator
    public function dalle() {
        $this->renderPage('DALL-E 3', 'dall-e-3');
    }

    // Route: /tools/pollinations-ai-image-generator
    public function pollinations() {
        $this->renderPage('Pollinations AI', 'pollinations');
    }

    // Legacy Route: /tools/image-generator (Defaults to DALL-E)
    public function index() {
        $this->renderPage('AI', 'dall-e-3');
    }

    private function renderPage($providerName, $model) {
        $imageUrl = '';
        $prompt = '';
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $prompt = $_POST['prompt'] ?? '';
            
            if (empty($prompt)) {
                $error = "Please enter a prompt to generate an image.";
            } else {
                if ($model === 'pollinations') {
                    $imageUrl = $this->callPollinations($prompt);
                } else {
                    $imageUrl = $this->callDallE($prompt);
                }

                if (!$imageUrl) {
                    $error = "Failed to generate image. Please check your API key or try again later.";
                }
            }
        }

        // Dynamic View Data
        $pageTitle = "$providerName Image Generator - Free Online Tool";
        $pageDescription = "Generate stunning images instantly using $providerName. Free and fast AI image generation.";
        $formAction = $_SERVER['REQUEST_URI'];

        ob_start();
        ?>
        <div class="tool-container">
            <div class="hero" style="padding: 2rem 0;">
                <h1><span class="gradient-text"><?= htmlspecialchars($providerName) ?> Generator</span></h1>
                <p>Turn text into stunning images using <strong><?= htmlspecialchars($providerName) ?></strong>.</p>
            </div>

            <div class="card" style="max-width: 800px; margin: 0 auto;">
                <form method="post" action="<?= htmlspecialchars($formAction) ?>">
                    <div class="form-group">
                        <label for="prompt">Image Prompt</label>
                        <input type="text" id="prompt" name="prompt" value="<?= htmlspecialchars($prompt) ?>" placeholder="A futuristic city with flying cars at sunset..." required>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Generate with <?= htmlspecialchars($providerName) ?></button>
                </form>

                <?php if ($error): ?>
                    <div style="margin-top: 1rem; color: #ef4444; text-align: center;">
                        <?= htmlspecialchars($error) ?>
                    </div>
                <?php endif; ?>

                <?php if ($imageUrl): ?>
                    <div style="margin-top: 2rem; text-align: center;">
                        <h3 style="margin-bottom: 1rem;">Generated Image</h3>
                        <img src="<?= htmlspecialchars($imageUrl) ?>" alt="Generated Image" style="max-width: 100%; border-radius: 8px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
                        <div style="margin-top: 1rem;">
                            <a href="<?= htmlspecialchars($imageUrl) ?>" download target="_blank" class="btn btn-secondary">Download Image</a>
                        </div>
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

    private function callDallE($prompt) {
        $apiKey = getenv('OPENAI_API_KEY');
        if (!$apiKey) return null;

        $url = 'https://api.openai.com/v1/images/generations';
        $data = [
            'model' => 'dall-e-3',
            'prompt' => $prompt,
            'n' => 1,
            'size' => '1024x1024'
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
        curl_close($ch);

        if ($httpCode === 200) {
            $result = json_decode($response, true);
            return $result['data'][0]['url'] ?? null;
        }
        return null;
    }

    private function callPollinations($prompt) {
        // Pollinations.ai is a free GET API
        $encodedPrompt = urlencode($prompt);
        return "https://image.pollinations.ai/prompt/" . $encodedPrompt;
    }
}
?>
