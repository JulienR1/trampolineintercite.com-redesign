<?php echo '<header onclick="onHeaderClick(event)">
    <nav>
    
        <div class="hide-on-pc">
            <a href="/" id="logo">
                <img src="/Assets/img/logo.png">
            </a>
            <div id="hamburger" onclick="toggleSideMenu(event)"><div id="hamburger_button"></div></div>
        </div>        

        <ul id="main_list">
            <li class="dropdown" onclick="onHeaderListItemClick(event)">
                <a href="#">À propos</a>
                <button class="hide-on-pc" onclick="toggleHeaderMenu(event, 0)"><i class="fas fa-chevron-down"></i></button>
                <ul>
                    <li><a href="#">Règlements</a></li>
                    <li><a href="#">Actualités</a></li>
                    <li><a href="#">Annonces</a></li>
                </ul>
            </li>
            <li class="dropdown" onclick="onHeaderListItemClick(event)">
                <a href="#">Activités</a>
                <button class="hide-on-pc" onclick="toggleHeaderMenu(event, 1)"><i class="fas fa-chevron-down"></i></button>
                <ul>
                    <li><a href="#">Récréatif</a></li>
                    <li><a href="#">Fêtes d\'enfants</a></li>
                    <li><a href="#">Compétitif</a></li>
                    <li><a href="#">Comment s\'inscrire</a></li>
                </ul>
            </li>
            <li class="hide-on-cell"><a href="/" id="logo"><img src="/Assets/img/logo.png"></a></li>
            <li class="dropdown"><a href="#">Horaire</a></li>
            <li class="dropdown"><a href="#">Contact</a></li>
        </ul>
    </nav>
</header>';
?>