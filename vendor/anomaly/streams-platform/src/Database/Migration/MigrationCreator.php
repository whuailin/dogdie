<?php namespace Anomaly\Streams\Platform\Database\Migration;

use Anomaly\Streams\Platform\Database\Migration\Command\TransformMigrationNameToClass;
use Symfony\Component\Console\Input\InputInterface;

class MigrationCreator extends \Illuminate\Database\Migrations\MigrationCreator
{

    /**
     * The command input.
     *
     * @var InputInterface
     */
    protected $input = null;

    /**
     * Get the migration stub file.
     *
     * @param  string $table
     * @param  bool   $create
     * @return string
     */
    protected function getStub($table, $create)
    {
        if ($this->input->getOption('fields')) {
            return $this->files->get($this->getStubPath() . '/fields.stub');
        }

        if ($this->input->getOption('stream')) {
            return $this->files->get($this->getStubPath() . '/stream.stub');
        }

        if (is_null($table)) {
            return $this->files->get($this->getStubPath() . '/blank.stub');
        }

        return parent::getStub($table, $create);
    }

    /**
     * Populate the place-holders in the migration stub.
     *
     * @param  string $name
     * @param  string $stub
     * @param  string $table
     * @return string
     */
    protected function populateStub($name, $stub, $table)
    {
        $class = $this->getClassName($name);

        $stream = $this->input->getOption('stream');

        return app('Anomaly\Streams\Platform\Support\Parser')
            ->parse($stub, compact('class', 'table', 'stream'));
    }

    /**
     * Get the class name of a migration name.
     *
     * @param  string $name
     * @return string
     */
    protected function getClassName($name)
    {
        return studly_case(str_replace('.', '_', $name));
    }

    /**
     * Get the path to the stubs.
     *
     * @return string
     */
    public function getStubPath()
    {
        return __DIR__ . '/../../../resources/stubs/database/migrations';
    }

    /**
     * Set the command input.
     *
     * @param  InputInterface $input
     * @return $this
     */
    public function setInput(InputInterface $input)
    {
        $this->input = $input;

        return $this;
    }
}
