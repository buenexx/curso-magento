<?php

namespace Magenteiro\PrimeiroPlugin\Plugin;

use Magento\Catalog\Model\System\Config\Backend\Catalog\Url\Rewrite\Suffix;

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
        $result = str_replace('>', '|', $result);
        $result = str_replace('<', '|', $result);
        return $result;
    }

    public function aroundFormatText(\Magenteiro\PrimeiroModulo\Console\Command\TestCommand $subject, callable $proceed, $prefix, $suffix)
    {
        $result = '@@@' . $proceed($prefix, $suffix);
        return $result;
    }
}