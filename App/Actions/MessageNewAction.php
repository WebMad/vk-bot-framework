<?php

namespace App\Actions;

use App\Commands\AbstractCommand;
use App\Kernel;

class MessageNewAction extends AbstractAction
{
    /**
     * @inheritDoc
     */
    function execute($data)
    {
        $message_object = $data['object'];

        if (isset($message_object['payload']))
        {
            $payload = json_decode($message_object['payload'], true);
            $keyboard_full_name = 'App\Keyboards\\' . str_replace('_', '', ucwords($payload['keyboard'], '_'));
            if (class_exists($keyboard_full_name)) {
                $button_full_name = str_replace('_', '', ucwords($payload['button'], '_')) . 'Button';
                $keyboard = new $keyboard_full_name($message_object);
                if (method_exists($keyboard, $button_full_name)) {
                    $keyboard->$button_full_name();
                }
            }
        }

        if (substr($message_object['text'], 0, mb_strlen(COMMAND_PREFIX)) == COMMAND_PREFIX) {
            $command = '';
            $command_parts = explode(' ', substr($message_object['text'], mb_strlen(COMMAND_PREFIX)));
            if (isset($command_parts[0])) {
                $command = mb_strtolower($command_parts[0]);
            }
            $commands = Kernel::getDic()['commands'];
            if (array_key_exists($command, $commands)) {
                /** @var AbstractCommand $command_class */
                $command_class = new $commands[$command]['class']($message_object);
                $command_class->execute();
            }
        }
        return;
    }
}