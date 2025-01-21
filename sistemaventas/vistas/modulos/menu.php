<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu">

		<?php

		if($_SESSION["perfil"] == "Administrador"){

			echo '<li class="active">

				<a href="inicio">

					<i class="fa fa-home"></i>
					<span>Inicio</span>

				</a>

			</li>';

		}

		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial"){

			echo '

			<li>

				<a href="productos">

					<i class="fa fa-product-hunt"></i>
					<span>Inventario</span>

				</a>

			</li>';

		}



		?>

		</ul>

	 </section>

</aside>