
<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Anasayfa</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Haber Ekle</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i>HABER EKLE</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>							
						</div>
					</div>
					<div class="box-content">
						<div class="box-content">
					<?php
					session_start();
					require "../system/connect.php";
					//require "../system/functions.php";
					require_once ('../system/class.upload.php');
					if($_POST){
					/*Verileri alalım*/
					 function strtolower_tr($deger)
					 {
					 $deger = str_replace("Ç","ç",$deger);
					 $deger = str_replace("Ğ","ğ",$deger);
					 $deger = str_replace("I","ı",$deger);
					 $deger = str_replace("İ","i",$deger);
					 $deger = str_replace("Ö","ö",$deger);
					 $deger = str_replace("Ü","ü",$deger);
					 $deger = str_replace("Ş","ş",$deger); 

					 $deger = strtolower($deger);
					 $deger = trim($deger); 

					 return $deger;
					 } 

					$haber_baslik=$_POST['haber_baslik'];
					$haber_özet=$_POST['haber_özet'];
					$haber_detay=$_POST['haber_detay'];
					$haber_kategori=$_POST['haber_kategori'];
					$haber_tarih=$_POST['haber_tarih'];
					$haber_yer=$_POST['haber_yer'];
					$haber_resim = $_FILES['haber_resim'];
					$haber_resim1 = $_FILES['haber_resim']['name'];
					$admin_id=$_SESSION['adminid'];
					
					$haber_baslik=addslashes($haber_baslik);
					$haber_özet=addslashes($haber_özet);
					$haber_detay=addslashes($haber_detay);
					if(!$haber_baslik || !$haber_özet || !$haber_resim1){
						echo '<div class="alert alert-error">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>Hata!</strong> Boş alan bıraktınız
						</div>';
						?>
						<script>document.location.href='index.php?do=haber_ekle';</script>
						<?php
					}else{
								$yukle = new upload($haber_resim); //Sınıfımızı Başlatıyoruz.
								$klasor = '../images/slider'; //Resmin Yükleneceği Klasör
								if ($yukle->uploaded) {  // Upload İşlemi Başarılı olursa aşağıdaki işlemleri yapacak
										
										$yukle->process($klasor);
										if ($yukle->processed) { // İşlemler Başarılı olursa
												echo 'Resim Yüklendi ve İşlemler Uygulandı.';
												echo $yukle->file_dst_name;
												$yukle->clean();
											} else { // Başarılı olmadığı durumda 
													echo 'Hata resim yüklenemedi. : ' . $yukle->error;
												}
								}
					$sql=query("INSERT INTO `haberler`(`haber_baslik`, `haber_özet`,`ekleme_tarihi`,`haber_yer`,`haber_resim`,`admin_id`,`haber_detay`,`kategori_id`) 
											  VALUES 
													 ('$haber_baslik','$haber_özet','$haber_tarih','$haber_yer','$yukle->file_dst_name','$admin_id','$haber_detay','$haber_kategori')");
					    if($sql){
							 
							echo '<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>Başarılı</strong> HABER SİTEYE EKLENDİ.
							</div>';
							?>
							<script>document.location.href='index.php?do=haber_ekle';</script>
							<?php
						}else{
							echo '<div class="alert alert-error">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>Hata!</strong> Site kurucusu ile iletişime geçiniz
							</div>';
							?>
							<script>document.location.href='index.php?do=haber_ekle';</script>
							<?php
						
						}
					}
					
					}
					?>
						<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
						  <fieldset>
							<legend>Yeni haberlerinizi ekleyebilirsiniz.</legend>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Haber Başlık</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="haber_baslik" value="">
								<label>Haber başlığı 0-40 karakter arasında olmalıdır.(Not boşluklar sayıya dahildir.)</label>
							   </div>
							</div>  
							
							<div class="control-group">
							  <label class="control-label" for="typeahead">Haber Özet</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="haber_özet" value="">
								<label>Haber başlığı 0-100 karakter arasında olmalıdır.(Not boşluklar sayıya dahildir.)</label>
							   </div>
							</div> 
							
							<div class="control-group">
							  <label class="control-label" for="textarea2">Haber Detay</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" rows="3" name="haber_detay" value=""></textarea>
							  </div>
							</div>
							
							 <div class="control-group">
								<label class="control-label" for="selectError">Haber Kategorisi</label>
								<div class="controls">
								  <select  data-rel="chosen" name="haber_kategori">
								  <?php 
								   $sql=mysql_query("Select * from kategoriler where kategori_id<>1");
									while($satir = mysql_fetch_array($sql))
									{
								  ?>
									<option value="<?php echo $satir["kategori_id"];?>"><?php echo $satir["kategori_adi"];?></option>									
									<?php } ?>
								  </select>
								</div>
							  </div>
							
							<div class="control-group">
							  <label class="control-label" for="fileInput">Haber Resim</label>
							  <div>
								<input class="input-file uniform_on" id="fileInput" type="file" name="haber_resim">
							  </div>
							</div> 
							
							<div class="control-group">
							  <label class="control-label" for="date01">Tarih</label>
							  <div class="controls">
								<input type="text" class="input-xlarge datepicker" id="date01" value="<?php $tarih = date("m/d/Y"); echo $tarih;?>" name="haber_tarih">
							  </div>
							</div>				
							
							
							
							 <div class="control-group">
								<label class="control-label" for="selectError">Haber Konumu</label>
								<div class="controls">
								  <select id="selectError" data-rel="chosen" name="haber_yer">
									<option value="0">ÜST HABER ALANI</option>
									<option value="1">SLİDER ALANI</option>
									<option value="2">YAN HABER ALANI</option>
								  </select>
								</div>
							  </div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Kaydet</button>
							  <button type="reset" class="btn">İptal</button>
							</div>
						  </fieldset>
						</form>   
					</div>

					</div>
				</div><!--/span-->

			</div><!--/row-->