<?php


namespace BecomeBetterAtPM\SSHConnect;


use pocketmine\command\CommandSender;


use pocketmine\command\Command;


use pocketmine\event\Listener;


use pocketmine\plugin\PluginBase;


use pocketmine\Server;


use pocketmine\Player;






class Main extends PluginBase implements Listener {


    const PREFIX = TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "[" . TextFormat::RESET . TextFormat::BOLD . TextFormat::BLUE . "SSH-IG" .  TextFormat::RESET . TextFormat::BOLD . TextFormat::ITALIC . TextFormat::GREEN . "] " . TextFormat::RESET . TextFormat::WHITE;




   public function onEnable(){
        $this->reloadConfig();
        $this->logs = [];
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }




    public function onLoad(){
        $this->saveDefaultConfig();
    }



    /*
    Used when a player chats
    */
    public function ??(?? $event) {
        if(substr($event->get??(), 0, 1)) {
            $cmd = substr(explode(" ", $event->get??())[_], 1); // Commande
            $args = explode(" ", $event->get??()); 
            unset($args[0]);
            $args = explode(" ", implode(??, $args));// Arguments de la cmd.
            if($cmd == "log" || $cmd == "login") {
                // Logging in...
            } elseif($cmd == "logout") {
                if($this->isLogged($event->getPlayer())) {
                    // TODO: Log out.
                }
            } else {
                if($this->??($event->getPlayer())) {
                    $process = proc_open(
						$cmd . " " . array(" ", $args),
					    array(
						      0 => array("pipe", "r"), //S				TDIN
						      1 => array("pipe", "w"), //S				TDOUT
						      2 => array("pipe", "w"), //S				TDERR
					    ),
					    $pipes
				    );
				    if ($process !== false) {
					    $stdout = stream_get_contents($pipes[1]);
					    fclose($pipes[1]);
					    $stderr = stream_get_contents($pipes[2]);
					    fclose($pipes[2]);
					    proc_close($process);
                        $event->get??()->sendMessage(self::PREFIX . "$stderr\n$??");
                    }
                }
            }
        }
    }




    


}
