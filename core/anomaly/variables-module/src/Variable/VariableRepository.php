<?php namespace Anomaly\VariablesModule\Variable;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;
use Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface;
use Anomaly\VariablesModule\Variable\Contract\VariableRepositoryInterface;

/**
 * Class VariableRepository
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class VariableRepository extends EntryRepository implements VariableRepositoryInterface
{

    /**
     * The variables collection.
     *
     * @var VariableCollection
     */
    protected $variables;

    /**
     * Create a new VariableRepository instance.
     *
     * @param VariableCollection        $variables
     * @param StreamRepositoryInterface $streams
     */
    public function __construct(VariableCollection $variables, StreamRepositoryInterface $streams)
    {
        $this->variables = $variables->make($streams->findAllByNamespace('variables')->all());
    }

    /**
     * Get a variable.
     *
     * @param $group
     * @param $field
     * @return FieldTypePresenter
     */
    public function get($group, $field)
    {
        if (!$group = $this->group($group)) {
            return null;
        }

        return $group->{$field};
    }

    /**
     * Get a variable group.
     *
     * @param $group
     * @return EntryInterface
     */
    public function group($group)
    {
        return $this->variables->get($group);
    }
}
