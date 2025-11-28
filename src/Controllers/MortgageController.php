<?php

namespace App\Controllers;

class MortgageController {
    public function index() {
        $result = null;
        $amount = '';
        $rate = '';
        $years = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $amount = filter_input(INPUT_POST, 'amount', FILTER_VALIDATE_FLOAT);
            $rate = filter_input(INPUT_POST, 'rate', FILTER_VALIDATE_FLOAT);
            $years = filter_input(INPUT_POST, 'years', FILTER_VALIDATE_FLOAT);

            if ($amount && $rate && $years) {
                // Monthly Interest Rate
                $i = ($rate / 100) / 12;
                // Number of Payments
                $n = $years * 12;

                // Mortgage Formula: M = P [ i(1 + i)^n ] / [ (1 + i)^n – 1 ]
                if ($i > 0) {
                    $monthlyPayment = $amount * ($i * pow(1 + $i, $n)) / (pow(1 + $i, $n) - 1);
                } else {
                    $monthlyPayment = $amount / $n;
                }
                
                $result = number_format($monthlyPayment, 2);
            }
        }

        ob_start();
        ?>
        <div class="tool-container">
            <div class="hero" style="padding: 2rem 0;">
                <h1><span class="gradient-text">Mortgage Calculator</span></h1>
                <p>Estimate your monthly mortgage payments instantly.</p>
            </div>

            <div class="card" style="max-width: 600px; margin: 0 auto;">
                <form method="post" action="/tools/mortgage-calculator">
                    <div class="form-group">
                        <label for="amount">Loan Amount ($)</label>
                        <input type="number" id="amount" name="amount" step="0.01" value="<?= htmlspecialchars($amount) ?>" required placeholder="e.g. 300000">
                    </div>

                    <div class="form-group">
                        <label for="rate">Annual Interest Rate (%)</label>
                        <input type="number" id="rate" name="rate" step="0.01" value="<?= htmlspecialchars($rate) ?>" required placeholder="e.g. 5.5">
                    </div>

                    <div class="form-group">
                        <label for="years">Loan Term (Years)</label>
                        <input type="number" id="years" name="years" step="1" value="<?= htmlspecialchars($years) ?>" required placeholder="e.g. 30">
                    </div>

                    <button type="submit" class="btn btn-primary" style="width: 100%;">Calculate Payment</button>
                </form>

                <?php if ($result !== null): ?>
                    <div style="margin-top: 2rem; text-align: center; padding: 1.5rem; background: rgba(124, 58, 237, 0.1); border-radius: 8px; border: 1px solid var(--primary);">
                        <h3 style="color: var(--text-muted); font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px;">Monthly Payment</h3>
                        <div style="font-size: 2.5rem; font-weight: 700; color: var(--primary); margin: 0.5rem 0;">
                            $<?= $result ?>
                        </div>
                        <p style="font-size: 0.9rem; color: var(--text-muted);">
                            Total for <?= htmlspecialchars($years) ?> years at <?= htmlspecialchars($rate) ?>% interest.
                        </p>
                    </div>
                <?php endif; ?>
            </div>
            
            <div style="margin-top: 3rem; text-align: center; color: var(--text-muted); font-size: 0.9rem;">
                <p>This calculator provides estimates for principal and interest only. Taxes and insurance are not included.</p>
            </div>
        </div>
        <?php
        $content = ob_get_clean();
        $title = "Mortgage Calculator - AI Utilities Pro";
        $description = "Calculate your monthly mortgage payments with our free Mortgage Calculator tool.";
        require __DIR__ . '/../../templates/layout.php';
    }
}
?>
