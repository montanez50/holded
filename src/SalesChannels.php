<?php

namespace Holded;
use Holded\Abstracts\InvoiceApi;

/**
 * Class Contacts
 * @package Holded
 *
 */
class SalesChannels extends InvoiceApi
{

    protected $methods = ['list','create','get','update','delete' ];

    protected $pluralizeMethods = [];

    protected $endpoint = 'saleschannels';

    public function __construct(Caller $call)
    {
        $this->call = $call;
    }
}