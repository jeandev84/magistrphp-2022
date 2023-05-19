<?php

/**
 * https://www.phing.info/guide/chunkhtml/ch06s06.html
*/
class PhingCustomTask
{
    /**
     * The message passed in the buildfile.
     */
    private $message = null;
    /**
     * Whether to reverse the message, for fun?
     */
    private $reverse = false;

    /**
     * The setter for the attribute "message"
     */
    public function setMessage($str) {
        $this->message = $str;
    }

    public function setReverse($str) {
        $this->reverse = StringHelper::booleanValue($str);
    }

    /**
     * The init method: Do init steps.
     */
    public function init() {
        // nothing to do here
    }

    /**
     * The main entry point method.
     */
    public function main() {
        if ($this->reverse) {
            print(strrev($this->message));
        } else {
            print($this->message);
        }
    }
}