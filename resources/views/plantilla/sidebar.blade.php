            <div class="sidebar">
                <nav class="sidebar-nav">
                    <ul class="nav">
                        @if(
                            auth()->user()->can('dashboard_estudiante_listar')
                        )
                        <li @click="setMenu(-18)" class="nav-item">
                            {{-- Estudiante --}}
                            <a class="nav-link active" href="#"><i class="icon-speedometer"></i> Escritorio</a>
                        </li>
                        @endif
                        @if(
                            auth()->user()->can('super_admin')
                        )
                        <li @click="setMenu(0)" class="nav-item">
                            {{-- Administrador --}}
                            <a class="nav-link active" href="#"><i class="icon-speedometer"></i> Escritorio</a>
                        </li>
                        @endif
                        @if(
                            auth()->user()->can('super_admin')
                        )
                        <li class="nav-item nav-dropdown">
                            <a class="nav-link nav-dropdown-toggle menu-principal" href="#"><i class="icon-bag"></i> Consultas</a>
                            <ul class="nav-dropdown-items">
                                <li @click="setMenu(-6)" class="nav-item">
                                    <a class="nav-link" href="#"><i class="icon-bag"></i> DNI / RUC</a>
                                </li>
                                <li @click="setMenu(-7)" class="nav-item">
                                    <a class="nav-link" href="#"><i class="icon-bag"></i> CPE</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        <li class="nav-title">
                            Mantenimiento
                        </li>
                        @if(
                            auth()->user()->can('super_admin') ||
                            auth()->user()->can('inscritos_listar') ||
                            auth()->user()->can('historicos_listar')
                        )
                        <li class="nav-item nav-dropdown">
                            <a class="nav-link nav-dropdown-toggle menu-principal" href="#"><i class="icon-bag"></i> Tramite Carne</a>
                            <ul class="nav-dropdown-items">
                                @if(
                                    auth()->user()->can('super_admin') ||
                                    auth()->user()->can('inscritos_listar')
                                )
                                <li @click="setMenu(-8)" class="nav-item">
                                    <a class="nav-link" href="#"><i class="icon-bag"></i> Inscritos</a>
                                </li>
                                @endif
                                @if(
                                    auth()->user()->can('super_admin') ||
                                    auth()->user()->can('historicos_listar')
                                )
                                <li @click="setMenu(-14)" class="nav-item">
                                    <a class="nav-link" href="#"><i class="icon-bag"></i> Historico</a>
                                </li>
                                @endif
                            </ul>
                        </li>
                        @endif
                        @if(
                            auth()->user()->can('super_admin') ||
                            auth()->user()->can('matriculas_listar') ||
                            auth()->user()->can('cargas_listar')
                        )
                        <li class="nav-item nav-dropdown">
                            <a class="nav-link nav-dropdown-toggle menu-principal" href="#"><i class="icon-bag"></i> Matriculas</a>
                            <ul class="nav-dropdown-items">
                                @if(
                                    auth()->user()->can('super_admin') ||
                                    auth()->user()->can('matriculas_listar')
                                )
                                <li @click="setMenu(-9)" class="nav-item">
                                    <a class="nav-link" href="#"><i class="icon-bag"></i> Matricula</a>
                                </li>
                                @endif
                                @if(
                                    auth()->user()->can('super_admin') ||
                                    auth()->user()->can('cargas_listar')
                                )
                                <li @click="setMenu(-12)" class="nav-item">
                                    <a class="nav-link" href="#"><i class="icon-bag"></i> Carga</a>
                                </li>
                                @endif
                            </ul>
                        </li>
                        @endif
                        @if(
                            auth()->user()->can('sin_permisos')
                        )
                        <li class="nav-item nav-dropdown">
                            <a class="nav-link nav-dropdown-toggle menu-principal" href="#"><i class="icon-bag"></i> Documentos</a>
                            <ul class="nav-dropdown-items">
                                <li @click="setMenu(-10)" class="nav-item">
                                    <a class="nav-link" href="#"><i class="icon-bag"></i> Envio Cert.</a>
                                </li>
                                <li @click="setMenu(-11)" class="nav-item">
                                    <a class="nav-link" href="#"><i class="icon-bag"></i> Recibido Cert.</a>
                                </li>
                                <li @click="setMenu(-15)" class="nav-item">
                                    <a class="nav-link" href="#"><i class="icon-bag"></i> Solicitudes Doc.</a>
                                </li>
                                <li @click="setMenu(-16)" class="nav-item">
                                    <a class="nav-link" href="#"><i class="icon-bag"></i> Generar Doc.</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if(
                            auth()->user()->can('super_admin')
                        )
                        <li class="nav-item nav-dropdown">
                            <a class="nav-link nav-dropdown-toggle menu-principal" href="#"><i class="icon-bag"></i> Personas</a>
                            <ul class="nav-dropdown-items">
                                <li @click="setMenu(-4)" class="nav-item">
                                    <a class="nav-link" href="#"><i class="icon-bag"></i> Personas Nat.</a>
                                </li>
                                <li @click="setMenu(-5)" class="nav-item">
                                    <a class="nav-link" href="#"><i class="icon-bag"></i> Personas Jur.</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if(
                            auth()->user()->can('sin_permisos')
                        )
                        <li class="nav-item nav-dropdown">
                            <a class="nav-link nav-dropdown-toggle menu-principal" href="#"><i class="icon-bag"></i> Conductores</a>
                            <ul class="nav-dropdown-items">
                                <li @click="setMenu(-1)" class="nav-item">
                                    <a class="nav-link" href="#"><i class="icon-bag"></i> Conductores</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if(
                            auth()->user()->can('sin_permisos')
                        )
                        <li class="nav-item nav-dropdown">
                            <a class="nav-link nav-dropdown-toggle menu-principal" href="#"><i class="icon-bag"></i> Almacén</a>
                            <ul class="nav-dropdown-items">
                                <li @click="setMenu(1)" class="nav-item">
                                    <a class="nav-link" href="#"><i class="icon-bag"></i> Artículo</a>
                                </li>
                                @can('categoria_listar')
                                    <li @click="setMenu(2)" class="nav-item">
                                        <a class="nav-link" href="#"><i class="icon-bag"></i> Categoría</a>
                                    </li>
                                @endcan
                                <li @click="setMenu(3)" class="nav-item">
                                    <a class="nav-link" href="#"><i class="icon-bag"></i> Marca</a>
                                </li>
                                <li @click="setMenu(4)" class="nav-item">
                                    <a class="nav-link" href="#"><i class="icon-bag"></i> Movimiento Producto</a>
                                </li>
                                <li @click="setMenu(5)" class="nav-item">
                                    <a class="nav-link" href="#"><i class="icon-bag"></i> Inventario Fisico</a>
                                </li>
                                <li @click="setMenu(6)" class="nav-item">
                                    <a class="nav-link" href="#"><i class="icon-bag"></i> Inventario Valorizado</a>
                                </li>
                                <li @click="setMenu(7)" class="nav-item">
                                    <a class="nav-link" href="#"><i class="icon-bag"></i> Caja</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if(
                            auth()->user()->can('sin_permisos')
                        )
                        <li class="nav-item nav-dropdown">
                            <a class="nav-link nav-dropdown-toggle menu-principal" href="#"><i class="icon-wallet"></i> Compras</a>
                            <ul class="nav-dropdown-items">
                                <li @click="setMenu(8)" class="nav-item">
                                    <a class="nav-link" href="#"><i class="icon-wallet"></i> Ingresos</a>
                                </li>
                                <li @click="setMenu(9)" class="nav-item">
                                    <a class="nav-link" href="#"><i class="icon-notebook"></i> Proveedores</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if(
                            auth()->user()->can('sin_permisos')
                        )
                        <li class="nav-item nav-dropdown">
                            <a class="nav-link nav-dropdown-toggle menu-principal" href="#"><i class="icon-basket"></i> Ventas</a>
                            <ul class="nav-dropdown-items">
                                <li @click="setMenu(10)" class="nav-item">
                                    <a class="nav-link" href="#"><i class="icon-basket-loaded"></i> Ventas</a>
                                </li>
                                <li @click="setMenu(11)" class="nav-item">
                                    <a class="nav-link" href="#"><i class="icon-basket-loaded"></i> Nota Credito/Debito</a>
                                </li>
                                <li @click="setMenu(12)" class="nav-item">
                                    <a class="nav-link" href="#"><i class="icon-notebook"></i> Clientes</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if(
                            auth()->user()->can('super_admin')
                        )
                        <li class="nav-item nav-dropdown">
                            <a class="nav-link nav-dropdown-toggle menu-principal" href="#"><i class="icon-people"></i> Acceso</a>
                            <ul class="nav-dropdown-items">
                                <li @click="setMenu(13)" class="nav-item">
                                    <a class="nav-link" href="#"><i class="icon-user-following"></i> Role</a>
                                </li>
                                <li @click="setMenu(14)" class="nav-item">
                                    <a class="nav-link" href="#"><i class="icon-user-following"></i> Permiso</a>
                                </li>
                                <li @click="setMenu(15)" class="nav-item">
                                    <a class="nav-link" href="#"><i class="icon-user"></i> Usuario</a>
                                </li>
                                <li @click="setMenu(12)" class="nav-item">
                                    <a class="nav-link" href="#"><i class="icon-user"></i> Cliente Web Service</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if(
                            auth()->user()->can('sin_permisos')
                        )
                        <li class="nav-item nav-dropdown">
                            <a class="nav-link nav-dropdown-toggle menu-principal" href="#"><i class="icon-people"></i> Fact. Electronica</a>
                            <ul class="nav-dropdown-items">
                                <li @click="setMenu(16)" class="nav-item">
                                    <a class="nav-link" href="#"><i class="icon-user-following"></i> Resumen Boleta</a>
                                </li>
                                <li @click="setMenu(17)" class="nav-item">
                                    <a class="nav-link" href="#"><i class="icon-user-following"></i> Resumen Baja</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if(
                            auth()->user()->can('sin_permisos')
                        )
                        <li class="nav-item nav-dropdown">
                            <a class="nav-link nav-dropdown-toggle menu-principal" href="#"><i class="icon-pie-chart"></i> Reportes</a>
                            <ul class="nav-dropdown-items">
                                <li @click="setMenu(18)" class="nav-item">
                                    <a class="nav-link" href="#"><i class="icon-chart"></i> Compras</a>
                                </li>
                                <li @click="setMenu(19)" class="nav-item">
                                    <a class="nav-link" href="#"><i class="icon-chart"></i> Ventas</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if(
                            auth()->user()->can('super_admin')
                        )
                        <li class="nav-item nav-dropdown">
                            <a class="nav-link nav-dropdown-toggle menu-principal" href="#"><i class="icon-pie-chart"></i> Configuracion</a>
                            <ul class="nav-dropdown-items">
                                <li @click="setMenu(20)" class="nav-item">
                                    <a class="nav-link" href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-chart"></i> Perfil</a>
                                </li>
                                <li @click="setMenu(23)" class="nav-item">
                                    <a class="nav-link" href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-chart"></i> Convocatoria</a>
                                </li>
                                <li @click="setMenu(-13)" class="nav-item">
                                    <a class="nav-link" href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-chart"></i> Periodo Académico</a>
                                </li>
                                <li @click="setMenu(-17)" class="nav-item">
                                    <a class="nav-link" href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-chart"></i> Estudiante</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        <li @click="setMenu(21)" class="nav-item">
                            <a class="nav-link" href="#"><i class="icon-book-open"></i> Ayuda <span class="badge badge-danger">PDF</span></a>
                        </li>
                        <li @click="setMenu(22)" class="nav-item">
                            <a class="nav-link" href="#"><i class="icon-info"></i> Acerca de...<span class="badge badge-info">IT</span></a>
                        </li>
                    </ul>
                </nav>
                <button class="sidebar-minimizer brand-minimizer" type="button"></button>
            </div>