<header id="header-slogan-modal-2" class="pt-100 pb-50 light">
    <div class="container-fluid">
        <div class="row flex-md-vmiddle">
            <div class="col-md-12 pl" id="button" style="padding: 5px;">
                <h2 class="dark text-center" style="" data-aos="zoom-in" data-aos-easing="none" data-aos-duration="500" data-aos-delay="0">
                    <strong>Access Point</strong>&nbsp; Maps
                </h2>
                    <div id="map" class=""></div>
            </div>
        </div>
    </div>
    <div class="bg parallax-bg skrollable-after" data-top-bottom="transform:translate3d(0px, 25%, 0px)" data-bottom-top="transform:translate3d(0px, -25%, 0px)"></div>

    <script>
        var dataPoint = {{data | raw }};
        var longitude = {{longitude}};
        var latitude = {{latitude}};
        var zoom = {{zoom}};
    </script>

</header>

