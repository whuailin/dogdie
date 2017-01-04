<?php namespace Anomaly\SettingsModule;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\Streams\Platform\Application\Command\ReadEnvironmentFile;
use Anomaly\Streams\Platform\Application\Command\WriteEnvironmentFile;
use Anomaly\Streams\Platform\Database\Seeder\Seeder;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class SettingsModuleSeeder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class SettingsModuleSeeder extends Seeder
{

    use DispatchesJobs;

    /**
     * The settings repository.
     *
     * @var SettingRepositoryInterface
     */
    protected $settings;

    /**
     * Create a new SettingsModuleSeeder instance.
     *
     * @param SettingRepositoryInterface $settings
     */
    public function __construct(SettingRepositoryInterface $settings)
    {
        parent::__construct();

        $this->settings = $settings;
    }

    /**
     * Run the command.
     */
    public function run()
    {
        $data = $this->dispatch(new ReadEnvironmentFile());

        if ($timezone = array_pull($data, 'APP_TIMEZONE')) {
            $this->settings->create(
                [
                    'key'   => 'streams::timezone',
                    'value' => $timezone,
                ]
            );
        }

        if ($locale = array_pull($data, 'DEFAULT_LOCALE')) {
            $this->settings->create(
                [
                    'key'   => 'streams::default_locale',
                    'value' => $locale,
                ]
            );
        }

        $this->dispatch(new WriteEnvironmentFile($data));
    }
}
