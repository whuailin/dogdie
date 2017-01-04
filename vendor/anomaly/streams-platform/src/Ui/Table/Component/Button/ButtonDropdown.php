<?php namespace Anomaly\Streams\Platform\Ui\Table\Component\Button;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

class ButtonDropdown
{

    /**
     * Flatten the dropdowns
     *
     * @param TableBuilder $builder
     */
    public function flatten(TableBuilder $builder)
    {
        $buttons = $builder->getButtons();

        foreach ($buttons as $key => &$button) {
            if (isset($button['dropdown'])) {
                $button['position'] = 'right';

                foreach (array_pull($button, 'dropdown') as $dropdown) {
                    $dropdown['parent'] = $button['button'];

                    $buttons[] = $dropdown;
                }
            }
        }

        $builder->setButtons($buttons);
    }

    /**
     * Build dropdown items.
     *
     * @param TableBuilder $builder
     */
    public function build(TableBuilder $builder)
    {
        $buttons = $builder->getButtons();

        foreach ($buttons as $key => &$button) {
            if ($dropdown = array_get($button, 'parent')) {
                foreach ($buttons as &$parent) {
                    if (array_get($parent, 'button') == $dropdown) {
                        if (!isset($parent['dropdown'])) {
                            $parent['dropdown'] = [];
                        }

                        $parent['dropdown'][] = $button;
                    }
                }
            }
        }

        $builder->setButtons($buttons);
    }
}
