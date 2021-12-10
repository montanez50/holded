<?php

namespace Holded;
use Holded\Abstracts\CrmApi;

/**
 * Class Contacts
 * @package Holded
 *
 */
class Funnel extends CrmApi
{

    protected $methods = ['list','create','get','update','delete' ];

    protected $pluralizeMethods = [];

    protected $endpoint = 'funnel';

    public function __construct(Caller $call)
    {
        $this->call = $call;
    }
}