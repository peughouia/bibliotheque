<nav class="navbar">   
          <div class="logo">
          <a href="../connexion/admin.php">My<span class="log">Biblio</span></a>
          </div>
          <div class="menu">
                <ul class="list-item">
                    <li class="item"><a href="../admin/List_User.php">Users</a></li>
                    <li class="item"><a href="../admin/list_livre.php">Livres</a></li>
                    <li class="item"><a href="../admin/add_livre.php">AddLivres</a></li>
                    <li class="item"><a href="../connexion/connexion.php">Déconnexion</a></li>
                    <li class="item">@<?php echo $_SESSION['username']; ?></li>
                </ul>
          </div>
</nav> 