<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $this->renderSection('title') ?></title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
</head>
<body>
    <?= $this->include('template/header') ?>


    <div class="container">
        <?php if (service('router')->controllerName() !== 'App\\Controllers\\StatusPerjalanan'): ?>
            <?= $this->include('template/sidebar') ?>
        <?php endif; ?>
        <main>
            <?= $this->renderSection('content') ?>
        </main>
    </div>

    <?= $this->include('template/footer') ?>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var map = L.map('map').setView([5.407622192184934, 103.08825008160203], 13); // UMT new coordinate

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        L.marker([5.407622192184934, 103.08825008160203]).addTo(map)
            .bindPopup('UMT')
            .openPopup();
    });
</script>
</body>

</html>
