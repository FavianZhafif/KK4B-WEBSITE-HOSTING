<?php 
	//koneksi database
	$server = "localhost";
	$user = "id15454784_dblatihan";
	$pass = "ZhaZhaZha-40";
	$database = "id15454784_zhafifarkan00";

	global $koneksi;
	$koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));


	//jika tombol save di klik
	if (isset($_POST['bsave'])) 
	{
		//pengujian data akan diedit atau disimpan
		if($_GET['hal'] == "edit")
		{
			//data akan diedit
			$edit = mysqli_query($koneksi, "UPDATE tmhs set
												nim = '$_POST[tnim]',
												nama = '$_POST[tnama]',
												alamat = '$_POST[talamat]',
												prodi = '$_POST[tprodi]'
											WHERE id_mhs = '$_GET[id]'
											 ");
			if($edit)
			{
				echo "<script>
						alert('Edit Data Success');
						document.location='index1.php'
					 </script>";
			}
			else
			{
				echo "<script>
						alert('Edit Data Failed');
						document.location='index1.php'
					 </script>";
			}
		}
		else
		{
			//data akan disimpan baru
			$simpan = mysqli_query($koneksi, "INSERT INTO tmhs (nim, nama, alamat, prodi)
											  VALUES ('$_POST[tnim]', 
											  		 '$_POST[tnama]', 
											  		 '$_POST[talamat]', 
											  		 '$_POST[tprodi]')
											 ");
			if($simpan)
			{
				echo "<script>
						alert('Save Data Success');
						document.location='index1.php'
					 </script>";
			}
			else
			{
				echo "<script>
						alert('Save Data Failed');
						document.location='index1.php'
					 </script>";
			}
		}
		
	}

	//pengujian jika tombol edit atau delete di klik
	if(isset($_GET['hal']))
	{
		//pengujian jika edit data
		if($_GET['hal'] == "edit")
		{
			//tampilkan data yang akan diedit
			$tampil = mysqli_query($koneksi, "SELECT * FROM tmhs WHERE id_mhs = '$_GET[id]' ");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//jika data ditemukan ditampung ke variable
				$vnim = $data['nim'];
				$vnama = $data['nama'];
				$valamat = $data['alamat'];				
				$vprodi = $data['prodi'];
			}
		}
		else if($_GET['hal'] == "hapus")
		{
			//persiapan hapus data
			$hapus = mysqli_query($koneksi, "DELETE FROM tmhs WHERE id_mhs = '$_GET[id]' ");
			if($hapus){
				echo "<script>
						alert('Delete Data Success');
						document.location='index1.php'
					 </script>";
			}
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD KK4-B WEBSITE</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styleindex.css">
	
</head>
<body style="margin-top: 50px;">
     <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
 
  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Utrecht University <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    
 
    <a href="akunuser.php?logoutSubmit=1" class="logout form-inline my-2 my-lg-0 btn btn-secondary">Logout</a>
 
  </div>
</nav>
	<div class="jumbotron">
	    <font color="White">
	        <h1 class="display-4">Utrecht University Student Data Collection in Indonesia</h1>
	        <hr class="my-4">------------------------------------------------------------------
	  <p class="lead">XI RPL 1 ,Favian Zhafif Arkan (12)</p>
	  </font>
	</div>
	
<div class="container mt-4">

	<!-- AWAL CARD FORM -->
	<div class="card mt-5">
	  <div class="card-header bg-primary text-white">
	    Utrecht University Student Data Input Form
	  </div>
	  <div class="card-body">
	    <form method="post" action="">
	    	<div class="form-group">
	    		<lable>Student ID Number</lable>
	    		<input type="text" name="tnim" value="<?=@$vnim?>" class="form-control" placeholder="Enter Your Student ID Number Here!" required="">
	    	</div>
	    	<div class="form-group">
	    		<lable>Name</lable>
	    		<input type="text" name="tnama" value="<?=@$vnama?>" class="form-control" placeholder="Enter Your Name Here!" required="">
	    	</div>
	    	<div class="form-group">
	    		<lable>Address</lable>
	    		<textarea class="form-control" name="talamat"  placeholder="Enter Your Address Here!"><?=@$valamat?></textarea>
	    	</div>
	    	<div class="form-group">
	    		<lable>Study Program</lable>
	    		<select class="form-control" name="tprodi">
	    			<option value="<?=@$vprodi?>"><?=@$vprodi?></option>
	    			<option value="BSc in Economics and Business Economics">BSc in Economics and Business Economics</option>
	    			<option value="MA in American Studies">EMA in American Studies</option>
	    			<option value="MSc in International Economics and Business">MSc in International Economics and Business</option>
	    			<option value="MSc in Business Informatics"> MSc in Business Informatics</option>
	    			<option value="MS in Computing Science">MS in Computing Science</option>
	    			<option value="MSc in Game and Media Technology">MSc in Game and Media Technology</option>
	    			<option value="Law and Economics (LLM)">Law and Economics (LLM)</option>
	    			<option value="BSc in Pharmaceutical Sciences">BSc in Pharmaceutical Sciences</option>
	    			<option value="BA / BSc in Liberal Arts and Sciences (University College Roosevelt)">BA / BSc in Liberal Arts and Sciences (University College Roosevelt)</option>
	    			<option value="BA / BSc in Liberal Arts and Sciences (University College Utrecht)">BA / BSc in Liberal Arts and Sciences (University College Utrecht)</option>
	    		</select>
	    	</div>

			<button type="submit" class="btn btn-warning text-white" name="bsave">Save</button>
			<button type="reset" class="btn btn-danger" name="breset">Reset Form</button>

	    </form>
	  </div>
	</div>
	<!-- AKHIR CARD FORM -->

		<!-- AWAL CARD TABEL -->
	<div class="card mt-3">
	  <div class="card-header bg-warning text-white font-18pt">
	    Student List
	  </div>
	  <div class="card-body">
	   
	  	<table class="table table-bordered table-striped">
	  		<tr>
	  			<th>Number</th>
	  			<th>Student ID Number</th>
	  			<th>Name</th>
	  			<th>Address</th>
	  			<th>Study Program</th>
	  			<th>Action for Table Data</th>
	  		</tr>
	  		<?php
	  			$no = 1; 
	  			$tampil = mysqli_query($koneksi, "SELECT * from tmhs order by id_mhs desc");
	  			while ($data = mysqli_fetch_array($tampil)) :
	  		 ?>
	  		<tr>
	  			<td><?=$no++;?></td>
	  			<td><?=$data['nim'];?></td>
	  			<td><?=$data['nama'];?></td>
	  			<td><?=$data['alamat'];?></td>
	  			<td><?=$data['prodi'];?></td>
	  			<td>
	  				<a href="index1.php?hal=edit&id=<?=$data['id_mhs']?>" class="btn btn-success">Edit</a>
	  				<a href="index1.php?hal=hapus&id=<?=$data['id_mhs']?>" onclick="return confirm('Apakah yakin ingin menghapus data ini?') " class="btn btn-danger">Delete</a>
	  			</td>

	  		</tr>
	  	<?php endwhile; //penutup perulangan while?>
	  	</table>

	  </div>
	</div>
	<!-- AKHIR CARD TABEL -->

</div>
<div>
		<div class="container text-justify p-5">
		    <div class="row">
		        <div class="font-italic"><p>
		            Summary About Utrecht University
		        </div>
		    </div>
			<div class="row">
				<div class="col-md-6"><p>Founded in 1636, Utrecht University is one of the oldest and largest universities in the Netherlands. Utrecht University is ranked 11th in the best in Europe and in the 50th best in the world according to research by the Shanghai Academic Rankings of World Universities 2010. The university is divided into several faculties, and it is in these faculties that various study programs are offered.</div>
				<div class="col-md-6">The faculties which are owned, among others; humanities, medicine, and so on. All programs are accredited by the Dutch-Flemish Accreditation Organization. With students from 130 countries, 150 student organizations, high-quality facilities, and located in a vibrant city, Utrecht University offers student life.</div>
			</div>
		</div>
	</div>
	
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	  <ol class="carousel-indicators">
	    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
	    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
	    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	  </ol>
	  <div class="carousel-inner">
	    <div class="carousel-item active">
	      <div class="testimonial pt-5 pb-5">
		      <div class="container">
		      	<div class="row">
		      		<div class="col-md-2"></div>
		      		<div class="col-md-2">
		      			<img src="https://th.bing.com/th/id/OIP.VTATfbP6xEqJhre4N4fOlAHaHa?w=189&h=189&c=7&o=5&pid=1.7" class="rounded-circle" width="90%">
		      		</div>
		      		<div class="col-md-7 text-justify font-italic">
		      			<h4>Favian Zhafif Arkan <small>- MSc in Game and Media Technology</small></h4>
		     			The various facilities provided make me even more excited to study, especially in the library and garden which are very comfortable, quiet, and beautiful.
		      		</div>
		      		<div class="col-md-2"></div>
		      	</div>
		      </div>
	      </div>
	    </div>

	     <div class="carousel-item">
	      <div class="testimonial pt-5 pb-5">
		      <div class="container">
		      	<div class="row">
		      		<div class="col-md-2"></div>
		      		<div class="col-md-2">
		      			<img src="https://th.bing.com/th/id/OIP.h8qA5lBFjDNJiHUdOZtd7wAAAA?w=193&h=193&c=7&o=5&pid=1.7" class="rounded-circle" width="90%">
		      		</div>
		      		<div class="col-md-7 text-justify font-italic">
		      			<h4>Aqila Verdana Syaqil <small>- MA in American Studies</small></h4>
		      			I have spent my first year here, and I really like the atmosphere and my friends here,coupled with the environment and friendly people.
		      		</div>
		      		<div class="col-md-2"></div>
		      	</div>
		      </div>
	      </div>
	    </div>

	     <div class="carousel-item">
	      <div class="testimonial pt-5 pb-5">
		      <div class="container">
		      	<div class="row">
		      		<div class="col-md-2"></div>
		      		<div class="col-md-2">
		      			<img src="https://th.bing.com/th/id/OIP._WA7KLdhzZYjSeYqMnXHrAAAAA?w=179&h=180&c=7&o=5&pid=1.7" class="rounded-circle" width="90%">
		      		</div>
		      		<div class="col-md-7 text-justify font-italic">
		      			<h4>Dedrick Max Willian <small>- MSc in Game and Media Technology</small></h4>
		      			the material presented was very interesting and in an interesting way too, thus increasing enthusiasm to study harder and more diligently, the lecturers were friendly.
		      		</div>
		      		<div class="col-md-2"></div>
		      	</div>
		      </div>
	      </div>
	    </div>
	  </div>
	  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>


<footer class="mt-4">
		<div class="container">
			<small>
				Copyright &copy; 2020 - Favian Zhafif Arkan.All Right Reserved
			</small>
		</div>
	</footer>


	<script type="text/javascript">
		$(document).ready(function(){
			$(".bg-loader").hide();
		})
	</script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>