<?= $this->extend('layout/Base') ?>

<?= $this->section('title') ?>
Rekod Kenderaan
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div style="background:#310d4d; color:#fff; border-radius:6px; padding:12px 18px; font-size:1.2em; font-weight:bold; margin-bottom:18px; text-align:center;">Maklumat Kenderaan</div>

    <div class="info-row">
        <div class="info-box">
            <div>Bas Aktif</div>
            <div class="info-number">13</div>
        </div>
        <div class="info-box">
            <div>Van Aktif</div>
            <div class="info-number">2</div>
        </div>
        <div class="info-box">
            <div>MPV Aktif</div>
            <div class="info-number">10</div>
        </div>
    </div>


    <div style="margin:32px 0; display:flex; gap:24px; justify-content:center; align-items:flex-start;">
        <div style="background:#fff; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.07); padding:24px; max-width:400px; flex:1; text-align:center; border:2px solid #310d4d;">
            <h3 style="margin-bottom:18px; text-align:center;">Graf Penggunaan Kenderaan</h3>
            <canvas id="vehicleLineChart" width="350" height="80" style="display:block; margin:0 auto;"></canvas>
        </div>
        <div style="background:#fff; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.07); padding:24px; max-width:400px; flex:1; text-align:center; border:2px solid #310d4d;">
            <h3 style="margin-bottom:18px; text-align:center;">Graf Aduan Kenderaan</h3>
            <canvas id="vehicleBarChart" width="350" height="80" style="display:block; margin:0 auto;"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    const ctxLine = document.getElementById('vehicleLineChart').getContext('2d');
    const vehicleLineChart = new Chart(ctxLine, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mac', 'Apr', 'Mei', 'Jun', 'Jul', 'Ogos'],
            datasets: [{
                label: 'Penggunaan Kenderaan',
                data: [12, 19, 15, 17, 14, 20, 18, 22],
                borderColor: '#310d4d',
                backgroundColor: 'rgba(49,13,77,0.1)',
                fill: true,
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    const ctxBar = document.getElementById('vehicleBarChart').getContext('2d');
    const vehicleBarChart = new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mac', 'Apr', 'Mei', 'Jun', 'Jul', 'Ogos'],
            datasets: [{
                label: 'Aduan Kenderaan',
                data: [2, 1, 3, 0, 2, 1, 4, 2],
                backgroundColor: '#310d4d',
                borderRadius: 4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
    </script>


<div style="margin-top:32px;">
    <h2>Senarai Kenderaan</h2>
    <div style="margin-bottom:18px;">
        <label for="jenisKenderaan" style="font-weight:bold;">Jenis Kenderaan :</label>
        <select id="jenisKenderaan" name="jenisKenderaan" style="padding:6px 12px; border-radius:4px; border:1px solid #ccc; margin-left:8px;">
            <option value="">-- Pilih --</option>
            <option value="Bas">Bas</option>
            <option value="Van">Van</option>
            <option value="MPV">MPV</option>
        </select>
    </div>
    <table id="vehicleTable" style="width:100%; border-collapse:collapse; background:#fff; box-shadow:0 2px 8px rgba(0,0,0,0.07); margin-bottom:24px; cursor:pointer;">
        <thead style="background:#310d4d; color:#fff;">
            <tr>
                <th style="padding:8px; border:1px solid #ddd; text-align:center;">Bil</th>
                <th style="padding:8px; border:1px solid #ddd; text-align:center;">Nombor Plat</th>
                <th style="padding:8px; border:1px solid #ddd; text-align:center;">Jenis Kenderaan</th>
                <th style="padding:8px; border:1px solid #ddd; text-align:center;">Kapasiti Penumpang</th>
                <th style="padding:8px; border:1px solid #ddd; text-align:center;">Tamat Tempoh Lesen Kenderaan</th>
                <th style="padding:8px; border:1px solid #ddd; text-align:center;">Terakhir Digunakan</th>
            </tr>
        </thead>
        <tbody>
            <tr class="clickable-row">
                <td style="padding:8px; border:1px solid #ddd; text-align:center;">1</td>
                <td style="padding:8px; border:1px solid #ddd; text-align:center;">TBA1234</td>
                <td style="padding:8px; border:1px solid #ddd; text-align:center;">Bas</td>
                <td style="padding:8px; border:1px solid #ddd; text-align:center;">40</td>
                <td style="padding:8px; border:1px solid #ddd; text-align:center;">2026-01-15</td>
                <td style="padding:8px; border:1px solid #ddd; text-align:center;">2025-08-07 14:30</td>
            </tr>
        </tbody>
    </table>
    <script>
    // Add hover effect and click event for table rows
    document.querySelectorAll('.clickable-row').forEach(function(row) {
        row.style.transition = 'background 0.2s';
        row.addEventListener('mouseover', function() {
            row.style.background = '#f4f4f4';
        });
        row.addEventListener('mouseout', function() {
            row.style.background = '';
        });
        row.addEventListener('click', function() {
            window.location.href = '/rekod-kenderaan';
        });
    });
    </script>
</div>

<?= $this->endSection() ?>
