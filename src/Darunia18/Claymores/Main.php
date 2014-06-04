<?php

namespace Darunia18\Claymores;

use pocketmine\event\entity\EntityMoveEvent;
//use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class Claymores extends PluginBase {
    //private $api;
    //private $config;
    
    public function onLoad(){
    }
    
    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->log("Claymores has been enabled.");
	//$this->config = new Config($this->api->plugin->configPath($this)."config.yml", CONFIG_YAML, array('ClaymoreBlock' => 44, 'ExplosionSize' => 5, 'BlockDestroy' => false));
	//$this->api->event("entity.move", array($this, "entitymove"));
        //$this->claymore = $this->config->get('ClaymoreBlock');
	//$this->explosionSize = $this->config->get('ExplosionSize');
	//$this->blockDestroy = $this->config->get('BlockDestroy'));
	}
	
    /** 
     * @param EntityMoveEvent $data
     * 
     * @priority NORMAL
     * @ignoreCalcelled false
     */
    public function onMove(EntityMoveEvent $event){
	//$claymore = $data->level->getBlock(new Vector3($data->x, ($data->y -1), $data->z));
	//if($claymore->getID() == $this->claymore){
            //if($this->blockDestroy = true){
		//$explosion = new Explosion(new Position($data->x, ($data->y -1), $data->z, $data->level), $this->explosionSize);
		//$explosion->explode();
            //}
            //else{
		//something with getting rid of explosion and doing player damage
		//$eidOfPlayer = $this->api->player->getByEID($username); DOESN'T WORK!!!
		//$attack = 1?
		//$cause = ?
		//$force = 1?
		//remove explosion somehow
		//$this->api->entity->harm($eidOfPlayer, $attack, $cause, $force);
            //}
	//}
    }
	
    public function onDisable(){
        $this->getLogger()->log("Claymoes has been disabled.");
    }
}
