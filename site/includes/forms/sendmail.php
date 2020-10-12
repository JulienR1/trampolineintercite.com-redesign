<form action="/scripts/exe_sendmail.php" method="POST" autocomplete="off">
    <?php 
        if(isset($_GET["mailing"])){
            if($_GET["mailing"] == "error"){
            echo '<p class="lato medium">Veuillez renseigner tous les champs correctement</p>';
            }else if($_GET["mailing"] == "success"){
                echo '<p class="lato medium" valid>Message envoyé avec succès</p>';
            }
        }
    ?>
    <div>
        <div>
            <input type="text" name="name" id="name" placeholder="Nom" class="lato thin" autocomplete="off"
            <?php echo(isset($_GET["name"]) && !empty($_GET["name"]) ? "value=" . $_GET["name"] : "");
            echo(isset($_GET["name"]) && empty($_GET["name"]) ? " invalid" : "") ?>>
            <input type="text" name="email" id="email" placeholder="Courriel" class="lato thin" autocomplete="off"
            <?php echo(isset($_GET["mail"]) && !empty($_GET["mail"]) ? "value=" . $_GET["mail"] : ""); 
            echo(isset($_GET["mail"]) && empty($_GET["mail"]) ? " invalid" : "") ?>>
            <input type="text" name="subject" id="subject" placeholder="Sujet" class="lato thin"
            <?php echo(isset($_GET["subject"]) && !empty($_GET["subject"]) ? "value=" . $_GET["subject"] : ""); 
            echo(isset($_GET["subject"]) && empty($_GET["subject"]) ? " invalid" : "") ?>>
        </div>
        <textarea name="msg" id="msg" cols="30" rows="10" placeholder="Message" class="lato thin"
        <?php echo(isset($_GET["msg"]) && empty($_GET["msg"]) ? " invalid" : ""); ?>><?php echo(isset($_GET["msg"]) && !empty($_GET["msg"]) ? $_GET["msg"] : ""); ?></textarea>
    </div>
    <button type="submit" name="sendmail-btn" class="lato bold bg-shadow">Envoyer</button>
</form>