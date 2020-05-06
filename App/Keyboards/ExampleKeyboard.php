<?php


namespace App\Keyboards;

class ExampleKeyboard extends AbstractKeyboard
{
    public function ExampleButton()
    {
        $message = 'Пример сообщения';
        return $this->returnMessage($message);
    }

    public function Example2Button()
    {
        $message = 'Пример сообщения 2';
        return $this->returnMessage($message);
    }

    private function returnMessage($message)
    {

        return $this->getResponse()->addMessage([
            'peer_id' => $this->getMessageObject()['peer_id'],
            'message' => $message,
            'random_id' => rand(0, 100000),
        ]);
    }
}