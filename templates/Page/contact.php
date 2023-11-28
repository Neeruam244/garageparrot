<?php  require_once _ROOTPATH_.'\templates\header.php'; ?>

<h2 class="title-contact">Besoin d'un renseignements?</h2>
        <p class="para-contact1">Afin de mieux vous renseigner, merci de remplir le formulaire ci dessous</p>

        <aside>
            <img src="assets/images/contact.jpg" alt="contact" class="img-contact">
        </aside>    

        <form method="post" action="" id="myForm"></form>
            <div class="body-form">
                <div>
                    <div class="input-group">
                        <input required="" type="text" name="text" autocomplete="off" class="input" id="nom"> 
                        <label class="user-label" for="nom">Vote nom</label> 
                    </div>
                    <div class="input-group">
                        <input required="" type="text" name="text" autocomplete="off" class="input" id=prenom> 
                        <label class="user-label" for="prenom">Votre prénom</label> 
                    </div>
                    <div class="input-group">
                        <input required="" type="text" name="text" autocomplete="off" class="input" id="courriel"> 
                        <label class="user-label" for="courriel">Votre adresse mail</label> 
                    </div>
                    <div class="input-group">
                        <input required="" type="text" name="text" autocomplete="off" class="input" id="tel"> 
                        <label class="user-label" for="tel">Votre téléphone</label> 
                    </div>
                    <div class="input-group">
                      <textarea rows="7" cols="30" required="" type="text" name="message" autocomplete="off" class="input" id="lemessage"></textarea>
                        <label  class="user-label" for="lemessage">Message</label>
                    </div>
                    <div>
                        <input type="submit" class="button1" value='Envoyer'>
                    </div>
                </div>
            </div>  
        </form>

    <?php
    $messages = [];
    $errors = [];

    if (isset($_POST["message"])) {
        if (!isset($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "L'adresse e-mail n'est pas valide";
        }
        if (!isset($_POST["message"]) || $_POST["message"] == "") {
            $errors[] = "Le message ne doit pas être vide";
        }
        if (!$errors) {
            $to = _APP_EMAIL_;
            $subject = "[Garage V Parrot] Formulaire de contact";
            $emailContent = "Message : <br>".nl2br(htmlentities($_POST["message"]));
            $headers = "From: "._APP_EMAIL_ . "\r\n" .
                        "MIME-Version: 1.0" . "\r\n" .
                        "Content-type: text/html; charset=utf-8";
        
            if(mail($to, $subject, $emailContent, $headers)) {
                $messages[] = "Votre email a bien été envoyé";
    
            } else {
                $errors[] = "Une erreur s'est produite durant l'envoi";
            }
        }

    }

    ?>
    
        
<?php  require_once _ROOTPATH_.'\templates\footer.php'; ?>