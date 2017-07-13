<?php
  require_once ('../../db.php');
  if(isset($_POST['pesan'])) {

    $dari = $_POST['dari'];
    $tgl_berangkat = $_POST['tgl_berangkat'];
    $jam_berangkat = $_POST['jam_berangkat'];
    $kursi = $_POST['kursi'];
    $nama = $_POST['nama'];
    $kontak = $_POST['kontak'];
    $domain = 'http://localhost:8000';

    $sql_cek = "select key_konfirmasi from pesanan";
    $result_cek = mysqli_query($db,$sql_cek);
    $row_cek = $result_cek->fetch_assoc();

    function generateRandomString($length = 10) {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
    }

    if($row_cek['key_konfirmasi'] != generateRandomString()) {
      $key_konfirmasi = generateRandomString();
    } else {
      do {
        generateRandomString();
      } while ($row_cek['key_konfirmasi'] != generateRandomString());
    }

    if($dari == 'Bandung') {
      $ke = 'Jatinangor';
    } else {
      $ke = 'Bandung';
    }

    $j = 6;
    for($i=1; $i<=12; $i++) {
      if(($jam_berangkat == $i)) {
        if($j <= 9) {
          $new_jadwal = '0' . $j . '.00';
        } else {
          $new_jadwal = $j . '.00';
        }
      }
      $j++;
    }

    $sql = "INSERT INTO pesanan (dari, ke, tgl_berangkat, jam_berangkat, no_kursi, nama_pemesan, kontak, pembayaran, foto_konfirmasi, key_konfirmasi)
      VALUES('$dari', '$ke', '$tgl_berangkat', '$jam_berangkat', '$kursi', '$nama', '$kontak', 0, null, '$key_konfirmasi')";
    $insert = mysqli_query($db, $sql);

    $id = mysqli_insert_id($db);

    if ($insert) {
      /* Mengirim email*/

      /**
       * This example shows settings to use when sending via Google's Gmail servers.
      */

      //SMTP needs accurate times, and the PHP time zone MUST be set
      //This should be done in your php.ini, but this is how to do it if you don't have access to that
      date_default_timezone_set('Etc/UTC');

      require '../../phpmailer/PHPMailerAutoload.php';

      //Create a new PHPMailer instance
      $mail = new PHPMailer;

      //Tell PHPMailer to use SMTP
      $mail->isSMTP();

      //Enable SMTP debugging
      // 0 = off (for production use)
      // 1 = client messages
      // 2 = client and server messages
      $mail->SMTPDebug = 0;

      //Ask for HTML-friendly debug output
      $mail->Debugoutput = 'html';

      //Set the hostname of the mail server
      // $mail->Host = 'smtp.gmail.com';
      $mail->Host = 'web.unikom.ac.id';
      // use
      // $mail->Host = gethostbyname('smtp.gmail.com');
      // if your network does not support SMTP over IPv6

      //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
      $mail->Port = 587;

      //Set the encryption system to use - ssl (deprecated) or tls
      $mail->SMTPSecure = 'tls';

      //Whether to use SMTP authentication
      $mail->SMTPAuth = true;
      //Username to use for SMTP authentication - use full email address for gmail
      $mail->Username = "contact@himaif.unikom.ac.id";

      //Password to use for SMTP authentication
      $mail->Password = "Kmzwa87awaa";

      //Set who the message is to be sent from
      $mail->setFrom('tugaskampusunikom@gmail.com', 'Kontak ATOL TRAVEL');

      //Set an alternative reply-to address
      $mail->addReplyTo('tugaskampusunikom@gmail.com', 'Kontak ATOL TRAVEL');

      //Set who the message is to be sent to
      $mail->addAddress($kontak);

      //Set the subject line
      $mail->Subject = 'KONFIRMASI PESANAN ATOL TRAVEL';

      $pesan =
      "
      <html>
        <style>
        .layout{
          margin-left: auto;
          margin-right: auto;
          width: 50%;
        }
        .header{
          background-color: #022D41;
          border-radius:3px;
          padding: 6px;
          text-align:center;
          color: #fff;
        }

        .doff{
          color:#555;
        }
        </style>
        <body>
        <div class=\"layout\">
          <div class=\"header\">
            <h3>ATOL TRAVEL</h3>
          </div><br>
          Untuk mengkonfirmasi pesanan dengan ID ".$id.": Klik <a href='".$domain."/konfirmasi.php?key=".$key_konfirmasi."'>disini<a><br><br>
          <table>
          <tr>
            <td><b>Nama Lengkap</b><td>: ".$nama."</td></td>
          </tr>
          <tr>
            <td><b>Email</b><td>: ".$kontak."</td></td>
          </tr>
          <tr>
            <td><b>Jadwal Pemberangkatan</b><td>: <b>".$tgl_berangkat." (".$new_jadwal.")</b></td></td>
          </tr>
          <tr>
            <td><b>No. Kursi</b><td>: <b>".$kursi."</b></td></td>
          </tr>
          </table><br><br>
            ATOL TRAVEL
            </p>
            <center>
            <small>
            <p class=\"doff\">Allrights reserved &copy; ".date("Y")." ATOL TRAVEL.<br>
            <a href=\"".$domain."\" target=\"_blank\" style=\"text-decoration:none;\">Website Utama</a></p>
            </small>
            </center>
          </div>
        </body>
        </html>
      ";


      //Read an HTML message body from an external file, convert referenced images to embedded,
      //convert HTML into a basic plain-text alternative body
      // $mail->msgHTML(file_get_contents('content-lupa-password.php'), dirname(__FILE__));
      $mail->msgHTML($pesan, dirname(__FILE__));

      //Replace the plain text body with one created manually
      // $mail->AltBody = 'This is a plain-text message body';

      //Attach an image file
      // $mail->addAttachment('images/phpmailer_mini.png');

      //send the message, check for errors
      if (!$mail->send()) {
          echo "Mailer Error: " . $mail->ErrorInfo;
      } else {
          echo "Message sent!";
      }

      header("location: /?msg=konfirmasi");
    } else {
      echo "Error: ".mysqli_error($db);
    }
    mysqli_close($db);
  } else {
    header('location: /');
  }
?>