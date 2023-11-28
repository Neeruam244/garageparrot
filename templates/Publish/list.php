<?php  require_once _ROOTPATH_.'\templates\header.php'; ?>

<section>
    <h2 class="title-avis">Un professionnel de l'entretien automobile</h2>

        <div class="slide-avis">
        <!--slideshow container-->    
            <div class="slideshow-container">
                <!--Full with slides and quotes-->
                <?php  foreach ($publish as $p) : ?>
                <div class="mySlides">
                    <q><?= $p["opinion"]?></q>  
                    <p class="author"><?= $p["client_name"]?> <img src="<?= $p["note"]?>" width="120px" height="20px" class="stars"></p>
                </div>
                <?php endforeach; ?>
               

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