<?php

namespace Holded;
use Holded\Abstracts\InvoiceApi;

/**
 * Class Contacts
 * @package Holded
 *
 */
class Document extends InvoiceApi
{

    protected $methods = ['list','create','get','update','delete','pay','send','getpdf','shipall', 'shipbytime','attachfile', 'updatetracking', 'updatepipeline' ];

    protected $pluralizeMethods = [];

    protected $endpoint = 'documents';

    public function __construct(Caller $call)
    {
        $this->call = $call;
    }
}