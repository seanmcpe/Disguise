<?php
namespace Sean_M\Disguise;

use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class Main extends PluginBase implements Listener {

    public function onEnable() {
       @mkdir($this->getDataFolder());
       $this->getServer()->getPluginManager()->registerEvents($this, $this);
       $this->config = $this->getConfig()->getAll();
       $this->getLogger()->info(TextFormat::GREEN . "Disguise by Sean_M enabled!");
          $this->saveDefaultConfig();
    }

    public function onDisable() {
        $this->getLogger()->info(TextFormat::RED . "Disguise by Sean_M disabled!");
    }

    public function onCommand(CommandSender $sender, Command $cmd, $label,array $args){
        if(strtolower($cmd->getName()) == "disguise") {
            if($sender instanceof Player) {
                if($sender->hasPermission("disguise.command")) {
                    $list = array($this->config["names"]);
                    $nick = array_rand($list);
                        $sender->setDisplayName($list[$nick]);
                        $sender->setNameTag($list[$nick]);
                return true;
                   } else {
                       $sender->sendMessage(TextFormat::RED . "You don't have permissions to use this command.");
                   } else {
                       $sender->sendMessage(TextFormat::RED . "You must use this command in-game!");
                }
            }
        }
    }
}
