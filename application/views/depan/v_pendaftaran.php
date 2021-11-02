<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pendaftaran</title>
    <link rel="shorcut icon" href="<?php echo base_url().'theme/images/icon.png'?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/bootstrap.min.css'?>">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/font-awesome.min.css'?>">
    <!-- Simple Line Font -->
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/simple-line-icons.css'?>">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/owl.carousel.min.css'?>">
    <!-- Main CSS -->
    <link href="<?php echo base_url().'theme/css/style.css'?>" rel="stylesheet">
</head>

<body>
  <!--============================= HEADER =============================-->
  
  <div data-toggle="affix">
        <div class="container nav-menu2">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar2 navbar-toggleable-md navbar-light bg-faded">
                        <button class="navbar-toggler navbar-toggler2 navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown">
                            <span class="icon-menu"></span>
                        </button>
                        <a href="<?php echo site_url('');?>" class="navbar-brand nav-brand2"><img class="img img-responsive" width="100px;" src="<?php echo base_url().'theme/images/icb.png'?>"></a>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('');?>">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('about');?>">Sambutan</a>
                                </li>
                                <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     Jurusan
                                    </a>
                                 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href='upw'>Usaha perjalanan Wisata</a>
                                    <a class="dropdown-item" href='Perhotelan'>Akomodasi Perhotelan</a>
                                    <a class="dropdown-item" href='tata_boga'>Tata Boga</a>
                                
                                </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('guru');?>">Guru</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('blog');?>">Artikel</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('pengumuman');?>">Pengumuman</a>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('agenda');?>">Agenda</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('download');?>">Download</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('galeri');?>">Gallery</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="<?php echo site_url('contact');?>">Contact</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="<?php echo site_url('pendaftaran');?>">Pendaftaran</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="<?php echo site_url('admin/login');?>">Login</a>
                                </li>
                             </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
      </div>
    <section>
</section>
<!--//END HEADER -->
<section class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="contact-title">
                    <h2>Form Pendaftaran</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="contact-form">
                        <div class="col-xs-12 col-sm-12  contact-option">
                            <div class="contact-title">
                                <h3>Masukan Data Diri Anda</h3>
                                <form action="<?php echo site_url('pendaftaran/kirim_pendaftaran');?>" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class = "col-md-6">
                                        <label for="nama_lengkap">Nama Lengkap  </label>
                                        <input type="text" class="form-control" placeholder="Contoh: Ferdy Nur Muhammad" name="nama_lengkap" required>
                                        </div>
                                        <div class = "col-md-6">
                                        <label for="nama_orang_tua">Nama Orang tua</label>
                                        <input type="text" class="form-control" placeholder="Contoh : Sumiati" name="nama_orang_tua" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class = "col-md-6">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                        <option value="Laki-Laki">Laki - Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                        </select>
                                        </div>
                                        <div class = "col-md-6">
                                        <label for="telepone_orang_tua">Nomer Telepphone Orang tua</label>
                                        <input type="text" class="form-control" placeholder="Contoh : 081281828181" name="telepone_orang_tua" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class = "col-md-6">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tanggal_lahir" required>
                                        </div>
                                        

                                        <div class = "col-md-6">
                                        <label for="jurusan_yangdiambil">Jurusan Yang Diambil</label>
                                        <select name="jurusan_yangdiambil" id="jurusan_yangdiambil" class="form-control" required>
                                        <option value="Usaha Perjalanan Wisata">Usaha Perjalanan Wisata</option>
                                        <option value="Kuliner/Tata Boga">Kuliner/TataBoga</option>
                                        <option value="Perhotelan">Perhotelan</option>
                                        </select>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class = "col-md-6">
                                        <label for="agama">Agama</label>
                                        <select name="agama" id="agama" class="form-control" required>
                                        <option value="Islam">Islam</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Protestan">Protestan</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Konghuchu">Konghuchu</option>
                                        </select>
                                        </div>
                                        <div class = "col-md-6">
                                        <label for="nama_sekolah">Asal Sekolah</label>
                                        <input type="text" class="form-control" placeholder="Masukan Asal Sekolah" name="nama_sekolah" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class = "col-md-6">
                                        <label for="alamat">Alamat Lengkap </label>
                                        <textarea placeholder="Jl.Pahlawan no 19 B kota Bandung Rt/Rw : 01/02 Kel, Sukamaju Kec,Cibeunying kulon" class="form-control" name="alamat" required rows="5"></textarea>
                                        </div>
                                        <div class = "col-md-6">
                                        <label for="alamat_sekolah">Alamat Sekolah</label>
                                        <textarea placeholder="Jl.Pahlawan no 19 B kota Bandung Rt/Rw : 01/02 Kel, Sukamaju Kec,Cibeunying kulon" class="form-control" name="alamat_sekolah" required rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class = "col-md-6">
                                        <label for="nomer_telepone">Nomer Handphone Siswa</label>
                                        <input type="text" class="form-control" placeholder="Contoh : 081281828181" name="nomer_telepone" required>
                                        </div>
                                        <div class = "col-md-6">
                                        <label for="rekomendasi">Rekomendasi / MGM</label>
                                        <input type="text" class="form-control" placeholder="Contoh : rekomendasi ibu yanti SMP Pasunda 5" name="rekomendasi" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class = "col-md-6">
                                        <label for="bukti_pendaftaran">File Bukti Pendaftaran</label>
                                        <input type="file" class="form-control"  name="bukti_pendaftaran" required>
                                        </div>
                                    
                                    </div>
                                     
                                   
                                    
                                   
                                   
                                    
                                    <!-- // end .form-group -->
                                    <button type="submit" class="btn btn-default btn-submit">SUBMIT</button>
                                    <div><?php echo $this->session->flashdata('msg');?></div>
                                    <!-- // end #js-contact-result -->
                                </form>
                            </div>
                        </div>
                </div>
           
        </div>
    </section>
    <!--//END  ABOUT IMAGE -->
    <!--============================= FOOTER =============================-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="foot-logo">
                        <a href="<?php echo site_url();?>">
                            <img src="<?php echo base_url().'theme/images/logo-white.png'?>" class="img-fluid" alt="footer_logo">
                        </a>
                        <p><?php echo date('Y');?> © copyright by <a href="http://mfikri.com" target="_blank">M Fikri</a>. <br>All rights reserved.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="sitemap">
                            <h3>Menu Utama</h3>
                            <ul>
                                <li><a href="<?php echo site_url();?>">Home</a></li>
                                <li><a href="<?php echo site_url('about');?>">About</a></li>
                                <li><a href="<?php echo site_url('artikel');?>">Blog </a></li>
                                <li><a href="<?php echo site_url('galeri');?>">Gallery</a></li>
                                <li><a href="<?php echo site_url('contact');?>">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                      <div class="sitemap">
                          <h3>Akademik</h3>
                          <ul>
                              <li><a href="<?php echo site_url('guru');?>">Guru</a></li>
                              <li><a href="<?php echo site_url('siswa');?>">Siswa </a></li>
                              <li><a href="<?php echo site_url('pengumuman');?>">Pengumuman</a></li>
                              <li><a href="<?php echo site_url('agenda');?>">Agenda</a></li>
                              <li><a href="<?php echo site_url('download');?>">Download</a></li>
                          </ul>
                      </div>
                    </div>
                    <div class="col-md-3">
                        <div class="address">
                            <h3>Hubungi Kami</h3>
                            <p><span>Alamat: </span> Padang, Sumatera Barat, INA. 11001</p>
                            <p>Email : info@mschool.com
                                <br> Phone : +91 555 668 986</p>
                                <ul class="footer-social-icons">
                                    <li><a href="#"><i class="fa fa-facebook fa-fb" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin fa-in" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter fa-tw" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!--//END FOOTER -->
            <!-- jQuery, Bootstrap JS. -->
            <script src="<?php echo base_url().'theme/js/jquery.min.js'?>"></script>
            <script src="<?php echo base_url().'theme/js/tether.min.js'?>"></script>
            <script src="<?php echo base_url().'theme/js/bootstrap.min.js'?>"></script>
            <script src="<?php echo base_url().'theme/js/owl.carousel.min.js'?>"></script>
            <script src="<?php echo base_url().'theme/js/validate.js'?>"></script>
            <script src="<?php echo base_url().'theme/js/tweetie.min.js'?>"></script>
            <!-- Subscribe / Contact-->
            <script src="<?php echo base_url().'theme/js/subscribe.js'?>"></script>
            <script src="<?php echo base_url().'theme/js/contact.js'?>"></script>
            <!-- Script JS -->
            <script src="<?php echo base_url().'theme/js/script.js'?>"></script>
        </body>

        </html>
