<?php namespace Anomaly\PreferencesModule\Preference\Form;

use Anomaly\PreferencesModule\Preference\Contract\PreferenceRepositoryInterface;
use Illuminate\Config\Repository;


/**
 * Class PreferenceFormFields
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class PreferenceFormFields
{

    /**
     * The config repository.
     *
     * @var Repository
     */
    protected $config;

    /**
     * Create a new PreferenceFormFields instance.
     *
     * @param Repository $config
     */
    public function __construct(Repository $config)
    {
        $this->config = $config;
    }

    /**
     * Return the form fields.
     *
     * @param PreferenceFormBuilder $builder
     */
    public function handle(PreferenceFormBuilder $builder, PreferenceRepositoryInterface $preferences)
    {
        $namespace = $builder->getEntry() . '::';

        /*
         * Get the fields from the config system. Sections are
         * optionally defined the same way.
         */
        if (!$fields = $this->config->get($namespace . 'preferences/preferences')) {
            $fields = $fields = $this->config->get($namespace . 'preferences', []);
        }

        if ($sections = $this->config->get($namespace . 'preferences/sections')) {
            $builder->setSections($sections);
        }

        /*
         * Finish each field.
         */
        foreach ($fields as $slug => &$field) {

            /*
             * Force an array. This is done later
             * too in normalization but we need it now
             * because we are normalizing / guessing our
             * own parameters somewhat.
             */
            if (is_string($field)) {
                $field = [
                    'type' => $field,
                ];
            }

            // Make sure we have a config property.
            $field['config'] = array_get($field, 'config', []);

            // Default the label.
            $field['label'] = array_get(
                $field,
                'label',
                $namespace . 'preference.' . $slug . '.label'
            );

            // Default the placeholder.
            $field['config']['placeholder'] = array_get(
                $field['config'],
                'placeholder',
                $namespace . 'preference.' . $slug . '.placeholder'
            );

            // Default the instructions.
            $field['instructions'] = array_get(
                $field,
                'instructions',
                $namespace . 'preference.' . $slug . '.instructions'
            );

            // Get the value defaulting to the default value.

            if ($preference = $preferences->get($namespace . $slug)) {
                $field['value'] = $preference->getValue();
            } else {
                $field['value'] = array_get($field['config'], 'default_value');
            }

            /*
             * Disable the field if it
             * has a set env value.
             */
            if (isset($field['env']) && isset($field['bind']) && env($field['env']) !== null) {
                $field['disabled'] = true;
                $field['warning']  = 'module::message.env_locked';
                $field['value']    = $this->config->get($field['bind']);
            }
        }

        $builder->setFields($fields);
    }
}
