<aside class="sidebar">
    <div style="text-align:center; margin-bottom:28px;">
        <img src="<?= base_url('images/UMT.png') ?>" alt="UMT Logo" style="height:90px; margin:40px 0 12px 0; padding:0;">
        <div style="font-size:1.05em; color:#310d4d; font-weight:bold; margin-bottom:20px;">Sistem Pemantauan Kenderaan</div>
    </div>
    <ul>
        <li><a href="<?= base_url('/') ?>">
            <span style="margin-right:8px; vertical-align:middle;">
                <!-- Home icon -->
                <svg width="18" height="18" fill="none" stroke="black" stroke-width="2" viewBox="0 0 24 24"><path d="M3 12L12 3l9 9"/><path d="M9 21V12h6v9"/></svg>
            </span>Utama</a></li>
        <li><a href="<?= base_url('maklumat-kenderaan') ?>">
            <span style="margin-right:8px; vertical-align:middle;">
                <!-- Car icon -->
                <svg width="18" height="18" fill="none" stroke="black" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="5"/><circle cx="7" cy="16" r="2"/><circle cx="17" cy="16" r="2"/><path d="M5 11V7h14v4"/></svg>
            </span>Kenderaan</a></li>
        <li><a href="<?= base_url('maklumat-pemandu') ?>">
            <span style="margin-right:8px; vertical-align:middle;">
                <!-- SVG icon for pemandu (user/driver) -->
                <svg width="18" height="18" fill="none" stroke="black" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 8-4 8-4s8 0 8 4"/></svg>
            </span>Pemandu</a></li>
        <li><a href="<?= base_url('jadual-kenderaan') ?>">
            <span style="margin-right:8px; vertical-align:middle;">
                <!-- Calendar icon -->
                <svg width="18" height="18" fill="none" stroke="black" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="16"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="8" y1="13" x2="8" y2="13"/><line x1="12" y1="13" x2="12" y2="13"/><line x1="16" y1="13" x2="16" y2="13"/></svg>
            </span>Jadual</a></li>
        <li><a href="#">
            <span style="margin-right:8px; vertical-align:middle;">
                <!-- Logout icon -->
                <svg width="18" height="18" fill="none" stroke="black" stroke-width="2" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
            </span>Log Keluar</a></li>
    </ul>
</aside>