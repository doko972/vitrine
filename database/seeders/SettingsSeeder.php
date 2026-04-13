<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [

            // ── Identité ─────────────────────────────────────────────────────────
            ['key' => 'site_name',    'value' => 'Nexus Agency',                      'type' => 'text',    'group' => 'identity', 'label' => 'Nom du site'],
            ['key' => 'site_tagline', 'value' => 'Stratégie · Design · Digital',       'type' => 'text',    'group' => 'identity', 'label' => 'Slogan'],
            ['key' => 'logo_header',  'value' => null,                                 'type' => 'image',   'group' => 'identity', 'label' => 'Logo header'],
            ['key' => 'logo_footer',  'value' => null,                                 'type' => 'image',   'group' => 'identity', 'label' => 'Logo footer'],
            ['key' => 'favicon',      'value' => null,                                 'type' => 'image',   'group' => 'identity', 'label' => 'Favicon'],

            // ── Couleurs & typographie ────────────────────────────────────────────
            ['key' => 'color_primary',   'value' => '#6d28d9', 'type' => 'color', 'group' => 'colors', 'label' => 'Couleur primaire'],
            ['key' => 'color_secondary', 'value' => '#4c1d95', 'type' => 'color', 'group' => 'colors', 'label' => 'Couleur secondaire'],
            ['key' => 'color_accent',    'value' => '#f59e0b', 'type' => 'color', 'group' => 'colors', 'label' => 'Couleur accent'],
            ['key' => 'color_text',      'value' => '#1f2937', 'type' => 'color', 'group' => 'colors', 'label' => 'Couleur texte'],
            ['key' => 'color_bg',        'value' => '#ffffff', 'type' => 'color', 'group' => 'colors', 'label' => 'Couleur fond'],
            ['key' => 'font_heading',    'value' => 'Poppins', 'type' => 'text',  'group' => 'colors', 'label' => 'Police titres'],
            ['key' => 'font_body',       'value' => 'Inter',   'type' => 'text',  'group' => 'colors', 'label' => 'Police corps'],

            // ── Hero ─────────────────────────────────────────────────────────────
            ['key' => 'hero_type',         'value' => 'classic',                                               'type' => 'text',    'group' => 'content', 'label' => 'Type de Hero'],
            ['key' => 'hero_visible',      'value' => '1',                                                     'type' => 'boolean', 'group' => 'content', 'label' => 'Hero visible'],
            ['key' => 'hero_title',        'value' => 'Donnez vie à votre vision digitale',                    'type' => 'text',    'group' => 'content', 'label' => 'Titre Hero (H1)'],
            ['key' => 'hero_subtitle',     'value' => 'Nexus Agency conçoit des expériences numériques mémorables — identité de marque, sites web et stratégie de communication sur mesure.', 'type' => 'text', 'group' => 'content', 'label' => 'Sous-titre Hero'],
            ['key' => 'hero_cta_text',     'value' => 'Démarrer un projet',                                    'type' => 'text',    'group' => 'content', 'label' => 'Bouton Hero texte'],
            ['key' => 'hero_cta_url',      'value' => '/contact',                                              'type' => 'text',    'group' => 'content', 'label' => 'Bouton Hero lien'],
            ['key' => 'hero_bg_image',     'value' => null,                                                    'type' => 'image',   'group' => 'content', 'label' => 'Image fond Hero / Slide 1'],

            // Slides carousel (2 & 3)
            ['key' => 'hero_slide_2_img',   'value' => null,                                                   'type' => 'image',   'group' => 'content', 'label' => 'Image Slide 2'],
            ['key' => 'hero_slide_2_title', 'value' => 'Des designs qui font la différence',                   'type' => 'text',    'group' => 'content', 'label' => 'Titre Slide 2'],
            ['key' => 'hero_slide_2_sub',   'value' => 'Chaque pixel compte. Nous créons des interfaces élégantes et intuitives qui convertissent vos visiteurs en clients fidèles.', 'type' => 'text', 'group' => 'content', 'label' => 'Sous-titre Slide 2'],
            ['key' => 'hero_slide_3_img',   'value' => null,                                                   'type' => 'image',   'group' => 'content', 'label' => 'Image Slide 3'],
            ['key' => 'hero_slide_3_title', 'value' => 'Votre croissance, notre mission',                      'type' => 'text',    'group' => 'content', 'label' => 'Titre Slide 3'],
            ['key' => 'hero_slide_3_sub',   'value' => 'De la stratégie SEO au lancement de campagne, nous pilotons votre présence en ligne pour maximiser votre impact.', 'type' => 'text', 'group' => 'content', 'label' => 'Sous-titre Slide 3'],

            // ── Services ─────────────────────────────────────────────────────────
            ['key' => 'services_visible',  'value' => '1',                    'type' => 'boolean', 'group' => 'content', 'label' => 'Section Services visible'],
            ['key' => 'services_title',    'value' => 'Nos Expertises',        'type' => 'text',    'group' => 'content', 'label' => 'Titre Services (H2)'],
            ['key' => 'services_subtitle', 'value' => 'Tout ce dont vous avez besoin pour réussir en ligne', 'type' => 'text', 'group' => 'content', 'label' => 'Sous-titre Services'],
            ['key' => 'services_cards',    'type' => 'json', 'group' => 'content', 'label' => 'Cartes services',
             'value' => json_encode([
                ['icon' => '🎨', 'title' => 'Design UI/UX',         'description' => 'Interfaces modernes, accessibles et orientées conversion. Maquettes Figma, prototypes interactifs et charte graphique complète.'],
                ['icon' => '🌐', 'title' => 'Développement Web',    'description' => 'Sites vitrine, e-commerce et applications web sur mesure. Technologies récentes, code propre et performances optimisées.'],
                ['icon' => '📈', 'title' => 'SEO & Référencement',  'description' => 'Audit technique, stratégie de mots-clés et optimisation on-page pour positionner votre site en tête des résultats Google.'],
                ['icon' => '📱', 'title' => 'Réseaux Sociaux',      'description' => 'Création de contenu, gestion de communauté et campagnes publicitaires ciblées sur Instagram, LinkedIn et Facebook.'],
                ['icon' => '✉️', 'title' => 'Emailing & CRM',       'description' => 'Scénarios d\'automatisation, newsletters percutantes et suivi des performances pour fidéliser votre audience.'],
                ['icon' => '🔒', 'title' => 'Maintenance & Sécurité', 'description' => 'Mises à jour régulières, sauvegardes automatiques, monitoring 24/7 et certificat SSL pour une sérénité totale.'],
             ])],

            // ── À propos ─────────────────────────────────────────────────────────
            ['key' => 'about_visible', 'value' => '1',                   'type' => 'boolean', 'group' => 'content', 'label' => 'Section À propos visible'],
            ['key' => 'about_title',   'value' => 'Qui sommes-nous ?',    'type' => 'text',    'group' => 'content', 'label' => 'Titre À propos (H2)'],
            ['key' => 'about_text',    'type' => 'text', 'group' => 'content', 'label' => 'Texte À propos',
             'value' => 'Fondée en 2018 à Lyon, Nexus Agency est une agence digitale à taille humaine réunissant des passionnés de design, de code et de communication. Nous croyons qu\'un bon digital commence par une compréhension profonde de votre métier et de vos clients. C\'est pourquoi chaque projet démarre par une phase d\'écoute et d\'analyse avant de passer à la conception. Avec plus de 120 projets livrés et un taux de satisfaction client de 97 %, notre approche pragmatique et créative fait la différence.'],
            ['key' => 'about_image',   'value' => null, 'type' => 'image', 'group' => 'content', 'label' => 'Image À propos'],

            // ── Valeurs ──────────────────────────────────────────────────────────
            ['key' => 'values_visible', 'value' => '1',          'type' => 'boolean', 'group' => 'content', 'label' => 'Section Valeurs visible'],
            ['key' => 'values_title',   'value' => 'Nos Valeurs', 'type' => 'text',    'group' => 'content', 'label' => 'Titre Valeurs (H2)'],
            ['key' => 'values_cards',   'type' => 'json', 'group' => 'content', 'label' => 'Cartes valeurs',
             'value' => json_encode([
                ['title' => 'Transparence',  'description' => 'Devis détaillés, reporting régulier et communication directe. Pas de surprises, que des résultats.'],
                ['title' => 'Excellence',    'description' => 'Nous ne livrons que ce dont nous sommes fiers. Chaque détail compte, des pixels aux performances.'],
                ['title' => 'Agilité',       'description' => 'Méthodologie itérative, feedback continu et capacité à pivoter rapidement selon vos besoins.'],
                ['title' => 'Impact',        'description' => 'Nous mesurons notre succès à travers le vôtre — trafic, conversions, chiffre d\'affaires.'],
             ])],

            // ── CTA ──────────────────────────────────────────────────────────────
            ['key' => 'cta_visible',      'value' => '1',                                             'type' => 'boolean', 'group' => 'content', 'label' => 'Section CTA visible'],
            ['key' => 'cta_title',        'value' => 'Prêt à passer au niveau supérieur ?',            'type' => 'text',    'group' => 'content', 'label' => 'Titre CTA (H2)'],
            ['key' => 'cta_text',         'value' => 'Parlez-nous de votre projet. Notre équipe vous répond sous 24 h avec une proposition adaptée à vos objectifs et à votre budget.', 'type' => 'text', 'group' => 'content', 'label' => 'Texte CTA'],
            ['key' => 'cta_button_text',  'value' => 'Obtenir un devis gratuit',                       'type' => 'text',    'group' => 'content', 'label' => 'Bouton CTA texte'],

            // ── Équipe ───────────────────────────────────────────────────────────
            ['key' => 'team_visible', 'value' => '1',           'type' => 'boolean', 'group' => 'content', 'label' => 'Section Équipe visible'],
            ['key' => 'team_title',   'value' => 'Notre Équipe', 'type' => 'text',    'group' => 'content', 'label' => 'Titre Équipe (H2)'],
            ['key' => 'team_members', 'type' => 'json', 'group' => 'content', 'label' => 'Membres équipe',
             'value' => json_encode([
                ['name' => 'Sophie Laurent',  'role' => 'Directrice Créative & Co-fondatrice', 'image' => null],
                ['name' => 'Thomas Moreau',   'role' => 'Lead Développeur Full-Stack',         'image' => null],
                ['name' => 'Camille Petit',   'role' => 'Designer UI/UX',                      'image' => null],
                ['name' => 'Julien Roux',     'role' => 'Responsable SEO & Growth',            'image' => null],
             ])],

            // ── Galerie ──────────────────────────────────────────────────────────
            ['key' => 'gallery_visible', 'value' => '1',            'type' => 'boolean', 'group' => 'content', 'label' => 'Section Galerie visible'],
            ['key' => 'gallery_title',   'value' => 'Nos Réalisations', 'type' => 'text', 'group' => 'content', 'label' => 'Titre Galerie (H2)'],
            ['key' => 'gallery_images',  'value' => '[]',             'type' => 'json',    'group' => 'content', 'label' => 'Images galerie'],

            // ── Contact ──────────────────────────────────────────────────────────
            ['key' => 'contact_email',       'value' => 'bonjour@nexus-agency.fr',                                          'type' => 'text', 'group' => 'contact', 'label' => 'Email de contact'],
            ['key' => 'contact_phone',       'value' => '+33 4 72 10 20 30',                                                 'type' => 'text', 'group' => 'contact', 'label' => 'Téléphone'],
            ['key' => 'contact_address',     'value' => '12 Rue de la Créativité, 69001 Lyon',                               'type' => 'text', 'group' => 'contact', 'label' => 'Adresse'],
            ['key' => 'contact_title',       'value' => 'Parlons de votre projet',                                           'type' => 'text', 'group' => 'contact', 'label' => 'Titre page contact (H1)'],
            ['key' => 'contact_subtitle',    'value' => 'Remplissez le formulaire et notre équipe vous contacte sous 24 h.', 'type' => 'text', 'group' => 'contact', 'label' => 'Sous-titre contact'],
            ['key' => 'contact_confirm_msg', 'value' => 'Merci pour votre message ! Un membre de notre équipe vous répondra dans les 24 heures ouvrées.', 'type' => 'text', 'group' => 'contact', 'label' => 'Message de confirmation'],

            // ── Réseaux sociaux ──────────────────────────────────────────────────
            ['key' => 'social_facebook',  'value' => 'https://facebook.com/nexusagency',           'type' => 'text', 'group' => 'social', 'label' => 'Facebook URL'],
            ['key' => 'social_instagram', 'value' => 'https://instagram.com/nexusagency',          'type' => 'text', 'group' => 'social', 'label' => 'Instagram URL'],
            ['key' => 'social_linkedin',  'value' => 'https://linkedin.com/company/nexusagency',   'type' => 'text', 'group' => 'social', 'label' => 'LinkedIn URL'],
            ['key' => 'social_twitter',   'value' => '',                                           'type' => 'text', 'group' => 'social', 'label' => 'Twitter / X URL'],
            ['key' => 'social_youtube',   'value' => '',                                           'type' => 'text', 'group' => 'social', 'label' => 'YouTube URL'],

            // ── Footer & général ─────────────────────────────────────────────────
            ['key' => 'footer_copyright', 'value' => '© 2026 Nexus Agency. Tous droits réservés.',  'type' => 'text', 'group' => 'general', 'label' => 'Texte copyright'],
            ['key' => 'footer_tagline',   'value' => 'Stratégie · Design · Digital',                'type' => 'text', 'group' => 'general', 'label' => 'Slogan footer'],
            ['key' => 'mentions_legales', 'type' => 'text', 'group' => 'general', 'label' => 'Mentions légales',
             'value' => "**Éditeur du site**\nNexus Agency SAS — Capital social : 10 000 €\nSiège social : 12 Rue de la Créativité, 69001 Lyon\nSIRET : 123 456 789 00010 — TVA intracommunautaire : FR12345678900\n\n**Directeur de la publication**\nSophie Laurent — bonjour@nexus-agency.fr\n\n**Hébergeur**\nOVH SAS — 2 Rue Kellermann, 59100 Roubaix\n\n**Propriété intellectuelle**\nL'ensemble des contenus présents sur ce site est protégé par le droit d'auteur. Toute reproduction est interdite sans autorisation préalable."],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
