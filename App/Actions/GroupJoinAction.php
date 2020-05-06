<?php

namespace App\Actions;

use App\Kernel;

class GroupJoinAction extends AbstractAction
{

    /**
     * @inheritDoc
     */
    function execute($data)
    {
        Kernel::app()->getResponse()->addMessage([
            'peer_id' => $data['object']['user_id'],
            'message' => Kernel::getMessageTemplate('group_join_message'),
            'random_id' => rand(0, 100000),
        ]);
        return;
    }
}