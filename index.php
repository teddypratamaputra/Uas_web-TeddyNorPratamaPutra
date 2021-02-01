<?php 
	include_once('connection.php');
?>

<!doctype html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Input Data Mahasiswa</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-3.4.1.min.js"></script>
</head>

<body>
	<?php
	$condition	=	'';
	if(isset($_REQUEST['npm']) and $_REQUEST['npm']!=""){
		$condition	.=	' AND npm LIKE "%'.$_REQUEST['npm'].'%" ';
	}

	if(isset($_REQUEST['nama']) and $_REQUEST['nama']!=""){
		$condition	.=	' AND nama LIKE "%'.$_REQUEST['nama'].'%" ';
	}

	$userData	=	$db->getAllRecords('mahasiswa','*',$condition,'ORDER BY npm ASC');
	?>

   	<div class="container mt-3">
		<div class="card">
			<div class="card-header"><strong>INPUT DATA MAHASISWA</strong> 
			<a href="mahasiswa_create.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Tambah Mahasiswa</a></div>
			<div class="card-body">

				<div class="col-sm-12">
					<form method="get">
						<div class="row">

							<div class="col-sm-2">
								<div class="form-group">
									<label>Search Npm</label>
									<input type="text" name="npm" id="npm" class="form-control" value="<?php echo isset($_REQUEST['npm'])?$_REQUEST['npm']:''?>">
								</div>
							</div>

							<div class="col-sm-2">
								<div class="form-group">
									<label>Search Nama</label>
									<input type="text" name="nama" id="nama" class="form-control" value="<?php echo isset($_REQUEST['nama'])?$_REQUEST['nama']:''?>">
								</div>
							</div>

							<div class="ml-auto mr-3">
								<div class="form-group ">
									<label>&nbsp;</label>
									<div>
										<button type="submit" name="submit" value="search" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Search</button>
										<a href="<?php echo $_SERVER['PHP_SELF'];?>" class="btn btn-danger"><i class="fa fa-fw fa-sync"></i> Clear</a>
									</div>
								</div>
							</div>

						</div>
					</form>
				</div>

			</div>
		</div>
		<hr>
		
		<div>
			<table class="table table-striped table-bordered">
				<thead>
					<tr class="bg-primary text-white">
                        <th>No</th>
                        <th>NPM</th>
                        <th>Nama</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>kodepos</th>
                        <th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php 
					if(count($userData)>0){
                        $s	=	'';
						foreach($userData as $data){
							$s++;
					?>
					<tr>
                    <td> <?php echo $s ?></td>
                        <td> <?php echo $data['npm']; ?></td>
                        <td> <?php echo $data['nama']; ?></td>
                        <td> <?php echo $data['tempatlahir']; ?></td>
                        <td> <?php echo $data['tanggallahir']; ?></td>
                        <td> <?php echo $data['jeniskelamin']; ?></td>
                        <td> <?php echo $data['alamat']; ?></td>
                        <td> <?php echo $data['kodepos']; ?></td>
                        <td style="word-wrap: break-word;min-width: 150px;max-width: 150px">
                                <a href="mahasiswa_update.php?npm=<?php echo $data['npm']; ?>" class= "btn btn-sm btn-primary">Edit</a>
                                <a href="mahasiswa_delete.php?npm=<?php echo $data['npm']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                        </td>

					</tr>

					<?php 
						}
					}else{
					?>
					<tr><td colspan="8" align="center">Data kosong</td></tr>
					<?php } ?>

				</tbody>
			</table>
		</div>
		
	</div>
</body>
</html>