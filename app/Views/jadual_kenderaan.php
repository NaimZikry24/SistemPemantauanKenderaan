<?php
// Jadual Kenderaan page
?>
<?= $this->extend('layout/Base') ?>

<?= $this->section('title') ?>
Jadual
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div style="background:#310d4d; color:#fff; border-radius:6px; padding:12px 18px; font-size:1.2em; font-weight:bold; margin-bottom:18px; text-align:center;">Jadual</div>

    <div style="display:flex; gap:24px; justify-content:center; align-items:flex-start; margin-bottom:32px;">
        <div class="info-box" style="flex:1; min-width:180px;">
            <div>Jumlah Tempahan</div>
            <div class="info-number">24</div>
        </div>
        <div class="info-box" style="flex:1; min-width:220px; display:flex; flex-direction:column; align-items:center; justify-content:center;">
            <div>Kalendar</div>
            <div style="margin-top:10px; background:#fff; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.07); padding:12px 16px; border:1px solid #310d4d; width:180px;">
                <div style="text-align:center; font-weight:bold; color:#310d4d; margin-bottom:8px;">Ogos 2025</div>
                <table style="width:100%; border-collapse:collapse; font-size:0.95em;">
                    <thead>
                        <tr style="color:#310d4d;">
                            <th>Isn</th><th>Sel</th><th>Rab</th><th>Kha</th><th>Jum</th><th>Sab</th><th>Aha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td></td><td></td><td></td><td></td><td>1</td><td>2</td><td>3</td></tr>
                        <tr><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td></tr>
                        <tr><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td></tr>
                        <tr><td>18</td><td>19</td><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td></tr>
                        <tr><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div style="background:#fff; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.07); padding:24px; max-width:500px; margin:0 auto 32px auto; text-align:center; border:2px solid #310d4d;">
        <h3 style="margin-bottom:18px; text-align:center;">Tempahan Perjalanan</h3>
        <canvas id="bookingBarChart" width="400" height="80" style="display:block; margin:0 auto;"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    const ctxBooking = document.getElementById('bookingBarChart').getContext('2d');
    const bookingBarChart = new Chart(ctxBooking, {
        type: 'bar',
        data: {
            labels: ['1-7', '8-14', '15-21', '22-28', '29-31'],
            datasets: [{
                label: 'Tempahan',
                data: [5, 8, 6, 3, 2],
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

    <div style="background:#310d4d; color:#fff; border-radius:6px; padding:12px 18px; font-size:1.2em; font-weight:bold; margin-bottom:18px; text-align:center; margin-top:40px;">Perjalanan Akan Datang</div>
    <table id="upcomingTable" style="width:100%; border-collapse:collapse; background:#fff; box-shadow:0 2px 8px rgba(0,0,0,0.07); margin-bottom:24px; cursor:pointer;">
        <thead style="background:#310d4d; color:#fff;">
            <tr>
                <th style="padding:8px; border:1px solid #ddd; text-align:center;">Bil</th>
                <th style="padding:8px; border:1px solid #ddd; text-align:center;">Tarikh</th>
                <th style="padding:8px; border:1px solid #ddd; text-align:center;">Masa</th>
                <th style="padding:8px; border:1px solid #ddd; text-align:center;">Jenis Kenderaan</th>
                <th style="padding:8px; border:1px solid #ddd; text-align:center;">No Plate</th>
                <th style="padding:8px; border:1px solid #ddd; text-align:center;">Pemandu</th>
                <th style="padding:8px; border:1px solid #ddd; text-align:center;">Destinasi</th>
                <th style="padding:8px; border:1px solid #ddd; text-align:center;">Catatan</th>
            </tr>
        </thead>
        <tbody>
            <tr class="clickable-row">
                <td style="padding:8px; border:1px solid #ddd; text-align:center;">1</td>
                <td style="padding:8px; border:1px solid #ddd; text-align:center;">2025-08-10</td>
                <td style="padding:8px; border:1px solid #ddd; text-align:center;">08:00</td>
                <td style="padding:8px; border:1px solid #ddd; text-align:center;">Bas</td>
                <td style="padding:8px; border:1px solid #ddd; text-align:center;">TBA1234</td>
                <td style="padding:8px; border:1px solid #ddd; text-align:center;">Ahmad Bin Ali</td>
                <td style="padding:8px; border:1px solid #ddd; text-align:center;">UMT - Kuala Terengganu</td>
                <td style="padding:8px; border:1px solid #ddd; text-align:center;">Lawatan Rasmi</td>
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
            alert('Baris perjalanan dipilih!');
        });
    });
    </script>
<?= $this->endSection() ?>
