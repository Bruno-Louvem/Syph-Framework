<?php

/**
 * Created by PhpStorm.
 * User: PSBI
 * Date: 13/08/2015
 * Time: 13:33
 */
interface HttpRequestInterface
{
    public function serialize();
    public function toArray();
}