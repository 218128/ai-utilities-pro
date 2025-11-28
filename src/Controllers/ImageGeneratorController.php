<?php

namespace App\Controllers;

class ImageGeneratorController {
    // Simple placeholder that would call an AI image API (e.g., OpenAI DALL·E or Gemini)
    public function index() {
        // Render the view with an empty result initially
        ob_start();
        ?>
        <h2>AI Image Generator</h2>
        <form method="post" action="/tools/image-generator">
            <label for="prompt">Prompt:</label>
            <input type="text" id="prompt" name="prompt" required />
            <button type="submit">Generate</button>
        </form>
        <?php
        if (!empty($_POST['prompt'])) {
            $prompt = $_POST['prompt'];
            // Placeholder: In a real implementation you would call the AI API here.
            $imageUrl = $this->mockGenerateImage($prompt);
            echo "<h3>Result:</h3>";
            echo "<img src='" . htmlspecialchars($imageUrl) . "' alt='Generated image' style='max-width:100%;'/>";
        }
        $content = ob_get_clean();
        return $content;
    }

    private function mockGenerateImage(string $prompt): string {
        // Return a placeholder image (unsplash source) based on the prompt keywords.
        $encoded = urlencode($prompt);
        return "https://source.unsplash.com/800x600/?" . $encoded;
    }
}
?>
