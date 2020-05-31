<?php if (isset($show_hero)): ?>
<section class="hero is-primary">
    <div class="hero-body">
        <div class="columns">
            <div class="column is-12">
                <div class="container content">
                    <h1 class="title is-size-1"><?= $this->tlt('hero.title') ?></h1>
                    <h3 class="subtitle">
                        <?= $this->tlt('hero.subtitle') ?>
                    </h3>
                    <a href="https://github.com/unicate" target="_blank"
                       class="button is-info is-medium">
                        <span class="icon">
                          <i class="fab fa-github"></i>
                        </span>
                        <span>Github</span>
                    </a>
                    <a href="https://packagist.org/packages/unicate/" target="_blank"
                       class="button is-info is-medium">
                        <span class="icon">
                          <i class="fas fa-box"></i>
                        </span>
                        <span>Packagist</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif ?>

<?php if (!$show_hero): ?>
    <section class="hero is-primary is-small">
        <div class="hero-body">
            <div class="columns">
                <div class="column is-12">
                    <div class="container content">
                        <span class="title">Nofw</span>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif ?>
