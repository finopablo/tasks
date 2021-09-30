<?php
    include_once("../lib/class.Templates.php");
    include_once("../model/class.Player.php");

    $tpl = new Templates("..\html");
    $tpl->load_file("example.html", "main");
    $tpl->set_var("teamName", "Seleccion Argentina");
    $players = array();
    array_push($players, new Player(1, "Dibu", "Martinez"));
    array_push($players, new Player(2, "Lucas", "Martinez Quarta"));
    array_push($players, new Player(10, "Lionel", "Messi"));
    array_push($players, new Player(11, "Angel", "Di Maria"));
    
    if (count($players)<>0) {
        foreach ($players as $player) {
            $tpl->set_var("number", $player->number);
            $tpl->set_var("name", $player->name);
            $tpl->set_var("lastName", $player->last_name);
            $tpl->parse("Player", true);
        }
        $tpl->set_var("NoPlayers", "");
    } else {
        $tpl->parse("NoPlayers", false);
        $tpl->set_var("Player", "");
    }



    $tpl->pparse("main", false);
?>