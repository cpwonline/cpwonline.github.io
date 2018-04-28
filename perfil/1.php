<section class="perfil">
	<ul class="arriba">
		<li tag="1">General</li>
		<li tag="2" style="display:none;">Estado</li>
		<li tag="3">Pagos</li>
		<li tag="4">Perfil</li>
		<li tag="5">Informaci&oacute;n</li>
	</ul>
	<section class="abajo">
		<!--General-->
			<article tag="1">
				<p class="list_datos_tit"><strong>Datos administrados</strong></p>
				<?php
					$con1 = $mysqli->query("SELECT * FROM ordenes ORDER BY o_freg ASC");
					if($con1->num_rows===1)
						echo 'A&uacute;n no hay datos administrados.';
					while($ro = $con1->fetch_array()){
						//Datos
							$o_id = $ro['o_id'];
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
							$o_listo = $ro['o_listo'];if($o_listo==0) $o_listo = "En proceso";
							$o_admin = $ro['o_admin'];
							$o_estado_cuenta = $ro['o_estado_cuenta'];
							$o_estado_pagina = $ro['o_estado_pagina'];
							$o_freg = $ro['o_freg'];
							if($o_listo == "En proceso"){
				?>
								<p class="list_datos_tit"><strong><?=$o_usuario?></strong></p>
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
								<p class="list_datos">Estado de p&aacute;gina: <strong><?=$o_estado_pagina?></strong></p>
								<p class="list_datos">Estado de cuenta: <strong><?=$o_estado_cuenta?></strong></p><br>
								<p class="list_datos"><a class="btn-gen reportar_o_listo" tag="<?=$o_id?>">Listo</a><a class="btn-gen2 eliminar_o" tag="<?=$o_id?>">Eliminar</a></p>
				<?php
							}
					}
				?>
						<br><p class="list_datos_tit"><strong>Datos oficiales</strong></p>
							<div class="tabla_gen">
								<div class="fil pr">
									<div class="cam">Usuario:</div>
									<div class="cam">Dominio:</div>
									<div class="cam">Plan:</div>
									<div class="cam">Estado de p&aacute;gina:</div>
									<div class="cam">Estado de cuenta:</div>
									<div class="cam">&Uacute;ltimo ciclo pago</div>
									<div class="cam">D&iacute;as sin pagar</div>
									<div class="cam">Fase</div>
									<div class="cam">Registro:</div>
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
										$do_fase = $ro['do_fase'];
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
											<div class="cam"><?=$do_usuario?></div>
											<div class="cam"><?=$do_dominio?></div>
											<div class="cam"><?=$do_plan?></div>
											<div class="cam"><?=$do_estado_pagina?></div>
											<div class="cam"><?=$do_estado_cuenta?></div>
											<div class="cam"><?=$do_ciclo?>/<?=$do_mes?></div>
											<div class="cam"><?=$dias_sin_pagar?></div>
											<div class="cam"><?=$do_fase?></div>
											<div class="cam"><?=$do_freg?></div>
											<div class="cam"><a class="btn-gen eliminar_do" tag="<?=$do_id?>">Eliminar</a></div>
										</div>
				<?php
									}
								}
				?>
							</div>
					<!--Agregar dato oficial-->
						<article class="bloque b1">
							<h4>Agregar dato oficial</h4>
							<div class="tabla_gen">
								<div class="fil">
									<div class="cam">Usuario:</div>
									<div class="cam"><input type="text" name="do_usuario" placeholder="Usuario"/></div>
								</div>
								<div class="fil">
									<div class="cam">Dominio:</div>
									<div class="cam"><input type="text" name="do_dominio" placeholder="Dominio"/></div>
								</div>
								<div class="fil">
									<div class="cam">Estado de p&aacute;gina:</div>
									<div class="cam">
										<select name="do_estado_pagina">
											<option value="De prueba">De prueba</option>
											<option value="Oficial">Oficial</option>
										</select>
									</div>
								</div>
								<div class="fil">
									<div class="cam">Ciclo:</div>
									<div class="cam"><input type="text" name="do_ciclo"/></div>
								</div>
								<div class="fil">
									<div class="cam">Plan:</div>
									<div class="cam">
										<select name="do_plan">
											<?php
												$con = $mysqli->query("SELECT * FROM precios");
												$p_plan3 = "";
												while($ro = $con->fetch_array()){
													$p_plan = $ro['p_plan'];
													if($p_plan!=$p_plan3){
														$p_plan3 = $p_plan;
											?>
														<option value="<?=$p_plan?>"><?=$p_plan?></option>
											<?php
													}
												}
											?>
										</select>
									</div>
								</div>
								<div class="fil">
									<div class="cam"><a class="btn-gen" tag="reportar_do">Guardar</a></div>
								</div>
							</div>
						</article>
			</article>
		<!--Estado-->
			<article tag="2">
			
			</article>
		<!--Pagos-->
			<article tag="3">
				<!--Pagos-->
					<article class="bloque b2">
						<h4>Pagos</h4>
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
							$con = $mysqli->query("SELECT * FROM pagos ");
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
									<div class="cam"><img src="<?=$pa_imagen?>" alt="" style="width:100px;height:100px;"/></div>
									<div class="cam"><a class="btn-gen2 eliminar_pago" tag="<?=$pa_id?>">Eliminar<i id="<?=$pa_id?>" tag="<?=$pa_imagen?>"></i></a></div>
								</div>
							<?php
							}
							?>
						</div>
					</article>
				<!--Aprobar pago-->
					<article class="bloque b1">
						<h4>Aprobar pago</h4>
						<div class="tabla_gen">
							<div class="fil">
								<div class="cam">ID del pago: </div>
								<div class="cam"><input type="text" name="pa_id" placeholder="ID"/></div>
							</div>
							<div class="fil">
								<div class="cam">Comentarios: </div>
								<div class="cam"><input type="text" name="pa_comentarios" placeholder="Comentarios"/></div>
							</div>
							<div class="cam">
								<a class="btn-gen" tag="reportar_aprobacion_pago">Guardar</a>
							</div>
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
								$con = $mysqli->query("SELECT * FROM informaciones_u ORDER BY iu_freg");
								if($con->num_rows===0)
									echo "No se encontraron informaciones.";
								else{
									while($ro = $con->fetch_array()){
										$iu_id = $ro['iu_id'];
										$iu_titulo = $ro['iu_titulo'];
										$iu_contenido = $ro['iu_contenido'];
										$iu_freg = $ro['iu_freg'];
							?>
										<div class="fil">
											<div class="cam"><?=$iu_titulo?></div>
											<div class="cam"><?=$iu_contenido?></div>
											<div class="cam"><?=$iu_freg?></div>
											<div class="cam"><a class="btn-gen2 eliminar_iu" tag="<?=$iu_id?>">Eliminar</a></div>
										</div>
							<?php
									}
								}
							?>
						</div>
					</article>
				<!--Agregar información-->
					<article class="bloque b1">
						<h4>Agregar informaci&oacute;n</h4>
						<div class="tabla_gen">
							<div class="fil">
								<div class="cam">T&iacute;tulo: </div>
								<div class="cam"><input type="text" name="iu_titulo" placeholder="Titulo"/></div>
							</div>
							<div class="fil">
								<div class="cam">Contenido: </div>
								<div class="cam"><textarea name="iu_contenido" placeholder="Contenido"></textarea></div>
							</div>
							<div class="cam">
								<a class="btn-gen" tag="reportar_informacion">Notificar</a>
							</div>
						</div>
					</article>
			</article>
	</section>
</section>