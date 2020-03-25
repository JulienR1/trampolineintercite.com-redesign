<header onclick="onHeaderClick(event)">
    <nav>
        <div class="hide-on-pc">
            <a href="/" id="logo">
                <img src="/Assets/img/logo.png">
            </a>
            <div id="hamburger" onclick="toggleSideMenu(event)"><div id="hamburger_button"></div></div>
        </div>        

        <?php
            if (!function_exists("createNavigation")){require "php/nav/navigationGenerator.php";}
            createNavigation(); 
        ?>
    </nav>
</header>