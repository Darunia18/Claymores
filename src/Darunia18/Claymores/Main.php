<?php

namespace Darunia18\Claymores;

use pocketmine\event\entity\EntityMoveEvent;
//use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class Claymores extends PluginBase {
    //private $api;
    //private $config;
    private $claymore;
    private $explosionSize;
    private $blockDestroy;
    private $activateNearbyClaymores;
    
    public function onLoad(){
    }
    
    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $config = $this->getConfig();
        $this->claymore = $config->get("ClaymoreBlock");
        $this->explosionSize = $config->get("ExplosionSize");
        $this->blockDestroy = $config->get("BlockDestroy");
        $this->activateNearbyClaymores = $config->get("ActivateNearbyClaymores");
        $this->getLogger()->log("Claymores has been enabled.");
	}
	
    /** 
     * @param EntityMoveEvent $data
     * 
     * @priority NORMAL
     * @ignoreCalcelled false
     */
    public function onMove(EntityMoveEvent $event){
        $entity = $event->getEntity();
        $claymore = $entity->getLevel()->getBlock(new Vector3($entity->x, ($entity->y -1), $entity->z));
	if($claymore->getID() == $this->claymore){
            if($this->blockDestroy = true){
		$explosion = new Explosion(new Position($entity->x, ($entity->y -1), $entity->z, $entity->level), $this->explosionSize);
		$explosion->explode();
            }
            else{
            }
	}
    }
	
    public function onDisable(){
        $this->config->save();
        $this->getLogger()->log("Claymores has been disabled.");
    }
}
