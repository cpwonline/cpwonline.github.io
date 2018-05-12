<!--Clientes-->
<section class="perfil">
	<ul class="arriba">
		<li tag="1">General</li>
		<li tag="2">Estado</li>
		<li tag="3">Pagos</li>
		<li tag="4">Perfil</li>
		<li tag="5">Informaci&oacute;n</li>
	</ul>
	<section class="abajo">
		<!--General-->
			<article tag="1">
				<?php
					$con = $mysqli->query("SELECT * FROM ordenes WHERE o_usuario = '".$_SESSION['o_usuario']."'");
					$ro = $con->fetch_array();
					//Datos
						$o_titulo = $ro['o_titulo'];
						$o_dominio_1 = $ro['o_dominio_1'];
						$o_dominio_2 = $ro['o_dominio_2'];
						$o_dominio_3 = $ro['o_dominio_3'];
						$o_nya = $ro['o_nya'];
						$o_cedula = $ro['o_cedula'];
						$o_pais = $ro['o_pais'];
						$o_estado = $ro['o_estado'];
						$o_ciudad = $ro['o_ciudad'];
						$o_direccion = $ro['o_direccion'];
						$o_email = $ro['o_email'];
						$o_tel = $ro['o_tel'];
						$o_plan = $ro['o_plan'];
						$o_modelo = $ro['o_modelo'];
						$o_contenidos = $ro['o_contenidos'];
						$o_moneda = $ro['o_moneda'];
						$o_precio = $ro['o_precio'];
						$o_usuario = $ro['o_usuario'];
						$o_clave = $ro['o_clave'];
						$o_listo = $ro['o_listo'];
						$o_admin = $ro['o_admin'];
						$o_estado_cuenta = $ro['o_estado_cuenta'];
						$o_estado_pagina = $ro['o_estado_pagina'];
						$o_freg = $ro['o_freg'];
				?>
						<p class="list_datos_tit"><strong>Datos adquiridos</strong></p>
						<p class="list_datos">T&iacute;tulo de la web: <strong><?=$o_titulo?></strong></p>
						<p class="list_datos">Dominio 1: <strong><?=$o_dominio_1?></strong></p>
						<p class="list_datos">Dominio 2: <strong><?=$o_dominio_2?></strong></p>
						<p class="list_datos">Dominio 3: <strong><?=$o_dominio_3?></strong></p>
						<p class="list_datos">Nombres y apellidos: <strong><?=$o_nya?></strong></p>
						<p class="list_datos">DNI, C&eacute;dula o pasaporte: <strong><?=$o_cedula?></strong></p>
						<p class="list_datos">Pa&iacute;s: <strong><?=$o_pais?></strong></p>
						<p class="list_datos">Estado o provincia: <strong><?=$o_estado?></strong></p>
						<p class="list_datos">Ciudad: <strong><?=$o_ciudad?></strong></p>
						<p class="list_datos">Direcci&oacute;n: <strong><?=$o_direccion?></strong></p>
						<p class="list_datos">Correo: <strong><?=$o_email?></strong></p>
						<p class="list_datos">Tele&eacute;fono: <strong><?=$o_tel?></strong></p>
						<p class="list_datos">Plan: <strong><?=$o_plan?></strong></p>
						<p class="list_datos">Modelo: <strong><?=$o_modelo?></strong></p>
						<p class="list_datos">Contenidos: <strong><?=$o_contenidos?></strong></p>
						<p class="list_datos">Moneda: <strong><?=$o_moneda?></strong></p>
						<p class="list_datos">Total a pagar: <strong><?=$o_precio?></strong></p>
						<p class="list_datos">Usuario: <strong><?=$o_usuario?></strong></p>
						<p class="list_datos not">Esta secci&oacute;n muestra los datos administrados por usted.</p>
						
						<p class="list_datos_tit"><strong>Datos oficiales</strong></p>
					<?php
						$con = $mysqli->query("SELECT * FROM datos_oficiales WHERE do_usuario ='".$_SESSION['o_usuario']."' ");
						if($con->num_rows === 0){
							echo '<p class="list_datos">No hay datos disponibles.</p>';
						}else{
							$ro = $con->fetch_array();
							$do_usuario = $ro['do_usuario'];
							$do_dominio = $ro['do_dominio'];
							$do_estado_pagina = $ro['do_estado_pagina'];
							$do_fase = $ro['do_fase'];
							$do_freg = $ro['do_freg'];
					?>
						<p class="list_datos">Dominio: <strong><a href="<?=$do_dominio?>" target="_blank"><?=$do_dominio?></a></strong></p>
						<p class="list_datos">Estado de p&aacute;gina: <strong><?=$do_estado_pagina?></strong></p>
						<p class="list_datos">Estado de fase: <strong><?=$do_fase?></strong></p>
						<p class="list_datos">Fecha de registro: <strong><?=$do_freg?></strong></p>
					<?php
						}
					?>
						<p class="list_datos not">Esta secci&oacute;n muestra los datos oficiales de su P&aacute;gina web.</p>
			</article>
		<!--Estado-->
			<article tag="2">
				<?php
					if($o_estado_pagina == "De prueba"){
						echo '<p class="list_datos">Su estado de p&aacute;gina es: <strong>'.$o_estado_pagina.'</strong> cambiar a: <a class="btn-gen" tag="reportar_pagina_oficial">Oficial</a></p>';
					}else{
						echo '<p class="list_datos">Su estado de p&aacute;gina es: <strong>'.$o_estado_pagina.'</strong></p>';
					}
				?>
				<?php
					if($o_listo){
						echo '<p class="list_datos">Estado del pedido de la p&aacute;gina: <strong>Listo</strong></p>';
					}else{
						echo '<p class="list_datos">Estado del pedido de la p&aacute;gina: <strong>En proceso</strong></p>';
					}
				?>
				<p class="list_datos not">Le recordamos que el <i>"Estado de p&aacute;gina"</i> tiene dos opciones: "De prueba" y "Oficial", antes de pasar al estado "Oficial" recuerde que debe esperar a que su <i>"Estado del pedido de p&aacute;gina"</i> est&eacute; "Listo" a menos que desee pasar al modo "Oficial". En ese momento, se le enviar&aacute; los datos de acceso de su p&aacute;gina y usted podr&aacute; visualizarla, luego deber&aacute; decidir si pasar al estado "Oficial". Cuando se pasa al estado "Oficial" se debe realizar el correspondiente pago, mientras se est&eacute; en el estado "De prueba" no debe realizarse ning&uacute;n pago.</p>
			</article>
		<!--Pagos-->
			<article tag="3">
				<!--Reportar pagos-->
					<article class="bloque b1">
						<h4>Reportar pago</h4>
					<!--Formulario tipo multipart-->
						<form name="form_pago" enctype="multipart/form-data">
							<div class="tabla_gen">
								<div class="fil">
									<div class="cam">Cantidad: </div>
									<div class="cam"><input type="text" name="pa_cantidad" placeholder="Escriba la cantidad de dinero que desea reportar"/></div>
								</div>
								<div class="fil">
									<div class="cam">Moneda: </div>
									<div class="cam">
										<select name="pa_moneda">
											<?php
												$con = $mysqli->query("SELECT p_moneda FROM precios LIMIT 3");
												while($ro = $con->fetch_array()){
													$p_moneda = $ro['p_moneda'];
											?>
													<option value="<?=$p_moneda?>"><?=$p_moneda?></option>
											<?php
												}
											?>
										</select>
									</div>
								</div>
								<div class="fil">
									<div class="cam">M&eacute;todo de pago: </div>
									<div class="cam">
										<select name="pa_metodo">
											<option value="PayPal">PayPal</option>
											<option value="AirTM">AirTM</option>
											<option value="Dep&oacute;sito en bancos del Per&uacute;">Dep&oacute;sito en bancos del Per&uacute;</option>
											<option value="Dep&oacute;sito en bancos de Venezuela">Dep&oacute;sito en bancos de Venezuela</option>
											<option value="Transfarencia en bancos de Venezuela">Transferencia en bancos de Venezuela</option>
										</select>
									</div>
								</div>
								<div class="fil">
									<div class="cam">
										<a class="btn-gen" tag="reportar_pago">Reportar</a>
									</div>
								</div>
							</div>
						</form>
					</article>
				<!--Ciclo-->
					<article class="bloque b2">
						<h4>Ciclo</h4>
							<div class="tabla_gen">
								<div class="fil pr">
									<div class="cam">Dominio:</div>
									<div class="cam">Plan:</div>
									<div class="cam">Estado de cuenta:</div>
									<div class="cam">&Uacute;ltimo ciclo pago</div>
									<div class="cam">D&iacute;as sin pagar</div>
								</div>
				<?php
								$con = $mysqli->query("SELECT * FROM datos_oficiales");
								if($con->num_rows === 0){
									echo '<p class="list_datos">No hay datos disponibles.</p>';
								}else{
									while($ro = $con->fetch_array()){
										$do_id = $ro['do_id'];
										$do_usuario = $ro['do_usuario'];
										$do_dominio = $ro['do_dominio'];
										$do_ciclo = $ro['do_ciclo'];
										$do_mes = $ro['do_mes'];
										$do_plan = $ro['do_plan'];
										$do_estado_pagina = $ro['do_estado_pagina'];
										$do_estado_cuenta = $ro['do_estado_cuenta'];
										$dias_sin_pagar = "N/A";
										//Verificación que el mes pagado sea este mes
											$res = verificacion_ciclo($do_ciclo, $do_mes);
											
										if($res){
											$con1 = $mysqli->query("UPDATE datos_oficiales SET do_estado_cuenta = 'No pagado' WHERE do_id = '".$do_id."'");
												$do_estado_cuenta = "<strong color='red'>No pagado</strong>";
												$dias_sin_pagar = date('d')-$do_ciclo;
										}else
												$do_estado_cuenta = "<span color='green'>Pagado</span>";
											
										$do_freg = $ro['do_freg'];
										if($do_estado_cuenta == "<span color='green'>Pagado</span>" && $do_estado_pagina == "Oficial"){
											echo '<div class="fil bien">';
										}elseif($do_estado_cuenta == "<strong color='red'>No pagado</strong>" && $do_estado_pagina == "Oficial"){
											echo '<div class="fil mal">';
										}elseif($do_estado_pagina == "De prueba"){
											echo '<div class="fil">';
										}
				?>
											<div class="cam es"><p class="es_div"><?=$do_dominio?></p></div>
											<div class="cam"><?=$do_plan?></div>
											<div class="cam"><?=$do_estado_cuenta?></div>
											<div class="cam"><?=$do_ciclo?>/<?=mes($do_mes)?></div>
											<div class="cam"><?=$dias_sin_pagar?></div>
										</div>
				<?php
									}
								}
				?>
							</div>
					</article>
				<!--Mis pagos-->
					<article class="bloque b2">
						<h4>Mis pagos
							<i class="img_col actualizar neg boton" tag="pagos"></i>
						</h4>
						<div class="tabla_gen pagos">
							<div class="fil pr">
							<div class="cam">ID de pago</div>
							<div class="cam">Cantidad</div>
							<div class="cam">Moneda</div>
							<div class="cam">M&eacute;todo</div>
							<div class="cam">Confirmado</div>
							<div class="cam">Comentarios</div>
							<div class="cam">Fecha de registro</div>
							<div class="cam">Imagen</div>
							</div>
							<?php
							$con = $mysqli->query("SELECT * FROM pagos WHERE pa_usuario = '".$_SESSION['o_usuario']."' ");
							if($con->num_rows === 0)
								echo 'No hay pagos reportados';
							while($ro = $con->fetch_array()){
								$pa_id = $ro['pa_id'];
								$pa_cantidad = $ro['pa_cantidad'];
								$pa_moneda = $ro['pa_moneda'];
								$pa_metodo = $ro['pa_metodo'];
								$pa_confirmado = $ro['pa_confirmado'];
								if($pa_confirmado) $pa_confirmado = "<strong>Aprobado</strong>"; else $pa_confirmado = "En espera";
								$pa_imagen = $ro['pa_imagen'];
								$pa_comentarios = $ro['pa_comentarios'];
								$pa_freg = $ro['pa_freg'];
							?>
								<div class="fil">
									<div class="cam"><?=$pa_id?></div>
									<div class="cam"><?=$pa_cantidad?></div>
									<div class="cam"><?=$pa_moneda?></div>
									<div class="cam"><?=$pa_metodo?></div>
									<div class="cam"><?=$pa_confirmado?></div>
									<div class="cam"><?=$pa_comentarios?></div>
									<div class="cam"><?=$pa_freg?></div>
							<?php
									if(empty($pa_imagen)){
										echo '<div class="cam" tag="'.$pa_id.'">
												<input type="file" name="pa_imagen" tag="pa_imagen_'.$pa_id.'"/>
												<a class="btn-gen subir_imagen_pago"  tag="'.$pa_id.'">Subir</a>
											</div>';
									}else{
										echo '<div class="cam">S&iacute;</div>';
									}
							?>
									<div class="cam">
										<a class="btn-gen2 eliminar_pago" tag="<?=$pa_id?>">Eliminar
										<i id="<?=$pa_id?>" tag="<?=$pa_imagen?>"></i></a>
									</div>
								</div>
							<?php
							}
							?>
						</div>
					</article>
			</article>
		<!--Perfil-->
			<article tag="4">
				<!--Cambiar clave-->
					<article class="bloque b1">
						<h4>Cambiar contrase&ntilde;a</h4>
						<div class="tabla_gen">
							<div class="fil">
								<div class="cam">Contrase&ntilde;a actual: </div>
								<div class="cam"><input type="text" name="o_clave" placeholder="Contrase&ntilde;a actual"/></div>
							</div>
							<div class="fil">
								<div class="cam">Contrase&ntilde;a nueva: </div>
								<div class="cam"><input type="text" name="o_clave_nueva" placeholder="Contrase&ntilde;a nueva"/></div>
							</div>
							<div class="fil">
								<div class="cam">Repita la contrase&ntilde;a nueva: </div>
								<div class="cam"><input type="text" name="o_clave_nueva_rep" placeholder="Contrase&ntilde;a nueva"/></div>
							</div>
							<div class="cam">
								<a class="btn-gen" tag="reportar_cambio_clave">Guardar</a>
							</div>
						</div>
					</article>
				<!--Cerrar sesi&oacute;n-->
					<article class="bloque b1">
						<h4>Cerrar sesi&oacute;n</h4>
						<div class="tabla_gen">
							<div class="fil">
								<div class="cam"><a class="btn-gen" tag="sesion_cerrar">Cerrar sesi&oacute;n</a></div>
							</div>
						</div>
					</article>
			</article>
		<!--Información-->
			<article tag="5">
				<!--Información general-->
					<article class="bloque b2">
						<h4>Informaci&oacute;n general</h4>
						<div class="tabla_gen">
							<div class="fil pr">
								<div class="cam">T&iacute;tulo</div>
								<div class="cam">Contenido</div>
								<div class="cam">Fecha</div>
							</div>
							<?php
								$con = $mysqli->query("SELECT * FROM informaciones_u ORDER BY iu_freg DESC");
								if($con->num_rows===0)
									echo "No se encontraron informaciones.";
								else{
									while($ro = $con->fetch_array()){
										$iu_titulo = $ro['iu_titulo'];
										$iu_contenido = $ro['iu_contenido'];
										$iu_freg = $ro['iu_freg'];
							?>
										<div class="fil">
											<div class="cam"><?=$iu_titulo?></div>
											<div class="cam"><?=$iu_contenido?></div>
											<div class="cam"><?=$iu_freg?></div>
										</div>
							<?php
									}
								}
							?>
						</div>
					</article>
			</article>
	</section>
</section>