<?php
namespace Anwar\Soshare;
/**
 * @Author: anwar
 * @Date:   2018-01-02 11:29:52
 * @Last Modified by:   anwar
 * @Last Modified time: 2018-01-04 09:29:39
 */
use Illuminate\Support\Facades\Facade;

class SoshareFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Soshare';
    }
}