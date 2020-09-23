<h1>Nous joindre</h1>

<section>
    <div id="map"></div>
    <div id="infos">
        <h2>Église Ste-Cécile</h2>
        <div id="address">
            <p>550 rue Des Commissaires</p>
            <p>Trois-Rivières, Québec</p>
            <p>G9A 0C3</p>
        </div>
        <div id="contact">
            <div>
                <i class="fas fa-phone"></i>
                <span>(819) 840-2950</span>
            </div>
            <div>
                <i class="fas fa-envelope"></i>
                <span>coordo.trampoline.intercite@gmail.com</span>
            </div>
        </div>
    </div>
    <hr>
    <p>Bien noter, l'entrée est située sur la rue St-Paul</p>
</section>

<section>
    <h2>Questions ou commentaires..</h2>
    <?php include "includes/forms/sendmail.php";?>
</section>

<script>
function initMap() {
    var location = {
        lat: -25.344,
        lng: 131.036
    };
    var map = new google.maps.Map(document.getElementById("map"), {
        zoom: 4,
        center: location
    });
    var marker = new google.maps.Marker({
        position: location,
        map: map
    });
}
</script>
<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxAuGuuQzYm2BvdIs6uFmXK-RoC6hlHSI&callback=initMap"></script>