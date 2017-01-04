<?php namespace Anomaly\Streams\Platform\Application\Console;

use Illuminate\Console\Command;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Symfony\Component\Console\Input\InputOption;
use Anomaly\Streams\Platform\Application\Console\Command\PublishConfig;
use Anomaly\Streams\Platform\Application\Console\Command\PublishTranslations;

class StreamsPublish extends Command
{
    use DispatchesJobs;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'streams:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish configuration and translations for streams.';

    /**
     * Execute the console command.
     */
    public function fire()
    {
        $this->dispatch(new PublishConfig($this));
        $this->dispatch(new PublishTranslations($this));
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['force', null, InputOption::VALUE_NONE, 'Force overwriting files.'],
        ];
    }
}
