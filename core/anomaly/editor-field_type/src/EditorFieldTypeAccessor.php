<?php namespace Anomaly\EditorFieldType;

use Anomaly\EditorFieldType\Command\GetFile;
use Anomaly\EditorFieldType\Command\PutFile;
use Anomaly\EditorFieldType\Command\SyncFile;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeAccessor;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class EditorFieldTypeAccessor
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class EditorFieldTypeAccessor extends FieldTypeAccessor
{

    use DispatchesJobs;

    /**
     * The field type instance.
     * This is for IDE hinting.
     *
     * @var EditorFieldType
     */
    protected $fieldType;

    /**
     * Get the value off the entry.
     *
     * @return string
     */
    public function get()
    {
        return $this->dispatch(new SyncFile($this->fieldType));
    }
}
