<?php namespace Anomaly\Streams\Platform\Entry\Command;

use Anomaly\Streams\Platform\Support\Parser;
use Anomaly\Streams\Platform\Application\Application;
use Anomaly\Streams\Platform\Entry\Parser\EntryClassParser;
use Anomaly\Streams\Platform\Entry\Parser\EntryDatesParser;
use Anomaly\Streams\Platform\Entry\Parser\EntryRulesParser;
use Anomaly\Streams\Platform\Entry\Parser\EntryTableParser;
use Anomaly\Streams\Platform\Entry\Parser\EntryTitleParser;
use Anomaly\Streams\Platform\Entry\Parser\EntryStreamParser;
use Anomaly\Streams\Platform\Stream\Contract\StreamInterface;
use Anomaly\Streams\Platform\Entry\Parser\EntryRelationsParser;
use Anomaly\Streams\Platform\Entry\Parser\EntryNamespaceParser;
use Anomaly\Streams\Platform\Entry\Parser\EntryTrashableParser;
use Anomaly\Streams\Platform\Entry\Parser\EntrySearchableParser;
use Anomaly\Streams\Platform\Entry\Parser\EntryFieldSlugsParser;
use Anomaly\Streams\Platform\Entry\Parser\EntryRelationshipsParser;
use Anomaly\Streams\Platform\Entry\Parser\EntryTranslationModelParser;
use Anomaly\Streams\Platform\Entry\Parser\EntryTranslatedAttributesParser;
use Anomaly\Streams\Platform\Entry\Parser\EntryTranslationForeignKeyParser;
use Illuminate\Filesystem\Filesystem;

class GenerateEntryModel
{

    /**
     * The stream interface.
     *
     * @var StreamInterface
     */
    protected $stream;

    /**
     * Create a new GenerateEntryModel instance.
     *
     * @param StreamInterface $stream
     */
    public function __construct(StreamInterface $stream)
    {
        $this->stream = $stream;
    }

    /**
     * Handle the command.
     *
     * @param Filesystem  $files
     * @param Parser      $parser
     * @param Application $application
     */
    public function handle(Filesystem $files, Parser $parser, Application $application)
    {
        $data = [
            'class'                   => (new EntryClassParser())->parse($this->stream),
            'title'                   => (new EntryTitleParser())->parse($this->stream),
            'table'                   => (new EntryTableParser())->parse($this->stream),
            'rules'                   => (new EntryRulesParser())->parse($this->stream),
            'dates'                   => (new EntryDatesParser())->parse($this->stream),
            'stream'                  => (new EntryStreamParser())->parse($this->stream),
            'trashable'               => (new EntryTrashableParser())->parse($this->stream),
            'relations'               => (new EntryRelationsParser())->parse($this->stream),
            'namespace'               => (new EntryNamespaceParser())->parse($this->stream),
            'field_slugs'             => (new EntryFieldSlugsParser())->parse($this->stream),
            'searchable'              => (new EntrySearchableParser())->parse($this->stream),
            'relationships'           => (new EntryRelationshipsParser())->parse($this->stream),
            'translation_model'       => (new EntryTranslationModelParser())->parse($this->stream),
            'translated_attributes'   => (new EntryTranslatedAttributesParser())->parse($this->stream),
            'translation_foreign_key' => (new EntryTranslationForeignKeyParser())->parse($this->stream),
        ];

        $template = file_get_contents(__DIR__ . '/../../../resources/stubs/models/entry.stub');

        $path = $application->getStoragePath('models/' . studly_case($this->stream->getNamespace()));

        $files->makeDirectory($path, 0777, true, true);

        $file = $path . '/' . studly_case($this->stream->getNamespace()) . studly_case($this->stream->getSlug()) . 'EntryModel.php';

        $files->makeDirectory(dirname($file), 0777, true, true);
        $files->delete($file);

        $files->put($file, $parser->parse($template, $data));
    }
}
