<footer>
    <div id="main-section">
        <div id="cta">
            <ul>
                <li><a href="#">S'inscrire en ligne</a></li>
                <li><a href="https://www.gofundme.com/f/prosperite-de-trampoline-intercite">Faire un don</a></li>
            </ul>
        </div>
        <hr>
        <nav>
            <?php
                if (!function_exists("createNavigation")){require "php/nav/navigationGenerator.php";}
                createNavigation(); 
            ?>
        </nav>
        <hr>
        <div id="partners">
            <h4>Nos parternaires</h4>
            <ul id="partner-list">
                <li><div class="wrapper"><img src="/Assets/img/partners/v3r.png"></div></li>
            </ul>
        </div>
    </div>
    <div id="copyright-section">
        <p>&copy; Trampoline Intercité 2019 - <?php echo date("Y"); ?></p>
        <p> | </p>
        <p>Conception <a href="http://jrousseau.ca/">Julien Rousseau</a></p>
    </div>
</footer>
<script> </script>