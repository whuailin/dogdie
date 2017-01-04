<?php namespace Anomaly\FilesModule\Folder;

use Anomaly\FilesModule\Folder\Command\CreateStream;
use Anomaly\FilesModule\Folder\Command\DeleteDirectory;
use Anomaly\FilesModule\Folder\Command\DeleteFiles;
use Anomaly\FilesModule\Folder\Command\DeleteStream;
use Anomaly\FilesModule\Folder\Contract\FolderInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryObserver;

/**
 * Class FolderObserver
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class FolderObserver extends EntryObserver
{

    /**
     * Fired just after creating an entry.
     *
     * @param EntryInterface $entry
     */
    public function created(EntryInterface $entry)
    {
        $this->dispatch(new CreateStream($entry));

        parent::created($entry);
    }

    /**
     * Fired just after deleting an entry.
     *
     * @param EntryInterface $entry
     */
    public function deleted(EntryInterface $entry)
    {
        $this->dispatch(new DeleteFiles($entry));
        $this->dispatch(new DeleteDirectory($entry));
        $this->dispatch(new DeleteStream($entry));

        parent::deleted($entry);
    }
}
