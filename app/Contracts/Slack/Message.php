<?php

namespace App\Contracts\Slack;

interface Message
{
    public function getFromName():string;
    public function getFromEmoji():string;
    public function getTitle():string;
    public function getContent():string;
    public function getFields():array;
    public function getUrl():string;
}
