<?php
/**
 * Created by PhpStorm.
 * User: msc
 * Date: 25.10.17
 * Time: 17:00
 */

final class Https
{
    public $isUnsecureUrl;
    private $inputProtocol;
    public $outputProtocol;
    private $secureUrl;

    public function checkIfUrlIsUnsecure($url) {
        if (substr($url, 0, 8) != "https://") {
            $this->isUnsecureUrl = true;
        } else {
            $this->isUnsecureUrl = false;
        }
    }

    public function setInputOutputProtokoll($input, $output) {
        $this->inputProtocol = $input;
        $this->outputProtocol = $output;
    }

    public function getHttpsUrl($url)
    {
        return $this->secureUrl = preg_replace( '#^$this->inputProtocol#','$this->outputProtocol', $url);
    }

}