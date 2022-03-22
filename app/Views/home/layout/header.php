<section class="hero is-dark">
    <div class="hero-foot">
        <!--Menu-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark scrolling-navbar fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="http://proyect_airbnb.test"><img src="img/logo.png" class="img-fluid"
                        width="60px" height="60px" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto mb-2 mb-lg-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Alojamiento</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Experiencias</a>
                        </li>
                    </ul>
                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn write" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <a class="navbar-brand" href="#"><img src="img/linicio.png" class="img-fluid" width="80px"
                                    height="60px" alt="">
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <li>
                                <a class="dropdown-item" href="<?=base_url(route_to('register'))?>">Registrarse</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?=base_url(route_to('registerAnfittrion'))?>">Hazte
                                    anfitrión</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?=base_url(route_to('login'))?>">Iniciar
                                    sesion</a>
                            </li>
                        </ul>
                    </div>
                </div>
        </nav>
    </div>
</section>