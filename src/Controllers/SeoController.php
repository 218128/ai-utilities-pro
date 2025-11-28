<?php

namespace App\Controllers;

class SeoController {
    public function index() {
        $generatedTags = '';
        $title = '';
        $description = '';
        $keywords = '';
        $author = '';
        $url = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? '';
            $description = $_POST['description'] ?? '';
            $keywords = $_POST['keywords'] ?? '';
            $author = $_POST['author'] ?? '';
            $url = $_POST['url'] ?? '';

            $generatedTags = $this->generateTags($title, $description, $keywords, $author, $url);
        }

        ob_start();
        require __DIR__ . '/../Views/seo-generator.php';
        $content = ob_get_clean();
        
        $pageTitle = "SEO Meta Tag Generator - AI Utilities Pro";
        $pageDesc = "Boost your search rankings with our free SEO meta tag generator tool.";
        
        // Pass variables to layout by setting them in the global scope or a data array if we had a better view engine
        // For this simple setup, we use the variables we just defined
        $title = $pageTitle; 
        $description = $pageDesc;
        
        require __DIR__ . '/../../templates/layout.php';
    }

    private function generateTags($title, $description, $keywords, $author, $url) {
        $tags = "<!-- Primary Meta Tags -->\n";
        $tags .= "<title>" . htmlspecialchars($title) . "</title>\n";
        $tags .= "<meta name=\"title\" content=\"" . htmlspecialchars($title) . "\">\n";
        $tags .= "<meta name=\"description\" content=\"" . htmlspecialchars($description) . "\">\n";
        
        if ($keywords) {
            $tags .= "<meta name=\"keywords\" content=\"" . htmlspecialchars($keywords) . "\">\n";
        }
        if ($author) {
            $tags .= "<meta name=\"author\" content=\"" . htmlspecialchars($author) . "\">\n";
        }

        $tags .= "\n<!-- Open Graph / Facebook -->\n";
        $tags .= "<meta property=\"og:type\" content=\"website\">\n";
        if ($url) $tags .= "<meta property=\"og:url\" content=\"" . htmlspecialchars($url) . "\">\n";
        $tags .= "<meta property=\"og:title\" content=\"" . htmlspecialchars($title) . "\">\n";
        $tags .= "<meta property=\"og:description\" content=\"" . htmlspecialchars($description) . "\">\n";

        $tags .= "\n<!-- Twitter -->\n";
        $tags .= "<meta property=\"twitter:card\" content=\"summary_large_image\">\n";
        if ($url) $tags .= "<meta property=\"twitter:url\" content=\"" . htmlspecialchars($url) . "\">\n";
        $tags .= "<meta property=\"twitter:title\" content=\"" . htmlspecialchars($title) . "\">\n";
        $tags .= "<meta property=\"twitter:description\" content=\"" . htmlspecialchars($description) . "\">\n";

        return $tags;
    }
}
