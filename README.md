# Bibliothèque Web

**Bibliothèque Web** est une application web dynamique développée en **PHP**, **HTML** et **CSS**, conçue pour faciliter la gestion et l’accès à une bibliothèque numérique de livres au format PDF.

## Fonctionnalités principales

- 📚 **Gestion des livres par l’admin**
  - Interface d’administration sécurisée permettant :
    - Ajout de nouveaux livres (titre, auteur, description, et fichier PDF)
    - Suppression ou édition de livres existants
    - Visualisation de la liste complète des livres

- 👥 **Accès utilisateur**
  - Tous les utilisateurs peuvent :
    - Consulter la bibliothèque
    - Filtrer et rechercher des livres par titre ou auteur
    - Télécharger les livres au format PDF en un clic
    - laisser des commentaire sur des livres

- 🔒 **Authentification**
  - Espace sécurisé pour l’admin afin de gérer la collection
  - Accès public à la consultation et au téléchargement

- 🎨 **Interface responsive**
  - Design moderne et intuitif adapté à tous les périphériques (ordinateur, tablette, mobile)

## Technologies utilisées

- **Backend :** PHP (vanilla ou avec extensions/micro-frameworks)
- **Frontend :** HTML5, CSS3, JavaScript (si besoin d’interactivité)
- **Base de données :** MySQL ou SQLite (pour stocker les infos sur les livres)
- **Stockage des fichiers :** Dossiers sécurisés côté serveur (PDF uploadés)
- **Sécurité :** sessions PHP, validations sur l’upload de PDF

## Aperçu

![Aperçu de la bibliothèque](screenshot.png)

## Installation rapide

1. **Cloner le dépôt**
    ```bash
    git clone https://github.com/peughouia/bibliotheque.git
    cd bibliotheque
    ```

2. **Configurer la base de données**
    - Importer le fichier `bibliotheque.sql` dans votre SGBD (MySQL, MariaDB, etc.)
    - Modifier les accès à la base dans `config.php`

3. **Déployer sur votre serveur web (ex: XAMPP, WAMP, LAMP, etc.)**

4. **Accéder à l’application via votre navigateur**

## Fonctionnalités à venir

- Pagination des listes de livres
- Système de catégories/genres
- Interface utilisateur avancée pour les notes et avis sur les livres
- Notifications par email pour les nouveaux ajouts

---

**Vous souhaitez contribuer ?**  
N’hésitez pas à ouvrir une *issue* ou à soumettre une *pull request* !

---
