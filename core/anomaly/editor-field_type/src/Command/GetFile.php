<?php namespace Anomaly\EditorFieldType\Command;

use Anomaly\EditorFieldType\EditorFieldType;
use Illuminate\Filesystem\Filesystem;

/**
 * Class GetFile
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class GetFile
{

    /**
     * The editor field type instance.
     *
     * @var EditorFieldType
     */
    protected $fieldType;

    /**
     * Create a new GetFile instance.
     *
     * @param EditorFieldType $fieldType
     */
    public function __construct(EditorFieldType $fieldType)
    {
        $this->fieldType = $fieldType;
    }

    /**
     * Handle the command.
     *
     * @param Filesystem $files
     */
    public function handle(Filesystem $files)
    {
        $path = $this->fieldType->getStoragePath();

        if ($path && $files->isFile($path)) {
            return $files->get($path);
        }

        return null;
    }
}
