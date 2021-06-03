<?php

namespace LiftsGUI\Nomi;

//Basic Class 
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

//Guis Class 
use pocketmine\scheduler\ClosureTask;
use libs\muqsit\invmenu\InvMenu;
use libs\muqsit\invmenu\InvMenuHandler;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\inventory\transaction\action\SlotChangeAction;

//Command Class 
use pocketmine\command\Command;
use pocketmine\command\Commandsender;

//Sound Class 
use pocketmine\network\mcpe\protocol\LevelSoundEventPacket;
use pocketmine\network\mcpe\protocol\LevelEventPacket;

//Others class 
use onebone\economyapi\EconomyAPI;

//Item
use pocketmine\item\Item;
use pocketmine\item\Tool;
use pocketmine\item\Armor;

class Main extends PluginBase implements Listener {

	public function onEnable(){

		$this->economyAPI = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
    
    $this->saveResource("config.yml");

		$this->getLogger()->info("Plugin By Mr Nomi enabled");

		$this->liftsgui = InvMenu::create(InvMenu::TYPE_DOUBLE_CHEST);

		

		if(!InvMenuHandler::isRegistered()){

			InvMenuHandler::register($this);

		}

		    $this->getServer()->getPluginManager()->registerEvents($this, $this);
		    $this->getConfig();
        $this->saveResource("config.yml");
        $this->config = new Config($this->getDataFolder()."config.yml", Config::YAML);
       }

	public function onDisable(){

		$this->getLogger()->info("Plugin is disabled..");

	}

   public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool {
        switch($cmd->getName()){
        	case "liftsgui":
        		if(!$sender instanceof Player){
        			$sender->sendMessage("§c§l> §r§7Please run this command in-game -_-");
        			return false;
        		}
             if(!$sender->hasPermission("Lifts.open.menu")){
             	$sender->sendMessage("§c§l> §r§7You don't have permission to use this command!");
             	$volume = mt_rand();
	          $sender->getLevel()->broadcastLevelEvent($sender, LevelEventPacket::EVENT_SOUND_ANVIL_FALL, (int) $volume);
             }
             $this->liftsgui($sender);
             break;
        }
             return true;
	}
	public function liftsgui($sender)
	{
	$this->liftsgui->readonly();
	$this->liftsgui->setListener([$this, "liftscmd"]);
    $this->liftsgui->setName("LiftsGUI Menu");
	    $inventory = $this->liftsgui->getInventory();
	    $inventory->setItem(0, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(1, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(2, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(3, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(4, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(5, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(6, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(7, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(8, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(9, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(10, Item::get(266, 0, 1)->setCustomName("§r§aGold Mine\n§eClick To Warp"));
	    $inventory->setItem(11, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(12, Item::get(331, 0, 1)->setCustomName("§r§aRedstone Mine\n§eClick To Warp"));
	    $inventory->setItem(13, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(14, Item::get(351, 4, 1)->setCustomName("§r§aLapis Mine\n§eClick To Warp"));
	    $inventory->setItem(15, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(16, Item::get(388, 0, 1)->setCustomName("§r§aEmerald Mine\n§eClick To Warp"));
	    $inventory->setItem(17, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(18, Item::get(160, 15, 1)->setCustomName("§r"));	    
	    $inventory->setItem(19, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(20, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(21, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(22, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(23, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(24, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(25, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(26, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(27, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(28, Item::get(264, 0, 1)->setCustomName("§r§aDiamond Mine\n§eClick To Warp"));
	    $inventory->setItem(29, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(30, Item::get(49, 0, 1)->setCustomName("§r§aObsidian Mine\n§eClick To Warp"));
	    $inventory->setItem(31, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(32, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(33, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(34, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(35, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(36, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(37, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(38, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(39, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(40, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(41, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(42, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(43, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(44, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(45, item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(46, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(47, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(48, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(49, Item::get(-161, 0, 1)->setCustomName("§r§cClose"));
	    $inventory->setItem(50, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(51, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(52, Item::get(160, 15, 1)->setCustomName("§r"));
	    $inventory->setItem(53, Item::get(160, 15, 1)->setCustomName("§r"));
	    
	    $this->liftsgui->send($sender);
	}

    public function liftscmd(Player $sender, Item $item)
	{
	      $hand = $sender->getInventory()->getItemInHand()->getCustomName();
        $inventory = $this->liftsgui->getInventory();
        $config = new Config($this->getDataFolder()."config.yml", Config::YAML);

     if($item->getCustomName() === "§r§l§cClose"){
		$sender->removeWindow($inventory);
		$sender->getLevel()->broadcastLevelSoundEvent($sender->add(0, $sender->eyeHeight, 0), LevelSoundEventPacket::SOUND_CHEST_CLOSED);
	}
	if($item->getCustomName() === "§r§aGold Mine\n§eClick To Warp"){
        $sender->removeWindow($inventory);
                    $this->getServer()->dispatchCommand($sender, $config->get("gold"));
                    $sender->getLevel()->broadcastLevelSoundEvent($sender->add(0, $sender->eyeHeight, 0), LevelSoundEventPacket::SOUND_CHEST_OPEN);
    }
	if($item->getCustomName() === "§r§aRedstone Mine\n§eClick To Warp"){
        $sender->removeWindow($inventory);
                    $this->getServer()->dispatchCommand($sender, $config->get("redstone"));
                    $sender->getLevel()->broadcastLevelSoundEvent($sender->add(0, $sender->eyeHeight, 0), LevelSoundEventPacket::SOUND_CHEST_OPEN);
    }
	if($item->getCustomName() === "§r§aLapis Mine\n§eClick To Warp"){
        $sender->removeWindow($inventory);
                    $this->getServer()->dispatchCommand($sender, $config->get("lapis"));
                    $sender->getLevel()->broadcastLevelSoundEvent($sender->add(0, $sender->eyeHeight, 0), LevelSoundEventPacket::SOUND_CHEST_OPEN);
    }
	if($item->getCustomName() === "§r§aEmerald Mine\n§eClick To Warp"){
        $sender->removeWindow($inventory);
                    $this->getServer()->dispatchCommand($sender, $config->get("emerald"));
                    $sender->getLevel()->broadcastLevelSoundEvent($sender->add(0, $sender->eyeHeight, 0), LevelSoundEventPacket::SOUND_CHEST_OPEN);
    }
	if($item->getCustomName() === "§r§aDiamond Mine\n§eClick To Warp"){
		$sender->removeWindow($inventory);
            		    $this->getServer()->dispatchCommand($sender, $config->get("diamond"));
                    $sender->getLevel()->broadcastLevelSoundEvent($sender->add(0, $sender->eyeHeight, 0), LevelSoundEventPacket::SOUND_CHEST_OPEN);
    }
	if($item->getCustomName() === "§r§aObsidian Mine\n§eClick To Warp"){
        $sender->removeWindow($inventory);
                    $this->getServer()->dispatchCommand($sender, $config->get("obsidian"));
                    $sender->getLevel()->broadcastLevelSoundEvent($sender->add(0, $sender->eyeHeight, 0), LevelSoundEventPacket::SOUND_CHEST_OPEN);
    }
  }
}