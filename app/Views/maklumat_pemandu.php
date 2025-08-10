<?= $this->extend('layout/Base') ?>

<?= $this->section('title') ?>
Rekod Pemandu
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div style="background:#310d4d; color:#fff; border-radius:6px; padding:12px 18px; font-size:1.2em; font-weight:bold; margin-bottom:18px; text-align:center;">Maklumat Pemandu</div>

    <div class="info-row">
        <div class="info-box">
            <div>Pemandu Aktif</div>
            <div class="info-number">8</div>
        </div>
        <div class="info-box">
            <div>Pemandu Tidak Aktif</div>
            <div class="info-number">2</div>
        </div>
        <div class="info-box">
            <div>Pemandu Sementara</div>
            <div class="info-number">1</div>
        </div>
    </div>

    <div style="margin:32px 0; display:flex; gap:24px; justify-content:center; align-items:flex-start;">
        <div style="background:#fff; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.07); padding:24px; max-width:400px; flex:1; text-align:center; border:2px solid #310d4d;">
            <h3 style="margin-bottom:18px; text-align:center;">Graf Penggunaan Pemandu</h3>
            <canvas id="driverLineChart" width="350" height="80" style="display:block; margin:0 auto;"></canvas>
        </div>
        <div style="background:#fff; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.07); padding:24px; max-width:400px; flex:1; text-align:center; border:2px solid #310d4d;">
            <h3 style="margin-bottom:18px; text-align:center;">Graf Aduan Pemandu</h3>
            <canvas id="driverBarChart" width="350" height="80" style="display:block; margin:0 auto;"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    const ctxLine = document.getElementById('driverLineChart').getContext('2d');
    const driverLineChart = new Chart(ctxLine, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mac', 'Apr', 'Mei', 'Jun', 'Jul', 'Ogos'],
            datasets: [{
                label: 'Penggunaan Pemandu',
                data: [5, 7, 6, 8, 7, 9, 8, 10],
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

    const ctxBar = document.getElementById('driverBarChart').getContext('2d');
    const driverBarChart = new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mac', 'Apr', 'Mei', 'Jun', 'Jul', 'Ogos'],
            datasets: [{
                label: 'Aduan Pemandu',
                data: [1, 0, 2, 1, 0, 1, 2, 1],
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
    <h2>Senarai Pemandu</h2>
    <table id="driverTable" style="width:100%; border-collapse:collapse; background:#fff; box-shadow:0 2px 8px rgba(0,0,0,0.07); margin-bottom:24px; cursor:pointer;">
        <thead style="background:#310d4d; color:#fff;">
            <tr>
                <th style="padding:8px; border:1px solid #ddd; text-align:center;">Bil</th>
                <th style="padding:8px; border:1px solid #ddd; text-align:center;">Nama</th>
                <th style="padding:8px; border:1px solid #ddd; text-align:center;">No. Tel</th>
                <th style="padding:8px; border:1px solid #ddd; text-align:center;">Email</th>
                <th style="padding:8px; border:1px solid #ddd; text-align:center;">Status</th>
                <th style="padding:8px; border:1px solid #ddd; text-align:center;">Pemanduan Terakhir</th>
            </tr>
        </thead>
        <tbody>
            <tr class="clickable-row">
                <td style="padding:8px; border:1px solid #ddd; text-align:center;">1</td>
                <td style="padding:8px; border:1px solid #ddd; text-align:center;">Ahmad Bin Ali</td>
                <td style="padding:8px; border:1px solid #ddd; text-align:center;">012-3456789</td>
                <td style="padding:8px; border:1px solid #ddd; text-align:center;">ahmad.ali@email.com</td>
                <td style="padding:8px; border:1px solid #ddd; text-align:center;">Aktif</td>
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
            window.location.href = '/rekod-pemandu';
        });
    });
    </script>
</div>

<?= $this->endSection() ?>
