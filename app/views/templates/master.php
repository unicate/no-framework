<!doctype html>
<html lang="<?= $this->tlt('html.lang') ?>">
<head>
    <title><?= $this->e($head_title) ?></title>
    <meta charset="utf-8">
    <meta name="robots" content="index, follow"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <base href="<?= $this->e(rtrim($basePath, '/') . '/') ?>"/>
    <link rel="author" href="humans.txt">
    <link rel="icon" href="favicon.ico">
    <link rel="canonical" href="">
    <link rel="alternate" href="" hreflang="de">
    <link rel="alternate" href="" hreflang="en">
    <link rel="alternate" href="" hreflang="x-default">
    <link rel="stylesheet" href="css/bulma.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>
<body>
<?php $this->insert('templates/hero', ['show_hero' => $show_hero]) ?>
<section class="section">
    <div class="container">
        <div class="columns">
            <div class="column is-3">
                <?php $this->insert('templates/aside') ?>
            </div>
            <div class="column is-9">
                <?= $this->section('content') ?>
            </div>
        </div>
    </div>
</section>
<?php $this->insert('templates/footer') ?>
</body>
</html>
