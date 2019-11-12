<?php

namespace Controller;

class BussinessControllerAdd extends BussinessController{
    protected $dataBus;
    public function execute ($request, $response, $args) {
        if ($request->isPost()) {
                //Добавление данных организации в БД
                if($data = $this->addBussinessbd($request, $response, $args)) {
                    return $response->withRedirect('/bussiness/');
                }else {
                    //Защита от повторной отправки данных формы
                        $_SESSION['message_error'] = "Ошибка добавления. Попробуйте ещё раз";
                        $_SESSION['nameBusiness'] = $this->dataBus['name'];
                        $_SESSION['busDescription'] = $this->dataBus['description'];
                    return $response->withRedirect($uri = $request->getUri()->getpath());
                };
          }          
        return $this->display($request, $response, $args);
    }

    protected function display($request, $response, $args) {        
        $this->title .= 'NewBussiness';
        $this->mainbar = $this->mainBar();
        $this->deleSessionBus();
        parent::display($request, $response, $args);
    }
    
     //Получение главного блока данных точек доступа
    protected function mainBar () {
        return $this->view->fetch('template_bussiness_add.php',
            [
                'message_error' =>$this->session ['message_error'],
                'name' => $this->session['nameBusiness'],
                'description' => $this->session['busDescription']
            ]
        );
    }
    
    protected function addBussinessbd($request, $response, $args) {
         $posts_data = $request->getParsedBody();
         $this->dataBus = $posts_data;
            //Очистка данных от всего лишнего
            foreach ($posts_data as &$data) {                
                $data = $this->clear_str($data);
            }
            //Запрос в модель на добавление новой организации в БД
            if($idBuss = $this->model->addBus($posts_data)){
                 return $idBuss;
            }else {
                return FALSE;
            }           
    }

    protected function deleSessionBus () {
        unset($_SESSION['message_error']);
        unset($_SESSION['nameBusiness']);
        unset($_SESSION['busDescription']);
    }
}