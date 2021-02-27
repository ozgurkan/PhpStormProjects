<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Anasayfa</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Yorumlar</a>
					</li>
				</ul>
	</div>		
	
		<div class="row-fluid">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i>Onaylanmış Yorumlar</h2>
						<div class="box-icon">							
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>						
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
								  <th></th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?php 
						  session_start();
					      require "../system/connect.php";
						  $sql=mysql_query("Select * from yorumlar where yorum_durum=1");
						  while($satir = mysql_fetch_array($sql))
						{
						 ?>
						  <tr>
								<td><?php echo $satir["uye_adi"];?></td>
								<td class="center"><?php echo $satir["yorum_tarih"];?></td>
								<td class="center"><?php echo $satir["yorum_detay"];?></td>												
								<td class="center">
									<span class="label label-success">Onaylanmış</span>
								</td>
								
								<td class="center">
									<a class="btn btn-danger" onClick="return confirm('Silmek istiyormusunuz?');" href="index.php?do=YorumSil&id=<?php echo $satir["yorum_id"];?>">
										<i class="icon-trash icon-white"></i> 
										Sil	
									</a>									
								</td>
							</tr>
					<?php }?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->			
			</div><!--/row-->
			
			
			
			
					
	
		<div class="row-fluid">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Onaylanmamış Yorumlar</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
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
								  <th></th>
							  </tr>
						  </thead>   
						  <tbody>
						  
						  <?php 
						  $sql=mysql_query("Select * from yorumlar where yorum_durum=0");
						  while($satir = mysql_fetch_array($sql))
						{
						 ?>
						  <tr>
								<td><?php echo $satir["uye_adi"];?></td>
								<td class="center"><?php echo $satir["yorum_tarih"];?></td>
								<td class="center"><?php echo $satir["yorum_detay"];?></td>
								
								
								<td class="center">
									<span class="label label-important">Onaylanmamış</span>
								</td>
								
								
								<td class="center">								
									<a class="btn btn-success" onClick="return confirm('Onaylamak istiyormusunuz?');" href="index.php?do=YorumOnayla&id=<?php echo $satir["yorum_id"];?>">									
										<i class="icon-zoom-in icon-white"></i>  
										Onayla                                            
									</a>									
								</td>
							</tr>
					<?php }?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->			
			</div><!--/row-->