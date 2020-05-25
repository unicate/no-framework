<?php
$data = ['head_title'=> $this->tlt('logout.head.title')];
$this->layout('templates/master', $data);
?>
<div>
    <h1><?= $this->tlt('logout.title') ?></h1>
    <p><?= $this->tlt('logout.text') ?></p>
</div>
