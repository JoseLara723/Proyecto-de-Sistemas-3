<?php 

if (!isset($_SESSION)) {session_start();}

?>
<?php if(count($_SESSION['detalle'])>0){?>
	<table class="timetable_sub">
	    <thead>
	        <tr>
								<th> No.</th>
								<th>Imagen</th>
								<th>Cant.</th>
								<th>Detalle</th>
								<th>Precio</th>
								<th>Total</th>
				
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
				<td class="invert-image" width="35%">
					<a href="single2.html">
						<img src='<?php echo $det['fotom']; ?>' alt="" class="img-responsive">
					</a>
				</td>
								<td class="invert">
									<div class="quantity">
										<div class="quantity-select">
											
											<div class="entry value">
												<span><?php echo $det['cant']; ?></span>
											</div>
											
										</div>
									</div>
								</td>
								<td class="invert"><?php echo $det['producto']; ?></td>
								<td class="invert"><?php echo $det['precio'] ;?></td>
								<td class="invert"><?php echo number_format($sbtotal,2) ;?></td>
				
						

			</tr>
	        <?php }?>
	        <tr>
	        	<td colspan="5" class="text-right">Total</td>
	        	<td><?php echo number_format($totall,2);?></td>
	        	
	        </tr>
	    </tbody>
	</table>
<?php }else{?>
<div class="panel-body"> No hay Productos Agregados</div>
<?php }?>



