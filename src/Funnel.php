<?php

namespace Holded;
use Holded\Abstracts\InvoiceApi;

/**
 * Class Contacts
 * @package Holded
 *
 */
class Funnel extends InvoiceApi
{

    protected $methods = ['list','create','get','update','delete' ];

    protected $pluralizeMethods = [];

    protected $endpoint = 'funnel';

    public function __construct(Caller $call)
    {
        $this->call = $call;
    }
}