<?php
$data = ['head_title'=> $this->tlt('logout.head.title')];
$this->layout('templates/master', $data);
?>
<div class="header">
    <h1><?= $this->tlt('logout.title') ?></h1>
    <h2><?= $this->tlt('logout.text') ?></h2>
</div>
<div class="content">
    <h2 class="content-subhead"><?= $this->tlt('logout.text') ?></h2>
    <p>
        <?= $this->tlt('logout.text') ?>
    </p>
</div>