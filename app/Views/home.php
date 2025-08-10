<?= $this->extend('layout/Base') ?>

<?= $this->section('title') ?>
Home Page
<?= $this->endSection() ?>

<?= $this->section('content') ?>



<div class="info-row">
    <div class="info-box">
        <div>Jumlah Bas Aktif</div>
        <div class="info-number">12</div>
    </div>
    <div class="info-box">
        <div>Jumlah Laluan</div>
        <div class="info-number">5</div>
    </div>
    <div class="info-box">
        <div>Jumlah Pemandu</div>
        <div class="info-number">8</div>
    </div>
    <div class="info-box">
        <div>Jumlah Trip Hari Ini</div>
        <div class="info-number">20</div>
    </div>
    <div class="info-box time-box">
        <div id="current-time" style="font-size:2rem;"></div>
        <div id="current-day" style="font-size:0.9rem; margin-top:2px;"></div>
        <div id="current-date" style="font-size:0.85rem; color:#e3e3e3;"></div>
    </div>
</div>

<script>
function updateTime() {
    const now = new Date();
    const h = String(now.getHours()).padStart(2, '0');
    const m = String(now.getMinutes()).padStart(2, '0');
    const s = String(now.getSeconds()).padStart(2, '0');
    document.getElementById('current-time').textContent = `${h}:${m}:${s}`;
    const daysMY = ['Ahad','Isnin','Selasa','Rabu','Khamis','Jumaat','Sabtu'];
    const day = daysMY[now.getDay()];
    const date = now.toLocaleDateString('ms-MY', { day: 'numeric', month: 'long', year: 'numeric' });
    document.getElementById('current-day').textContent = day;
    document.getElementById('current-date').textContent = date;
}
setInterval(updateTime, 1000);
updateTime();
</script>


<div id="map"></div>

<div style="margin-top:32px;">
    <table style="width:100%; border-collapse:collapse; background:#fff; box-shadow:0 2px 8px rgba(0,0,0,0.07);">
        <thead style="background:#310d4d; color:#fff;">
            <tr>
                <th style="padding:8px; border:1px solid #ddd;">Bil</th>
                <th style="padding:8px; border:1px solid #ddd;">Nombor Plat</th>
                <th style="padding:8px; border:1px solid #ddd;">Pemandu</th>
                <th style="padding:8px; border:1px solid #ddd;">No. Telefon</th>
                <th style="padding:8px; border:1px solid #ddd;">Jenis Kenderaan</th>
                <th style="padding:8px; border:1px solid #ddd;">Kemaskini Terakhir</th>
                <th style="padding:8px; border:1px solid #ddd;">Koordinat</th>
                <th style="padding:8px; border:1px solid #ddd;">Aduan/Tindakan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding:8px; border:1px solid #ddd;">1</td>
                <td style="padding:8px; border:1px solid #ddd;">TBA1234</td>
                <td style="padding:8px; border:1px solid #ddd;">Ali Bin Abu</td>
                <td style="padding:8px; border:1px solid #ddd;">012-3456789</td>
                <td style="padding:8px; border:1px solid #ddd;">Bas</td>
                <td style="padding:8px; border:1px solid #ddd;">2025-08-07 14:30</td>
                <td style="padding:8px; border:1px solid #ddd;">5.4076, 103.0882</td>
                <td style="padding:8px; border:1px solid #ddd;">Tiada</td>
            </tr>
            <!-- Add more rows as needed -->
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
