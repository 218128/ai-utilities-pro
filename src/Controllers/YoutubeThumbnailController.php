<?php

namespace App\Controllers;

class YoutubeThumbnailController {
    public function index() {
        $videoUrl = '';
        $thumbnails = [];
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $videoUrl = $_POST['url'] ?? '';
            $videoId = $this->extractVideoId($videoUrl);

            if ($videoId) {
                $thumbnails = [
                    'HD (1280x720)' => "https://img.youtube.com/vi/{$videoId}/maxresdefault.jpg",
                    'SD (640x480)' => "https://img.youtube.com/vi/{$videoId}/sddefault.jpg",
                    'HQ (480x360)' => "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg",
                    'MQ (320x180)' => "https://img.youtube.com/vi/{$videoId}/mqdefault.jpg",
                ];
            } else {
                $error = "Invalid YouTube URL. Please try again.";
            }
        }

        ob_start();
        ?>
        <div class="tool-container">
            <div class="hero" style="padding: 2rem 0;">
                <h1><span class="gradient-text">YouTube Thumbnail Downloader</span></h1>
                <p>Download high-quality thumbnails from any YouTube video.</p>
            </div>

            <div class="card" style="max-width: 800px; margin: 0 auto;">
                <form method="post" action="/tools/youtube-thumbnail">
                    <div class="form-group">
                        <label for="url">YouTube Video URL</label>
                        <input type="text" id="url" name="url" value="<?= htmlspecialchars($videoUrl) ?>" placeholder="https://www.youtube.com/watch?v=..." required>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Get Thumbnails</button>
                </form>

                <?php if ($error): ?>
                    <div style="margin-top: 1rem; color: #ef4444; text-align: center;">
                        <?= htmlspecialchars($error) ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($thumbnails)): ?>
                    <div style="margin-top: 2rem; display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
                        <?php foreach ($thumbnails as $quality => $url): ?>
                            <div style="background: var(--bg-dark); padding: 1rem; border-radius: 8px; border: 1px solid var(--border-color);">
                                <h3 style="font-size: 1rem; margin-bottom: 0.5rem; color: var(--text-muted);"><?= $quality ?></h3>
                                <img src="<?= $url ?>" alt="Thumbnail" style="width: 100%; border-radius: 4px; margin-bottom: 1rem;">
                                <a href="<?= $url ?>" download target="_blank" class="btn btn-secondary" style="display: block; text-align: center; width: 100%;">Download Image</a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php
        $content = ob_get_clean();
        $title = "YouTube Thumbnail Downloader - AI Utilities Pro";
        $description = "Download YouTube video thumbnails in HD, SD, and HQ qualities for free.";
        require __DIR__ . '/../../templates/layout.php';
    }

    private function extractVideoId($url) {
        $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i';
        if (preg_match($pattern, $url, $matches)) {
            return $matches[1];
        }
        return false;
    }
}
?>
