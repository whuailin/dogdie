<?php namespace Anomaly\Streams\Platform\Installer\Console\Command;

use Anomaly\Streams\Platform\Support\Collection;
use Illuminate\Console\Command;
use Illuminate\Contracts\Config\Repository;

/**
 * Class SetOtherData
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class SetOtherData
{

    /**
     * The environment data.
     *
     * @var Collection
     */
    protected $data;

    /**
     * The console command.
     *
     * @var Command
     */
    protected $command;

    /**
     * Create a new SetOtherData instance.
     *
     * @param Collection $data
     * @param Command    $command
     */
    public function __construct(Collection $data, Command $command)
    {
        $this->data    = $data;
        $this->command = $command;
    }

    /**
     * Handle the command.
     *
     * @param Repository $config
     */
    public function handle(Repository $config)
    {
        $this->data->put(
            'LOCALE',
            $this->command->askWithCompletion(
                'Enter the default locale',
                array_keys($config->get('streams::locales.supported')),
                env('APPLICATION_LOCALE', 'en')
            )
        );

        $this->data->put(
            'TIMEZONE',
            $this->command->askWithCompletion(
                'Enter the default timezone',
                timezone_identifiers_list(),
                env('APPLICATION_TIMEZONE', 'UTC')
            )
        );

        return $this->data;
    }
}
