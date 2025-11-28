<?php

namespace App\Controllers;

class LoremIpsumController {
    public function index() {
        $paragraphs = 3;
        $generatedText = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $paragraphs = (int)($_POST['paragraphs'] ?? 3);
            $paragraphs = max(1, min(20, $paragraphs)); // Limit between 1 and 20

            $lorem = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
            
            $extras = [
                "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.",
                "Totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.",
                "Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.",
                "Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.",
                "Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?"
            ];

            for ($i = 0; $i < $paragraphs; $i++) {
                $text = $lorem;
                if ($i > 0) {
                    // Mix it up a bit for subsequent paragraphs
                    shuffle($extras);
                    $text = $extras[0] . " " . $extras[1] . " " . $lorem;
                }
                $generatedText .= "<p>" . $text . "</p>\n";
            }
        }

        ob_start();
        ?>
        <div class="tool-container">
            <div class="hero" style="padding: 2rem 0;">
                <h1><span class="gradient-text">Lorem Ipsum Generator</span></h1>
                <p>Generate placeholder text for your designs and mockups.</p>
            </div>

            <div class="card" style="max-width: 800px; margin: 0 auto;">
                <form method="post" action="/tools/lorem-ipsum-generator" style="display: flex; gap: 1rem; align-items: flex-end; justify-content: center; margin-bottom: 2rem;">
                    <div class="form-group" style="margin-bottom: 0; flex: 1; max-width: 200px;">
                        <label for="paragraphs">Paragraphs</label>
                        <input type="number" id="paragraphs" name="paragraphs" value="<?= $paragraphs ?>" min="1" max="20" required>
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-bottom: 2px;">Generate</button>
                </form>

                <?php if ($generatedText): ?>
                    <div style="position: relative;">
                        <div id="lorem-text" style="background: var(--bg-dark); padding: 1.5rem; border-radius: 8px; border: 1px solid var(--border-color); color: var(--text-muted); line-height: 1.6; max-height: 500px; overflow-y: auto;">
                            <?= $generatedText ?>
                        </div>
                        <button onclick="copyLorem()" class="btn btn-secondary" style="position: absolute; top: 1rem; right: 1rem; padding: 0.5rem 1rem; font-size: 0.8rem;">Copy</button>
                    </div>
                    <script>
                        function copyLorem() {
                            const text = document.getElementById('lorem-text').innerText;
                            navigator.clipboard.writeText(text).then(() => {
                                alert('Copied to clipboard!');
                            });
                        }
                    </script>
                <?php endif; ?>
            </div>
        </div>
        <?php
        $content = ob_get_clean();
        $title = "Lorem Ipsum Generator - AI Utilities Pro";
        $description = "Free Lorem Ipsum generator for designers and developers.";
        require __DIR__ . '/../../templates/layout.php';
    }
}
?>
