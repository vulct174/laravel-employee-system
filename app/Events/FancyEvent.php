<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FancyEvent
{
    use Dispatchable, SerializesModels;

    public $employee;

    /**
     * Create a new event instance.
     */
    public function __construct($employee)
    {
        $this->employee = $employee;
    }
}
