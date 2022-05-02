<!--
|--------------------------------------------------------------------------
| Header
|--------------------------------------------------------------------------
|
| Here is all the navbar code built
|
-->

<!-- css Classes-->
<style>
    .nav-pills > li > a.active {
        background-color: #1a4872 !important;
    }
</style>

<!-- NAVBAR-->
<!-- border: 2px solid black-->
<div style="background-color: aliceblue;" class="container">
    <div class="row mt-3">
        <div class="col-12">
            <div style="height: 100px;" class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/MedicalManager/public" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">

                    <!-- As imagens devem ser inseridas na pasta public-->
                    <img src="{{ asset('Images/medical_icon.png') }}" alt="medicalManager" width="50" height="50">
                    <span class="fs-3" style="font-weight: bold;">Medical Manager</span>
                </a>


                <ul class="nav nav-pills col-12 col-lg-auto me-lg-auto justify-content-center ps-3">
                    <li class="nav-item">
                        <a class="nav-link px-2 link-secondary active" aria-current="page" href="/MedicalManager/public/page">Consultas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-2 link-secondary" aria-current="page" href="#">Fichas Médicas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-2 link-secondary" aria-current="page" href="#">Unidades de Saúde</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-2 link-secondary" aria-current="page" href="#">Especialidades Médicas</a>
                    </li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" data-dashlane-rid="f6cde14e05fb383f" data-form-type="">
                    <input type="search" class="form-control" placeholder="Pesquisar..." aria-label="Search" data-dashlane-rid="be0bba0efa9b9f87" data-form-type="">
                </form>

                <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
                        <li><a class="dropdown-item" href="#">Perfil</a></li>
                        <li><a class="dropdown-item" href="#">Definições</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Terminar Sessão</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
