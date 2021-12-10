<?php

namespace Holded\Abstracts;

use Holded\Caller;
use Holded\Exceptions\HoldedException;

abstract class CrmApi
{
    /** @var  Caller $call */
    var $call;

    protected $methods = [];

    protected $pluralizeMethods = [];

    protected $base_endpoint = 'crm/v1';

    public function __call($name, $arguments)
    {
        if (!in_array($name, $this->methods)) {
            throw new HoldedException("Method {$name} not allowed.");
        }

        return $this->execute($name, $arguments, $this->endpoint);
    }

    public function execute($name, $arguments, $endpoint)
    {
        $this->call->setBaseEndpoint($this->base_endpoint);
        $this->call->setEndpoint($endpoint);
        $this->call->setMethod($name);
        return $this->call->call($arguments[0] ?? [], isset($arguments[1]) ? array_slice($arguments,1) : ''  );
    }
}