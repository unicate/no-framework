<!doctype html>
<html lang="<?= $this->tlt('html.lang') ?>">
<head>
    <title><?= $this->e($title) ?></title>
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

</head>

<body>

<?= $this->section('content') ?>

<p>
    <a href="<?= $this->e($basePath) ?>">Back</a>
</p>

</body>
</html>
