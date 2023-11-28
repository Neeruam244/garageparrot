<?php  require_once _ROOTPATH_.'\templates\header.php'; ?>

<div class="corps-presentation">
                <div class="gauche">
                    <h2 class="title-model"><?= $car->getBrand()?> <?= $car->getModel()?></h2>
                    <p class="subtitle-model"><?= $car->getDescription()?></p>

                    <p class="infos-car"><?=$car->getYear()?>| <?= $car->getMileage()?> | <?= $car->getEnergy()?></p>
                    <p class="price-car"><?= $car->getPrice()?></p>
                </div>

                <div class="droite">
                    <div class="slide-container">
                        <div class="custom-slider fade" style="text-align: center;">
                          <img class="slide-img" src="<?= $car->getPicture1()?>">
                        </div>

                        <div class="custom-slider fade" style="text-align: center;">
                          <img class="slide-img" src="Photos/véhicules d'occasions/clio4/clio3.jpg">
                        </div>

                        <div class="custom-slider fade" style="text-align: center;">
                          <img class="slide-img" src="Photos/véhicules d'occasions/clio4/clio4.jpg">
                        </div>

                        <div class="custom-slider fade" style="text-align: center;">
                            <img class="slide-img" src="Photos/véhicules d'occasions/clio4/clio5.jpg">
                        </div>

                        <div class="custom-slider fade" style="text-align: center;">
                            <img class="slide-img" src="Photos/véhicules d'occasions/clio4/clio2.jpg">
                        </div>

                        <div class="custom-slider fade" style="text-align: center;">
                            <img class="slide-img" src="Photos/véhicules d'occasions/clio4/clio6.jpg">
                        </div>

                        <div>
                            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                            <a class="next" onclick="plusSlides(1)">&#10095;</a>
                        </div>

                        <div class="slide-dot">
                            <span class="dot" onclick="currentSlide(1)"></span> 
                            <span class="dot" onclick="currentSlide(2)"></span> 
                            <span class="dot" onclick="currentSlide(3)"></span> 
                            <span class="dot" onclick="currentSlide(4)"></span> 
                            <span class="dot" onclick="currentSlide(5)"></span> 
                            <span class="dot" onclick="currentSlide(6)"></span> 
                        </div>
                  
                    </div>
                </div>

            <!-- tableaux -->
            <div class="tableaux">
                <table>
                    <thead>
                        <tr>
                            <th colspan="2">Informations générales</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Année</th>
                            <td><?= $car->getYear()?></td>
                        </tr>
                        <tr>
                            <th>Mise en circulation</th>
                            <td><?= $car->getCreatedAt()?></td>
                        </tr>
                        <tr>
                            <th>Kilométrage au compteur</th>
                            <td><?= $car->getMileage()?></td>
                        </tr>
                        <tr>
                            <th>Energie</th>
                            <td><?= $car->getEnergy()?></td>
                        </tr>
                        <tr>
                            <th>Boite de vitesse</th>
                            <td><?= $car->getTransmission()?></td>
                        </tr>
                        <tr>
                            <th>Couleur extérieur</th>
                            <td><?= $car->getColor()?></td>
                        </tr>
                        <tr>
                            <th>Nombre de portes</th>
                            <td><?= $car->getDoorNumber()?></td>
                        </tr>
                        <tr>
                            <th>Puissance fiscale</th>
                            <td><?= $car->getFiscalPower()?></td>
                        </tr>
                    </tbody>
                </table>

                <table>
                    <thead>
                        <tr>
                            <th colspan="2">Equipements & options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Intérieur</th>
                            <td>
                                <?= $car->getInteriorEquipments()?>
                            </td>
                        </tr>
                        <tr>
                            <th>Extérieur</th>
                            <td>
                                <?= $car->getExteriorEquipments()?>
                            </td>
                        </tr>
                        <tr>
                            <th>Sécurité</th>
                            <td>
                                <?= $car->getSecurityEquipments()?>
                            </td>
                        </tr>
                        <tr>
                            <th>Autres</th>
                            <td>
                                <?= $car->getOthersEquipments()?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="pourcontact">
                <a href="index.php?controller=page&action=contact"><p>Pour plus de renseignements, cliquer ici !</p></a>
            </div>

<?php  require_once _ROOTPATH_.'\templates\footer.php'; ?>