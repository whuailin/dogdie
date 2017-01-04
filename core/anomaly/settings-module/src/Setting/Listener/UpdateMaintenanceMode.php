<?php namespace Anomaly\SettingsModule\Setting\Listener;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\SettingsModule\Setting\Event\SettingsWereSaved;
use Illuminate\Contracts\Foundation\Application;

/**
 * Class UpdateMaintenanceMode
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class UpdateMaintenanceMode
{

    /**
     * The settings repository.
     *
     * @var SettingRepositoryInterface
     */
    protected $settings;

    /**
     * The application instance.
     *
     * @var Application
     */
    protected $application;

    /**
     * Create a new UpdateMaintenanceMode instance.
     *
     * @param Application                $application
     * @param SettingRepositoryInterface $settings
     */
    public function __construct(Application $application, SettingRepositoryInterface $settings)
    {
        $this->settings    = $settings;
        $this->application = $application;
    }

    /**
     * Handle the command.
     *
     * @param SettingsWereSaved $event
     */
    public function handle(SettingsWereSaved $event)
    {
        $builder = $event->getBuilder();

        if (!($namespace = $builder->getEntry()) == 'streams') {
            return;
        }

        $maintenance = $builder->getFormValue('maintenance');

        if ($maintenance && !$this->application->isDownForMaintenance()) {
            touch(storage_path('framework/down'));
        }

        if (!$maintenance && $this->application->isDownForMaintenance()) {
            unlink(storage_path('framework/down'));
        }
    }
}
