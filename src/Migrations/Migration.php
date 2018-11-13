<?php

namespace Karamel\DB\Migrations;

use Karamel\DB\Facade\DB;

class Migration
{
    public function migrate()
    {
        if(!method_exists($this,'up'))
            throw new \Exception("Up method not defined yet");
        DB::query($this->up());
    }

    public function rollback()
    {
        if(!method_exists($this,'down'))
            throw new \Exception("Up method not defined yet");
        DB::query($this->down());
    }
}