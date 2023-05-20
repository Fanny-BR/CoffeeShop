<?php
				if(isset($_POST['login'])){
					include("koneksi.php");
					
					$username	= $_POST['username'];
					$password	= $_POST['password'];
					
					$query = mysqli_query($koneksi, "SELECT user.id, user.nama, user.nomor, user.alamat, user.username, user.password, level.nama_level
                    FROM user, level  
                    where user.id_level = level.id AND user.username='$username' AND user.password='$password'");
					if(mysqli_num_rows($query) == 0){
						echo '<div class="alert alert-danger">Upss...!!! Login gagal.</div>';
					}else{
						$data = mysqli_fetch_assoc($query);
						
						if($data['nama_level'] == 'admin'){
                            $_SESSION['id'] = $data['id'];
                            $_SESSION['nama'] = $data['nama'];
                            $_SESSION['level'] = $data['nama_level'];
                            $_SESSION['nomor'] = $data['nomor'];
                            $_SESSION['alamat'] = $data['alamat'];
                            $_SESSION['username'] = $data['username'];
                            $_SESSION['password'] = $data['password'];
							header("Location: index.php");
						}else if($data['nama_level'] == 'karyawan'){
							$_SESSION['id'] = $data['id'];
                            $_SESSION['nama'] = $data['nama'];
                            $_SESSION['level'] = $data['nama_level'];
                            $_SESSION['nomor'] = $data['nomor'];
                            $_SESSION['alamat'] = $data['alamat'];
                            $_SESSION['username'] = $data['username'];
                            $_SESSION['password'] = $data['password'];
							header("Location: index.php");
						}else{
							echo '<div class="alert alert-danger">Upss...!!! Login gagal.</div>';
						}
					}
				}
				?>