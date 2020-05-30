<?php
$data = ['head_title' => $this->tlt('login.head.title')];
$this->layout('templates/master', $data);
?>
<div class="content is-medium">
    <h3 class="title is-3"><?= $this->tlt('login.title') ?></h3>

    <div class="box">
        <p>
            <?= $this->tlt('login.text') ?>
        </p>
        <div class="field">
            <p class="control">
                <input class="input" type="email" placeholder="Email">
            </p>
        </div>
        <div class="field">
            <p class="control">
                <input class="input" type="password" placeholder="Password">
            </p>
        </div>
        <div class="field">
            <p class="control">
                <button class="button is-success">
                    Login
                </button>
            </p>
        </div>
    </div>
</div>

