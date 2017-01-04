<?php namespace Anomaly\VariablesModule\Variable\Contract;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryRepositoryInterface;

/**
 * Interface VariableRepositoryInterface
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
interface VariableRepositoryInterface extends EntryRepositoryInterface
{

    /**
     * Get a variable.
     *
     * @param $group
     * @param $field
     * @return FieldTypePresenter
     */
    public function get($group, $field);

    /**
     * Get a variable group.
     *
     * @param $group
     * @param $field
     * @return EntryInterface
     */
    public function group($group);
}
