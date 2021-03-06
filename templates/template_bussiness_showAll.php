<header id="header-slogan-modal-2" class="pt-200 pb-250 light">
    <div class="container">
        <div class="row flex-md-vmiddle">
            <div class="col-md-12" id="button">
                <h2 class="dark text-center" data-aos="zoom-in" data-aos-easing="none" data-aos-duration="500" data-aos-delay="0"><strong>Access Point</strong>&nbsp; CiscoWifi</h2>
                <p class="compressed-box-50 mb-100 dark text-center" >
                    Список организаций CiscoWifi<br>
                </p>

                {% if message %}
                <div class="col-md-12 pt-25" >
                    <h2 class ="dark text-center" ><span style="color: #ffefef; font-family: 'Amatic SC', cursive !important;">{{message}}</span></h2>
                </div>
                {% endif %}
                
                {% if show_block_moderator  %}
                <div class="text-center">
                    <a  class="btn btn-success btn-sm" href="{{add}}">Добавить организацию</a>  
                </div>
                                                       
                {% endif %}


                {% for data in bussiness %}
                <div class="dark parent-block" style="color: #FFFFFF; font-size: 16px;">
                    <div class="col-md-12 col-xs-12 point-data" style="border: 1px solid silver; border-radius: 5px; margin: 5px; padding-bottom: 10px; padding-top: 10px;">
                        <div class="col-md-4">

                                <div><i class="icon-library3 icon-position-left" ></i>
                                    {% if data.point>0 %}
                                        <a href="/bussiness/show/id/{{data.id}}" style="color: #3dff53" >{{data.name}}</a>
                                    {% else %}
                                        <span>{{data.name}}</span>
                                    {% endif %}
                                </div>

                        </div>

                        <div class="col-md-3">
                            <div><i class="icon-podcast icon-position-left"></i><span>Точки: </span>
                                {% if data.point>0 %}
                                    <a href="/bussiness/points/show/id/{{data.id}}" style="color: #3dff53" >{{data.point}}</a>
                                {% else %}
                                    <span>{{data.point}}</span>
                                {% endif %}
                            </div>
                        </div>
     
                        <div class="col-md-3">
                            <div><i class="icon-pushpin3 icon-position-left"></i>
                                {% if data.point>0 %}
                                    <a href="/point/maps/bussiness/id/{{data.id}}" style="color: #3dff53" >Карта</a>
                                {% else %}
                                    <span>Карта</span>
                                {% endif %}
                            </div>
                        </div>
                        
                        <div class="col-md-2">
                            {% if show_block_moderator %}
                                <a href="/bussiness/edit/id/{{data.id}}"><i class="icon-hammer3 icon-position-left"></i></a>
                                    {% if show_block_admin %}
                                        <a class="bussiness_del"  data-id-bussiness = "{{data.id}}"><i class="icon-cross3 icon-position-left"></i></a>
                                    {% endif %}
                            {% endif %}
                        </div>
                    </div>
                </div>
                {% endfor %}

            </div>

        </div>

        {% if navigation %}
        <div class="row ">
            <div class="col-md-12">
                <nav class="text-center">
                    <ul class="pagination text-center  justify-content-center">
                        {% if navigation.first %}
                        <li><a href="{{uri}}{{navigation.first}}">start</a></li>
                        {% endif %}

                        {% if navigation.last_page %}
                        <li><a href="{{uri}}{{navigation.last_page}}"> < </a></li>
                        {% endif %}

                        {% if navigation.previous %}
                        {% for data in navigation.previous %}
                        <li><a href="{{uri}}{{data}}"> {{data}} </a></li>
                        {% endfor %}
                        {% endif %}

                        {% if navigation.current %}
                        <li class="active"><a href="{{uri}}{{navigation.current}}"> {{navigation.current}} </a></li>
                        {% endif %}

                        {% if navigation.next %}
                        {% for data in navigation.next %}
                        <li><a href="{{uri}}{{data}}"> {{data}} </a></li>
                        {% endfor %}
                        {% endif %}

                        {% if navigation.next_pages %}
                        <li><a href="{{uri}}{{navigation.next_pages}}"> > </a></li>
                        {% endif %}

                        {% if navigation.end %}
                        <li><a href="{{uri}}{{navigation.end}}">End</a></li>
                        {% endif %}
                    </ul>
                </nav>
            </div>
        </div>
        {% endif %}

    </div>
    <div class="bg parallax-bg skrollable-after" data-top-bottom="transform:translate3d(0px, 25%, 0px)" data-bottom-top="transform:translate3d(0px, -25%, 0px)"></div>
</header>