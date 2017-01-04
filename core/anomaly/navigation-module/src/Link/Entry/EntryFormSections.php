<?php namespace Anomaly\NavigationModule\Link\Entry;

/**
 * Class EntryFormSections
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class EntryFormSections
{

    /**
     * Handle the sections.
     *
     * @param EntryFormBuilder $builder
     */
    public function handle(EntryFormBuilder $builder)
    {
        $type = $builder->getChildForm('type');
        $link = $builder->getChildForm('link');

        $builder->setSections(
            [
                'type' => [
                    'fields' => function () use ($type) {
                        return array_map(
                            function ($slug) {
                                return 'type_' . $slug;
                            },
                            $type->getFormFieldSlugs()
                        );
                    },
                ],
                'link' => [
                    'fields' => function () use ($link) {
                        return array_map(
                            function ($slug) {
                                return 'link_' . $slug;
                            },
                            $link->getFormFieldSlugs()
                        );
                    },
                ],
            ]
        );
    }
}
