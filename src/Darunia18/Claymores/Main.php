<?php

namespace Darunia18\Claymores;

use pocketmine\entity;
use pocketmine\event\entity\EntityMoveEvent;
use pocketmine\event\Listener;
use pocketmine\level\Explosion;
use pocketmine\level\Level;
use pocketmine\level\Position;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener{
    private $claymore;
    private $explosionSize;
    private $blockDestroy;
    private $activateNearbyClaymores;
    private $playerActivation;
    private $mobActivation;
    private $projectileActivation;
    private $itemActivation;
    private $vehicleActivation;
    
    public function onLoad(){
    }
    
    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $config = $this->getConfig();
        $this->claymore = $config->get("ClaymoreBlock");
        $this->explosionSize = $config->get("ExplosionSize");
        $this->blockDestroy = $config->get("BlockDestroy");
        $this->activateNearbyClaymores = $config->get("ActivateNearbyClaymores");
        $this->playerActivation = $config->get("PlayerActivation");
        $this->mobActivation = $config->get("MobActivation");
        $this->projectileActivation = $config->get("ProjectileActivation");
        $this->itemActivation = $config->get("ItemActivation");
        $this->vehicleActivation = $config->get("VehicleActivation");
        $this->getLogger()->info("Claymores has been enabled.");
	}
	
    /** 
     * @param EntityMoveEvent $data
     * 
     * @priority NORMAL
     * @ignoreCalcelled false
     */
    public function onMove(EntityMoveEvent $event){
        $entity = $event->getEntity();
        $claymore = $entity->getLevel()->getBlockIdAt($entity->x, ($entity->y -0.5), $entity->z);
        if($claymore == $this->claymore){
            if($entity instanceof Human){
                if($this->playerActivation){
                    if($this->blockDestroy){
                        $explosion = new Explosion(new Position($entity->x, ($entity->y -0.5), $entity->z, $entity->getLevel()), $this->explosionSize);
                        $explosion->explode();
                    }
                    else{
                        $explosion = new Explosion(new Position($entity->x, ($entity->y -0.5), $entity->z, $entity->getLevel()), $this->explosionSize);
                        $explosion->affectedBlocks = [];
                        $explosion->explode();
                        $entity->getLevel()->setBlockIdAt($entity->x, ($entity->y -0.5), $entity->z, 0);
                    }
                }
            }
            elseif($entity instanceof Living){
                if($this->mobActivation){
                    if($entity instanceof Human){
                        //nothing
                    }
                    if($this->blockDestroy){
                        $explosion = new Explosion(new Position($entity->x, ($entity->y -0.5), $entity->z, $entity->getLevel()), $this->explosionSize);
                        $explosion->explode();
                    }
                    else{
                        $explosion = new Explosion(new Position($entity->x, ($entity->y -0.5), $entity->z, $entity->getLevel()), $this->explosionSize);
                        $explosion->affectedBlocks = [];
                        $explosion->explode();
                        $entity->getLevel()->setBlockIdAt($entity->x, ($entity->y -0.5), $entity->z, 0);
                    }
                }
            }
            elseif($entity instanceof Projectile){
                if($this->projectileActivation){
                    if($this->blockDestroy){
                        $explosion = new Explosion(new Position($entity->x, ($entity->y -0.5), $entity->z, $entity->getLevel()), $this->explosionSize);
                        $explosion->explode();
                    }
                    else{
                        $explosion = new Explosion(new Position($entity->x, ($entity->y -0.5), $entity->z, $entity->getLevel()), $this->explosionSize);
                        $explosion->affectedBlocks = [];
                        $explosion->explode();
                        $entity->getLevel()->setBlockIdAt($entity->x, ($entity->y -0.5), $entity->z, 0);
                    }
                }
            }
            elseif($entity instanceof DroppedItem){
                if($this->itemActivation){
                    if($this->blockDestroy){
                        $explosion = new Explosion(new Position($entity->x, ($entity->y -0.5), $entity->z, $entity->getLevel()), $this->explosionSize);
                        $explosion->explode();
                    }
                    else{
                        $explosion = new Explosion(new Position($entity->x, ($entity->y -0.5), $entity->z, $entity->getLevel()), $this->explosionSize);
                        $explosion->affectedBlocks = [];
                        $explosion->explode();
                        $entity->getLevel()->setBlockIdAt($entity->x, ($entity->y -0.5), $entity->z, 0);
                    }
                }
            }
            elseif($entity instanceof Vehicle){
                if($this->vehicleActivation){
                    if($this->blockDestroy){
                        $explosion = new Explosion(new Position($entity->x, ($entity->y -0.5), $entity->z, $entity->getLevel()), $this->explosionSize);
                        $explosion->explode();
                    }
                    else{
                        $explosion = new Explosion(new Position($entity->x, ($entity->y -0.5), $entity->z, $entity->getLevel()), $this->explosionSize);
                        $explosion->affectedBlocks = [];
                        $explosion->explode();
                        $entity->getLevel()->setBlockIdAt($entity->x, ($entity->y -0.5), $entity->z, 0);
                    }
                }
            }
            else{
                $entity->sendMessage("Error");
            }
        }
    }
	
    public function onDisable(){
        $this->getLogger()->info("Claymores has been disabled.");
    }
}
