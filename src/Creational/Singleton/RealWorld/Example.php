<?php


namespace Warden\Patterns\Creational\Singleton\RealWorld;

class Example 
{
    public function __invoke()
    {
        Logger::channel(__DIR__.'/log_1.txt')->log('test 1');
        Logger::channel(__DIR__.'/log_2.txt')->log('test 2');
        Logger::channel(__DIR__.'/log_1.txt')->log('test 3');
        Logger::channel(__DIR__.'/log_2.txt')->log('test 4');
    }
}