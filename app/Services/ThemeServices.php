<?php

namespace App\Services;

use App\Models\Setting;
use App\Models\Theme;

class ThemeServices
{
    /**
     * Return the blog theme.
     *
     * @param string $text
     *
     * @return string
     */
    public static function getTheTheme()
    {
        $self   = new self();
        $theme  = Theme::find($self->getTheThemeId());

        return $theme;
    }

    /**
     * Check for random theme
     *
     * @param object $theme  The theme
     *
     * @return object
     */
    public static function checkForRandomTheme($theme)
    {
        if ($theme->name != 'Random') {
            return $theme;
        }

        return self::getRandomTheme($theme);
    }

    /**
     * Get random theme
     *
     * @param object $theme  The theme
     *
     * @return object
     */
    public static function getRandomTheme($theme)
    {
        $themes = collect(Theme::all()->pluck('id'))->toArray();
        $themes = array_filter($themes, function($v) use ($theme) {
            return $v != $theme->id;
        });

        return Theme::find(array_rand($themes));
    }

    /**
     * Returns the blog theme identifier.
     *
     * @return string
     */
    public function getTheThemeId()
    {
        return Setting::themeId()->pluck('value')->first();
    }

    /**
     * Gets a theme.
     *
     * @param int$id
     *
     * @return colletion.
     */
    public static function getTheme($id)
    {
        return Theme::findOrFail($id);
    }

    /**
     * Gets all themes.
     *
     * @return collection
     */
    public static function getAllThemes()
    {
        return Theme::orderBy('name', 'asc')->get();
    }

    /**
     * Stores a new theme.
     *
     * @param $validatedRequest  The validated request
     *
     * @return collection
     */
    public static function storeNewTheme($validatedRequest)
    {
        $taggableBase = [
            'taggable_id'     => 0,
            'taggable_type'   => 'theme',
        ];

        $theme = Theme::create(array_merge($validatedRequest, $taggableBase));
        $theme->taggable_id = $theme->id;
        $theme->save();

        return $theme;
    }

    /**
     * Update the default theme in the settings.
     *
     * @param int $themeId The theme identifier
     *
     * @return collection
     */
    public static function updateDefaultThemeSetting($themeId)
    {
        $blogTheme = Setting::where('key', '=', 'theme_id')->first();
        $blogTheme->value = $themeId;
        $blogTheme->save();

        return $blogTheme;
    }

    /**
     * Delete a blgo theme.
     *
     * @param int $themeId
     *
     * @return collection
     */
    public static function deleteTheme($themeId)
    {
        $theme = Theme::findOrFail($themeId);
        $theme->delete();

        return $theme;
    }
}
