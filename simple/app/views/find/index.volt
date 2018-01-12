<div class="row">
    <h3>Примеры использавания метода <span class="text-info">find()</span></h3>
</div>
<hr>
<div class="row row_25"></div>
<div class="row">
    <div class="col-md-3">
        <div><h4><b>Обращение к базе</b></h4></div>
        <div class="panel panel-info">
            <div class="text-danger">$robots = Robots::find();</div>
        </div>
    </div>
    <div class="col-md-5">
        <div><h4><b>Обработка и передача в представление</b></h4></div>
        <div class="panel panel-warning">
            <div class="text-danger">
                $this->view->robots_count_method = $robots->count();<hr>
                $this->view->robots_count_function = count($robots);<hr>
                $this->view->setVar('robots_array', $robots->toArray());<hr>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div><h4><b>Результат</b></h4></div>
        <div class="panel panel-success">
            <div class="text-danger">
                {{ robots_count_method }}<hr>
                {{ robots_count_function }}<hr>
                {% for robots in robots_array %}
                    {% if loop.first %}
                        {% for key,val in robots %}
                            {{ key }} {{ val }} <br>
                        {% endfor %}
                    {% endif %}
                {% endfor %}
                <br>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-3">
        <div class="panel panel-info">
            <div class="text-danger">
                $robots = Robots::find(
                [
                "type = 'virtual'",
                "order" => "name",
                "limit" => 100,
                ]
                );
                <hr>
                $robots3 = Robots::find([
                'columns'    => array('id', 'name', 'type'),
                "conditions" => "id = ?1",
                "bind" => [
                1 => "4",
                ]
                ]);
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="panel panel-warning">
            <div class="text-danger">
                $this->view->setVars(['virtual_robots' => $robots2,'robots_column'=>$robots3]);
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-success">
            <div class="text-danger">
                {% for k,v in virtual_robots %}
                    {{ k }} - {{ v.name }} {{ v.type }}<br>
                {% endfor %}
                <hr>
                {% for k,v in robots_column %}
                    {{ k }} - {{ v.name }} {{ v.type }}<br>
                {% endfor %}
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-3">
        <div class="panel panel-info">
            <div class="text-danger">
                $queryBuilder = new Builder([
                "models" => ["Robots"],
                "columns" => ["id", "name", "type"],
                "group" => ["id", "name"],
                "order" => ["name", "id"],
                "limit" => 20,
                "offset" => 20,
                ]);
                <hr>
                $query = new Query(
                "SELECT * FROM Robots",
                $this->getDI()
                );
                $robots = $query->execute()->toArray();</div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="panel panel-warning">
            <div class="text-danger">
                $this->view->setVars(['virtual_robots' => $robots2,
                'robots_column' => $robots3,
                'robots_builder' => $queryBuilder,
                'robots_query' => $robots4,
                ]);
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-success">
            <div class="text-danger">
                {{ robots_builder }}
                <hr>
                {% for robots in robots_query %}
                    {% if loop.first %}
                        {% for key,val in robots %}
                            {{ key }} {{ val }} <br>
                        {% endfor %}
                    {% endif %}
                {% endfor %}
                <br>
            </div>
        </div>
    </div>
</div>
