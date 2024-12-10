<?php
session_start();
// membatasi halaman login
if(!isset($_SESSION['login'])) {
    echo "<script>
            document.location.href = 'login'
        </script>";
    exit;
}

$title = "Kirim Email";
include './layout/header.php';

use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';

$mail = new PHPMailer(true);

 //Server settings
 $mail->SMTPDebug = 2;                                       //Enable verbose debug output
 $mail->isSMTP();                                            //Send using SMTP
 $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
 $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
 $mail->Username   = 'tes@example.com';            //SMTP username
 $mail->Password   = 'secret';                               //SMTP password
 $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
 $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


// cek apakah tombol kirim ditekan
// if (isset($_POST['kirim'])) {



//     if (create_mahasiswa($_POST) > 0) {
//         echo "<script> 
//                 alert('Email Berhasil di Kirim');
//                 document.location.href = 'email.php';
//              </script>";
//     } else {
//         echo "<script> 
//                 alert('Email Berhasil di Kirim');
//                 document.location.href = 'email.php';
//             </script>";
//     }
// }

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><i class="fas fa-envelope"></i> Kirim Email</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Kirim Email</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <form action="" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email Penerima</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email Penerima..." required>
            </div>
                    
            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="subject" class="form-control" id="subject" name="subject" placeholder="Subject..." required>
            </div>

            <div class="mb-3">
                <label for="pesan" class="form-label">Pesan Email</label>
                <textarea name="pesan" id="textarea"></textarea>
            </div>

            <div>
                <button type="submit " name="kirim" class="btn btn-primary " style="margin-bottom : 10px; float:right;" >Kirim</button>
            </div>
                
        </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
    // preview img
    function previewImg() {
        const foto = document.querySelector("#foto");
        const imgPreview = document.querySelector('.img-preview');

        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);
        fileFoto.onload = function (e) {
            imgPreview.src = e.target.result;
        }
    }


</script>

<?php include './layout/footer.php' ?>
    