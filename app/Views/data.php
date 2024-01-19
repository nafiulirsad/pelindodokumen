<!DOCTYPE html>
<html lang="en">

<head>
	<title>Penerimaan Dokumen - PT Pelindo Energi Logistik</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"">

	<link rel="apple-touch-icon" sizes="57x57"
		href="<?= base_url('public') ?>/assets/images/logo/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60"
		href="<?= base_url('public') ?>/assets/images/logo/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72"
		href="<?= base_url('public') ?>/assets/images/logo/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76"
		href="<?= base_url('public') ?>/assets/images/logo/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114"
		href="<?= base_url('public') ?>/assets/images/logo/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120"
		href="<?= base_url('public') ?>/assets/images/logo/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144"
		href="<?= base_url('public') ?>/assets/images/logo/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152"
		href="<?= base_url('public') ?>/assets/images/logo/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180"
		href="<?= base_url('public') ?>/assets/images/logo/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"
		href="<?= base_url('public') ?>/assets/images/logo/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32"
		href="<?= base_url('public') ?>/assets/images/logo/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96"
		href="<?= base_url('public') ?>/assets/images/logo/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16"
		href="<?= base_url('public') ?>/assets/images/logo/favicon-16x16.png">
	<link rel="manifest" href="<?= base_url('public') ?>/assets/images/logo/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage"
		content="<?= base_url('public') ?>/assets/images/logo/ms-icon-144x144.png">

	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"/>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css"/>
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css"/>
	<link rel="stylesheet" href="https://cdn.datatables.net/select/1.7.0/css/select.bootstrap5.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<style>
		#ttd_penerima {
			border: 3px dotted #CCCCCC;
			border-radius: 15px;
			cursor: crosshair;
			overflow: hidden !important;
		}
		.exportBtn {
			border-radius: 10% !important;
		}
		html,
		body {
			overflow-x: hidden;
		}

		body {
			position: relative;
		}
		.flatpickr-wrapper{
			width: 100%;
		}
		.modal{
			overflow: hidden !important;
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="mt-5" style="text-align: right;">
					<button class="btn btn-success fw-bold fs-15" data-bs-toggle="modal" data-bs-target="#modalTambah"><i
							class="fa-solid fa-plus fw-bold fs-18 me-2"></i>Tambah Penerimaan Dokumen</button>
				</div>
				<div class="mt-3">
					<table id="penerimaanDokumenDatatable" class="table table-striped" style="width:100%">
						<thead>
							<tr style="vertical-align: middle;">
								<th>Nama Pengirim</th>
								<th class="text-center">Nomor Dokumen</th>
								<th>Perihal</th>
								<th class="text-center">Tanggal Diterima</th>
								<th>Nama Penerima</th>
								<th>Subdit</th>
								<th class="text-center">TTD Penerima</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($allData as $data): ?>
								<tr style="vertical-align: middle;">
									<td><?= $data['nama_pengirim'] ?></td>
									<td class="text-center"><?= $data['nomor_dokumen'] ?></td>
									<td><?= $data['perihal'] ?></td>
									<td class="text-center"><?= showDate($data['tanggal_diterima']) ?></td>
									<td><?= $data['nama_penerima'] ?></td>
									<td><?= $data['subdit'] ?></td>
									<td class="text-center">
										<?php if($data['ttd_penerima'] == NULL): ?>
											-
										<?php else: ?>
											<img src="<?= $data['ttd_penerima'] ?>" width="125" />
										<?php endif ?>
									</td>
									<td class="text-center">
										<?php if($data['diapprove_pada'] == NULL && $data['ttd_penerima'] != NULL): ?>
											<a href="<?= base_url('hapus/' . $data['id']) ?>" class="btn btn-sm btn-danger fw-bold fs-14 m-1">Hapus</a>
											<a href="<?= base_url('approve/' . $data['id']) ?>" class="btn btn-sm btn-success fw-bold fs-14 m-1">Approve</a>
										<?php elseif($data['diapprove_pada'] == NULL && $data['ttd_penerima'] == NULL): ?>
											<a href="<?= base_url('hapus/' . $data['id']) ?>" class="btn btn-sm btn-danger fw-bold fs-14 m-1">Hapus</a>
											<a class="btn btn-sm btn-primary fw-bold fs-14 m-1" onclick="isiTtd(<?= $data['id'] ?>)">TTD</a>
										<?php else: ?>
											-
										<?php endif ?>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="modalTambah"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title fw-bold">Form Tambah Penerimaan Dokumen</h5>
				</div>
				<form class="needs-validation" id="form_penerimaan_dokumen" action="<?= base_url('tambah') ?>" method="post" novalidate>
					<div class="modal-body">
						<div class="form-row">
							<div class="col-md-12 mb-3">
								<label for="nama_pengirim">Nama Pengirim</label>
								<input type="text" class="form-control border border-dark" id="nama_pengirim" name="nama_pengirim"
									placeholder="Masukkan nama pengirim" required>
								<div class="valid-feedback">
									Nama pengirim telah diisi!
								</div>
								<div class="invalid-feedback">
									Nama pengirim belum diisi!
								</div>
							</div>
							<div class="col-md-12 mb-3">
								<label for="nomor_dokumen">Nomor Dokumen</label>
								<input type="text" class="form-control border border-dark" id="nomor_dokumen" name="nomor_dokumen"
									placeholder="Masukkan nomor dokumen" required>
								<div class="valid-feedback">
									Nomor dokumen telah diisi!
								</div>
								<div class="invalid-feedback">
									Nomor dokumen belum diisi!
								</div>
							</div>
							<div class="col-md-12 mb-3">
								<label for="perihal">Perihal</label>
								<input type="text" class="form-control border border-dark" id="perihal" name="perihal"
									placeholder="Masukkan perihal" required>
								<div class="valid-feedback">
									Perihal telah diisi!
								</div>
								<div class="invalid-feedback">
									Perihal belum diisi!
								</div>
							</div>
							<div class="col-md-12 mb-3">
								<label for="tanggal_diterima" style="width: 100%;">Tanggal Diterima</label>
								<input type="text" class="form-control border border-dark" id="tanggal_diterima"
									name="tanggal_diterima" value="<?= date('Y-m-d') ?>" placeholder="Masukkan tanggal diterima" style="background-color: #ffffff;" required>
								<div class="valid-feedback">
									Tanggal diterima telah diisi!
								</div>
								<div class="invalid-feedback">
									Tanggal diterima belum diisi!
								</div>
							</div>
							<div class="col-md-12 mb-3">
								<label for="nama_penerima">Nama Penerima</label>
								<input type="text" class="form-control border border-dark" id="nama_penerima" name="nama_penerima"
									placeholder="Masukkan nama penerima" required>
								<div class="valid-feedback">
									Nama penerima telah diisi!
								</div>
								<div class="invalid-feedback">
									Nama penerima belum diisi!
								</div>
							</div>
							<div class="col-md-12 mb-3">
								<label for="subdit">Subdit</label>
								<input type="text" class="form-control border border-dark" id="subdit" name="subdit"
									placeholder="Masukkan subdit" required>
								<div class="valid-feedback">
									Subdit telah diisi!
								</div>
								<div class="invalid-feedback">
									Subdit belum diisi!
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger fw-bold fs-15" data-bs-dismiss="modal">Batal</button>
						<button type="button" onclick="validateForm('draft')" id="draftBtn" class="btn btn-primary fw-bold fs-15">Draft</button>
						<button type="button" onclick="validateForm('tambahkan')" class="btn btn-success fw-bold fs-15">Tambahkan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="modalTtd" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="modalTtd"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title fw-bold">Form Tambah Penerimaan Dokumen</h5>
				</div>
				<form class="needs-validation" id="form_ttd" action="<?= base_url('ttd') ?>" method="post" novalidate>
					<div class="modal-body">
						<div class="form-row">
							<div class="col-md-12 mb-3">
								<label for="ttd_penerima">Tanda Tangan Penerima</label>
								<canvas id="ttd_penerima" class="border border-dark mb-1" width="300" height="150">
									Tanda Tangan Penerima
								</canvas>
								<div>
									<button type="button" class="btn btn-sm btn-danger fw-bold fs-14" id="hapus_ttd">Ulangi</button>
								</div>
							</div>
							<input type="hidden" id="tanda_tangan_penerima" name="tanda_tangan_penerima" />
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger fw-bold fs-15" data-bs-dismiss="modal">Batal</button>
						<button type="button" id="submitTtdBtn" onclick="submitFormAndTtd()" class="btn btn-success fw-bold fs-15">Tambahkan</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
	<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
	<script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

	<script>
		let namaPengirim, nomorDokumen, perihal, tanggalDiterima, namaPenerima, subdit;
		let isSigned = false;
		flatpickr("#tanggal_diterima", {
			allowInput: true,
			static : true
		});
		// Example starter JavaScript for disabling form submissions if there are invalid fields
		(function () {
			'use strict';
			window.addEventListener('load', function () {
				// Fetch all the forms we want to apply custom Bootstrap validation styles to
				var forms = document.getElementsByClassName('needs-validation');
				// Loop over them and prevent submission
				var validation = Array.prototype.filter.call(forms, function (form) {
					form.addEventListener('submit', function (event) {
						if (form.checkValidity() === false) {
							event.preventDefault();
							event.stopPropagation();
						}
						form.classList.add('was-validated');
					}, false);
				});
			}, false);
		})();
		var penerimaanDokumenDatatable = $('#penerimaanDokumenDatatable').DataTable({
			responsive: true,
			scrollX: true,
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'excelHtml5',
					className: 'btn btn-success exportBtn me-2',
					exportOptions: {
						columns: [ 0, 1, 2, 3, 4 ]
					}
				},
				{
					extend: 'pdfHtml5',
					className: 'btn btn-success exportBtn me-2',
					exportOptions: {
						columns: [ 0, 1, 2, 3, 4 ]
					}
				},
				{
					extend: 'print',
					className: 'btn btn-success exportBtn me-2',
					exportOptions: {
						columns: [ 0, 1, 2, 3, 4 ]
					}
				}
			]
		});
		penerimaanDokumenDatatable.buttons().container().appendTo( '#penerimaanDokumenDatatable_wrapper .col-md-6:eq(0)' );
	</script>
	<script>
		(function () {
			window.requestAnimFrame = (function (callback) {
				return window.requestAnimationFrame ||
					window.webkitRequestAnimationFrame ||
					window.mozRequestAnimationFrame ||
					window.oRequestAnimationFrame ||
					window.msRequestAnimaitonFrame ||
					function (callback) {
						window.setTimeout(callback, 1000 / 60);
					};
			})();

			var canvas = document.getElementById("ttd_penerima");
			var ctx = canvas.getContext("2d");
			ctx.strokeStyle = "#222222";
			ctx.lineWidth = 4;

			var drawing = false;
			var mousePos = {
				x: 0,
				y: 0
			};
			var lastPos = mousePos;

			canvas.addEventListener("mousedown", function (e) {
				isSigned = true;
				drawing = true;
				lastPos = getMousePos(canvas, e);
			}, false);

			canvas.addEventListener("mouseup", function (e) {
				drawing = false;
			}, false);

			canvas.addEventListener("mousemove", function (e) {
				mousePos = getMousePos(canvas, e);
			}, false);

			// Add touch event support for mobile
			canvas.addEventListener("touchstart", function (e) {
				isSigned = true;
				mousePos = getTouchPos(canvas, e);
				var touch = e.touches[0];
				var me = new MouseEvent("mousedown", {
					clientX: touch.clientX,
					clientY: touch.clientY
				});
				canvas.dispatchEvent(me);
			}, false);

			canvas.addEventListener("touchmove", function (e) {
				var touch = e.touches[0];
				var me = new MouseEvent("mousemove", {
					clientX: touch.clientX,
					clientY: touch.clientY
				});
				canvas.dispatchEvent(me);
			}, false);

			canvas.addEventListener("touchend", function (e) {
				var me = new MouseEvent("mouseup", {});
				canvas.dispatchEvent(me);
			}, false);

			function getMousePos(canvasDom, mouseEvent) {
				var rect = canvasDom.getBoundingClientRect();
				return {
					x: mouseEvent.clientX - rect.left,
					y: mouseEvent.clientY - rect.top
				}
			}

			function getTouchPos(canvasDom, touchEvent) {
				var rect = canvasDom.getBoundingClientRect();
				return {
					x: touchEvent.touches[0].clientX - rect.left,
					y: touchEvent.touches[0].clientY - rect.top
				}
			}

			function renderCanvas() {
				if (drawing) {
					ctx.moveTo(lastPos.x, lastPos.y);
					ctx.lineTo(mousePos.x, mousePos.y);
					ctx.stroke();
					lastPos = mousePos;
				}
			}

			// Prevent scrolling when touching the canvas
			document.body.addEventListener("touchstart", function (e) {
				if (e.target == canvas) {
					e.preventDefault();
				}
			}, false);
			document.body.addEventListener("touchend", function (e) {
				if (e.target == canvas) {
					e.preventDefault();
				}
			}, false);
			document.body.addEventListener("touchmove", function (e) {
				if (e.target == canvas) {
					e.preventDefault();
				}
			}, false);

			(function drawLoop() {
				requestAnimFrame(drawLoop);
				renderCanvas();
			})();

			function clearCanvas() {
				canvas.width = canvas.width;
				isSigned = false;
			}

			// Set up the UI
			var clearBtn = document.getElementById("hapus_ttd");
			clearBtn.addEventListener("click", function (e) {
				clearCanvas();
			}, false);
		})();
	</script>
	<script>
		function validateForm(submitChoice){
			namaPengirim = $("#nama_pengirim").val();
			nomorDokumen = $("#nomor_dokumen").val();
			perihal = $("#perihal").val();
			tanggalDiterima = $("#tanggal_diterima").val();
			namaPenerima = $("#nama_penerima").val();
			subdit = $("#subdit").val();
			if (namaPengirim == "") {
				Swal.fire({
					title: "Ups!",
					text: "Nama pengirim belum diisi!",
					icon: "error"
				});
			}
			else if (nomorDokumen == "") {
				Swal.fire({
					title: "Ups!",
					text: "Nomor dokumen belum diisi!",
					icon: "error"
				});
			} else if (perihal == "") {
				Swal.fire({
					title: "Ups!",
					text: "Perihal belum diisi!",
					icon: "error"
				});
			} else if (tanggalDiterima == "") {
				Swal.fire({
					title: "Ups!",
					text: "Tanggal diterima belum diisi!",
					icon: "error"
				});
			} else if (namaPenerima == "") {
				Swal.fire({
					title: "Ups!",
					text: "Nama penerima belum diisi!",
					icon: "error"
				});
			} else if (subdit == "") {
				Swal.fire({
					title: "Ups!",
					text: "Subdit belum diisi!",
					icon: "error"
				});
			}
			if (namaPengirim !== "" && nomorDokumen !== "" && perihal !== "" && tanggalDiterima !== "" && namaPenerima !== "" && subdit !== "") {
				if(submitChoice == 'draft'){
					$.post("<?= base_url('tambah') ?>", {
						nama_pengirim: namaPengirim,
						nomor_dokumen: nomorDokumen,
						perihal: perihal,
						tanggal_diterima: tanggalDiterima,
						nama_penerima: namaPenerima,
						subdit: subdit
					},
					function(data,status){
						Swal.fire({
							title: "Yeay!",
							text: data.message,
							icon: "success"
						}).then(function(){
							window.location.href = '<?= base_url() ?>';
						});
					});
				} else {
					$("#modalTambah").modal('hide');
					$("#modalTtd").modal('show');
					$('#submitTtdBtn').attr("onclick", "submitFormAndTtd()");
				}
			}
		}

		function submitFormAndTtd(){
			if(isSigned){
				let canvas = document.getElementById("ttd_penerima");
				let dataUrl = canvas.toDataURL();
				console.log(dataUrl);
				$.post("<?= base_url('tambah') ?>", {
					nama_pengirim: namaPengirim,
					nomor_dokumen: nomorDokumen,
					perihal: perihal,
					tanggal_diterima: tanggalDiterima,
					nama_penerima: namaPenerima,
					subdit: subdit,
					ttd_penerima: dataUrl,
				},
				function(data,status){
					Swal.fire({
						title: "Yeay!",
						text: data.message,
						icon: "success"
					}).then(function(){
						window.location.href = '<?= base_url() ?>';
					});
				});
			} else {
				Swal.fire({
					title: "Ups!",
					text: "Anda belum mengisi TTD!",
					icon: "error"
				});
			}
		}

		function isiTtd(id){
			$('#modalTtd').modal('show');
			$('#submitTtdBtn').attr("onclick", "submitTtd(" + id + ")");
		}

		function submitTtd(id){
			if(isSigned){
				let canvas = document.getElementById("ttd_penerima");
				let dataUrl = canvas.toDataURL();
				console.log(dataUrl);
				$.post("<?= base_url('ttd/') ?>" + id, {
					ttd_penerima: dataUrl,
				},
				function(data,status){
					Swal.fire({
						title: "Yeay!",
						text: data.message,
						icon: "success"
					}).then(function(){
						window.location.href = '<?= base_url() ?>';
					});
				});
			} else {
				Swal.fire({
					title: "Ups!",
					text: "Anda belum mengisi TTD!",
					icon: "error"
				});
			}
		}
	</script>
    <?= $this->include('sweetalert'); ?>
</body>

</html>