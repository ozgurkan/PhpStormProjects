<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Tables</a>
					</li>
				</ul>
	</div>		
	
		<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Members</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Kullanıcı Adı</th>
								  <th>Yorum Tarihi</th>
								  <th>Yorum Detayı</th>
								  <th>Yorum Durumu</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?php 
						  session_start();
					      require "../system/connect.php";
						  $sql=mysql_query("Select * from yorumlar");
						  while($satir = mysql_fetch_array($sql))
						{
						 ?>
						  <tr>
								<td><?php echo $satir["uye_adi"];?></td>
								<td class="center"><?php echo $satir["yorum_tarih"];?></td>
								<td class="center"><?php echo $satir["yorum_detay"];?></td>
								
								<?php if ($satir["yorum_durum"]==0){?>
								<td class="center">
									<span class="label label-important">Onaylanmamış</span>
								</td>
								<?php }else{?>
								<td class="center">
									<span class="label label-success">Onaylanmış</span>
								</td>
								<?php } ?>
								<td class="center">
								<?php if ($satir["yorum_durum"]==0){?>
									<a class="btn btn-success" href="index.php?do=OnaylanmisYorumlar">									
										<i class="icon-zoom-in icon-white"></i>  
										Onayla                                            
									</a>
									<?php }else{?>
									<a class="btn btn-danger" onClick="return confirm('Silmek istiyormusunuz?');" href="index.php?do=YorumSil&id=<?php echo $satir["yorum_id"];?>">
										<i class="icon-trash icon-white"></i> 
										Sil	
									</a>
									<?php } ?>
								</td>
							</tr>
					<?php }?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->