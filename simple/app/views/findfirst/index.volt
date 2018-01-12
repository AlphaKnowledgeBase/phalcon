<div class="row">
    <h3>Примеры использавания метода <span class="text-info">findFirst()</span></h3>
</div>
<hr>
<div class="row row_25"></div>
<div class="row">
    <div class="col-md-3">
        <div><h4><b>Обращение к базе</b></h4></div>
        <div class="panel panel-info">
            <div class="text-danger">$robots = Robots::findFirst();</div>
        </div>
    </div>
    <div class="col-md-5">
        <div><h4><b>Обработка и передача в представление</b></h4></div>
        <div class="panel panel-warning">
            <div class="text-danger">
                $this->view->robots = Robots::findFirst();
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div><h4><b>Результат</b></h4></div>
        <div class="panel panel-success">
            <div class="text-danger">
                id - {{ robots.id }}
                name - {{ robots.name }}
                <hr>
                <br>
            </div>
        </div>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-3">
        <div class="panel panel-info">
            <div class="text-danger">$robot = Robots::findFirst([
                "type = 'virtual'",
                "order" => "name",
                ]);
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="panel panel-warning">
            <div class="text-danger">
                $this->view->setVar('robot_type', $robot);
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-success">
            <div class="text-danger">
                id - {{ robot_type.id }}
                name - {{ robot_type.name }}
                <hr>
                <br>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="panel panel-info">
            <div class="text-danger">$robots_query = Robots::query()
                ->where('type = :type:')
                ->bind(['type' => 'mechanical'])
                ->execute();
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="panel panel-warning">
            <div class="text-danger">
                $this->view->setVar('robots_query', $robots_query);
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-success">
            <div class="text-danger">
                type - {{ robots_query.type }}
                <hr>
                <br>
            </div>
        </div>
    </div>
</div>
