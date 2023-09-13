
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="indexAdmin.php">
                <div class="sidebar-brand-icon rotate-n-15">
                <i class="fa-solid fa-paw"></i>
                </div>
                <div class="sidebar-brand-text mx-1">Clínica Veterinária</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="listagemAgenda.php">
                    <i class="fa-solid fa-calendar-days"></i>
                    <span>Agenda</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa-solid fa-user-doctor"></i>
                    <span>Veterinário</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="cadastroVeterinario.php">Cadastro</a>
                        <a class="collapse-item" href="listagemVeterinario.php">Listagem</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCliente"
                    aria-controls="collapseCliente">
                    <i class="fa-solid fa-user"></i>
                    <span>Cliente</span>
                </a>
                <div id="collapseCliente" class="collapse" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="cadastroCliente.php">Cadastro de Cliente</a>
                        <a class="collapse-item" href="listagemCliente.php">Lista de Clientes</a>
                    </div>
                </div>
            </li>
            
            <li class="nav-item collapsed">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePet" aria-expanded="true"
                    aria-controls="collapsePet">
                    <i class="fa-solid fa-dog"></i>
                    <span>Pet</span>
                </a>
                <div id="collapsePet" class="collapse" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="cadastroPet.php">Cadastro de Pet</a>
                        <a class="collapse-item" href="listagemPet.php">Lista de Pets</a>
                        <a class="collapse-item" href="cadastroRaca.php">Cadastro de Raça</a>
                    </div>
                </div>
            </li>



        </ul>
        <!-- End of Sidebar -->
