<?php namespace Anomaly\VariablesModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Assignment\Form\AssignmentFormBuilder;
use Anomaly\Streams\Platform\Assignment\Table\AssignmentTableBuilder;
use Anomaly\Streams\Platform\Field\Contract\FieldRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\Streams\Platform\Stream\Contract\StreamInterface;
use Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface;

/**
 * Class AssignmentsController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class AssignmentsController extends AdminController
{

    /**
     * Return an index of existing assignments.
     *
     * @param  AssignmentTableBuilder                     $table
     * @param  StreamRepositoryInterface                  $streams
     * @param                                             $group
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(AssignmentTableBuilder $table, StreamRepositoryInterface $streams, $group)
    {
        /* @var StreamInterface $group */
        $group = $streams->find($group);

        return $table->setStream($group)->render();
    }

    /**
     * Return the modal for choosing a field to assign.
     *
     * @param  FieldRepositoryInterface              $fields
     * @param  StreamRepositoryInterface             $streams
     * @param                                        $group
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function choose(FieldRepositoryInterface $fields, StreamRepositoryInterface $streams, $group)
    {
        /* @var StreamInterface $group */
        $group = $streams->find($group);

        $fields = $fields
            ->findAllByNamespace('variables')
            ->notAssignedTo($group)
            ->unlocked();

        return $this->view->make('module::admin/groups/choose', compact('fields', 'group'));
    }

    /**
     * Create a new assignment.
     *
     * @param  AssignmentFormBuilder                      $builder
     * @param  StreamRepositoryInterface                  $streams
     * @param  FieldRepositoryInterface                   $fields
     * @param                                             $group
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(
        AssignmentFormBuilder $builder,
        StreamRepositoryInterface $streams,
        FieldRepositoryInterface $fields,
        $group
    ) {
        /* @var StreamInterface $group */
        $group = $streams->find($group);

        return $builder
            ->setField($fields->find($this->request->get('field')))
            ->setStream($group)
            ->render();
    }

    /**
     * Edit an existing assignment.
     *
     * @param  AssignmentFormBuilder                      $builder
     * @param  StreamRepositoryInterface                  $streams
     * @param                                             $group
     * @param                                             $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(AssignmentFormBuilder $builder, StreamRepositoryInterface $streams, $group, $id)
    {
        /* @var StreamInterface $group */
        $group = $streams->find($group);

        return $builder
            ->setStream($group)
            ->render($id);
    }
}
