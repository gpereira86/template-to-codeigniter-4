<?= $this->extend('master') ?>

<?= $this->section('css') ?>

    <link rel="stylesheet" href="<?php echo base_url('assets/css/fragment.css') ?>">

<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!--<div class="container-md pt-3 text-danger">-->
<!--    <h1>Estamos na aula 51: <a href="https://www.youtube.com/watch?v=I5tb3dp2-tY&list=PLyugqHiq-SKegiaCBJ4XaFp-yr87oFKts&index=51">Link</a></h1>-->
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
    <include-fragment src="/category/culture">
        <?php echo $this->include('_placeholders/_category'); ?>
    </include-fragment>
    <!-- Fim carregamento com webpack e include-fragment-element-->

</section><!-- End Culture Category Section -->

<!-- ======= Business Category Section ======= -->
<section class="category-section _category_business">

    <!-- Carregamento com webpack e include-fragment-element -->
    <include-fragment src="/category/business">
        <?php echo $this->include('_placeholders/_category'); ?>
    </include-fragment>
    <!-- Fim carregamento com webpack e include-fragment-element-->

</section><!-- End Business Category Section -->

<!-- ======= Lifestyle Category Section ======= -->
<section class="category-section _category_lifestyle">

    <!-- Carregamento com webpack e include-fragment-element -->
    <include-fragment src="/category/lifestyle">
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