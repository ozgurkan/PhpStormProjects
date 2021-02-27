<?php
 session_start();
 require "../system/connect.php";
 $Sm_İd=$_REQUEST["id"];
 $olay=$_REQUEST["olay"];
		 if($olay=="ac"){
		 $guncelle=mysql_query("UPDATE sosyal_medya SET Sm_Durum=1 WHERE Sm_İd=$Sm_İd");
		 }
		 else if($olay=="kapat"){
		 $guncelle=mysql_query("UPDATE sosyal_medya SET Sm_Durum=0 WHERE Sm_İd=$Sm_İd");		 
		 }
		 
		 if($guncelle){
		 echo '<div class="alert alert-success"> 
		<strong>İşlem Başarılı</strong>
		</div>
		';
		 ?>
			<SCRIPT LANGUAGE="JavaScript">			
			window.location="index.php?do=sosyal_medya";			 
			 </script> 
 <?php
		 }

?>
<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Anasayfa</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Sosyal Medya</a>
					</li>
				</ul>
	</div>		
	
	
		<div class="row-fluid">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i>Sosyal Medya</h2>
						<div class="box-icon">							
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>						
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Adı</th>
								  <th>Linki</th>
								  <th>Durumu</th>
								  <th></th>
								  <th></th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?php 
						  session_start();
					      require "../system/connect.php";
						  $sql=mysql_query("Select * from sosyal_medya");
						  while($satir = mysql_fetch_array($sql))
						{
						 ?>
						  <tr>								
								<td class="center"><?php echo $satir["Sm_Adi"];?></td>
								<td class="center"><?php echo $satir["Sm_Linki"];?></td>										
								<?php if($satir["Sm_Durum"]==0){?>
								<td class="center">
									<span class="label label-error">Kapalı</span>
								</td>	
								<td class="center">
									<a class="btn btn-info" href="#">
										<i class="icon-edit icon-white"></i>  
										Düzenle                                            
									</a>		
								</td>
								<td class="center">
									<a class="btn btn-success" onClick="return confirm('Sosyal Medyayı aktifleştirmek istiyormusunuz?');" href="index.php?do=Sosyal_Medya&olay=ac&id=<?php echo $satir["Sm_İd"];?>">
										<i class="icon-zoom-in icon-white"></i>  
										Aç
									</a>									
								</td>
								
								<?php }else{ ?>
								<td class="center">
									<span class="label label-success">Açık</span>
								</td>
								<td class="center">
									<a class="btn btn-info" href="#">
										<i class="icon-edit icon-white"></i>  
										Düzenle                                            
									</a>		
								</td>
								<td class="center">
									<a class="btn btn-danger" onClick="return confirm('Sosyal medyayı kapatmak istiyormusunuz');" href="index.php?do=Sosyal_Medya&olay=kapat&id=<?php echo $satir["Sm_İd"];?>">
										<i class="icon-trash icon-white"></i> 
										Kapat
									</a>											
								</td>
								<?php }?>								
							</tr>
					<?php }?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->			
			</div><!--/row-->
			
			
			
					
	