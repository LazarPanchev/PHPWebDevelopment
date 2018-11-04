<?php

class Application
{
    public function run()
    {
        $numbers = explode(' ', readline());
        $phone = new SmartPhone();
        for ($i = 0; $i < count($numbers); $i++) {
            try {
                echo $phone->call($numbers[$i]);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        $urls = explode(' ', readline());
        for ($i = 0; $i < count($urls); $i++) {
            try {
                echo $phone->browse($urls[$i]);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
}