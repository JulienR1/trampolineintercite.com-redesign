<section id="recreative_hash">
    <h2 class="lato medium">Secteur récréatif</h2>
    <hr>
    <p class="lato thin">Noter qu'une affiliation de <?php echo number_format((float) static::$affiliationCost, 2, '.', ''); ?>$ est obligatoire pour tous</p>
    <div class="activities">
        <?php echo static::GetRecreativeActivitiesHtml(); ?>
    </div>
</section>

<section id="parties_hash">
    <h2 class="lato medium">Fête d'enfants</h2>
    <hr>
    <div class="activities">
        <div class="activity bg-shadow">
            <div class="img-container">
                <img src="/assets/img/chrome.png">
            </div>
            <div class="data-container">
                <h4 class="lato bold">Fête d'enfants</h4>
                <div class="desc">
                    <p class="lato thin">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rerum, corrupti.</p>
                    <p class="lato thin">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt quos, cum incidunt ea enim provident ab soluta consequatur exercitationem mollitia impedit fuga?
                        Sint consequatur vel velit quas sapiente asperiores ut maiores perspiciatis sequi iusto repellendus enim mollitia magni, expedita quidem!</p>
                </div>
                <a id="affiliation-document" class="lato medium bg-shadow" href="">Compléter à l'avance</a>
                <div id="day-affiliation">
                    <i class="fas fa-exclamation"></i>
                    <span class="lato thin">Affiliation journalière: 4.00$ par personne</span>
                </div>
                <div class="stats">
                    <div class="cost">
                        <i class="fas fa-dollar-sign"></i>
                        <span class="lato thin">50.00$/h par trampoline</span>
                    </div>
                    <div class="cost2">
                        <i class="fas fa-dollar-sign"></i>
                        <span class="lato thin">20.00$ pour la salle</span>
                    </div>
                    <div class="time">
                        <i class="far fa-clock"></i>
                        <span class="lato thin">1h00 minimum</span>
                    </div>
                </div>
                <div id="contact-form">
                    <span class="lato medium">Pour toutes demandes..</span>
                    <?php require "includes/forms/sendmail.php";?>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="competitive_hash">
    <h2 class="lato medium">Secteur compétitif</h2>
    <hr>
    <div class="activities">
        <?php echo static::GetCompetitiveActivitiesHtml(); ?>
    </div>

</section>