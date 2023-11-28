<?php  require_once _ROOTPATH_.'\templates\header.php'; ?>

<section class="about">
        <img src="assets/images/accueil.jpg" alt="accueil" class="img-about">
        <h2 class="title-bienvenue">Bienvenue au garage V. Parrot ! </h2>

        <p class="para-about">Je suis <strong>Vincent PARROT</strong>, fort de mes 15 années d'expériences dans 
            la réparation automobile, j'ai décidé d'ouvrir en 2021 mon propre garage ici à Toulouse, aux bord de la Garonne. 
            <br>
            <br>
            Depuis maintenant 2 ans, le garage se spécialise dans la vente de véhicules d'occasions multimarques. 
            Toute notre équipe vous accueille sur son parc d'exposition d'une quarantaine de voitures, 
            afin de trouver le véhicule qui vous correspond le mieux. Par nos conseils et une recherche 
            personnalisée, nous vous accompagnons dans votre projet d'achat, tout en respectant vos besoins 
            et votre budget, selon le véhicule recherché.
            <br>
            <br>
            Le maitre-mot de l'atelier est la <strong>qualité</strong>, mes employés et moi font tout notre possible
            pour vous fournir un service de qualité et personnalisé selon vos besoins. 
        </p>
</section>

<section>
    <div class="services" id="lienservices">
        <h2 class="title-service">Nos prestations</h2>

            <div class="icones"> 
                <a href="#"><img src="uploads/icones/icone-meca.png" class="icones-services"></a>
                <a href="#"><img src="uploads/icones/icone-carrosserie.png" class="icones-services"></a>
                <a href="#"><img src="uploads/icones/icone-vente.png" class="icones-services"></a>
                <a href="#"><img src="uploads/icones/icone-entretien.png" class="icones-services"></a>
            </div>

            <div class="icones">
                <p class="para-icones">La mécanique</p>
                <p class="para-icones">La carrosserie</p>
                <p class="para-icones">La ventes de véhicules d'occasion</p>
                <p class="para-icones">L'entretien</p>
            </div>
    </div>  
    
    <p class="title-services">Un professionalisme et un savoir faire d'une équipe à votre service !</p>



<div class="mecanique">
    <img src="uploads/services/mecanique.jpg" class="photos-services">
    <h3 class="h2title">Atelier de mécanique automobile</h3>

    <div class="para-services">
        <p>Des techniciens qualifiés et régulièrement formés s’occupent de votre voiture au sein de nos ateliers pour toutes les interventions d’entretien courant.</p>
        <ul>
            <li>Diagnostique et recherche de panne électrique</li>
            <li>Préparartion au contrôle technique</li>
            <li>Pneumatiques</li>
            <li>Freinage</li>
            <li>Echappement</li>
        </ul>
    </div>
</div>

<div class="carrosserie">
    <img src="uploads/services/carrosserie.jpeg" class="photos-services">
    <h3 class="h2title">La carrosserie</h3>

    <div class="para-services">
        <p>Qualifiés et expérimentés nos carrossiers-peintre disposent d'un outillage de pointe pour effectuer tous les travaux de tôlerie, carrosserie et peinture.</p>
        <ul>
            <li>Débosselage sans peinture</li>
            <li>Toterie ou peinture</li>
            <li>Réparartion ou changement de parebrise</li>
            <li>Vitres surteintés</li>
        </ul>
    </div>
</div>

<div class="entretien">
    <img src="uploads/services/entretien.jpg" class="photos-services">
    <h3 class="h2title">L'entretien</h3>

    <div class="para-services">
        <p>Nos techniciens qualifiés s’occupent de votre voiture pour toutes les interventions de maintenance.</p>
        <ul>
            <li>Changement d'essuie-galce</li>
            <li>Eclairage</li>
            <li>Vidange</li>
            <li>Climatisation</li>
            <li>Batterie</li>
        </ul>
</div>
</div>

</section>

<section>
    <h2 class="title-avis">Un professionnel de l'entretien automobile</h2>

        <div class="slide-avis">
        <!--slideshow container  --> 
            <div class="slideshow-container">
                <!--Full with slides and quotes-->
                <div class="mySlides">
                    <q>Très bon garage. Réparations rapide et de qualité. Equipe à l'écoute des clients.</q>  
                    <p class="author">Sébastien REPEROT <img src="uploads/etoiles_avis/5stars.png" width="120px" height="20px" class="stars"></p>
                </div>

                <div class="mySlides">
                    <q>Un garage moins grand qu'une concession et pourtant un acceuil chaleureux, des véhicules à des prix corrects. Vincent est une personne accueillante et agréable.</q>  
                    <p class="author">Matthieu MOURET <img src="uploads/etoiles_avis/5stars.png" width="120px" height="20px" class="stars"></p>
                </div>

                <div class="mySlides">
                    <q>Garage très professionnel et à l'écoute de ses clients</q>  
                    <p class="author">Allan GAPORIT <img src="uploads/etoiles_avis/4stars.png" width="120px" height="20px" class="stars"></p>
                </div>

                <div class="mySlides">
                    <q>Accueil exemplaire, professionnels sérieux et honnêtes ! Je recommande fortement ce garage pour l'achat de véhicules d'occasion.</q>  
                    <p class="author">Jonathan JUSPIN <img src="uploads/etoiles_avis/5stars.png" width="120px" height="20px" class="stars"></p>
                </div>

                <div class="mySlides">
                    <q>Super acceuil ! Professionnels sérieux et dynamiques. Le prix des prestations sont correts et les devis sont transmis avant chaque réparation pour ne pas avoir de surpise ! Très bonne équipe !</q>  
                    <p class="author">Nicolas COUDRINO <img src="uploads/etoiles_avis/5stars.png" width="120px" height="20px" class="stars"></p>
                </div>

                <div class="mySlides">
                    <q>Très bien reçu, service au top ! Bon conseils et à l'écoute, je recommande. </q>  
                    <p class="author">Caroline RAUTUREAU <img src="uploads/etoiles_avis/5stars.png" width="120px" height="20px" class="stars"></p>
                </div>

                <!--Next/prev button-->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>

            <!--Dots/bullets/indicators-->
            <div class="dot-container">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
                <span class="dot" onclick="currentSlide(4)"></span>
                <span class="dot" onclick="currentSlide(5)"></span>
                <span class="dot" onclick="currentSlide(6)"></span>
            </div>
        </div>    

        <p class="para-avis">Votre passage chez nous s'est bien passé. <br> Laisser nous votre avis ! </p>

        <aside class="img-avis">
            <img src="assets/images/Votreavisnousinteresse.png">
        </aside>

    <form method="post" action=""></form>
        <div class="body-form">
            <div>
                <div class="input-group">
                    <input required="" type="text" name="text" autocomplete="off" class="input"> 
                    <label class="user-label">Vote nom</label> 
                </div>

                <div class="input-group">
                    <textarea rows="7" cols="30" required="" type="text" name="text" autocomplete="off" class="input"></textarea>
                      <label  class="user-label">Votre avis</label>
                </div>

                <div class="rating">
                    <input value="star-1" name="star-radio" id="star-1" type="radio">
                    <label for="star-1">
                      <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" pathLength="360"></path></svg>
                    </label>
                    <input value="star-1" name="star-radio" id="star-2" type="radio">
                    <label for="star-2">
                      <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" pathLength="360"></path></svg>
                    </label>
                    <input value="star-1" name="star-radio" id="star-3" type="radio">
                    <label for="star-3">
                      <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" pathLength="360"></path></svg>
                    </label>
                    <input value="star-1" name="star-radio" id="star-4" type="radio">
                    <label for="star-4">
                      <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" pathLength="360"></path></svg>
                    </label>
                    <input value="star-1" name="star-radio" id="star-5" type="radio">
                    <label for="star-5">
                      <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" pathLength="360"></path></svg>
                    </label>
                </div>

                <div>
                    <button type="submit" class="button1">Envoyer</button>  
                </div>

            </div>
        </div>  
    </form>
</section>

<?php  require_once _ROOTPATH_.'\templates\footer.php'; ?>