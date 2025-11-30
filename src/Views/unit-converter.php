<div class="tool-container">
    <div class="tool-header">
        <h1>⚖️ Unit Converter</h1>
        <p>Convert between common units of measurement.</p>
    </div>

    <div class="converter-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin-top: 2rem;">
        
        <!-- Length Converter -->
        <div class="card">
            <h3>📏 Length</h3>
            <div class="form-group">
                <label>Meters (m)</label>
                <input type="number" id="length-m" placeholder="0" oninput="convertLength('m')">
            </div>
            <div class="form-group">
                <label>Feet (ft)</label>
                <input type="number" id="length-ft" placeholder="0" oninput="convertLength('ft')">
            </div>
        </div>

        <!-- Weight Converter -->
        <div class="card">
            <h3>⚖️ Weight</h3>
            <div class="form-group">
                <label>Kilograms (kg)</label>
                <input type="number" id="weight-kg" placeholder="0" oninput="convertWeight('kg')">
            </div>
            <div class="form-group">
                <label>Pounds (lbs)</label>
                <input type="number" id="weight-lbs" placeholder="0" oninput="convertWeight('lbs')">
            </div>
        </div>

        <!-- Temperature Converter -->
        <div class="card">
            <h3>🌡️ Temperature</h3>
            <div class="form-group">
                <label>Celsius (°C)</label>
                <input type="number" id="temp-c" placeholder="0" oninput="convertTemp('c')">
            </div>
            <div class="form-group">
                <label>Fahrenheit (°F)</label>
                <input type="number" id="temp-f" placeholder="0" oninput="convertTemp('f')">
            </div>
        </div>

    </div>
</div>

<script>
    function convertLength(source) {
        const m = document.getElementById('length-m');
        const ft = document.getElementById('length-ft');
        
        if (source === 'm') {
            ft.value = (m.value * 3.28084).toFixed(2);
        } else {
            m.value = (ft.value / 3.28084).toFixed(2);
        }
    }

    function convertWeight(source) {
        const kg = document.getElementById('weight-kg');
        const lbs = document.getElementById('weight-lbs');
        
        if (source === 'kg') {
            lbs.value = (kg.value * 2.20462).toFixed(2);
        } else {
            kg.value = (lbs.value / 2.20462).toFixed(2);
        }
    }

    function convertTemp(source) {
        const c = document.getElementById('temp-c');
        const f = document.getElementById('temp-f');
        
        if (source === 'c') {
            f.value = ((c.value * 9/5) + 32).toFixed(2);
        } else {
            c.value = ((f.value - 32) * 5/9).toFixed(2);
        }
    }
</script>
