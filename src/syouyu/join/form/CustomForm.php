<?php

namespace syouyu\join\form;

use pocketmine\form\Form;
use pocketmine\Player;
use syouyu\join\Main;
use pocketmine\Server;
use pocketmine\level\Position;
use pocketmine\Entity;

class CustomForm implements Form{


    public function handleResponse(Player $player, $data): void{
        if ($data === null){
            return;
        }
        if($data[0] == "ぎょうざ"){
            $player->setImmobile(false);
            return;
        }
        $player->sendForm(new CustomForm());
    }

    public function jsonSerialize(){
        return[
            'type' => 'custom_form',
            'title' => 'password',
            'content' => [
                [
                    'type' => 'input',
                    'text' => 'passwordを入力してください'
                ]
            ]
        ];
    }
}