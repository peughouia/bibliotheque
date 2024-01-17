<nav class="navbar">   
          <div class="logo">
            My<span class="log">Biblio</span>
          </div>
          <div class="menu">
                <ul class="list-item">
                    <li class="item"><a href="./landing.php">Accueil</a></li>
                    <li class="item"><a href="connexion.php">Déconnexion</a></li>
                    <li class="item">@<?php echo $_SESSION['username']; ?></li>
                </ul>
          </div>
        </nav>