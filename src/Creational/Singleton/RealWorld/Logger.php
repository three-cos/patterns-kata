<?php

namespace Warden\Patterns\Creational\Singleton\RealWorld;

use Exception;

class Logger
{
    private static array $channels = [];

    private $logFile = null;

    private function __construct(string $filename) {
        if (! file_exists($filename)) {
            file_put_contents($filename, null);
        }

        if (! is_writable($filename)) {
            throw new Exception("Can not write into $filename");
        }
        
        if (($this->logFile = fopen($filename, 'aw')) === false) {
            throw new Exception("Can not read $filename");
        }
    }

    public static function channel(string $filename): self
    {
        if (! array_key_exists($filename, self::$channels)) {
            self::$channels[$filename] = new self($filename);
        }

        return self::$channels[$filename];
    }

    public function log(string $message): void
    {
        $dateTime = date('[d-m-Y H:i:s]');

        fwrite($this->logFile, "$dateTime $message \n");
    }

    public function __destruct()
    {
        if ($this->logFile !== null) {
            fclose($this->logFile);
        }
    }
}