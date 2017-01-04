<?php namespace Anomaly\Streams\Platform\Assignment\Form;

use Anomaly\Streams\Platform\Assignment\AssignmentModel;
use Anomaly\Streams\Platform\Assignment\Contract\AssignmentInterface;
use Anomaly\Streams\Platform\Field\Contract\FieldInterface;
use Anomaly\Streams\Platform\Stream\Contract\StreamInterface;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class AssignmentFormBuilder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class AssignmentFormBuilder extends FormBuilder
{

    /**
     * The related field.
     *
     * @var null|FieldInterface
     */
    protected $field = null;

    /**
     * The related stream.
     *
     * @var null|StreamInterface
     */
    protected $stream = null;

    /**
     * The form model.
     *
     * @var string
     */
    protected $model = AssignmentModel::class;

    /**
     * The form fields.
     *
     * @var string
     */
    protected $fields = AssignmentFormFields::class;

    /**
     * The form buttons.
     *
     * @var array
     */
    protected $actions = [
        'save'   => [
            'enabled' => 'create',
        ],
        'update' => [
            'enabled' => 'edit',
        ],
    ];

    /**
     * Fired when the builder is ready to build.
     *
     * @throws \Exception
     */
    public function onReady()
    {
        if (!$this->getStream() && !$this->getEntry()) {
            throw new \Exception('The $stream parameter is required when creating an assignment.');
        }

        if (!$this->getField() && !$this->getEntry()) {
            throw new \Exception('The $field parameter is required when creating an assignment.');
        }
    }

    /**
     * Fired just before saving the entry.
     */
    public function onSaving()
    {
        $entry  = $this->getFormEntry();
        $stream = $this->getStream();
        $field  = $this->getField();

        if (!$entry->stream_id) {
            $entry->stream_id = $stream->getId();
        }

        if (!$entry->field_id) {
            $entry->field_id = $field->getId();
        }
    }

    /**
     * Get the field's type.
     *
     * @return \Anomaly\Streams\Platform\Addon\FieldType\FieldType
     */
    public function getFieldType()
    {
        if ($field = $this->getField()) {
            return $field->getType();
        }

        /* @var AssignmentInterface $entry */
        $entry = $this->getFormEntry();

        return $entry->getFieldType();
    }

    /**
     * Get the field.
     *
     * @return FieldInterface|null
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * @param  FieldInterface $field
     * @return $this
     */
    public function setField(FieldInterface $field)
    {
        $this->field = $field;

        return $this;
    }

    /**
     * Get the stream.
     *
     * @return StreamInterface|null
     */
    public function getStream()
    {
        if (!$this->stream && $entry = $this->getFormEntry()) {
            return $entry->getStream();
        }

        return $this->stream;
    }

    /**
     * Set the stream.
     *
     * @param  StreamInterface $stream
     * @return $this
     */
    public function setStream(StreamInterface $stream)
    {
        $this->stream = $stream;

        return $this;
    }
}
