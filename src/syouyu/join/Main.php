<?php

namespace syouyu\join;

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use syouyu\join\form\CustomForm;

class Main extends PluginBase implements Listener{

    public function onEnable(){
        if (!(file_exists($this->getDataFolder()))) @mkdir($this->getDataFolder());
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->config = new Config($this->getDataFolder() . "display.yml", Config::YAML);
    }

    public function onJoin(PlayerJoinEvent $event){
        $player = $event->getPlayer();
        $name = $player->getName();
        if(!$this->config->exists($name)){
            $player->sendForm(new CustomForm());
            $player->setImmobile(true);
        }
    }
}
