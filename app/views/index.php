<?php
$data = ['head_title' => $this->tlt('index.head.title'), 'show_hero' => true];
$this->layout('templates/master', $data);
?>
<div id="about" class="content is-medium">

    <div class="box">
        <h3 class="title is-3">What is it?</h3>
        <article class="message is-info is-size-5">

            <div class="message-body">
                Call it <strong>"Glue"</strong> or call it <strong>"Boilerplate"</strong>. "No-Framework" aims to give
                you a head start
                for development with a simple and understandable foundation.
            </div>
        </article>
        <article class="message is-info is-size-5">

            <div class="message-body">
                "No-framework" is based on <strong>popular an proven packages</strong> which are easily exchangeable
                with other packages
                you like or already know.
            </div>
        </article>
        <p>
            Mainly the following packages are used: For dependency injection
            <a href="https://php-di.org" target="_blank">PHP-DI</a>,
            for Database access and queries <a href="https://medoo.in" target="_blank">Medoo</a>
            and for Templating <a href="https://thephpleague.com/plates" target="_blank">Plates</a>,
            and others... And very little self written code as "glue" in between.
        </p>
        <h3 class="title is-3">Why No-Framework?</h3>
        <article class="message is-info is-size-5">
            <div class="message-body">
                I want to have <strong>control</strong> and I want to <strong>understand</strong> what I'm doing.<br>
                I want to <strong>start small</strong> and <strong>extend</strong> if necessary.<br>
                I want to <strong>focus</strong> on the <strong>solution</strong>, not the framework.<br>
                I want to <strong>develop fast</strong> without reinventing the wheel.<br>
                I want to use <strong>interchangeable components</strong>.<br>
            </div>
        </article>
        <p>
            The basic answer to satisfy all these needs are <strong>packages</strong>. Packages as extendable,
            exchangeable
            components.
            With <a href="https://getcomposer.org/" target="_blank">Composer</a> and
            <a href="https://packagist.org/" target="_blank">Packagist</a> the PHP ecosystem offers a perfect solution
            for this.
        </p>

        <h3 class="title is-3">What it's not!</h3>
        <p>
            It's not another PHP framework. There are already great frameworks out there.
            Full-fledged like
            <a href="https://laravel.com/" target="_blank">Laravel</a> or
            <a href="https://symfony.com/" target="_blank">Synfony</a> and also Micro-Frameworks like
            <a href="http://www.slimframework.com/" target="_blank">Slim</a> and others.
        </p>
        <p>
            Using a framework offers some great advantages but has also a few drawbacks. In short that's the following:
        </p>
        <p>
            <strong>PROs:</strong> Fast Development, Security, Documentation, Maintenance and Community.
        </p>
        <p>
            <strong>CONs:</strong> Generic solution that might not suit your needs, limited control,
            time to learn and understand, overhead and slower execution.
        </p>
        <h3 class="title is-3">Disclaimer & License</h3>
        <article class="message is-danger is-size-5">
            <div class="message-body">
                This code should help you build your own solution. It's not mature and fully tested software.
                You use anything at your own risk. Have fun with it.
            </div>
        </article>
        No-Framework is released under
        the <a href="https://raw.githubusercontent.com/unicate/licenses/master/MIT/MIT-Licence.txt" target="_blank">MIT Licence</a>.

    </div>
</div>

<div id="start" class="content is-medium">
    <div class="box">
        <h3 class="title is-3">Getting Started</h3>
        <p>
            Use GIT or Composer to download the code and play around with the Demo application.
        </p>
        <pre><code class="language-javascript">git clone https://github.com/unicate/no-framework.git</code></pre>
        <p>
            For more information see the <a href="https://github.com/unicate/no-framework/blob/master/README.md">Readme</a> on Github.
        </p>
        <article class="message is-info is-size-5">
            <div class="message-body">
                Now go and build something and <strong>make people happy</strong>!
            </div>
        </article>
    </div>
</div>
