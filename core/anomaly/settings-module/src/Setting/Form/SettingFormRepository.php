<?php namespace Anomaly\SettingsModule\Setting\Form;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\SettingsModule\Setting\Event\SettingsWereSaved;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Anomaly\Streams\Platform\Ui\Form\Contract\FormRepositoryInterface;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Illuminate\Config\Repository;
use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;

/**
 * Class SettingFormRepository
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class SettingFormRepository implements FormRepositoryInterface
{

    /**
     * The config repository.
     *
     * @var Repository
     */
    protected $config;

    /**
     * The event dispatcher.
     *
     * @var Dispatcher
     */
    protected $events;

    /**
     * The application container.
     *
     * @var Container
     */
    protected $container;

    /**
     * The settings repository.
     *
     * @var SettingRepositoryInterface
     */
    protected $settings;

    /**
     * Create a new SettingFormRepositoryInterface instance.
     *
     * @param Repository                 $config
     * @param Dispatcher                 $events
     * @param Container                  $container
     * @param SettingRepositoryInterface $settings
     */
    public function __construct(
        Repository $config,
        Dispatcher $events,
        Container $container,
        SettingRepositoryInterface $settings
    ) {
        $this->config    = $config;
        $this->events    = $events;
        $this->settings  = $settings;
        $this->container = $container;
    }

    /**
     * Find an entry or return a new one.
     *
     * @param $id
     * @return string
     */
    public function findOrNew($id)
    {
        return $id;
    }

    /**
     * Save the form.
     *
     * @param  FormBuilder|SettingFormBuilder $builder
     * @return bool|mixed
     */
    public function save(FormBuilder $builder)
    {
        $form = $builder->getForm();

        $namespace = $form->getEntry() . '::';

        /* @var FieldType $field */
        foreach ($form->getEnabledFields() as $field) {

            $key   = $namespace . $field->getField();
            $value = $form->getValue($field->getInputName());

            $this->settings->set($key, $value);
        }

        $this->events->fire(new SettingsWereSaved($builder));
    }
}
