<?php
namespace App\Enum;

class MessageTypes extends AbstractEnum
{
    const SUCCESS = 'success';
    const INFO    = 'info';
    const ERROR   = 'danger';
    const WARNING = 'warning';

    const GREEN  = self::SUCCESS;
    const BLUE   = self::INFO;
    const RED    = self::ERROR;
    const YELLOW = self:: WARNING;
}
