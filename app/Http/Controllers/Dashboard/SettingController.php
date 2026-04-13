<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    // ── Identité ─────────────────────────────────────────────────────────────
    public function identity()
    {
        $settings = Setting::where('group', 'identity')->get()->keyBy('key');
        return view('dashboard.settings.identity', compact('settings'));
    }

    public function updateIdentity(Request $request)
    {
        $fields = ['site_name', 'site_tagline'];
        foreach ($fields as $key) {
            if ($request->has($key)) {
                Setting::set($key, $request->input($key));
            }
        }

        // Uploads images
        foreach (['logo_header', 'logo_footer', 'favicon'] as $key) {
            if ($request->hasFile($key)) {
                $this->handleImageUpload($request, $key);
            }
        }

        return back()->with('success', 'Identité mise à jour.');
    }

    // ── Couleurs & Typographie ────────────────────────────────────────────────
    public function colors()
    {
        $settings = Setting::where('group', 'colors')->get()->keyBy('key');
        return view('dashboard.settings.colors', compact('settings'));
    }

    public function updateColors(Request $request)
    {
        $fields = ['color_primary', 'color_secondary', 'color_accent', 'color_text', 'color_bg', 'font_heading', 'font_body'];
        foreach ($fields as $key) {
            if ($request->has($key)) {
                Setting::set($key, $request->input($key));
            }
        }
        return back()->with('success', 'Couleurs et typographies mises à jour.');
    }

    // ── Contenu ───────────────────────────────────────────────────────────────
    public function content()
    {
        $settings = Setting::where('group', 'content')->get()->keyBy('key');
        return view('dashboard.settings.content', compact('settings'));
    }

    public function updateContent(Request $request)
    {
        $textFields = [
            'hero_type', 'hero_title', 'hero_subtitle', 'hero_cta_text', 'hero_cta_url',
            'hero_visible',
            'hero_slide_2_title', 'hero_slide_2_sub',
            'hero_slide_3_title', 'hero_slide_3_sub',
            'services_title', 'services_subtitle', 'services_visible',
            'about_title', 'about_text', 'about_visible',
            'values_title', 'values_visible',
            'cta_title', 'cta_text', 'cta_button_text', 'cta_visible',
            'team_title', 'team_visible', 'gallery_title', 'gallery_visible',
        ];

        // Champs boolean (checkboxes) — défaut 0 si absent
        $boolFields = ['hero_visible', 'services_visible', 'about_visible', 'values_visible', 'cta_visible', 'team_visible', 'gallery_visible'];

        foreach ($textFields as $key) {
            if (in_array($key, $boolFields)) {
                $value = $request->has($key) ? $request->input($key) : '0';
            } else {
                $value = $request->input($key, '');
            }
            Setting::set($key, $value);
        }

        // JSON fields
        foreach (['services_cards', 'values_cards', 'team_members', 'gallery_images'] as $key) {
            if ($request->has($key)) {
                $decoded = json_decode($request->input($key), true);
                if (json_last_error() === JSON_ERROR_NONE) {
                    Setting::set($key, $request->input($key));
                }
            }
        }

        // Images
        foreach (['hero_bg_image', 'hero_slide_2_img', 'hero_slide_3_img', 'about_image'] as $key) {
            if ($request->hasFile($key)) {
                $this->handleImageUpload($request, $key);
            }
        }

        return back()->with('success', 'Contenu mis à jour.');
    }

    // ── Contact config ────────────────────────────────────────────────────────
    public function contact()
    {
        $settings = Setting::where('group', 'contact')->get()->keyBy('key');
        return view('dashboard.settings.contact', compact('settings'));
    }

    public function updateContact(Request $request)
    {
        $fields = ['contact_email', 'contact_phone', 'contact_address', 'contact_title', 'contact_subtitle', 'contact_confirm_msg'];
        foreach ($fields as $key) {
            if ($request->has($key)) {
                Setting::set($key, $request->input($key));
            }
        }
        return back()->with('success', 'Configuration contact mise à jour.');
    }

    // ── Réseaux sociaux ───────────────────────────────────────────────────────
    public function social()
    {
        $settings = Setting::where('group', 'social')->get()->keyBy('key');
        return view('dashboard.settings.social', compact('settings'));
    }

    public function updateSocial(Request $request)
    {
        $fields = ['social_facebook', 'social_instagram', 'social_linkedin', 'social_twitter', 'social_youtube'];
        foreach ($fields as $key) {
            Setting::set($key, $request->input($key, ''));
        }
        return back()->with('success', 'Réseaux sociaux mis à jour.');
    }

    // ── Helper upload ─────────────────────────────────────────────────────────
    private function handleImageUpload(Request $request, string $key): void
    {
        $old = setting($key);
        if ($old && Storage::disk('public')->exists($old)) {
            Storage::disk('public')->delete($old);
        }
        $path = $request->file($key)->store('uploads', 'public');
        Setting::set($key, $path);
    }
}
