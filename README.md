# Vitrine Pro — Site vitrine + Dashboard de personnalisation

Application Laravel complète intégrant un **site vitrine professionnel** et un **dashboard d'administration** permettant de personnaliser l'intégralité du site en temps réel, sans toucher au code.

---

## Stack technique

| Couche          | Technologie                              |
|-----------------|------------------------------------------|
| Backend         | PHP 8.3 · Laravel 13.4                   |
| Auth            | Laravel Breeze (Blade)                   |
| Frontend        | Vite 8 · Vanilla JS (ES Modules)         |
| Styles          | SASS 1.99 (Dart Sass, syntaxe `@use`)    |
| Base de données | MySQL 8                                  |
| Stockage        | `storage/app/public` (lien symbolique)   |

---

## Fonctionnalités

### Site vitrine (public)

- **`/`** — Page d'accueil : Hero fullscreen, section Services, section À propos, CTA
- **`/entreprise`** — Page intermédiaire : À propos, Valeurs, Équipe, Galerie
- **`/entreprise/contact`** — Formulaire de contact complet avec validation

Toutes les sections sont **activables/désactivables** et **entièrement personnalisables** depuis le dashboard.

### Dashboard d'administration (privé)

Accessible uniquement après connexion à `/connexion`.

| Module                | Description                                               |
|-----------------------|-----------------------------------------------------------|
| **Identité**          | Nom du site, slogan, logo header/footer, favicon          |
| **Couleurs**          | Palette primaire/secondaire/accent, texte et fond         |
| **Typographies**      | Police des titres et du corps (Google Fonts)              |
| **Textes & Sections** | H1/H2/H3, paragraphes, boutons CTA, visibilité sections   |
| **Images & Médias**   | Upload/suppression pour chaque emplacement image          |
| **Réseaux sociaux**   | Facebook, Instagram, LinkedIn, Twitter/X, YouTube         |
| **Contact**           | Email de destination, téléphone, adresse, confirmations   |
| **Messages**          | Lecture et suppression des messages reçus                 |
| **Profil**            | Nom, email, changement de mot de passe                    |

### Personnalisation dynamique

Les couleurs et typographies sont injectées en **CSS custom properties** directement dans le `<head>` via Blade — aucune recompilation nécessaire après modification dans le dashboard.

---

## Prérequis

- PHP >= 8.3 avec extensions `pdo_mysql`, `mbstring`, `openssl`, `fileinfo`
- Composer >= 2.7
- Node.js >= 18 + npm >= 9
- MySQL >= 8.0

---

## Installation

### 1. Cloner le dépôt

```bash
git clone https://github.com/votre-compte/vitrine.git
cd vitrine
```

### 2. Installer les dépendances

```bash
composer install
npm install
```

### 3. Configurer l'environnement

```bash
cp .env.example .env
php artisan key:generate
```

Éditer `.env` et renseigner les informations MySQL :

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=vitrine
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Créer la base de données

```sql
CREATE DATABASE vitrine CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 5. Migrations & Seeders

```bash
php artisan migrate
php artisan db:seed
```

Le seeder crée automatiquement :
- Le compte administrateur (`admin@vitrine.fr` / `Admin@1234`)
- L'ensemble des paramètres par défaut (~50 entrées en base)

### 6. Lien de stockage

```bash
php artisan storage:link
```

### 7. Compiler les assets

```bash
# Production
npm run build

# Développement avec hot reload
npm run dev
```

---

## Lancement

```bash
php artisan serve
```

Le site est accessible à `http://127.0.0.1:8000`.

> **WampServer / Laragon :** placer le projet dans `www/vitrine` et accéder via `http://localhost/vitrine/public`.

---

## Compte administrateur par défaut

> **Modifier le mot de passe immédiatement après le premier déploiement** via `/dashboard/profil`.

| Champ        | Valeur              |
|--------------|---------------------|
| Email        | `admin@vitrine.fr`  |
| Mot de passe | `Admin@1234`        |

---

## Structure du projet

```
vitrine/
├── app/
│   ├── helpers.php                        # Fonctions globales setting() / setting_json()
│   ├── Models/
│   │   ├── Setting.php                    # Modèle avec cache automatique
│   │   └── ContactMessage.php
│   └── Http/Controllers/
│       ├── HomeController.php
│       ├── EntrepriseController.php
│       ├── ContactController.php
│       ├── ProfileController.php
│       └── Dashboard/
│           ├── DashboardController.php
│           ├── SettingController.php      # identité, couleurs, contenu, contact, social
│           ├── MediaController.php        # upload / suppression images
│           └── MessagesController.php
├── database/
│   ├── migrations/
│   │   ├── ..._create_settings_table.php
│   │   └── ..._create_contact_messages_table.php
│   └── seeders/
│       ├── AdminSeeder.php
│       └── SettingsSeeder.php
├── resources/
│   ├── sass/
│   │   ├── app.scss                       # Point d'entrée (@use moderne)
│   │   └── components/
│   │       ├── _variables.scss            # Breakpoints, mixins responsives, tokens
│   │       ├── _base.scss                 # Reset, utilitaires, animations
│   │       ├── _buttons.scss
│   │       ├── _header.scss               # Sticky, burger, nav desktop/mobile
│   │       ├── _footer.scss
│   │       ├── _hero.scss
│   │       ├── _sections.scss
│   │       ├── _cards.scss
│   │       ├── _contact.scss
│   │       ├── _gallery.scss
│   │       ├── _team.scss
│   │       ├── _auth.scss
│   │       └── _dashboard.scss
│   ├── js/
│   │   ├── app.js
│   │   ├── navigation.js                  # Burger, sticky header, scroll animations
│   │   └── dashboard.js                   # Sidebar mobile, color picker, image preview
│   └── views/
│       ├── layouts/
│       │   ├── app.blade.php              # Layout vitrine (CSS vars dynamiques)
│       │   └── dashboard.blade.php        # Layout dashboard (sidebar + topbar)
│       ├── components/
│       │   ├── header.blade.php
│       │   └── footer.blade.php
│       ├── vitrine/
│       │   ├── home.blade.php
│       │   ├── entreprise.blade.php
│       │   └── contact.blade.php
│       ├── auth/
│       │   ├── login.blade.php            # Style 100% personnalisé
│       │   └── forgot-password.blade.php
│       └── dashboard/
│           ├── index.blade.php
│           ├── profile.blade.php
│           ├── settings/
│           │   ├── identity.blade.php
│           │   ├── colors.blade.php
│           │   ├── content.blade.php
│           │   ├── contact.blade.php
│           │   └── social.blade.php
│           ├── media/index.blade.php
│           └── messages/
│               ├── index.blade.php
│               └── show.blade.php
└── routes/
    ├── web.php                            # Routes SEO-friendly
    └── auth.php                           # URLs en français
```

---

## Routes

### Vitrine (public)

| Méthode   | URL                   | Description           |
|-----------|-----------------------|-----------------------|
| GET       | `/`                   | Page d'accueil        |
| GET       | `/entreprise`         | Page entreprise       |
| GET/POST  | `/entreprise/contact` | Formulaire de contact |

### Authentification

| Méthode   | URL                                    | Description            |
|-----------|----------------------------------------|------------------------|
| GET/POST  | `/connexion`                           | Connexion              |
| POST      | `/deconnexion`                         | Déconnexion            |
| GET/POST  | `/mot-de-passe-oublie`                 | Mot de passe oublié    |
| GET/POST  | `/reinitialiser-mot-de-passe/{token}`  | Réinitialisation       |

### Dashboard (authentification requise)

| Méthode   | URL                          | Description                  |
|-----------|------------------------------|------------------------------|
| GET       | `/dashboard`                 | Tableau de bord (stats)      |
| GET/POST  | `/dashboard/identite`        | Logo & identité              |
| GET/POST  | `/dashboard/couleurs`        | Couleurs & typographies      |
| GET/POST  | `/dashboard/contenu`         | Textes & sections            |
| GET/POST  | `/dashboard/contact-config`  | Configuration contact        |
| GET/POST  | `/dashboard/reseaux`         | Réseaux sociaux              |
| GET/POST  | `/dashboard/medias`          | Gestion des images           |
| GET       | `/dashboard/messages`        | Messages reçus               |
| GET/PATCH | `/dashboard/profil`          | Profil administrateur        |

---

## Système de settings

Toutes les personnalisations sont stockées dans la table `settings` (clé / valeur) :

```php
// Lire un paramètre (avec cache automatique)
setting('hero_title')
setting('color_primary', '#2563eb') // valeur par défaut

// Lire un paramètre JSON (tableau)
setting_json('services_cards')

// Écrire un paramètre (invalide le cache)
Setting::set('hero_title', 'Nouveau titre')
```

Les couleurs sont appliquées en CSS custom properties dans chaque layout :

```css
:root {
  --color-primary:   #2563eb;
  --color-secondary: #1e40af;
  --color-accent:    #f59e0b;
  --color-text:      #1f2937;
  --color-bg:        #ffffff;
}
```

---

## Sécurité

- Mots de passe hashés via **Bcrypt** (natif Laravel)
- Protection **CSRF** sur tous les formulaires POST
- Middleware **`auth`** sur l'intégralité du groupe `/dashboard`
- Déconnexion avec **invalidation de session** complète
- Inscription publique **désactivée** — accès admin via seeder uniquement
- Validation serveur stricte sur toutes les entrées utilisateur
- Images uploadées dans `storage/app/public/uploads` (hors `public/`)

---

## Licence

MIT — libre d'utilisation pour projets personnels et commerciaux.
