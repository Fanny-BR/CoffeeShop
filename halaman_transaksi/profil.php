<div class="col-lg-5">
         
         <!-- Horizontal Form -->
         <div class="box box-info">
           <div class="box-header with-border">
             <h3 class="box-title">Detail Profil</h3>
           </div>
           <!-- /.box-header -->
           <!-- form start -->
           <form class="form-horizontal">
             <div class="box-body">
               <div class="form-group">
                 <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                 <div class="col-sm-10">
                   <input type="text" class="form-control" id="inputEmail3" value="<?php echo $_SESSION['username']?>" readonly>
                 </div>
               </div>
               <div class="form-group">
                 <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                 <div class="col-sm-10">
                   <input type="password" class="form-control" id="inputPassword3"  value="<?php echo $_SESSION['password']?>" readonly>
                 </div>
               </div>
               <div class="form-group">
                 <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>

                 <div class="col-sm-10">
                   <input type="text" class="form-control" id="inputEmail3"  value="<?php echo $_SESSION['nama']?>" readonly>
                 </div>
               </div>
               <div class="form-group">
                 <label for="inputEmail3" class="col-sm-2 control-label">Nomor</label>

                 <div class="col-sm-10">
                   <input type="text" class="form-control" id="inputEmail3" value="<?php echo $_SESSION['nomor']?>" readonly>
                 </div>
               </div>
               <div class="form-group">
                 <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>

                 <div class="col-sm-10">
                 <textarea name="" id="" cols="52" rows="5" readonly><?php echo $_SESSION['alamat']?></textarea>
                 </div>
               </div>
               <div class="form-group">
                 <label for="inputEmail3" class="col-sm-2 control-label">Level</label>

                 <div class="col-sm-10">
                   <input type="text" class="form-control" id="inputEmail3" value="<?php echo $_SESSION['level']?>" readonly>
                 </div>
               </div>
             </div>
         
           </form>
         </div>
         <!-- /.box -->
         </div>