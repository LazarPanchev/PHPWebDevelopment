<?php
class SmartPhone implements ICall,IBrowse
{
    /**
     * @param string $phoneNumber
     * @return string
     * @throws Exception
     */
    public function call(string $phoneNumber): string
    {
        if(preg_match_all('/[^0-9]+/',$phoneNumber)){
            throw new Exception('Invalid number!');
        }
        return "Calling... {$phoneNumber}" . PHP_EOL;

    }

    /**
     * @param string $url
     * @return string
     * @throws Exception
     */
    public function browse(string $url): string
    {
        if(preg_match_all('/[0-9]+/',$url)){
            throw new Exception('Invalid URL!\n');
        }
        return "Browsing: {$url}!". PHP_EOL;
    }

}
