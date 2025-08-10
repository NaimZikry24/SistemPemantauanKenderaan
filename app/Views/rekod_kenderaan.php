<?= $this->extend('layout/Base') ?>

<?= $this->section('title') ?>
Rekod Kenderaan
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div style="background:#310d4d; color:#fff; border-radius:6px; padding:12px 18px; font-size:1.2em; font-weight:bold; margin-bottom:32px; text-align:center;">Rekod Kenderaan</div>
    <!-- Info Boxes -->
    <div style="display:flex; gap:24px; justify-content:center; margin-bottom:32px;">
        <div style="background:#310d4d; color:#fff; border-radius:8px; padding:12px 18px; min-width:160px; text-align:center; box-shadow:0 2px 8px rgba(0,0,0,0.07);">
            <div style="font-size:1.1em; font-weight:bold; margin-bottom:4px;">Jumlah Perjalanan</div>
            <div style="font-size:1.5em; font-weight:bold;">15</div>
        </div>
        <div style="background:#fff; border-radius:8px; padding:12px 18px; min-width:160px; text-align:center; box-shadow:0 2px 8px rgba(0,0,0,0.07); border:2px solid #28a745;">
            <div style="font-size:1.1em; font-weight:bold; margin-bottom:4px;">Status</div>
            <div style="font-size:1em; font-weight:bold; color:#fff; background:#28a745; border-radius:4px; padding:4px 0;">Aktif</div>
        </div>
        <div style="background:#310d4d; color:#fff; border-radius:8px; padding:12px 18px; min-width:160px; text-align:center; box-shadow:0 2px 8px rgba(0,0,0,0.07);">
            <div style="font-size:1.1em; font-weight:bold; margin-bottom:4px;">Kelajuan Semasa</div>
            <div style="font-size:1.5em; font-weight:bold;">80 km/j</div>
        </div>
    </div>
    <!-- Map -->
    <div style="width:100%; max-width:850px; margin:0 auto 32px auto;">
        <div id="mapKenderaan" style="width:800px; height:350px; border-radius:8px; border:3px solid #310d4d; box-shadow:0 2px 8px rgba(0,0,0,0.07); margin:0 auto;"></div>
    </div>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
    setTimeout(function() {
        if (window.leafletKenderaan) {
            window.leafletKenderaan.invalidateSize();
            return;
        }
        window.leafletKenderaan = L.map('mapKenderaan').setView([5.4171, 103.0216], 13); // UMT default
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(window.leafletKenderaan);
        L.marker([5.4171, 103.0216]).addTo(window.leafletKenderaan)
            .bindPopup('UMT').openPopup();
    }, 200);
    </script>
    <!-- Month Filter -->
    <div style="display:flex; align-items:center; justify-content:center; gap:16px; margin-bottom:32px;">
        <button id="prevMonth" style="background:#310d4d; color:#fff; border:none; border-radius:4px; padding:6px 18px; font-weight:bold;">&lt;</button>
        <span id="monthLabel" style="font-size:1.2em; font-weight:bold; color:#310d4d;">Ogos 2026</span>
        <button id="nextMonth" style="background:#310d4d; color:#fff; border:none; border-radius:4px; padding:6px 18px; font-weight:bold;">&gt;</button>
    </div>
    <!-- Charts -->
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
    // Month filter logic (basic demo)
    const months = ['Jan', 'Feb', 'Mac', 'Apr', 'Mei', 'Jun', 'Jul', 'Ogos', 'Sep', 'Okt', 'Nov', 'Dis'];
    let currentMonth = 7; // Ogos
    let currentYear = 2026;
    function updateMonthLabel() {
        document.getElementById('monthLabel').textContent = months[currentMonth] + ' ' + currentYear;
    }
    document.getElementById('prevMonth').onclick = function() {
        currentMonth--;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }
        updateMonthLabel();
    };
    document.getElementById('nextMonth').onclick = function() {
        currentMonth++;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        updateMonthLabel();
    };
    updateMonthLabel();
    </script>
    <!-- Table -->
    <div style="margin-top:32px;">
        <h2>Senarai Rekod Kenderaan</h2>
        <table id="rekodKenderaanTable" style="width:100%; border-collapse:collapse; background:#fff; box-shadow:0 2px 8px rgba(0,0,0,0.07); margin-bottom:24px; cursor:pointer;">
            <thead style="background:#310d4d; color:#fff;">
                <tr>
                    <th style="padding:8px; border:1px solid #ddd; text-align:center;">Bil</th>
                    <th style="padding:8px; border:1px solid #ddd; text-align:center;">Tarikh</th>
                    <th style="padding:8px; border:1px solid #ddd; text-align:center;">Nama Pemandu</th>
                    <th style="padding:8px; border:1px solid #ddd; text-align:center;">No. IC</th>
                    <th style="padding:8px; border:1px solid #ddd; text-align:center;">No. Tel</th>
                    <th style="padding:8px; border:1px solid #ddd; text-align:center;">Jenis Kenderaan</th>
                    <th style="padding:8px; border:1px solid #ddd; text-align:center;">No. Plat</th>
                    <th style="padding:8px; border:1px solid #ddd; text-align:center;">Bacaan Awal Odometer</th>
                    <th style="padding:8px; border:1px solid #ddd; text-align:center;">Bacaan Akhir Odometer</th>
                    <th style="padding:8px; border:1px solid #ddd; text-align:center;">Jumlah Jarak Dilalui</th>
                    <th style="padding:8px; border:1px solid #ddd; text-align:center;">Masa Mula</th>
                    <th style="padding:8px; border:1px solid #ddd; text-align:center;">Masa Tamat</th>
                    <th style="padding:8px; border:1px solid #ddd; text-align:center;">Tempoh Masa Penggunaan</th>
                </tr>
            </thead>
            <tbody>
                <tr class="clickable-row">
                    <td style="padding:8px; border:1px solid #ddd; text-align:center;">1</td>
                    <td style="padding:8px; border:1px solid #ddd; text-align:center;">2026-08-01</td>
                    <td style="padding:8px; border:1px solid #ddd; text-align:center;">Ahmad Bin Ali</td>
                    <td style="padding:8px; border:1px solid #ddd; text-align:center;">900101-01-1234</td>
                    <td style="padding:8px; border:1px solid #ddd; text-align:center;">012-3456789</td>
                    <td style="padding:8px; border:1px solid #ddd; text-align:center;">Bas</td>
                    <td style="padding:8px; border:1px solid #ddd; text-align:center;">TBA1234</td>
                    <td style="padding:8px; border:1px solid #ddd; text-align:center;">12000</td>
                    <td style="padding:8px; border:1px solid #ddd; text-align:center;">12120</td>
                    <td style="padding:8px; border:1px solid #ddd; text-align:center;">120</td>
                    <td style="padding:8px; border:1px solid #ddd; text-align:center;">08:00</td>
                    <td style="padding:8px; border:1px solid #ddd; text-align:center;">10:30</td>
                    <td style="padding:8px; border:1px solid #ddd; text-align:center;">2j 30m</td>
                </tr>
            </tbody>
        </table>
        <!-- Map Modal -->
        <div id="mapModalKenderaan" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.3); justify-content:center; align-items:center; z-index:999;">
            <div style="background:#fff; padding:24px; border-radius:8px; min-width:350px; min-height:350px; box-shadow:0 2px 16px rgba(0,0,0,0.15); position:relative; display:flex; flex-direction:column; align-items:center;">
                <button id="closeMapModalKenderaan" style="position:absolute; top:12px; right:12px; background:none; border:none; font-size:1.5em; color:#310d4d; cursor:pointer;">&times;</button>
                <h3 style="margin-bottom:18px;">Peta Perjalanan Kenderaan</h3>
                <div id="mapContainerKenderaan" style="width:300px; height:300px; border-radius:8px; border:1px solid #bbb;"></div>
            </div>
        </div>
        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
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
                document.getElementById('mapModalKenderaan').style.display = 'flex';
                setTimeout(function() {
                    if (window.leafletMapKenderaan) {
                        window.leafletMapKenderaan.invalidateSize();
                        return;
                    }
                    window.leafletMapKenderaan = L.map('mapContainerKenderaan').setView([5.4171, 103.0216], 13); // UMT default
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                        attribution: '© OpenStreetMap'
                    }).addTo(window.leafletMapKenderaan);
                    L.marker([5.4171, 103.0216]).addTo(window.leafletMapKenderaan)
                        .bindPopup('UMT').openPopup();
                }, 200);
            });
        });
        document.getElementById('closeMapModalKenderaan').onclick = function() {
            document.getElementById('mapModalKenderaan').style.display = 'none';
        };
        </script>
    </div>
<?= $this->endSection() ?>
