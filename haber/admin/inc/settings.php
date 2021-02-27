
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Anasayfa</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Ayarlar</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i>Ayarları Güncelle</h2>
						<div class="box-icon">							
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>							
						</div>
					</div>
					
					<div class="box-content">
					<?php
					if($_POST){
					/*Verileri alalım*/
					$site_url=$_POST['site_url'];
					$site_title=$_POST['site_title'];
					$site_keyw=$_POST['site_keyw'];
					$site_desc=$_POST['site_desc'];
					if(!$site_url || !$site_title){
						echo '<div class="alert alert-error">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>Hata!</strong> Boş alan bıraktınız
						</div>';
						?>
						<script>document.location.href='index.php?do=settings';</script>
						<?php
					}else{
					$sql=query("UPDATE ayarlar SET
							site_url='$site_url',
							site_title='$site_title',
							site_keyw='$site_keyw',
							site_desc='$site_desc'
					");
					    if($sql){
							 
							echo '<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>Başarılı</strong> Ayarlar güncellendi
							</div>';
							?>
							<script>document.location.href='index.php?do=settings';</script>
							<?php
						}else{
							echo '<div class="alert alert-error">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>Hata!</strong> Site kurucusu ile iletişime geçiniz
							</div>';
							?>
							<script>document.location.href='index.php?do=settings';</script>
							<?php
						
						}
					}
					
					}else{
					$bul=query("Select * from ayarlar");
					$result=row($bul);


					?>
						<form class="form-horizontal" method="post" action="">
						  <fieldset>
							<legend>Site Ayarları</legend>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Site Adresi </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="site_url" value="<?php echo $result['site_url']; ?>">
							  </div>
							</div>		
							<div class="control-group">
							  <label class="control-label" for="typeahead">Site Başlığı </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="site_title" value="<?php echo $result['site_title']; ?>">
							  </div>
							</div>			
							<div class="control-group">
							  <label class="control-label" for="typeahead">Site Anahtar Kelimeleri </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="site_keyw" value="<?php echo $result['site_keyw']; ?>">
							  </div>
							</div>							
							<div class="control-group">
							  <label class="control-label" for="textarea2">Site Açıklaması</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" rows="3" name="site_desc"><?php echo $result['site_desc']; ?></textarea>
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Kaydet</button>
							  <button type="reset" class="btn">İptal</button>
							</div>
						  </fieldset>
						</form>   
						<?php } ?>
					</div>
					</div>
					</div>