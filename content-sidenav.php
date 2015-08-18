<nav id="sidenav" class="sidenav">
    <ul>
        <li>
            <a href="<?php echo esc_url( home_url( '/escritorio/' ) ); ?>">
                <i class="fa fa-home"></i><label>Escritorio</label>
            </a>
        </li>
        <li>
            <a href="<?php echo esc_url( home_url( '/perfil/' ) ); ?>">
                <i class="fa fa-user"></i><label>Perfil</label>
            </a>
        </li>
        <li>
            <a href="<?php echo esc_url( home_url( '/red/' ) ); ?>">
                <i class="fa fa-users"></i><label>Mi red</label>
            </a>
        </li>
        <li>
            <a href="<?php echo esc_url( home_url( '/capacitacion/' ) ); ?>">
                <i class="fa fa-book"></i><label>Capacitación</label>
            </a>
        </li>
        <li>
            <a href="<?php echo wp_logout_url( home_url() ); ?>">
                <i class="fa fa-sign-out"></i><label>Salir</label>
            </a>
        </li>
    </ul>
</nav>