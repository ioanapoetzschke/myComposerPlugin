<?php

namespace IoanaPoetzschke;

use Composer\Composer;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;
use Composer\Plugin\PluginEvents;
use Composer\Plugin\PreFileDownloadEvent;

class RobotronPlugin implements PluginInterface, EventSubscriberInterface
{
    protected $composer;
    protected $io;

    public function activate(Composer $composer, IOInterface $io)
    {
        $this->composer = $composer;
        $this->io = $io;
    }

    public function deactivate(Composer $composer, IOInterface $io)
    {
    }

    public function uninstall(Composer $composer, IOInterface $io)
    {
    }

    public static function getSubscribedEvents()
    {

        return [
            PluginEvents::INIT =>
                ['robotronPluginMethod', self::CALLBACK_PRIORITY]
        ];
    }
    /**
     * @param Event $event
     */
    public function robotronPluginMethod(Event $event)
    {
        $file = new JsonFile("C:/xampp_8.1.4-0_x64/htdocs/Webpages/php7.2_composer.json");
        $json = $file->read();
        file_put_contents("C:/xampp_8.1.4-0_x64/htdocs/Webpages/submodule/data.json", $json);
        if(PHP_VERSION_ID > 70400){
            $this->io->write('<info>Congratulation , you are using at least PHP Version 7.4 :)</info>');
        } else {
            $this->io->write('<info> not supported</info>');
        }
    }
}