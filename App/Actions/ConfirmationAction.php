<?php

namespace App\Actions;

use App\Kernel;

class ConfirmationAction extends AbstractAction
{

    /**
     * @inheritDoc
     */
    function execute($data)
    {
        Kernel::app()->getResponse()->setBody(CONFIRMATION_STRING);
        return;
    }
}