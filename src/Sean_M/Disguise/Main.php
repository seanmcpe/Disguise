<?php
namespace Sean_M\Disguise;

use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\Player;

class Main extends PluginBase implements Listener {

  public $config;

    public function onLoad() {
        $this->getLogger()->info(TextFormat::GREEN . "Loading Disguise by Sean_M...");
    }

    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->saveDefaultConfig();
        $this->config = $this->getConfig()->getAll();
        $this->getLogger()->info(TextFormat::GREEN . "Disguise by Sean_M enabled!");
    }

    public function onDisable() {
        $this->getLogger()->info(TextFormat::RED . "Disguise by Sean_M disabled!");
    }

    public function onCommand(CommandSender $sender, Command $cmd, $label,array $args){
        if(strtolower($cmd->getName()) == "disguise") {
            if($sender instanceof Player) {
                if($sender->hasPermission("disguise.command")) {
                    $list = array("Apple", "Orange", "Banana", "Pear");
                    $nick = array_rand($input, 1);
                        $sender->setNameTag($nick);
                return true;
                }else{
                    $sender->sendMessage(TextFormat::RED . "You don't have permissions to use this command.");
                }
            }
        }
    }
}
