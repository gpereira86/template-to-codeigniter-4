<?= $this->extend('master') ?>


<?= $this->section('content') ?>
<!--<div class="container-md pt-3 text-danger">-->
<!--    <h1>Estamos na aula 20 do Criando um site com codeigniter 4:
            <a href="https://www.youtube.com/watch?v=xzaei6MTiAw&list=PLyugqHiq-SKfh0oqqz69rkgHShrsXyoDl&index=19">Link</a>
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

    <script type="module" src="./assets/js/loadHomeData.js"></script>

<?= $this->endSection() ?>