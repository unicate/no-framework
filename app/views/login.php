<?php
$data = ['head_title'=> $this->tlt('login.head.title')];
$this->layout('templates/master', $data);
?>
<div>
    <h1><?= $this->tlt('login.title') ?></h1>
    <p><?= $this->tlt('login.text') ?></p>
</div>
