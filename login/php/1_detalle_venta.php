<?php 

if (!isset($_SESSION)) {session_start();}

?>
<?php if(count($_SESSION['detalle'])>0){?>
	<table class="timetable_sub">
	    <thead>
	        <tr>
								<th>No.</th>
								<th>Imagen</th>
								<th>Cantidad</th>
								<th>Detalle</th>
								<th>Precio</th>
								<th>Total</th>
				
								<th>Eliminar</th>
	        </tr>
	    </thead>
	    <tbody>
      
        
        
	    	<?php 
	    	$totall = 0;
			$it=0;
	    	foreach($_SESSION['detalle'] as $det){ 
			$sbtotal = $det['cant']*$det['precio'];
	
			$totall += $sbtotal;
			$it+=1;
				
	    	?>
	        <tr>
	        	<td><?php echo $it;?></td>
				<td class="invert-image">
					<a href="#">
						<img src='<?php echo $det['fotom']; ?>' alt="" class="img-responsive">
					</a>
				</td>
								<td class="invert">
									<div class="quantity">
										<div class="quantity-select">
											
											<a href="javascript:restar1(<?php echo $det['id']; ?>);" class="btn btn-info glyphicon glyphicon-minus" role="button" id="bottixx"> </a>
											<div class="entry value">
												<span><?php echo $det['cant']; ?></span>
											</div>
											<a href="javascript:sumar1(<?php echo $det['id']; ?>);" class="btn btn-info glyphicon glyphicon-plus" role="button" id="bottixx"> </a>
										
										</div>
									</div>
								</td>
								<td class="invert"><?php echo $det['producto']; ?></td>
								<td class="invert"><?php echo $det['precio'] ;?></td>
								<td class="invert"><?php echo number_format($sbtotal,2) ;?></td>
				
								<td class="invert">
									<div class="rem">
										<!--<div class="close1"> </div>-->
										<button type="button" class="btn btn-sm btn-danger eliminarItem" id="<?php echo $det['id'];?>"><span class="glyphicon glyphicon-remove"></span></button>
									</div>
								</td>

			</tr>
	        <?php }?>
	        <tr>
	        	<td colspan="5" class="text-right">Total</td>
	        	<td><?php echo number_format($totall,2);?></td>
	        	<td></td>
	        </tr>
	    </tbody>
	</table>
				<h4>Su pedido tiene :
					<span><?php echo $it; ?> Productos</span>
				</h4>


<?php }else{?>
<div class="panel-body"> No hay Productos Agregados</div>
<?php }?>



