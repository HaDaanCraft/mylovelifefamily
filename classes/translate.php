<?php

class Translate {
    public static function translateDate($date) {
        $date = explode(" ", $date);
        foreach ($date as $word) {
            if ($word == "Monday") {
                $n = array_search($word, $date);
                $date[$n] = "Maandag";
            } else if ($word == "Tuesday") {
                $n = array_search($word, $date);
                $date[$n] = "Dinsdag";
            } else if ($word == "Wednesday") {
                $n = array_search($word, $date);
                $date[$n] = "Woensdag";
            } else if ($word == "Thursday") {
                $n = array_search($word, $date);
                $date[$n] = "Donderdag";
            } else if ($word == "Friday") {
                $n = array_search($word, $date);
                $date[$n] = "Vrijdag";
            } else if ($word == "Saturday") {
                $n = array_search($word, $date);
                $date[$n] = "Zaterdag";
            } else if ($word == "Sunday") {
                $n = array_search($word, $date);
                $date[$n] = "Zondag";
            }
        }

        $newdate = implode(" ", $date);

        return $newdate;


    }
}