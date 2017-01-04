<?php namespace Anomaly\SelectFieldType\Handler;

use Anomaly\SelectFieldType\SelectFieldType;
use Anomaly\Streams\Platform\Addon\Theme\ThemeCollection;
use Illuminate\Config\Repository;
use Illuminate\Filesystem\Filesystem;

/**
 * Class Emails
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class Emails
{

    /**
     * Handle the options.
     *
     * @param SelectFieldType $fieldType
     * @param ThemeCollection $themes
     * @param Repository      $config
     * @param Filesystem      $files
     */
    public function handle(SelectFieldType $fieldType, ThemeCollection $themes, Repository $config, Filesystem $files)
    {
        $theme = $themes->get($config->get('streams::themes.standard'));

        if (!$files->isDirectory($theme->getPath('resources/views/layouts/emails'))) {
            return [];
        }

        $options = $files->allFiles($theme->getPath('resources/views/layouts/emails'));

        $fieldType->setOptions(
            array_combine(
                array_map(
                    function ($path) use ($theme) {
                        return 'theme::' . ltrim(
                            str_replace($theme->getPath('resources/views'), '', $path),
                            '/'
                        );
                    },
                    $options
                ),
                array_map(
                    function ($path) use ($theme) {
                        return ltrim(str_replace($theme->getPath('resources/views/layouts/emails'), '', $path), '/');
                    },
                    $options
                )
            )
        );
    }
}
