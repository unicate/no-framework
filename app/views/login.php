<?php
$data = ['head_title' => $this->tlt('login.head.title')];
$this->layout('templates/master', $data);
?>
<div class="header">
    <h1><?= $this->tlt('login.title') ?></h1>
    <h2><?= $this->tlt('login.text') ?></h2>
</div>
<div class="content">

    <h2 class="content-subhead">Lorem What</h2>
    <p>
        To use this layout, you can just copy paste the HTML, along with the CSS in <a
                href="/layouts/side-menu/styles.css" alt="Side Menu CSS">side-menu.css</a>, and the JavaScript in <a
                href="/js/ui.js">ui.js</a>. The JS file uses vanilla JavaScript to simply toggle an <code>active</code>
        class that makes the menu responsive.
    </p>
    <form class="pure-form pure-form-stacked">
        <fieldset>
            <div class="pure-control-group">
                <label for="aligned-name">Username</label>
                <input type="text" id="aligned-name" placeholder="Username"/>
            </div>
            <div class="pure-control-group">
                <label for="aligned-password">Password</label>
                <input type="password" id="aligned-password" placeholder="Password"/>
            </div>
            <div class="pure-controls">
                <button type="submit" class="pure-button pure-button-primary">Submit</button>
            </div>
        </fieldset>
    </form>

    <div class="pure-g">
        <div class="pure-u-1-3"><p>dsfasd</p></div>
        <div class="pure-u-1-3">
            <div class="pure-g">
                <div class="pure-u-1-2"><p>hal</p></div>
                <div class="pure-u-1-2"><p>half</p></div>
            </div>
        </div>
        <div class="pure-u-1-3"><p>Thirds</p></div>
    </div>


</div>