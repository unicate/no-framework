<?php
$data = ['head_title' => $this->tlt('login.head.title')];
$this->layout('templates/master', $data);
?>
<div class="content is-medium">
    <div class="box">
        <h3 class="title is-3">Register</h3>
        <?php if ($success === true): ?>
        <div class="message is-success">
            <div class="message-body">
                Registration successful.
            </div>
        </div>
        <a href="en/demo/login" class="button is-info">Login</a>
    </div>
    <?php endif ?>
    <?php if ($success === false): ?>
        <div class="message is-danger">
            <div class="message-body">
                Registration failed. Try again.
            </div>
        </div>
    <?php endif ?>

    <?php if (!$success): ?>

        <form method="post" enctype="application/x-www-form-urlencoded">
            <div class="field">
                <p class="control">
                    <input class="input" name="name" type="text" placeholder="Name" required>
                </p>
            </div>
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
                        Register
                    </button>
                </p>
            </div>
        </form>
    <?php endif ?>

</div>
</div>

