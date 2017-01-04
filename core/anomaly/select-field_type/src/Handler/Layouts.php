<?php namespace Anomaly\SelectFieldType\Handler;

use Anomaly\SelectFieldType\SelectFieldType;
use Anomaly\Streams\Platform\Addon\Theme\ThemeCollection;
use Anomaly\Streams\Platform\Support\Str;
use Illuminate\Config\Repository;
use Illuminate\Filesystem\Filesystem;

/**
 * Class Layouts
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class Layouts
{

    /**
     * Handle the options.
     *
     * @param SelectFieldType $fieldType
     * @param ThemeCollection $themes
     * @param Repository      $config
     * @param Filesystem      $files
     * @param Str             $str
     */
    public function handle(
        SelectFieldType $fieldType,
        ThemeCollection $themes,
        Repository $config,
        Filesystem $files,
        Str $str
    ) {
        $theme = $themes->get($config->get('streams::themes.standard'));

        if (!$files->isDirectory($directory = $theme->getPath('resources/views/layouts'))) {
            return [];
        }

        $layouts = $files->allFiles($directory = $theme->getPath('resources/views/layouts'));

        $prefix = $theme->getPath('resources/views');

        $options = array_combine(
            array_map(
                function ($path) use ($prefix) {

                    $path = str_replace($prefix, '', $path);
                    $path = trim($path, '/\\');
                    $path = str_replace(basename($path), basename(pathinfo($path, PATHINFO_FILENAME), '.blade'), $path);
                    $path = str_replace(DIRECTORY_SEPARATOR, '.', $path);

                    return 'theme::' . $path;
                },
                $layouts
            ),
            array_map(
                function ($path) use ($directory, $str) {

                    $path = str_replace($directory, '', $path);
                    $path = trim($path, DIRECTORY_SEPARATOR);
                    $path = str_replace(basename($path), basename(pathinfo($path, PATHINFO_FILENAME), '.blade'), $path);
                    $path = str_replace(DIRECTORY_SEPARATOR, ' > ', $path);

                    return ucwords($str->humanize($path));
                },
                $layouts
            )
        );

        $fieldType->setOptions($options);
    }
}
