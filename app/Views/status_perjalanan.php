
<?= $this->extend('layout/BaseNoSidebar') ?>

<?= $this->section('title') ?>
Status Perjalanan
<?= $this->endSection() ?>

// ...existing code...

<?= $this->section('content') ?>
<main class="status-perjalanan-main" style="max-width:500px; margin:20px auto 0 auto; padding:10px; display:flex; flex-direction:column; align-items:center;">
    <h2 style="text-align:center; color:#310d4d; margin-bottom:32px;">Status Perjalanan Kenderaan</h2>
    <!-- Status Icons Row -->
    <div style="display:flex; justify-content:center; gap:48px; margin-bottom:32px;">
        <div style="text-align:center;">
            <!-- Menunggu Icon -->
            <svg id="icon-menunggu" width="40" height="40" viewBox="0 0 40 40"><circle cx="20" cy="20" r="18" stroke="#310d4d" stroke-width="2" fill="#fff"/><path d="M20 10 v10 l7 7" stroke="#28a745" stroke-width="3" fill="none"/></svg>
            <div style="margin-top:8px; font-size:1em;">Menunggu</div>
        </div>
        <div style="text-align:center;">
            <!-- Bergerak Icon -->
            <svg id="icon-bergerak" width="40" height="40" viewBox="0 0 40 40"><rect x="8" y="16" width="24" height="8" rx="4" fill="#bbb"/><polygon points="20,10 28,20 12,20" fill="#bbb"/><circle cx="14" cy="32" r="4" fill="#bbb"/><circle cx="26" cy="32" r="4" fill="#bbb"/></svg>
            <div style="margin-top:8px; font-size:1em;">Bergerak</div>
        </div>
        <div style="text-align:center;">
            <!-- Tiba Icon -->
            <svg id="icon-tiba" width="40" height="40" viewBox="0 0 40 40"><circle cx="20" cy="20" r="18" stroke="#bbb" stroke-width="2" fill="#fff"/><polyline points="12,20 18,26 28,14" stroke="#bbb" stroke-width="3" fill="none"/></svg>
            <div style="margin-top:8px; font-size:1em;">Tiba</div>
        </div>
    </div>
    <!-- Form Section -->
    <div style="display:flex; justify-content:center; width:100%;">
        <form id="statusForm" style="width:100%; max-width:370px;">
            <div style="margin-bottom:16px; display:flex; align-items:center; gap:8px;">
                <span style="display:inline-block; vertical-align:middle;">
                    <!-- Driver icon -->
                    <svg width="18" height="18" viewBox="0 0 18 18"><circle cx="9" cy="6" r="4" fill="#310d4d"/><rect x="3" y="12" width="12" height="4" rx="2" fill="#310d4d"/></svg>
                </span>
                <label style="min-width:120px;">Pemandu:</label>
                <select id="driver" style="flex:1;padding:6px;">
                    <option>Pilih</option>
                    <option>Ahmad Bin Ali</option>
                    <option>Fatimah Binti Abu</option>
                </select>
            </div>
            <div style="margin-bottom:16px; display:flex; align-items:center; gap:8px;">
                <span style="display:inline-block; vertical-align:middle;">
                    <!-- Vehicle icon -->
                    <svg width="18" height="18" viewBox="0 0 18 18"><rect x="2" y="7" width="14" height="6" rx="2" fill="#310d4d"/><rect x="5" y="3" width="8" height="4" rx="2" fill="#310d4d"/><circle cx="6" cy="15" r="2" fill="#310d4d"/><circle cx="12" cy="15" r="2" fill="#310d4d"/></svg>
                </span>
                <label style="min-width:120px;">Jenis Kenderaan:</label>
                <select id="vehicleType" style="flex:1;padding:6px;">
                    <option>Pilih</option>
                    <option>Bas</option>
                    <option>Van</option>
                    <option>MPV</option>
                </select>
            </div>
            <div style="margin-bottom:16px; display:flex; align-items:center; gap:8px;">
                <span style="display:inline-block; vertical-align:middle;">
                    <!-- Plate icon -->
                    <svg width="18" height="18" viewBox="0 0 18 18"><rect x="3" y="7" width="12" height="4" rx="2" fill="#310d4d"/></svg>
                </span>
                <label style="min-width:120px;">Plate Number:</label>
                <select id="plateNumber" style="flex:1;padding:6px;">
                    <option>Pilih</option>
                    <option>TBA1234</option>
                    <option>VAN5678</option>
                    <option>MPV9101</option>
                </select>
            </div>
            <div style="margin-bottom:16px; display:flex; align-items:center; gap:8px;">
                <span style="display:inline-block; vertical-align:middle;">
                    <!-- Odometer icon -->
                    <svg width="18" height="18" viewBox="0 0 18 18"><circle cx="9" cy="9" r="7" stroke="#310d4d" stroke-width="2" fill="#fff"/><rect x="8" y="4" width="2" height="6" fill="#310d4d"/></svg>
                </span>
                <label style="min-width:120px;">Bacaan Mula Odometer:</label>
                <input type="number" id="odometerStart" style="flex:1;padding:6px;">
            </div>
            <div style="margin-bottom:16px; display:none; align-items:center; gap:8px;" id="odometerEndSection">
                <span style="display:inline-block; vertical-align:middle;">
                    <!-- Odometer icon -->
                    <svg width="18" height="18" viewBox="0 0 18 18"><circle cx="9" cy="9" r="7" stroke="#310d4d" stroke-width="2" fill="#fff"/><rect x="8" y="4" width="2" height="6" fill="#310d4d"/></svg>
                </span>
                <label style="min-width:120px;">Bacaan Akhir Odometer:</label>
                <input type="number" id="odometerEnd" style="flex:1;padding:6px;">
            </div>


        </form>
    </div>
    <!-- Catatan/Aduan Button -->
    <div style="width:100%; display:flex; justify-content:center; margin-bottom:16px;">
        <button id="catatanBtn" type="button" style="width:100%; max-width:370px; padding:10px; background:#310d4d; color:#fff; border:none; border-radius:4px; font-weight:bold; font-size:1.1em;">Catatan / Aduan</button>
    </div>
    <!-- Mula Perjalanan Button -->
    <div style="width:100%; display:flex; justify-content:center; margin-top:8px;">
        <button id="startBtn" type="button" style="width:100%; max-width:370px; padding:10px; background:#28a745; color:#fff; border:none; border-radius:4px; font-weight:bold; font-size:1.1em;">Mula Perjalanan</button>
    </div>
    <!-- Catatan/Aduan Modal -->
    <div id="catatanModal" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.3); justify-content:center; align-items:center; z-index:999;">
        <div style="background:#fff; padding:24px; border-radius:8px; min-width:300px; box-shadow:0 2px 16px rgba(0,0,0,0.15); display:flex; flex-direction:column; align-items:center;">
            <h4 style="margin-bottom:12px;">Catatan / Aduan</h4>
            <textarea id="catatanText" style="width:100%;height:80px; margin-bottom:18px;"></textarea>
            <div style="width:100%; display:flex; gap:12px; justify-content:center;">
                <button type="button" id="catatanCancel" style="background:#bbb; color:#222; border:none; padding:8px 24px; border-radius:4px;">Batal</button>
                <button type="button" id="catatanSubmit" style="background:#310d4d; color:#fff; border:none; padding:8px 24px; border-radius:4px;">Simpan</button>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        let status = 1; // 1: Menunggu, 2: Bergerak, 3: Tiba
        const iconMenunggu = document.getElementById('icon-menunggu');
        const iconBergerak = document.getElementById('icon-bergerak');
        const iconTiba = document.getElementById('icon-tiba');
        const startBtn = document.getElementById('startBtn');
        const odometerEndSection = document.getElementById('odometerEndSection');
        // Catatan/Aduan modal elements
        const catatanBtn = document.getElementById('catatanBtn');
        const catatanModal = document.getElementById('catatanModal');
        const catatanCancel = document.getElementById('catatanCancel');
        const catatanSubmit = document.getElementById('catatanSubmit');

        function updateIcons() {
            // Menunggu
            iconMenunggu.querySelector('path').setAttribute('stroke', status === 1 ? '#28a745' : '#310d4d');
            // Bergerak
            iconBergerak.querySelector('rect').setAttribute('fill', status === 2 ? '#28a745' : '#bbb');
            iconBergerak.querySelector('polygon').setAttribute('fill', status === 2 ? '#28a745' : '#bbb');
            iconBergerak.querySelectorAll('circle').forEach(e => e.setAttribute('fill', status === 2 ? '#28a745' : '#bbb'));
            // Tiba
            iconTiba.querySelector('polyline').setAttribute('stroke', status === 3 ? '#28a745' : '#bbb');
            iconTiba.querySelector('circle').setAttribute('stroke', status === 3 ? '#28a745' : '#bbb');
        }

        function resetForm() {
            status = 1;
            updateIcons();
            startBtn.textContent = 'Mula Perjalanan';
            startBtn.style.background = '#28a745';
            odometerEndSection.style.display = 'none';
        }

        startBtn.onclick = function() {
            if (status === 1) {
                status = 2;
                updateIcons();
                odometerEndSection.style.display = 'flex';
                startBtn.textContent = 'Tamat Perjalanan';
                startBtn.style.background = '#dc3545';
            } else if (status === 2) {
                status = 3;
                updateIcons();
                startBtn.disabled = true;
                startBtn.textContent = 'Selesai';
                setTimeout(function() {
                    startBtn.disabled = false;
                    resetForm();
                }, 5000);
            }
        };

        // Catatan/Aduan modal logic
        catatanBtn.onclick = function() {
            catatanModal.style.display = 'flex';
            document.getElementById('catatanText').focus();
        };
        catatanCancel.onclick = function() {
            catatanModal.style.display = 'none';
        };
        catatanSubmit.onclick = function() {
            catatanModal.style.display = 'none';
            // You can add logic here to save the note/aduan if needed
        };

        // Initial state
        updateIcons();
        odometerEndSection.style.display = 'none';
    });
    </script>
</main>
<?= $this->endSection() ?>

