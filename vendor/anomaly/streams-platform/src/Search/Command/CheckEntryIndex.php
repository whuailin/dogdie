<?php namespace Anomaly\Streams\Platform\Search\Command;

use Anomaly\Streams\Platform\Application\Application;
use Anomaly\Streams\Platform\Stream\Contract\StreamInterface;
use Illuminate\Filesystem\Filesystem;
use Laravel\Scout\EngineManager;

class CheckEntryIndex
{

    /**
     * The stream instance.
     *
     * @var StreamInterface
     */
    protected $stream;

    /**
     * Create a new CheckCreateIndex instance.
     *
     * @param StreamInterface $stream [description]
     */
    public function __construct(StreamInterface $stream)
    {
        $this->stream = $stream;
    }

    /**
     * Handle the command.
     *
     * @param Application $application
     */
    public function handle(Application $application, Filesystem $files)
    {
        if (!env('INSTALLED')) {
            return;
        }

        if (!class_exists('TeamTNT\TNTSearch\TNTSearch')) {
            return;
        }

        if (!class_exists($this->stream->getEntryModelName())) {
            return;
        }

        $model = $this->stream->getEntryModel();

        $index = $application->getStoragePath('search/' . $model->searchableAs() . '.index');

        if ($this->stream->isSearchable() && file_exists($index)) {
            return;
        }

        if (!$this->stream->isSearchable() && file_exists($index)) {
            $files->delete($index);

            return;
        }

        if (!$this->stream->isSearchable()) {
            return;
        }

        try {
            app(EngineManager::class)->engine('tntsearch')->initIndex($model);
        } catch (\Exception $e) {
            // Kewl.
        }
    }
}
