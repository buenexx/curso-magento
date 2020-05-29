<?php

namespace Magenteiro\PrimeiroPlugin\Plugin;

class MeuPlugin
{
    public function beforeFormatText(\Magenteiro\PrimeiroModulo\Console\Command\TestCommand $subject) 
    {
        $prefix = '>>';
        $suffix = '<<';
        return [$prefix, $suffix];
    }  
    public function afterFormatText(\Magenteiro\PrimeiroModulo\Console\Command\TestCommand $subject, $result, $prefix, $suffix) 
    {
        $result = str_replace('>','|', $result);
        $result = str_replace('<','|', $result);
        return $result;
    } 
    public function aroundFormatText(\Magenteiro\PrimeiroModulo\Console\Command\TestCommand $subject, callable $proceed, $prefix, $suffix) 
    {
        $result = '@@@' . $proceed($prefix, $suffix); //evitar do tipo around pois se esquecer
        return $result;                               //$proceed não funciona os outros plugins também.
    }
}