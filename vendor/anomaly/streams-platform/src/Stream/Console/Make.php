<?php namespace Anomaly\Streams\Platform\Stream\Console;

use Anomaly\Streams\Platform\Addon\Addon;
use Anomaly\Streams\Platform\Addon\AddonCollection;
use Anomaly\Streams\Platform\Stream\Console\Command\WriteEntityCollection;
use Anomaly\Streams\Platform\Stream\Console\Command\WriteEntityController;
use Anomaly\Streams\Platform\Stream\Console\Command\WriteEntityCriteria;
use Anomaly\Streams\Platform\Stream\Console\Command\WriteEntityFormBuilder;
use Anomaly\Streams\Platform\Stream\Console\Command\WriteEntityModel;
use Anomaly\Streams\Platform\Stream\Console\Command\WriteEntityModelInterface;
use Anomaly\Streams\Platform\Stream\Console\Command\WriteEntityObserver;
use Anomaly\Streams\Platform\Stream\Console\Command\WriteEntityPresenter;
use Anomaly\Streams\Platform\Stream\Console\Command\WriteEntityRepository;
use Anomaly\Streams\Platform\Stream\Console\Command\WriteEntityRepositoryInterface;
use Anomaly\Streams\Platform\Stream\Console\Command\WriteEntityRouter;
use Anomaly\Streams\Platform\Stream\Console\Command\WriteEntityRoutes;
use Anomaly\Streams\Platform\Stream\Console\Command\WriteEntityTableBuilder;
use Illuminate\Console\Command;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

/**
 * Class Make
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class Make extends Command
{
    use DispatchesJobs;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:stream';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a streams entity namespace.';

    /**
     * Execute the console command.
     */
    public function fire(AddonCollection $addons)
    {
        $slug  = $this->argument('slug');
        $addon = $this->argument('addon');

        /* @var Addon $addon */
        if (!$addon = $addons->get($addon)) {
            throw new \Exception("The addon [{$this->argument('addon')}] could not be found.");
        }

        if (!$namespace = $this->option('namespace')) {
            $namespace = $addon->getSlug();
        }

        $this->dispatch(new WriteEntityModel($addon, $slug, $namespace));
        $this->dispatch(new WriteEntityRoutes($addon, $slug, $namespace));
        $this->dispatch(new WriteEntityRouter($addon, $slug, $namespace));
        $this->dispatch(new WriteEntityObserver($addon, $slug, $namespace));
        $this->dispatch(new WriteEntityCriteria($addon, $slug, $namespace));
        $this->dispatch(new WriteEntityPresenter($addon, $slug, $namespace));
        $this->dispatch(new WriteEntityController($addon, $slug, $namespace));
        $this->dispatch(new WriteEntityCollection($addon, $slug, $namespace));
        $this->dispatch(new WriteEntityRepository($addon, $slug, $namespace));
        $this->dispatch(new WriteEntityFormBuilder($addon, $slug, $namespace));
        $this->dispatch(new WriteEntityTableBuilder($addon, $slug, $namespace));
        $this->dispatch(new WriteEntityModelInterface($addon, $slug, $namespace));
        $this->dispatch(new WriteEntityRepositoryInterface($addon, $slug, $namespace));

        $this->call(
            'make:migration',
            [
                'name'     => 'create_' . $slug . '_stream',
                '--addon'  => $addon->getNamespace(),
                '--stream' => $slug,
            ]
        );
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['slug', InputArgument::REQUIRED, 'The entity\'s stream slug.'],
            ['addon', InputArgument::REQUIRED, 'The addon in which to put the new entity namespace.'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['namespace', null, InputOption::VALUE_OPTIONAL, 'The stream namespace if not the same as the addon.'],
            ['migration', null, InputOption::VALUE_NONE, 'Indicates if an stream migration should be created.'],
        ];
    }
}
