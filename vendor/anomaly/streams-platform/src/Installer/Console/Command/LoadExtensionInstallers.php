<?php namespace Anomaly\Streams\Platform\Installer\Console\Command;

use Anomaly\Streams\Platform\Addon\Extension\Extension;
use Anomaly\Streams\Platform\Addon\Extension\ExtensionCollection;
use Anomaly\Streams\Platform\Installer\Installer;
use Anomaly\Streams\Platform\Installer\InstallerCollection;
use Anomaly\Streams\Platform\Console\Kernel;

/**
 * Class LoadExtensionInstallers
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class LoadExtensionInstallers
{

    /**
     * The installer collection.
     *
     * @var InstallerCollection
     */
    protected $installers;

    /**
     * Create a new LoadExtensionInstallers instance.
     *
     * @param InstallerCollection $installers
     */
    public function __construct(InstallerCollection $installers)
    {
        $this->installers = $installers;
    }

    /**
     * Handle the command.
     *
     * @param ExtensionCollection $extensions
     */
    public function handle(ExtensionCollection $extensions)
    {
        /* @var Extension $extension */
        foreach ($extensions as $extension) {
            $this->installers->add(
                new Installer(
                    trans('streams::installer.installing', ['installing' => trans($extension->getName())]),
                    function (Kernel $console) use ($extension) {
                        $console->call('extension:install', ['extension' => $extension->getNamespace()]);
                    }
                )
            );
        }
    }
}
