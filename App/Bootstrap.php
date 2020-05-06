<?php

namespace App;

use App\Actions\AbstractAction;

class Bootstrap
{

    /**
     * Запущено ли приложение
     *
     * @var bool
     */
    private $is_init = false;

    /**
     * @var Database
     */
    private $database;

    /**
     * @return bool
     */
    public function init()
    {
        if ($this->isInit()) {
            return false;
        }
        $this->database = new Database();

        $this->is_init = true;

        $this->routeBot();

        return false;
    }

    /**
     * Роутинг
     */
    private function routeBot()
    {
        $post = file_get_contents("php://input");
        if (!empty($post)) {
            $data = json_decode($post, true);
            $check_result = $this->checkCredential($data);
            if (!$check_result['error']) {
                if (!empty($data['type'])) {
                    $action_full_name = 'App\Actions\\' . str_replace('_', '', ucwords($data['type'], '_')) . 'Action';
                    $action_file_name = APP_DIR . '/' . str_replace('\\', '/', $action_full_name) . '.php';
                    if (file_exists($action_file_name)) {
                        require $action_file_name;
                        if (class_exists($action_full_name)) {
                            if (method_exists($action = new $action_full_name(), 'execute')) {
                                /** @var AbstractAction $action */
                                ob_start();
                                $action->execute($data);
                                ob_end_clean();
                                header("Content-type:{$action->getContentType()};charset={$action->getCharset()}");
                                Kernel::app()->getResponse()->sendMessages();
                                echo Kernel::app()->getResponse()->getBody();
                                return true;
                            }
                        }
                    }
                }
            } else {
                echo json_encode($check_result);
            }
        }
        return false;
    }

    /**
     * Проверка информации запроса
     *
     * @param $data
     * @return array
     */
    private function checkCredential($data)
    {
        if ($data['group_id'] == GROUP_ID) {
            if ($data['secret'] == SECRET_KEY) {
                return [
                    'error' => false,
                    'message' => 'Success'
                ];
            }
            return [
                'error' => true,
                'message' => 'Secret key is not valid'
            ];
        }
        return [
            'error' => true,
            'message' => 'Group id is not valid'
        ];
    }

    public function isInit()
    {
        return $this->is_init;
    }
}