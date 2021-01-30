<?php

namespace Holded;
use Holded\Abstracts\InvoiceApi;

/**
 * Class Contacts
 * @package Holded
 *
 */
class Payment extends InvoiceApi
{

    protected $methods = ['list','create','get','update','delete' ];

    protected $pluralizeMethods = [];

    protected $endpoint = 'treasury';

    public function __construct(Caller $call)
    {
        $this->call = $call;
    }
}