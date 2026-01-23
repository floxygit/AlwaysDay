<?php
namespace floxy\AlwaysDay;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\world\WorldLoadEvent;
use pocketmine\world\World;
class Main extends PluginBase implements Listener{
    public function onEnable():void{
        $this->getServer()->getPluginManager()->registerEvents($this,$this);
        array_map(fn($w)=>$this->setAlwaysDay($w),$this->getServer()->getWorldManager()->getWorlds());
    }
    public function onWorldLoad(WorldLoadEvent $e):void{$this->setAlwaysDay($e->getWorld());}
    private function setAlwaysDay(World $w):void{$w->setTime(World::TIME_DAY);$w->stopTime();}
}
