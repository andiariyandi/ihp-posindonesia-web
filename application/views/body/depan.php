
<div class="row">
	<ol class="breadcrumb">
		<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li> <b>Selamat datang </b> di Internal Help Pos (IHP) - KANTOR POS BANDUNG 40000</li>
		<li>  <span id="datetime"></span> </li>
	</ol>
</div><!--/.row-->

<div class="row">
	<div class="col-lg-12">
			<script>
				var dt = new Date();
				document.getElementById("datetime").innerHTML = (("0"+dt.getDate()).slice(-2)) +"."+ (("0"+(dt.getMonth()+1)).slice(-2)) +"."+ (dt.getFullYear()) +" "+ (("0"+dt.getHours()).slice(-2)) +":"+ (("0"+dt.getMinutes()).slice(-2));
			</script>
					<br>
	</div>
</div><!--/.row-->

<div class="row">
		<?php echo $this->session->flashdata("msg");?>
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-body" style="text-align:justify">
					Untuk melayani permintaan konfirmasi dan bantuan, kami menggunakan sistem Tiket. Setiap permintaan dukungan terhadap Helpdesk Team akan mendapatkan nomor tiket yang unik, dan dapat digunakan untuk melacak/melihat status penanganan dan tanggapan terhadap permasalahan yang Anda sampaikan. Untuk referensi Anda, kami menyediakan arsip yang komplit dan histori seluruh permintaan bantuan yang telah Anda ajukan. Email yang valid sudah barang tentu menjadi persyaratan yang mutlak.
			</div>
		</div>
	</div>
</div><!--/.row-->

<div class="row">
	<div class="col-xs-12 col-sm-6 col-lg-6">
		<div class="panel panel panel-body">
			<div class="row no-padding">
				<div class="col-sm-2 col-lg-2 body-left">
						<svg class="glyph stroked email"><use xlink:href="#stroked-email"/></svg>
				</div>
					<div class="col-sm-9 col-lg-10 body-right">
						<div class="panel-body" style="text-align:justify">
							Jelaskan secara detail dan lengkap supaya kami dapat membantu Anda dengan sebaik mungkin. Untuk mengupdate status tiket yang telah Anda buat sebelumnya, gunakan form di sebelah kanan.
<!--
						<form role="form">
							<div class="form-group">
								<label>Nama</label>
								<input class="form-control" placeholder="Nama">
							</div>
							<div class="form-group">
								<label>E-mail</label>
								<input class="form-control" placeholder="noname@mail.com">
							</div>
							<div class="form-group">
								<label>Ruangan</label>
								<input class="form-control" placeholder="Pilih Ruangan">
							</div>
							<div class="form-group">
								<label>Kategori</label>
								<input class="form-control" placeholder="Pilih Kategori">
							</div>
							<div class="form-group">
								<label>Sub Kategori</label>
								<input class="form-control" placeholder="Pilih Sub Kategori">
							</div>
						</form> -->
						<div class="panel-body" style="text-align:center">
								<a href="<?php echo base_url();?>ticket/add"  class="btn btn-primary btn-sm"> 	<span class="glyphicon glyphicon-send"></span> Buat Tiket Baru</a>
						</div>

								<!-- <button type="reset" class="btn btn-default btn-sm">
									<span class="glyphicon glyphicon-repeat"></span> Ulangi</button>
								<button type="reset" class="btn btn-danger btn-sm">
									<span class="glyphicon glyphicon-remove"></span> Batal</button> -->
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-xs-12 col-md-6 col-lg-6">
		<div class="panel panel panel-body">
			<div class="row no-padding">
				<div class="col-sm-2 col-lg-2 body-left">
						<svg class="glyph stroked key "><use xlink:href="#stroked-key"/></svg>
				</div>
					<div class="col-sm-9 col-lg-10 body-right">
														<form role="form">
															<div class="form-group">
																<label>Kode Unik Tiket</label>
																<input class="form-control" placeholder="Kode Unik Tiket">
															</div>
														</form>
														<div class="panel-body" style="text-align:center">
															--- Atau ---
														</div>
														<form role="form">
															<div class="form-group">
																<label>E-mail</label>
																<input class="form-control" placeholder="noname@mail.com">
															</div>
														</form>
														<button type="submit" class="btn btn-primary btn-sm">
															<span class="glyphicon glyphicon-search"></span> Cek Status Tiket</button>
						</div>
				</div>
			</div>
	</div>

			<!-- <div class="col-xs-12 col-md-6 col-lg-6">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">

							<div class="text-muted">Total Karyawan</div>
						</div>
					</div>
				</div>
			</div> -->

</div><!--/.row-->

<div class="row">

			<div class="col-sm-12 col-lg-6">
				<div class="panel panel-default">
						<div class="panel-body" style="text-align:justify">
						Jelaskan secara detail dan lengkap supaya kami dapat membantu Anda dengan sebaik mungkin. Untuk mengupdate status tiket yang telah Anda buat sebelumnya, gunakan form di sebelah kanan.
					</div>
				</div>
			</div>

			<div class="col-sm-12 col-lg-6">
				<div class="panel panel-default">
					<div class="panel-body" style="text-align:justify">
						Kami akan menampilkan seluruh arsip dan histori dari permintaan dukungan, termasuk respon terhadap permintaan bantuan dari tiket yang sudah pernah Anda kirimkan kepada kami.
					</div>
				</div>
			</div>
</div><!--/.row-->

<div class="row">
		<div class="col-xs-6 col-md-6">

				<!-- <div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked star"><use xlink:href="#stroked-star"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">

							<div class="text-muted">Feedback Positiv</div>
						</div>
					</div>
				</div> -->
			</div>


	<div class="col-xs-6 col-md-6">

	</div>
</div><!--/.row-->

			</div><!--/.col-->
		</div><!--/.row-->
	</div>	<!--/.main-->
