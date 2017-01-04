<?php namespace Anomaly\Streams\Platform\Stream;

use Anomaly\Streams\Platform\Entry\Command\GenerateEntryModelClassmap;
use Anomaly\Streams\Platform\Search\Command\CheckEntryIndex;
use Anomaly\Streams\Platform\Search\Command\DeleteEntryIndex;
use Anomaly\Streams\Platform\Stream\Command\CreateStreamsEntryTable;
use Anomaly\Streams\Platform\Stream\Command\DeleteStreamAssignments;
use Anomaly\Streams\Platform\Stream\Command\DeleteStreamEntryModels;
use Anomaly\Streams\Platform\Stream\Command\DeleteStreamTranslations;
use Anomaly\Streams\Platform\Stream\Command\DropStreamsEntryTable;
use Anomaly\Streams\Platform\Stream\Command\RenameStreamsEntryTable;
use Anomaly\Streams\Platform\Stream\Contract\StreamInterface;
use Anomaly\Streams\Platform\Stream\Event\StreamWasCreated;
use Anomaly\Streams\Platform\Stream\Event\StreamWasDeleted;
use Anomaly\Streams\Platform\Stream\Event\StreamWasSaved;
use Anomaly\Streams\Platform\Stream\Event\StreamWasUpdated;
use Anomaly\Streams\Platform\Support\Observer;

/**
 * Class StreamObserver
 *
 * @link    http://pyrocms.com/
 * @author  PyroCMS, Inc. <support@pyrocms.com>
 * @author  Ryan Thompson <ryan@pyrocms.com>
 */
class StreamObserver extends Observer
{

    /**
     * Run before a stream is created.
     *
     * @param StreamInterface $model
     */
    public function creating(StreamInterface $model)
    {
        $model->fireFieldTypeEvents('stream_creating');
    }

    /**
     * Run after a stream is created.
     *
     * @param StreamInterface $model
     */
    public function created(StreamInterface $model)
    {
        $model->compile();
        $model->flushCache();

        $this->dispatch(new CreateStreamsEntryTable($model));

        $model->fireFieldTypeEvents('stream_created');

        $this->events->fire(new StreamWasCreated($model));
    }

    /**
     * Run after stream a record.
     *
     * @param StreamInterface $model
     */
    public function saved(StreamInterface $model)
    {
        $model->compile();
        $model->flushCache();

        $this->dispatch(new CheckEntryIndex($model));

        $model->fireFieldTypeEvents('stream_saved');

        $this->events->fire(new StreamWasSaved($model));
    }

    /**
     * Run before a record is updated.
     *
     * @param StreamInterface $model
     */
    public function updating(StreamInterface $model)
    {
        $model->fireFieldTypeEvents('stream_updating');

        $this->dispatch(new RenameStreamsEntryTable($model));
    }

    /**
     * Run after a record is updated.
     *
     * @param StreamInterface $model
     */
    public function updated(StreamInterface $model)
    {
        $model->fireFieldTypeEvents('stream_updated');

        $this->events->fire(new StreamWasUpdated($model));
    }

    /**
     * Run after a stream has been deleted.
     *
     * @param StreamInterface $model
     */
    public function deleted(StreamInterface $model)
    {
        $model->compile();
        $model->flushCache();

        $model->fireFieldTypeEvents('stream_deleted');

        $this->dispatch(new DeleteEntryIndex($model));
        $this->dispatch(new DropStreamsEntryTable($model));
        $this->dispatch(new DeleteStreamEntryModels($model));
        $this->dispatch(new DeleteStreamAssignments($model));
        $this->dispatch(new DeleteStreamTranslations($model));
        $this->dispatch(new GenerateEntryModelClassmap());

        $this->events->fire(new StreamWasDeleted($model));
    }
}
