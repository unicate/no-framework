<?php
$data = ['head_title' => $this->tlt('login.head.title')];
$this->layout('templates/master', $data);
?>
<div class="content is-medium">
    <h3 class="title is-3"><?= $this->tlt('login.title') ?></h3>

    <div class="box">
        <?php if ($success === true): ?>
            <div class="message is-success">
                <div class="message-body">
                    Login successful.
                </div>
            </div>
            <a class="button is-success">Continue</a>
        <?php endif ?>
        <?php if ($success === false): ?>
            <div class="message is-danger">
                <div class="message-body">
                    Login failed. Try again.
                </div>
            </div>
        <?php endif ?>

        <?php if (!$success): ?>
            <form method="post" enctype="application/x-www-form-urlencoded">
                <div class="field">
                    <p class="control">
                        <input class="input" name="email" type="email" placeholder="Email" required>
                    </p>
                </div>
                <div class="field">
                    <p class="control">
                        <input class="input" name="password" type="password" placeholder="Password" required>
                    </p>
                </div>
                <div class="field">
                    <p class="control">
                        <button class="button is-success" type="submit">
                            Login
                        </button>
                        <a href="en/demo/register" class="button is-info">Register</a>
                    </p>
                </div>
            </form>
        <?php endif ?>

    </div>
</div>

