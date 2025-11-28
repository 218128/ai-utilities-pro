<?php

namespace App\Controllers;

class PasswordController {
    public function index() {
        $password = '';
        $length = 16;
        $useSymbols = true;
        $useNumbers = true;
        $useUppercase = true;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $length = min(max(intval($_POST['length'] ?? 16), 8), 64);
            $useSymbols = isset($_POST['symbols']);
            $useNumbers = isset($_POST['numbers']);
            $useUppercase = isset($_POST['uppercase']);
            
            $password = $this->generatePassword($length, $useSymbols, $useNumbers, $useUppercase);
        }

        ob_start();
        require __DIR__ . '/../Views/password-generator.php';
        $content = ob_get_clean();
        
        $title = "Secure Password Generator - AI Utilities Pro";
        $description = "Generate strong, secure passwords instantly with our free tool.";
        
        require __DIR__ . '/../../templates/layout.php';
    }

    private function generatePassword($length, $symbols, $numbers, $uppercase) {
        $chars = 'abcdefghijklmnopqrstuvwxyz';
        if ($uppercase) $chars .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        if ($numbers) $chars .= '0123456789';
        if ($symbols) $chars .= '!@#$%^&*()_+-=[]{}|;:,.<>?';

        $password = '';
        $max = strlen($chars) - 1;
        for ($i = 0; $i < $length; $i++) {
            $password .= $chars[random_int(0, $max)];
        }
        return $password;
    }
}
