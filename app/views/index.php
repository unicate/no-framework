<?php
$data = ['head_title' => $this->tlt('index.head.title'), 'show_hero' => true];
$this->layout('templates/master', $data);
?>
<div id="about" class="content is-medium">
    <h3 class="title is-3">About No-Framework</h3>
    <div class="box">
        <h4 id="const" class="title is-3">const</h4>
        <article class="message is-primary">
                  <span class="icon has-text-primary">
                  <i class="fab fa-js"></i>
                  </span>
            <div class="message-body">
                Block-scoped. Cannot be re-assigned. Not immutable.
            </div>
        </article>
        <pre><code class="language-javascript">const test = 'test';</code></pre>
    </div>


</div>

<div id="start" class="content is-medium">
    <h3 class="title is-3">Getting Started</h3>
    <div class="box">
        <h4 id="const" class="title is-3">Installation</h4>
        <article class="message is-primary">
                  <span class="icon has-text-primary">
                  <i class="fab fa-js"></i>
                  </span>
            <div class="message-body">
                Block-scoped. Cannot be re-assigned. Not immutable.
            </div>
        </article>
        <pre><code class="language-javascript">composer ...</code></pre>
        <pre><code class="language-javascript">git clone ...</code></pre>
    </div>
    <div class="box">
        <h4 id="let" class="title is-3">let</h4>
        <article class="message is-primary">
                <span class="icon has-text-primary">
                  <i class="fas fa-info-circle"></i>
                </span>
            <div class="message-body">
                Block-scoped. Can be re-assigned.
            </div>
        </article>
        <pre><code class="language-javascript">let i = 0;</code></pre>
    </div>

</div>
<div id="faq" class="content is-medium">
    <h3 class="title is-3">FAQ</h3>
    <div class="box">
        <article class="message is-info">
            <div class="message-header">
                Some good question....
            </div>
            <div class="message-body">
                Answer...
            </div>
        </article>
    </div>
    <div class="box">
        <article class="message is-info">
            <div class="message-header">
                Another good question....
            </div>
            <div class="message-body">
                Another answer...
            </div>
        </article>
    </div>


</div>