<?= $this->extend('master') ?>

<?= $this->section('css') ?>

    <link rel="stylesheet" href="<?php echo base_url('assets/css/fragment.css') ?>">

<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!--<div class="container-md pt-3 text-danger">-->
<!--    <h1>Estamos na aula 16 do Criando um site:
            <a href="https://www.youtube.com/watch?v=QnqBwzh7Dfg&list=PLyugqHiq-SKfh0oqqz69rkgHShrsXyoDl&index=15">Link</a>
        </h1>-->
<!--</div>-->
<!-- ======= Hero Slider Section ======= -->
<section id="hero-slider" class="hero-slider _bannerHome">

    <div class="tip"> <!-- Carregamento com webpack e include-fragment-element -->
        <include-fragment src="/banner/home">
            <p class="text-center">Loading banner…</p>
        </include-fragment>
    </div> <!-- Fim carregamento com webpack e include-fragment-element -->

</section><!-- End Hero Slider Section -->

<!-- ======= Post Grid Section ======= -->
<section id="posts" class="posts _recent">

    <!-- Carregamento com webpack e include-fragment-element -->
    <include-fragment src="/recent">
        <?php echo $this->include('_placeholders/_recent'); ?>
    </include-fragment>
    <!-- Fim carregamento com webpack e include-fragment-element-->

</section> <!-- End Post Grid Section -->

<!-- ======= Culture Category Section ======= -->
<section class="category-section _category_culture">

    <!-- Carregamento com webpack e include-fragment-element -->
    <include-fragment src="/category/partials/culture">
        <?php echo $this->include('_placeholders/_category'); ?>
    </include-fragment>
    <!-- Fim carregamento com webpack e include-fragment-element-->

</section><!-- End Culture Category Section -->

<!-- ======= Business Category Section ======= -->
<section class="category-section _category_business">

    <!-- Carregamento com webpack e include-fragment-element -->
    <include-fragment src="/category/partials/business">
        <?php echo $this->include('_placeholders/_category'); ?>
    </include-fragment>
    <!-- Fim carregamento com webpack e include-fragment-element-->

</section><!-- End Business Category Section -->

<!-- ======= Lifestyle Category Section ======= -->
<section class="category-section _category_lifestyle">

    <!-- Carregamento com webpack e include-fragment-element -->
    <include-fragment src="/category/partials/lifestyle">
        <?php echo $this->include('_placeholders/_category'); ?>
    </include-fragment>
    <!-- Fim carregamento com webpack e include-fragment-element-->

</section><!-- End Lifestyle Category Section -->

<?= $this->endSection() ?>
<?= $this->section('js') ?>

    <script type="module">
        import 'https://unpkg.com/@github/include-fragment-element'; // include-fragment-element SEM webpack
        import './assets/js/loadHomeData.js';
        // import './assets/js/build/fragment.js'; // include-fragment-element COM webpack
    </script>

<?= $this->endSection() ?>