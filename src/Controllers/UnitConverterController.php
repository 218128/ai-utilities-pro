<?php

namespace App\Controllers;

class UnitConverterController {
    public function index() {
        $title = "Unit Converter - Length, Weight, Temperature | AI Utilities Pro";
        $description = "Free online unit converter. Convert between Metric and Imperial units for length, weight, and temperature easily.";
        
        ob_start();
        require __DIR__ . '/../Views/unit-converter.php';
        $content = ob_get_clean();

        require __DIR__ . '/../../templates/layout.php';
    }
}
