<?php

namespace App\Http\ViewComposers;

use App\Services\ThemeServices;
use Illuminate\View\View;

class SettingsComposer
{
    protected $theme;

    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->theme = ThemeServices::getTheTheme();
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        $theme = ThemeServices::checkForRandomTheme($this->theme);

        $data = [
            'theme' => $theme,
        ];

        $view->with($data);
    }
}
