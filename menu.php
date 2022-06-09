<nav class="navbar navbar-expand-xl navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">PHP</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#"><?=_MENUACCUEIL?> <span class="visually-hidden">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=_MENUEXPLIC?></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="index.php">Index</a>
                        <a class="dropdown-item" href="t01-variables.php">Variables 01</a>
                        <a class="dropdown-item" href="t02-variables.php">Variables 02</a>
                        <a class="dropdown-item" href="t03-superglobal.php">superglobal</a>
                        <a class="dropdown-item" href="t03-supercouleur.php">super couleur</a>
                        <a class="dropdown-item" href="t04-tableau.php">tableau</a>
                        <a class="dropdown-item" href="t05-conditions.php">Conditions</a>
                        <a class="dropdown-item" href="T06_sessions.php">Session</a>
                        <a class="dropdown-item" href="T08_sessionscouleur.php">Sessions Couleur</a>
                        <a class="dropdown-item" href="T09_cookies.php">Cookies</a>
                        <a class="dropdown-item" href="T10_cookiescouleur.php">Cookies Couleur</a>
                        <a class="dropdown-item" href="functionnettoyer.php">Fonction Nettoyer</a>
                        <a class="dropdown-item" href="T11_liredb.php">Lire DB</a>
                        <a class="dropdown-item" href="T12_detaildb.php" >Detail DB</a>
                        <a class="dropdown-item" href="T13_liredbajax.php">Lire DB Ajax</a>
                        <a class="dropdown-item" href="T14_detaildbajax.php">Detail DB Ajax</a>
                        <a class="dropdown-item" href="T18_upload.php">Uploader une image</a>
                        <a class="dropdown-item" href="T18_uploadb.php">Uploader une image et affichage </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownDB" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">DataBase Modif</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownDB">
                        <a class="dropdown-item" href="T15_ajoutdb.php">Faire un ajout</a>
                        <a class="dropdown-item" href="T17_modifierdb.php">Faire une modif</a>
                        
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-item btn btn-danger" href="destroy.php">Destroy Cookie</a>
                </li>
               
            </ul>
            <!--<form class="d-flex my-2 my-lg-0">
                <input class="form-control me-sm-2" type="text" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>-->
            <form class="d-flex my-2 my-lg-0">
                <br>
                    <!-- https://www.drapeauxdespays.fr/telecharger/api -->
                <button  class="nav-item btn" id="en" type="submit" value="en"><img src="https://flagcdn.com/16x12/us.png" 
                    srcset="https://flagcdn.com/32x24/us.png 2x, https://flagcdn.com/48x36/us.png 3x" width="16"
                    height="12" alt="Anglais"></button>
                <button  class="nav-item btn" id="fr" type="submit" value="fr"><img src="https://flagcdn.com/16x12/fr.png"
                    srcset="https://flagcdn.com/32x24/fr.png 2x, https://flagcdn.com/48x36/fr.png 3x"
                    width="16" height="12" alt="Français"></button>
                <button  class="nav-item btn" id="it" type="submit" value="it"><img src="https://flagcdn.com/16x12/it.png" 
                    srcset="https://flagcdn.com/32x24/it.png 2x, https://flagcdn.com/48x36/it.png 3x" width="16"
                    height="12" alt="Italien"></button>
            </form>
            <form class="d-flex my-2 my-lg-0">
            <?php if ((isset($_SESSION['login'])) and (isset($_SESSION['mdp']))) {?>
                        <a class="nav-link btn btn-outline-danger" href="destroy.php"><i class="bi bi-box-arrow-right"></i></a>
                    <?php }else{ ?>
                        <a class="nav-link btn btn-outline-success" href="formlog.php"><i class="bi bi-box-arrow-in-right"></i></a>
                    <?php } ?>

            </form>
            
        </div>
    </div>
</nav>