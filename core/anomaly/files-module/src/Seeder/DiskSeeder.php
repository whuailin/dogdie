<?php namespace Anomaly\FilesModule\Seeder;

use Anomaly\FilesModule\Disk\Contract\DiskRepositoryInterface;
use Anomaly\Streams\Platform\Database\Seeder\Seeder;

/**
 * Class DiskSeeder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class DiskSeeder extends Seeder
{

    /**
     * The disk repository.
     *
     * @var DiskRepositoryInterface
     */
    protected $disks;

    /**
     * Create a new DiskSeeder instance.
     *
     * @param $disks
     */
    public function __construct(DiskRepositoryInterface $disks)
    {
        $this->disks = $disks;
    }

    /**
     * Run the seeder.
     */
    public function run()
    {
        $this->disks
            ->truncate()
            ->create(
                [
                    'en'      => [
                        'name'        => 'Local',
                        'description' => 'A local (public) storage disk.',
                    ],
                    'slug'    => 'local',
                    'adapter' => 'anomaly.extension.local_storage_adapter',
                ]
            );
    }
}
