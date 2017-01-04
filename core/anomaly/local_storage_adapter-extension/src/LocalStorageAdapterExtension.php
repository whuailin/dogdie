<?php namespace Anomaly\LocalStorageAdapterExtension;

use Anomaly\FilesModule\Disk\Adapter\AdapterExtension;
use Anomaly\FilesModule\Disk\Contract\DiskInterface;
use Anomaly\LocalStorageAdapterExtension\Command\LoadDisk;

/**
 * Class LocalStorageAdapterExtension
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class LocalStorageAdapterExtension extends AdapterExtension
{

    /**
     * This module provides the local
     * storage adapter for the files module.
     *
     * @var string
     */
    protected $provides = 'anomaly.module.files::adapter.local';

    /**
     * Load the disk.
     *
     * @param DiskInterface $disk
     */
    public function load(DiskInterface $disk)
    {
        $this->dispatch(new LoadDisk($disk));
    }
}
