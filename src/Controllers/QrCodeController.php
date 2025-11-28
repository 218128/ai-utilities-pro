<?php

namespace App\Controllers;

class QrCodeController {
    public function index() {
        ob_start();
        ?>
        <div class="tool-container">
            <div class="hero" style="padding: 2rem 0;">
                <h1><span class="gradient-text">QR Code Generator</span></h1>
                <p>Create custom QR codes for URLs, text, and more instantly.</p>
            </div>

            <div class="card" style="max-width: 800px; margin: 0 auto;">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                    <div>
                        <div class="form-group">
                            <label for="qr-text">Enter Text or URL</label>
                            <input type="text" id="qr-text" placeholder="https://example.com" oninput="generateQR()">
                        </div>
                        
                        <div class="form-group">
                            <label for="qr-color">Color</label>
                            <input type="color" id="qr-color" value="#000000" onchange="generateQR()" style="height: 40px; padding: 2px;">
                        </div>

                        <div class="form-group">
                            <label for="qr-bg">Background</label>
                            <input type="color" id="qr-bg" value="#ffffff" onchange="generateQR()" style="height: 40px; padding: 2px;">
                        </div>

                        <button onclick="downloadQR()" class="btn btn-primary" style="width: 100%; margin-top: 1rem;">Download QR Code</button>
                    </div>

                    <div style="display: flex; justify-content: center; align-items: center; background: var(--bg-dark); border-radius: 8px; padding: 1rem; min-height: 300px;">
                        <div id="qrcode"></div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
        <script>
            let qrcode = new QRCode(document.getElementById("qrcode"), {
                width: 200,
                height: 200,
                colorDark : "#000000",
                colorLight : "#ffffff",
                correctLevel : QRCode.CorrectLevel.H
            });

            function generateQR() {
                const text = document.getElementById("qr-text").value;
                const color = document.getElementById("qr-color").value;
                const bg = document.getElementById("qr-bg").value;

                if (!text) {
                    // Clear if empty
                    document.getElementById("qrcode").innerHTML = "";
                    // Re-init to keep the object ready or just clear
                    return;
                }

                // QRCode.js doesn't support dynamic color update easily without re-creating
                document.getElementById("qrcode").innerHTML = "";
                qrcode = new QRCode(document.getElementById("qrcode"), {
                    text: text,
                    width: 200,
                    height: 200,
                    colorDark : color,
                    colorLight : bg,
                    correctLevel : QRCode.CorrectLevel.H
                });
            }

            // Init with default
            generateQR();

            function downloadQR() {
                const img = document.querySelector("#qrcode img");
                if (img && img.src) {
                    const link = document.createElement("a");
                    link.href = img.src;
                    link.download = "qrcode.png";
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                } else {
                    alert("Please generate a QR code first.");
                }
            }
        </script>
        <?php
        $content = ob_get_clean();
        $title = "QR Code Generator - AI Utilities Pro";
        $description = "Generate free custom QR codes for URLs, text, and more.";
        require __DIR__ . '/../../templates/layout.php';
    }
}
?>
