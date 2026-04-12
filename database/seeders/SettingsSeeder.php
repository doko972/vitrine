<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // Identité
            ['key' => 'site_name',          'value' => 'Mon Entreprise',          'type' => 'text',    'group' => 'identity', 'label' => 'Nom du site'],
            ['key' => 'site_tagline',       'value' => 'Votre slogan ici',         'type' => 'text',    'group' => 'identity', 'label' => 'Slogan'],
            ['key' => 'logo_header',        'value' => null,                       'type' => 'image',   'group' => 'identity', 'label' => 'Logo header'],
            ['key' => 'logo_footer',        'value' => null,                       'type' => 'image',   'group' => 'identity', 'label' => 'Logo footer'],
            ['key' => 'favicon',            'value' => null,                       'type' => 'image',   'group' => 'identity', 'label' => 'Favicon'],

            // Couleurs
            ['key' => 'color_primary',      'value' => '#2563eb',                  'type' => 'color',   'group' => 'colors',   'label' => 'Couleur primaire'],
            ['key' => 'color_secondary',    'value' => '#1e40af',                  'type' => 'color',   'group' => 'colors',   'label' => 'Couleur secondaire'],
            ['key' => 'color_accent',       'value' => '#f59e0b',                  'type' => 'color',   'group' => 'colors',   'label' => 'Couleur accent'],
            ['key' => 'color_text',         'value' => '#1f2937',                  'type' => 'color',   'group' => 'colors',   'label' => 'Couleur texte'],
            ['key' => 'color_bg',           'value' => '#ffffff',                  'type' => 'color',   'group' => 'colors',   'label' => 'Couleur fond'],
            ['key' => 'font_heading',       'value' => 'Poppins',                  'type' => 'text',    'group' => 'colors',   'label' => 'Police titres'],
            ['key' => 'font_body',          'value' => 'Inter',                    'type' => 'text',    'group' => 'colors',   'label' => 'Police corps'],

            // Page Hero
            ['key' => 'hero_title',         'value' => 'Bienvenue chez nous',      'type' => 'text',    'group' => 'content',  'label' => 'Titre Hero (H1)'],
            ['key' => 'hero_subtitle',      'value' => 'Nous créons des solutions innovantes pour votre entreprise.', 'type' => 'text', 'group' => 'content', 'label' => 'Sous-titre Hero'],
            ['key' => 'hero_cta_text',      'value' => 'Découvrir nos services',   'type' => 'text',    'group' => 'content',  'label' => 'Bouton Hero texte'],
            ['key' => 'hero_cta_url',       'value' => '/entreprise',              'type' => 'text',    'group' => 'content',  'label' => 'Bouton Hero lien'],
            ['key' => 'hero_bg_image',      'value' => null,                       'type' => 'image',   'group' => 'content',  'label' => 'Image fond Hero'],
            ['key' => 'hero_visible',       'value' => '1',                        'type' => 'boolean', 'group' => 'content',  'label' => 'Hero visible'],

            // Section Services
            ['key' => 'services_title',     'value' => 'Nos Services',             'type' => 'text',    'group' => 'content',  'label' => 'Titre Services (H2)'],
            ['key' => 'services_subtitle',  'value' => 'Ce que nous proposons',    'type' => 'text',    'group' => 'content',  'label' => 'Sous-titre Services'],
            ['key' => 'services_visible',   'value' => '1',                        'type' => 'boolean', 'group' => 'content',  'label' => 'Section Services visible'],
            ['key' => 'services_cards',     'value' => '[{"title":"Service 1","description":"Description du service 1","icon":"⚡"},{"title":"Service 2","description":"Description du service 2","icon":"🎯"},{"title":"Service 3","description":"Description du service 3","icon":"💡"}]', 'type' => 'json', 'group' => 'content', 'label' => 'Cartes services'],

            // Section À propos
            ['key' => 'about_title',        'value' => 'À Propos de Nous',         'type' => 'text',    'group' => 'content',  'label' => 'Titre À propos (H2)'],
            ['key' => 'about_text',         'value' => 'Nous sommes une entreprise passionnée par l\'innovation et l\'excellence. Notre équipe dédiée travaille chaque jour pour vous offrir les meilleures solutions.', 'type' => 'text', 'group' => 'content', 'label' => 'Texte À propos'],
            ['key' => 'about_image',        'value' => null,                       'type' => 'image',   'group' => 'content',  'label' => 'Image À propos'],
            ['key' => 'about_visible',      'value' => '1',                        'type' => 'boolean', 'group' => 'content',  'label' => 'Section À propos visible'],

            // Section Valeurs
            ['key' => 'values_title',       'value' => 'Nos Valeurs',              'type' => 'text',    'group' => 'content',  'label' => 'Titre Valeurs (H2)'],
            ['key' => 'values_cards',       'value' => '[{"title":"Excellence","description":"Nous visons la perfection dans chaque projet."},{"title":"Innovation","description":"Nous adoptons les dernières technologies."},{"title":"Confiance","description":"La transparence est au cœur de notre démarche."}]', 'type' => 'json', 'group' => 'content', 'label' => 'Cartes valeurs'],
            ['key' => 'values_visible',     'value' => '1',                        'type' => 'boolean', 'group' => 'content',  'label' => 'Section Valeurs visible'],

            // Section CTA
            ['key' => 'cta_title',          'value' => 'Prêt à démarrer ?',        'type' => 'text',    'group' => 'content',  'label' => 'Titre CTA (H2)'],
            ['key' => 'cta_text',           'value' => 'Contactez-nous dès aujourd\'hui pour discuter de votre projet.', 'type' => 'text', 'group' => 'content', 'label' => 'Texte CTA'],
            ['key' => 'cta_button_text',    'value' => 'Nous contacter',           'type' => 'text',    'group' => 'content',  'label' => 'Bouton CTA texte'],
            ['key' => 'cta_visible',        'value' => '1',                        'type' => 'boolean', 'group' => 'content',  'label' => 'Section CTA visible'],

            // Équipe
            ['key' => 'team_title',         'value' => 'Notre Équipe',             'type' => 'text',    'group' => 'content',  'label' => 'Titre Équipe (H2)'],
            ['key' => 'team_visible',       'value' => '1',                        'type' => 'boolean', 'group' => 'content',  'label' => 'Section Équipe visible'],
            ['key' => 'team_members',       'value' => '[{"name":"Jean Dupont","role":"Directeur","image":null},{"name":"Marie Martin","role":"Chef de projet","image":null},{"name":"Luc Bernard","role":"Développeur","image":null}]', 'type' => 'json', 'group' => 'content', 'label' => 'Membres équipe'],

            // Galerie
            ['key' => 'gallery_title',      'value' => 'Notre Galerie',            'type' => 'text',    'group' => 'content',  'label' => 'Titre Galerie (H2)'],
            ['key' => 'gallery_visible',    'value' => '1',                        'type' => 'boolean', 'group' => 'content',  'label' => 'Section Galerie visible'],
            ['key' => 'gallery_images',     'value' => '[]',                       'type' => 'json',    'group' => 'content',  'label' => 'Images galerie'],

            // Contact
            ['key' => 'contact_email',      'value' => 'contact@monentreprise.fr', 'type' => 'text',    'group' => 'contact',  'label' => 'Email de contact'],
            ['key' => 'contact_phone',      'value' => '+33 1 23 45 67 89',        'type' => 'text',    'group' => 'contact',  'label' => 'Téléphone'],
            ['key' => 'contact_address',    'value' => '1 Rue de la Paix, 75001 Paris', 'type' => 'text', 'group' => 'contact', 'label' => 'Adresse'],
            ['key' => 'contact_title',      'value' => 'Contactez-nous',           'type' => 'text',    'group' => 'contact',  'label' => 'Titre page contact (H1)'],
            ['key' => 'contact_subtitle',   'value' => 'Nous sommes à votre écoute', 'type' => 'text',  'group' => 'contact',  'label' => 'Sous-titre contact'],
            ['key' => 'contact_confirm_msg','value' => 'Merci ! Votre message a bien été envoyé. Nous vous répondrons dans les plus brefs délais.', 'type' => 'text', 'group' => 'contact', 'label' => 'Message de confirmation'],

            // Réseaux sociaux
            ['key' => 'social_facebook',    'value' => '',                         'type' => 'text',    'group' => 'social',   'label' => 'Facebook URL'],
            ['key' => 'social_instagram',   'value' => '',                         'type' => 'text',    'group' => 'social',   'label' => 'Instagram URL'],
            ['key' => 'social_linkedin',    'value' => '',                         'type' => 'text',    'group' => 'social',   'label' => 'LinkedIn URL'],
            ['key' => 'social_twitter',     'value' => '',                         'type' => 'text',    'group' => 'social',   'label' => 'Twitter / X URL'],
            ['key' => 'social_youtube',     'value' => '',                         'type' => 'text',    'group' => 'social',   'label' => 'YouTube URL'],

            // Footer
            ['key' => 'footer_copyright',   'value' => '© 2024 Mon Entreprise. Tous droits réservés.', 'type' => 'text', 'group' => 'general', 'label' => 'Texte copyright'],
            ['key' => 'footer_tagline',     'value' => 'Votre partenaire de confiance', 'type' => 'text', 'group' => 'general', 'label' => 'Slogan footer'],
            ['key' => 'mentions_legales',   'value' => 'Mentions légales de votre site...', 'type' => 'text', 'group' => 'general', 'label' => 'Mentions légales'],
        ];

        foreach ($settings as $setting) {
            Setting::firstOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
