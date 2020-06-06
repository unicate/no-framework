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
        <pre><code class="language-javascript">composer ...</code></pre>
        <pre><code class="language-javascript">git clone ...</code></pre>


        <p>
            The "Task List" Demo is a simple example application. Download the code and see what happens.
        </p>
        <p>To help you understand, a view hints and principles:</p>
        <ul>
            <li>The architecture is based on the <a
                        href="https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller"
                        target="_blank">MVC</a> pattern.
            </li>
            <li>Objects are only created by the Dependency Injection container and configured in <code>app/config/dependencies.php</code>
            </li>
            <li>All environment dependent configuration is done in <code>app/config/.env</code>.</li>
            <li>Routes are defined in <code>app/config/routes.php</code>.</li>
            <li>If you want to change file paths, use <code>app/core/constants.php</code>.</li>
            <li>Your controller should extend <code>AbstractController</code> class.</li>
            <li>Only CSS and JS files should be located in the public directory.</li>
            <li>If you like to exchange a basic component, have a look at <code>app/config/dependencies.php</code> and
                the
                service classes in
                <code>app/services</code>.
            </li>
        </ul>

        Folder structure is pretty self explaining:
        <pre><code class="">|-- app
|  |-- core
|  |-- config
|  |-- middlewares
|  |-- utils
|  |-- models
|  |-- logs
|  |-- controllers
|  |-- views
|  |  |-- templates
|  |-- services
|-- public
|  |-- css
|  |-- js
|-- db
|-- vendor
</code></pre>
        <article class="message is-info is-size-5">
            <div class="message-body">
                Now go and build something and <strong>make people happy</strong>!
            </div>
        </article>
    </div>
</div>
