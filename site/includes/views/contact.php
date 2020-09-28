<h1 class="lato normal">Nous joindre</h1>
<hr>

<section>
    <div id="map"><p class="lato thin">Impossible de charger la carte</p></div>
    <div id="infos">
        <h2 class="lato normal">Église Ste-Cécile</h2>
        <div id="address">
            <p class="lato light">550 rue Des Commissaires</p>
            <p class="lato light">Trois-Rivières, Québec</p>
            <p class="lato light">G9A 0C3</p>
        </div>
        <div id="contact">
            <div>
                <i class="fas fa-phone"></i>
                <span class="lato light">(819) 840-2950</span>
            </div>
            <div>
                <i class="fas fa-envelope"></i>
                <span class="lato light">coordo.trampoline.intercite@gmail.com</span>
            </div>
        </div>
        <hr>
    <p class="lato light">Bien noter, l'entrée est située sur la rue St-Paul.</p>
    </div>    
</section>

<section id="mail">
    <h2 class="lato normal">Questions ou commentaires..</h2>
    <?php include "includes/forms/sendmail.php";?>
</section>

<script>
function initMap() {
    var location = {
        lat: 46.3487093,
        lng: -72.5383948
    };
    var map = new google.maps.Map(document.getElementById("map"), {
        zoom: 17,
        center: location
    });
}
</script>
<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxAuGuuQzYm2BvdIs6uFmXK-RoC6hlHSI&callback=initMap"></script>