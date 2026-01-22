<?php

declare(strict_types=1);

namespace floxy\AlwaysDay;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\world\WorldLoadEvent;
use pocketmine\world\World;

class Main extends PluginBase implements Listener {

    public function onEnable(): void {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);

        foreach ($this->getServer()->getWorldManager()->getWorlds() as $world) {
            $this->setAlwaysDay($world);
        }
    }

    public function onWorldLoad(WorldLoadEvent $event): void {
        $this->setAlwaysDay($event->getWorld());
    }

    private function setAlwaysDay(World $world): void {
        $world->setTime(World::TIME_DAY);
        $world->stopTime();
    }
}
