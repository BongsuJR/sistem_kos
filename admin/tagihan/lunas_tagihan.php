<section class="content">

	<div class="box box-primary">
		<div class="box-header with-border">
			Tagihan Lunas
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse">
					<i class="fa fa-minus"></i>
				</button>
				<button type="button" class="btn btn-box-tool" data-widget="remove">
					<i class="fa fa-remove"></i>
				</button>

			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Penghuni</th>
							<th>Bulan/Tahun</th>
							<th>Tagihan</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
                  $no = 1;
                  $sql = $koneksi->query("SELECT p.id_penghuni, p.nama, p.no_hp, t.id_tagihan, t.tagihan, t.status, t.tgl_bayar, t.bulan, t.tahun   
				  from tb_penghuni p inner join tb_tagihan t on p.id_penghuni=t.id_penghuni where status='LS'
				  order by tgl_bayar desc");
                  while ($data= $sql->fetch_assoc()) {
                ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['id_penghuni']; ?>
								-
								<?php echo $data['nama']; ?>
							</td>
							<td>
								<?php echo $data['bulan']; ?>
								/
								<?php echo $data['tahun']; ?>
							</td>
							<td>
								<?php echo rupiah($data['tagihan']); ?>
							</td>
							<td>
								<?php $stt = $data['status']  ?>
								<?php if($stt == 'BL'){ ?>
								<span class="label label-danger">Belum Bayar</span>
								<?php }elseif($stt == 'LS'){ ?>
								<span class="label label-info">Lunas</span>
								(
								<?php  $tgl = $data['tgl_bayar']; echo date("d-M-Y", strtotime($tgl))?>)
							</td>
							
							<?php } ?>

							<td>
							<?php $stt = $data['status']  ?>
							<?php if($stt == 'LS'){ ?>
							</a>
								<a href="https://api.whatsapp.com/send?phone=<?php echo $data['no_hp']; ?>&text=Sdr/i%20<?php echo $data['nama']; ?>,
								%20Terima%20Kasih%20Banyak%20Anda%20telah%20melakukan%20pembayaran%20tagihan%20KOS%20untuk%20Bulan%20<?php echo $data['bulan']; ?>%20Tahun%20<?php echo $data['tahun']; ?> %20*Pemilik Kos Nelkha*"
								 target=" _blank" title="Pesan WhatsApp" class	="btn btn-success">
									<b>WA</b>
								</a>
								
							</td>
							<?php } ?>
						</tr>
						<?php }	?>
					</tbody>

				</table>
				<!-- /.box-body -->
			</div>
		</div>
	</div>
</section>