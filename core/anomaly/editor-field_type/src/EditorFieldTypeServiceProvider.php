<?php namespace Anomaly\EditorFieldType;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Application\Application;
use Illuminate\Filesystem\Filesystem;

/**
 * Class EditorFieldTypeServiceProvider
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class EditorFieldTypeServiceProvider extends AddonServiceProvider
{

    /**
     * Register the service provider.
     *
     * @param EditorFieldType $fieldType
     */
    public function register(EditorFieldType $fieldType)
    {

        $fieldType->on('entry_saved', EditorFieldTypeCallbacks::class . '@onEntrySaved');
        $fieldType->on('entry_deleted', EditorFieldTypeCallbacks::class . '@onEntryDeleted');
        $fieldType->on('entry_translation_saved', EditorFieldTypeCallbacks::class . '@onEntryTranslationSaved');
        $fieldType->on('entry_translation_deleted', EditorFieldTypeCallbacks::class . '@onEntryTranslationDeleted');

        /*
         * If the Ace assets don't exist then
         * copy them all over there.
         */
        if (!is_dir($target = $this->app->make(Application::class)->getAssetsPath('editor-field_type'))) {

            /* @var Filesystem $files */
            $files = $this->app->make('files');

            $files->copyDirectory($this->addon->getPath('resources/js/ace'), $target);
        }
    }
}
