<?php namespace Anomaly\Streams\Platform\Stream\Console;

use Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;

class Destroy extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'streams:destroy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Destroy a namespace.';

    /**
     * Execute the console command.
     *
     * @param StreamRepositoryInterface $streams
     */
    public function fire(StreamRepositoryInterface $streams)
    {
        $streams->destroy($this->argument('namespace'));

        $this->info('[' . $this->argument('namespace') . '] namespace destroyed.');
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['namespace', InputArgument::REQUIRED, 'The namespace to destroy.'],
        ];
    }
}
