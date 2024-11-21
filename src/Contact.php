<?php

namespace Holded;
use Holded\Abstracts\InvoiceApi;

/**
 * Class Contacts
 * @package Holded
 *
 */
class Contact extends InvoiceApi
{

    protected $methods = ['list','create','get','update','delete'];

    protected $pluralizeMethods = [];

    protected $endpoint = 'contacts';

    public function __construct(Caller $call)
    {
        $this->call = $call;
    }
}