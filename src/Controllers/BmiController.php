<?php

namespace App\Controllers;

class BmiController {
    public function index() {
        $result = null;
        $category = '';
        $unit = 'metric';
        $weight = '';
        $height = '';
        $feet = '';
        $inches = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $unit = $_POST['unit'] ?? 'metric';
            
            if ($unit === 'metric') {
                $weight = filter_input(INPUT_POST, 'weight', FILTER_VALIDATE_FLOAT);
                $height = filter_input(INPUT_POST, 'height', FILTER_VALIDATE_FLOAT); // in cm

                if ($weight && $height) {
                    $heightM = $height / 100;
                    $bmi = $weight / ($heightM * $heightM);
                    $result = number_format($bmi, 1);
                }
            } else {
                $weight = filter_input(INPUT_POST, 'weight_lbs', FILTER_VALIDATE_FLOAT);
                $feet = filter_input(INPUT_POST, 'feet', FILTER_VALIDATE_FLOAT);
                $inches = filter_input(INPUT_POST, 'inches', FILTER_VALIDATE_FLOAT);

                if ($weight && ($feet || $inches)) {
                    $totalInches = ($feet * 12) + $inches;
                    $bmi = 703 * $weight / ($totalInches * $totalInches);
                    $result = number_format($bmi, 1);
                }
            }

            if ($result) {
                if ($result < 18.5) $category = 'Underweight';
                elseif ($result < 25) $category = 'Normal weight';
                elseif ($result < 30) $category = 'Overweight';
                else $category = 'Obese';
            }
        }

        ob_start();
        ?>
        <div class="tool-container">
            <div class="hero" style="padding: 2rem 0;">
                <h1><span class="gradient-text">BMI Calculator</span></h1>
                <p>Check your Body Mass Index (BMI) instantly.</p>
            </div>

            <div class="card" style="max-width: 600px; margin: 0 auto;">
                <form method="post" action="/tools/bmi-calculator" id="bmiForm">
                    <div class="form-group" style="text-align: center; margin-bottom: 2rem;">
                        <label style="display: inline-block; margin-right: 1rem;">
                            <input type="radio" name="unit" value="metric" <?= $unit === 'metric' ? 'checked' : '' ?> onclick="toggleUnits('metric')"> Metric (kg/cm)
                        </label>
                        <label style="display: inline-block;">
                            <input type="radio" name="unit" value="imperial" <?= $unit === 'imperial' ? 'checked' : '' ?> onclick="toggleUnits('imperial')"> Imperial (lbs/ft+in)
                        </label>
                    </div>

                    <div id="metric-inputs" style="display: <?= $unit === 'metric' ? 'block' : 'none' ?>;">
                        <div class="form-group">
                            <label for="weight">Weight (kg)</label>
                            <input type="number" id="weight" name="weight" step="0.1" value="<?= htmlspecialchars($weight) ?>" placeholder="e.g. 70">
                        </div>
                        <div class="form-group">
                            <label for="height">Height (cm)</label>
                            <input type="number" id="height" name="height" step="0.1" value="<?= htmlspecialchars($height) ?>" placeholder="e.g. 175">
                        </div>
                    </div>

                    <div id="imperial-inputs" style="display: <?= $unit === 'imperial' ? 'block' : 'none' ?>;">
                        <div class="form-group">
                            <label for="weight_lbs">Weight (lbs)</label>
                            <input type="number" id="weight_lbs" name="weight_lbs" step="0.1" value="<?= htmlspecialchars($weight) ?>" placeholder="e.g. 150">
                        </div>
                        <div class="form-group" style="display: flex; gap: 1rem;">
                            <div style="flex: 1;">
                                <label for="feet">Feet</label>
                                <input type="number" id="feet" name="feet" step="1" value="<?= htmlspecialchars($feet) ?>" placeholder="e.g. 5">
                            </div>
                            <div style="flex: 1;">
                                <label for="inches">Inches</label>
                                <input type="number" id="inches" name="inches" step="1" value="<?= htmlspecialchars($inches) ?>" placeholder="e.g. 9">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" style="width: 100%;">Calculate BMI</button>
                </form>

                <?php if ($result !== null): ?>
                    <div style="margin-top: 2rem; text-align: center; padding: 1.5rem; background: rgba(6, 182, 212, 0.1); border-radius: 8px; border: 1px solid var(--secondary);">
                        <h3 style="color: var(--text-muted); font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px;">Your BMI</h3>
                        <div style="font-size: 3rem; font-weight: 700; color: var(--secondary); margin: 0.5rem 0;">
                            <?= $result ?>
                        </div>
                        <p style="font-size: 1.2rem; font-weight: 600; color: var(--text-main);">
                            Category: <span style="color: var(--primary);"><?= $category ?></span>
                        </p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <script>
        function toggleUnits(unit) {
            document.getElementById('metric-inputs').style.display = unit === 'metric' ? 'block' : 'none';
            document.getElementById('imperial-inputs').style.display = unit === 'imperial' ? 'block' : 'none';
        }
        </script>
        <?php
        $content = ob_get_clean();
        $title = "BMI Calculator - AI Utilities Pro";
        $description = "Calculate your Body Mass Index (BMI) easily with our free tool.";
        require __DIR__ . '/../../templates/layout.php';
    }
}
?>
