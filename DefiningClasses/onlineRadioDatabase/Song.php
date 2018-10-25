<?php

class Song
{
    /**
     * @var string
     */
    private $artistName;

    /**
     * @var string
     */
    private $songName;

    /**
     * @var string
     */
    private $songLength;


    /**
     * Song constructor.
     * @param string $artistName
     * @param string $songName
     * @param string $songLength
     * @throws InvalidArtistNameException
     * @throws InvalidSongException
     * @throws InvalidSongMinutesException
     * @throws InvalidSongSecondsException
     */
    public function __construct(string $artistName, string $songName, string $songLength)
    {
        $this->setArtistName($artistName);
        $this->setSongName($songName);
        $this->setSongLength($songLength);
    }

    /**
     * @param string $artistName
     * @throws InvalidArtistNameException
     */
    private function setArtistName(string $artistName): void
    {
        if(strlen($artistName)<3 || strlen($artistName)>20){
            throw new InvalidArtistNameException("Artist name should be between 3 and 20 symbols.");
        }
        $this->artistName = $artistName;
    }

    /**
     * @param string $songName
     * @throws InvalidSongException
     */
    private function setSongName(string $songName): void
    {
        if(strlen($songName)<3 || strlen($songName)>30){
            throw new InvalidSongException("Song name should be between 3 and 30 symbols.");
        }
        $this->songName = $songName;
    }

    /**
     * @param string $songLength
     * @throws InvalidSongMinutesException
     * @throws InvalidSongSecondsException
     */
    private function setSongLength(string $songLength): void
    {
        $minutesAndSec=$this->extractMinutesAndSeconds($songLength);
        if(($minutesAndSec[0]<0 || $minutesAndSec[0]>14) || ($minutesAndSec[1]<0 || $minutesAndSec[1]>59)){
            if($minutesAndSec[0]<0 || $minutesAndSec[0]>14){
                throw new InvalidSongMinutesException("Song minutes should be between 0 and 14.");
            }else{
                throw new InvalidSongSecondsException("Song seconds should be between 0 and 59.");
            }
        }
        $this->songLength=$songLength;
    }

    public function getTotalSeconds():int{
        $minutesAndSec=$this->extractMinutesAndSeconds($this->songLength);
        return $minutesAndSec[0]*60 + $minutesAndSec[1];
    }

    private function extractMinutesAndSeconds($songLength):array
    {
        $result=[];
        $songLengthTokens=explode(':',$songLength);
        $songMinutes=intval($songLengthTokens[0]);
        $result[]=$songMinutes;
        $songSeconds=intval($songLengthTokens[1]);
        $result[]=$songSeconds;
        return $result;
    }
}