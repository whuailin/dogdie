<?php namespace Anomaly\StreamsComposerPlugin;

use Composer\Composer;
use Composer\Installer\InstallationManager;
use Composer\Installer\LibraryInstaller;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

/**
 * Class Plugin
 *
 * @package Anomaly\StreamsComposerPlugin
 */
class Plugin implements PluginInterface
{

    /**
     * Installers
     *
     * @var array
     */
    protected $installers = [
        'AddonInstaller'
    ];

    /**
     * Activate plugin
     *
     * @param Composer    $composer
     * @param IOInterface $IOInterface
     */
    public function activate(Composer $composer, IOInterface $io)
    {
        /** @var $installationManager InstallationManager */
        $installationManager = $composer->getInstallationManager();

        foreach ($this->installers as $class) {
            $installationManager->addInstaller($this->getInstaller($class, $composer, $io));
        }
    }

    /**
     * Get Library Installer
     *
     * @param             $class
     * @param Composer    $composer
     * @param IOInterface $io
     * @return LibraryInstaller
     */
    public function getInstaller($class, Composer $composer, IOInterface $io)
    {
        $installer = __NAMESPACE__ . '\\Installer\\' . $class;
        return new $installer($io, $composer);
    }

}
