<?php

namespace Controller;

class PointControllerMaps extends PointController
{
    protected $dataPointAll;
    protected $x = 52.0947;
    protected $y =23.6911;
    protected $zoom =16;
    public function execute($request, $response, $args)
    {
        if (isset($args['id'])) {
            if($result = $this->model->getDataPointId($args['id'])) {
                $this->x = $result[0]['latitude'];
                $this->y = $result[0]['longitude'];
                $this->zoom = 19;               
            }   
        }
        return $this->display($request, $response, $args);
    }

    protected function display($request, $response, $args)
    {
        $this->title .= 'Maps';
        //Подключение необходимых скриптов
        $this->page_script = $this->getScripts();
        $this->dataPointAll = json_encode($this->getDataPoint());
        $this->mainbar = $this->mainBar();
        parent::display($request, $response, $args);
    }

    //Получение главного блока данных точки доступа
    protected function mainBar () {
        return $this->view->fetch('template_point_maps_page.php',
                                    [
                                        'data'      => $this->dataPointAll,
                                        'latitude'  => $this->x,
                                        'longitude' => $this->y,
                                        'zoom'      => $this->zoom
        ]);
    }
//Получить необходимые скрипы для отображения страницы
    protected function getScripts () {
        return [
            'https://api-maps.yandex.ru/2.1/?apikey=e47ca267-409d-4f76-b09a-2c71c39d6c14&lang=ru_RU',
            '/js/maps-allshow.js'
        ];
    }

    protected function getDataPoint () {
        return $this->model->getDataPoint();
    }
}