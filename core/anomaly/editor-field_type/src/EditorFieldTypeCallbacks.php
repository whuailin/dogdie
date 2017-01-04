<?php namespace Anomaly\EditorFieldType;

use Anomaly\EditorFieldType\Command\DeleteDirectory;
use Anomaly\EditorFieldType\Command\PutFile;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class EditorFieldTypeCallbacks
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class EditorFieldTypeCallbacks
{

    use DispatchesJobs;

    /**
     * Fired after an entry is saved.
     *
     * @param EditorFieldType $fieldType
     */
    public function onEntrySaved(EditorFieldType $fieldType)
    {
        if (!$fieldType->getLocale()) {
            $this->dispatch(new PutFile($fieldType));
        }
    }

    /**
     * Fired after an entry translation is saved.
     *
     * @param EditorFieldType $fieldType
     */
    public function onEntryTranslationSaved(EditorFieldType $fieldType)
    {
        $this->dispatch(new PutFile($fieldType));
    }

    /**
     * Fired after an entry is deleted.
     *
     * @param EditorFieldType $fieldType
     */
    public function onEntryDeleted(EditorFieldType $fieldType)
    {
        if (!$fieldType->getLocale()) {
            $this->dispatch(new DeleteDirectory($fieldType));
        }
    }

    /**
     * Fired after an entry translation is deleted.
     *
     * @param EditorFieldType $fieldType
     */
    public function onEntryTranslationDeleted(EditorFieldType $fieldType)
    {
        $this->dispatch(new DeleteDirectory($fieldType));
    }
}
