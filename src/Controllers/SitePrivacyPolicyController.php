<?php

namespace App\Controllers;

class SitePrivacyPolicyController {
    public function index() {
        $title = "Privacy Policy - AI Utilities Pro";
        $description = "Privacy Policy for AI Utilities Pro. Learn how we collect, use, and protect your data.";
        
        ob_start();
        require __DIR__ . '/../Views/site-privacy-policy.php';
        $content = ob_get_clean();

        require __DIR__ . '/../../templates/layout.php';
    }
}
