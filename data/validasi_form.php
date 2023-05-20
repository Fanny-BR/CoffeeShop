<script type="text/javascript">
    $(document).ready(function(){
        //semua element dengan class text-warning akan di sembunyikan saat load
        $('.text-warning').hide();
        //untuk mengecek bahwa semua textbox tidak boleh kosong
        $('input').each(function(){ 
            $(this).blur(function(){ //blur function itu dijalankan saat element kehilangan fokus
                if (! $(this).val()){ //this mengacu pada text box yang sedang fokus
                    return get_error_text(this); //function get_error_text ada di bawah
                } else {
                    $(this).removeClass('no-valid'); 
                    $(this).parent().find('.text-warning').hide();//cari element dengan class has-warning dari element induk text yang sedang focus
                    $(this).closest('div').removeClass('has-warning');
                    $(this).closest('div').addClass('has-success');
                    $(this).parent().find('.form-control-feedback').removeClass('glyphicon glyphicon-warning-sign');
                    $(this).parent().find('.form-control-feedback').addClass('glyphicon glyphicon-ok');
                }
            });
        });
        //mengecek textbox Nama Valid Atau Tidak
        $('#nama').blur(function(){
            var nama= $(this).val();
            var len= nama.length;
            if(len>0){ //jika ada isinya
                if(!valid_nama(nama)){ //jika nama tidak valid
                    $(this).parent().find('.text-warning').text("");
                    $(this).parent().find('.text-warning').text("Nama Tidak Valid");
                    return apply_feedback_error(this);
                } else {
                    if (len>30){ //jika karakter >30
                        $(this).parent().find('.text-warning').text("");
                        $(this).parent().find('.text-warning').text("Maximal Karakter 30");
                        return apply_feedback_error(this);
                    }
                }
            } 
        });
        //Mengecek textbox tanggal lahir
        $('#tgl_lahir').blur(function(){
            var tgl= $(this).val();
            var len= tgl.length;
            if(len>0){
                if(!valid_tanggal(tgl)){
                    $(this).parent().find('.text-warning').text("");
                    $(this).parent().find('.text-warning').text("Format Tanggal yang diperbolehkan mm-dd-yyy, mm/dd/yyyy atau dd/mm/yyyy, dd-mm-yyyy");
                    return apply_feedback_error(this);
                }
            }
        });
        //mengecek text box email
        $('#email').blur(function(){
            var email= $(this).val();
            var len= email.length;
            if(len>0){ 
                if(!valid_email(email)){ 
                    $(this).parent().find('.text-warning').text("");
                    $(this).parent().find('.text-warning').text("E-mail Tidak Valid (ex: aaaa@yahoo.co.id)");
                    return apply_feedback_error(this);
                } else {
                    if (len>30){ 
                        $(this).parent().find('.text-warning').text("");
                        $(this).parent().find('.text-warning').text("Maximal Karakter 30");
                        return apply_feedback_error(this);
                    } else {
                        var valid = false;
                        $.ajax({
                                           url: "checkemail.php",
                                           type: "POST",
                                           data: "email="+email,
                                           dataType: "text",
                                           success: function(data){
                                                     if (data==0){ //pada file check email.php, apabila email sudah ada di database makan akan mengembalikan nilai 0
                                                 $('#email').parent().find('.text-warning').text("");
                                 $('#email').parent().find('.text-warning').text("email sudah ada");
                                 return apply_feedback_error('#email');
                                                     }
                                                       }
                            });
                        }
                }
            } 
        });
        //mengecek password
        $('#password').blur(function(){
            var password=$(this).val();
            var len=password.length;
            if (len>0 && len<8) {
                $(this).parent().find('.text-warning').text("");
                $(this).parent().find('.text-warning').text("password minimal 8 karakter");
                return apply_feedback_error(this);
            } else {
                if(len>35) {
                    $(this).parent().find('.text-warning').text("");
                    $(this).parent().find('.text-warning').text("password maksimal 35 karakter");
                    return apply_feedback_error(this);
                }
            }
        });
        //mengecek konfirmasi password
        $('#confirmpassword').blur(function(){
            var pass = $("#password").val();
            var conf=$(this).val();
            var len=conf.length;
            if (len>0 && pass!==conf) {
                $(this).parent().find('.text-warning').text("");
                $(this).parent().find('.text-warning').text("Konfirmasi Password tidak sama dengan password");
                return apply_feedback_error(this);
            }
        });

        //mengecek nomer hp
        $('#nomor').blur(function(){
            var hp=$(this).val();
            var len=hp.length;
            if (len>0 && len<=10){
                $(this).parent().find('.text-warning').text("");
                $(this).parent().find('.text-warning').text("Nomer HP terlalu pendek");
                return apply_feedback_error(this);
            } else {
                if(!valid_hp(hp)){
                    $(this).parent().find('.text-warning').text("");
                    $(this).parent().find('.text-warning').text("Format nomer hp tidak sah.(ex: +6285736262623)");
                    return apply_feedback_error(this);
                } else {
                    if (len >13){
                        $(this).parent().find('.text-warning').text("");
                        $(this).parent().find('.text-warning').text("Nomer HP terlalu Panjang");
                        return apply_feedback_error(this);
                    }
                }
            }
        });

        //submit form validasi
        $('#formInput').submit(function(e){
            e.preventDefault();
            var valid=true;     
            $(this).find('.textbox').each(function(){
                if (! $(this).val()){
                    get_error_text(this);
                    valid = false;
                    $('html,body').animate({scrollTop: 0},"slow");
                } 
                if ($(this).hasClass('no-valid')){
                    valid = false;
                    $('html,body').animate({scrollTop: 0},"slow");
                }
            });
            if (valid){
                swal({
                              title: "Konfirmasi Simpan Data",
                              text: "Data Akan di Simpan Ke Database",
                              type: "info",
                              showCancelButton: true,
                              confirmButtonColor: "#1da1f2",
                              confirmButtonText: "Yakin, dong!",
                              closeOnConfirm: false,
                              showLoaderOnConfirm: true,
                        }, function () { //apabila sweet alert d confirm maka akan mengirim data ke simpan.php melalui proses ajax

                });
            }
        });
    });

    //fungsi cek nama
    function valid_nama(nama) {
        var pola= new RegExp(/^[a-z A-Z]+$/);
        return pola.test(nama);
    }
    //fungsi cek tanggal lahir
    function valid_tanggal(tanggal){
        var pola= new RegExp(/\b\d{1,2}[\/-]\d{1,2}[\/-]\d{4}\b/);
        return pola.test(tanggal);
    }
    //fungsi cek email
    function valid_email(email){
        var pola= new RegExp(/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]+$/);
        return pola.test(email);
    }
    //fungsi cek phone 
    function valid_hp(hp){
        var pola = new RegExp(/^[0-9-+]+$/);
        return pola.test(hp);
    }
    //menerapkan gaya validasi form bootstrap saat terjadi eror
    function apply_feedback_error(textbox){
        $(textbox).addClass('no-valid'); //menambah class no valid
        $(textbox).parent().find('.text-warning').show();
        $(textbox).closest('div').removeClass('has-success');
        $(textbox).closest('div').addClass('has-warning');
        $(textbox).parent().find('.form-control-feedback').removeClass('glyphicon glyphicon-ok');
        $(textbox).parent().find('.form-control-feedback').addClass('glyphicon glyphicon-warning-sign');
    }

    //untuk mendapat eror teks saat textbox kosong, digunakan saat submit form dan blur fungsi
    function get_error_text(textbox){
        $(textbox).parent().find('.text-warning').text("");
        $(textbox).parent().find('.text-warning').text("Kolom Ini Tidak Boleh Kosong");
        return apply_feedback_error(textbox);
    }
</script>

<!-- Script javascript memunculkan notifikasidialog ketika mau menghapus barang -->
<script>
        jQuery(document).ready(function ($) {
          $('.delete-link').on('click', function () {
            var getLink = $(this).attr('href');
            swal({
              title: 'Apakah kamu yakin ?',
              text: "Produk akan dihapus secara permanen !",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#ff3333',
              cancelButtonColor: '#d33',
              cancelButtonText: 'Batal',
              confirmButtonText: 'Ya, Dihapus!'
            }, function () {
              window.location.href = getLink
            });
            return false;
          });
        });
    </script>

    <!-- Script javascript memunculkan notifikasi dialog ketika mau menghapus akun -->
<script>
        jQuery(document).ready(function ($) {
          $('.delete-akun').on('click', function () {
            var getLink = $(this).attr('href');
            swal({
              title: 'Apakah kamu yakin ?',
              text: "Akun akan dihapus secara permanen !",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#ff3333',
              cancelButtonColor: '#d33',
              cancelButtonText: 'Batal',
              confirmButtonText: 'Ya, Dihapus!'
            }, function () {
              window.location.href = getLink
            });
            return false;
          });
        });
    </script>

        <!-- Script javascript memunculkan notifikasi dialog ketika mau menghapus kategori -->
<script>
        jQuery(document).ready(function ($) {
          $('.delete-kategori').on('click', function () {
            var getLink = $(this).attr('href');
            swal({
              title: 'Apakah kamu yakin ?',
              text: "Data Barang & Kategori nya akan dihapus secara permanen !",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#ff3333',
              cancelButtonColor: '#d33',
              cancelButtonText: 'Batal',
              confirmButtonText: 'Ya, Dihapus!'
            }, function () {
              window.location.href = getLink
            });
            return false;
          });
        });
    </script>