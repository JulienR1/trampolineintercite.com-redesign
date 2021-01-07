</main>

<div id="topArrow">
    <i class=" fas fa-angle-up"></i>
</div>

<footer>
    <section id="quick-links">
        <a href='href="https://app.sportnroll.com/#/registration/21ef84af-f7c1-4f3e-a182-729a8ca963f8"'>S'inscrire en ligne</a>
        <a href="#">Soutenir le club</a>
        <a href="#">Notre plan de relance</a>
    </section>

    <?php echo Navigation::includeNav(); ?>

    <section id="partners">
        <p class="lato medium">Nos partenaires</p>
        <?php echo static::GetPartnersHtml(); ?>
    </section>

    <p id="copy">
        &copy Trampoline Intercité 2020<?php echo (date("Y") > 2020) ? '-' . date("Y") : ""; ?> <span class="small-screen-br">|</span> Conception <a href="https://jrousseau.ca/">Julien Rousseau</a>
    </p>
</footer>

<script src="/js/body/bodyResize.js"></script>
<script src="/js/header/header.js"></script>
<script src="/js/smoothScroll.js"></script>

<?php
foreach (static::$info->jsFiles as $file) {
    echo '<script src="/js/' . $file . '"></script>';
}
?>

</body>

</html>