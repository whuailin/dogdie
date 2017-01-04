<?php namespace Anomaly\FilesModule\File;

use Anomaly\FilesModule\Disk\Adapter\AdapterFilesystem;
use Anomaly\FilesModule\Disk\Contract\DiskInterface;
use Anomaly\FilesModule\File\Command\GetImage;
use Anomaly\FilesModule\File\Command\GetPreviewSupport;
use Anomaly\FilesModule\File\Command\GetResource;
use Anomaly\FilesModule\File\Command\GetType;
use Anomaly\FilesModule\File\Contract\FileInterface;
use Anomaly\FilesModule\Folder\Contract\FolderInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Image\Image;
use Anomaly\Streams\Platform\Model\Files\FilesFilesEntryModel;
use League\Flysystem\File;

/**
 * Class FileModel
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class FileModel extends FilesFilesEntryModel implements FileInterface
{

    /**
     * Cache results.
     *
     * @var int
     */
    protected $ttl = 99999;

    /**
     * Always eager load these.
     *
     * @var array
     */
    protected $with = [
        'disk',
        'folder',
        'entry',
    ];

    /**
     * Return the file path.
     *
     * @return string
     */
    public function path()
    {
        if (!$folder = $this->getFolder()) {
            return null;
        }

        return "{$folder->getSlug()}/{$this->getName()}";
    }

    /**
     * Return the file location.
     *
     * @return string
     */
    public function location()
    {
        if (!$disk = $this->getDisk()) {
            return null;
        }

        return "{$disk->getSlug()}://{$this->path()}";
    }

    /**
     * Return the file resource.
     *
     * @return File
     */
    public function resource()
    {
        return $this->dispatch(new GetResource($this));
    }

    /**
     * Return the resource filesystem.
     *
     * @return AdapterFilesystem
     */
    public function filesystem()
    {
        return $this
            ->resource()
            ->getFilesystem();
    }

    /**
     * Return the filesystem URL.
     *
     * @return string
     */
    public function url()
    {
        return $this->filesystem()
            ->url($this->path());
    }

    /**
     * Return a new image instance.
     *
     * @return Image
     */
    public function image()
    {
        return $this->dispatch(new GetImage($this));
    }

    /**
     * Alias for image()
     *
     * @return Image
     */
    public function make()
    {
        return $this->image();
    }

    /**
     * Return the file type.
     *
     * @return string
     */
    public function type()
    {
        return $this->dispatch(new GetType($this));
    }

    /**
     * Return if the image can
     * be previewed or not.
     *
     * @return boolean
     */
    public function canPreview()
    {
        return $this->dispatch(new GetPreviewSupport($this));
    }

    /**
     * Return the file's primary mime type.
     *
     * @return string
     */
    public function primaryMimeType()
    {
        $mimes = explode('/', $this->getMimeType());

        return array_shift($mimes);
    }

    /**
     * Return the file's sub mime type.
     *
     * @return string
     */
    public function secondaryMimeType()
    {
        $mimes = explode('/', $this->getMimeType());

        return array_pop($mimes);
    }

    /**
     * Get the name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the related disk.
     *
     * @return DiskInterface
     */
    public function getDisk()
    {
        return $this->disk;
    }

    /**
     * Get the size.
     *
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Get the width.
     *
     * @return null|int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Get the height.
     *
     * @return null|int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Get the related folder.
     *
     * @return null|FolderInterface
     */
    public function getFolder()
    {
        return $this->folder;
    }

    /**
     * Get the mime type.
     *
     * @return string
     */
    public function getMimeType()
    {
        return $this->mime_type;
    }

    /**
     * Get the extension.
     *
     * @return string
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Lowercase the extension.
     *
     * @param $value
     */
    public function setExtensionAttribute($value)
    {
        $this->attributes['extension'] = strtolower($value);
    }

    /**
     * Get the keywords.
     *
     * @return array
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Get the description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the related entry.
     *
     * @return EntryInterface
     */
    public function getEntry()
    {
        return $this->entry;
    }

    /**
     * Get the related entry ID.
     *
     * @return null|int
     */
    public function getEntryId()
    {
        return $this->entry_id;
    }

    /**
     * Return the entry as an array.
     *
     * @return array
     */
    public function toArray()
    {
        $array = parent::toArray();

        if ($entry = $this->getEntry()) {
            $array = array_merge($entry->toArray(), $array);
        }

        $array['path']     = $this->path();
        $array['location'] = $this->location();

        return $array;
    }

    /**
     * Return the entry as a routable array.
     *
     * @return array
     */
    public function toRoutableArray()
    {
        $array = self::toArray();

        $folder = $this->getFolder();

        $array['folder'] = $folder->getSlug();

        return $array;
    }

    /**
     * Return the searchable array.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = parent::toSearchableArray();

        if ($entry = $this->getEntry()) {
            $array = array_merge($entry->toSearchableArray(), $array);
        }

        return $array;
    }
}
