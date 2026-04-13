<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ContactMessagesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('contact_messages')->truncate();

        $messages = [
            [
                'name'       => 'Arnaud Chevalier',
                'email'      => 'arnaud.chevalier@pmeinnovante.fr',
                'phone'      => '+33 6 12 34 56 78',
                'subject'    => 'Refonte site web',
                'message'    => 'Bonjour, notre site actuel date de 2019 et nous souhaitons une refonte complète avec un design moderne et une meilleure expérience mobile. Nous avons un budget de 4 000 à 6 000 €. Pouvez-vous nous proposer une réunion de présentation ?',
                'read'       => true,
                'created_at' => Carbon::now()->subDays(15),
                'updated_at' => Carbon::now()->subDays(15),
            ],
            [
                'name'       => 'Isabelle Fontaine',
                'email'      => 'i.fontaine@cabinetfontaine-avocats.fr',
                'phone'      => '+33 6 98 76 54 32',
                'subject'    => 'Création site vitrine cabinet d\'avocats',
                'message'    => 'Cabinet d\'avocats spécialisé en droit des affaires, nous cherchons à créer notre première présence en ligne. Nous avons besoin d\'un site sobre, professionnel, avec une page de contact et une section actualités juridiques. Merci de me recontacter.',
                'read'       => true,
                'created_at' => Carbon::now()->subDays(10),
                'updated_at' => Carbon::now()->subDays(10),
            ],
            [
                'name'       => 'Marc Durand',
                'email'      => 'marc.durand@gmail.com',
                'phone'      => null,
                'subject'    => 'Question tarifs SEO',
                'message'    => 'Bonjour, je souhaite savoir ce que comprend exactement votre prestation SEO et quels sont vos tarifs mensuels. Mon site e-commerce est sur Shopify. Merci.',
                'read'       => false,
                'created_at' => Carbon::now()->subDays(5),
                'updated_at' => Carbon::now()->subDays(5),
            ],
            [
                'name'       => 'Lucie Blanchard',
                'email'      => 'lucie@atelierblanchard.com',
                'phone'      => '+33 7 45 67 89 01',
                'subject'    => 'Identité visuelle + site web',
                'message'    => 'Je lance ma marque de céramique artisanale et j\'ai besoin d\'une identité visuelle complète (logo, charte) + un site vitrine avec boutique en ligne. Budget global autour de 5 000 €. Seriez-vous disponible pour un appel cette semaine ?',
                'read'       => false,
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDays(2),
            ],
            [
                'name'       => 'Rémi Gauthier',
                'email'      => 'rgauthier@constructpro.fr',
                'phone'      => '+33 6 23 45 67 89',
                'subject'    => 'Gestion réseaux sociaux',
                'message'    => 'Notre entreprise de construction souhaite externaliser la gestion de nos réseaux sociaux (LinkedIn et Instagram principalement). Nous avons besoin de 3 à 4 publications par semaine et d\'une cohérence avec notre image de marque. Quel type d\'accompagnement proposez-vous ?',
                'read'       => false,
                'created_at' => Carbon::now()->subHours(6),
                'updated_at' => Carbon::now()->subHours(6),
            ],
        ];

        DB::table('contact_messages')->insert($messages);
    }
}
