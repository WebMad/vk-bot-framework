<?php

namespace App\Commands;

use App\Kernel;

class ExampleCommand extends AbstractCommand
{

    /**
     * @inheritDoc
     */
    public function execute()
    {
        Kernel::app()->getResponse()->addMessage([
            'peer_id' => $this->getMessageObject()['peer_id'],
            'message' => Kernel::getMessageTemplate('example'),
            'random_id' => rand(0, 100000),
        ]);
        return;
    }
}