<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $this->renderSection('title') ?></title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <?= $this->include('template/header') ?>

    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <?= $this->include('template/footer') ?>
</body>
</html>
