<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= 'Home &nbsp; | &nbsp;'.$sekolah->nama_sekolah?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="icon" href="<?= base_url('build/images/').$sekolah->logo ?>" type="image/ico" />
    <link rel="stylesheet" href="<?= base_url('build/landing/') ?>fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?= base_url('build/landing/') ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('build/landing/') ?>css/jquery-ui.css">
    <link rel="stylesheet" href="<?= base_url('build/landing/') ?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('build/landing/') ?>css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url('build/landing/') ?>css/owl.theme.default.min.css">

    
    <link href="<?= base_url() ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('build/landing/') ?>css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="<?= base_url('build/landing/') ?>css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="<?= base_url('build/landing/') ?>fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="<?= base_url('build/landing/') ?>css/aos.css">

    <link rel="stylesheet" href="<?= base_url('build/landing/') ?>css/style.css">

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

<a href="https://api.whatsapp.com/send?phone=6281271130255&text=Saya Berminat Aplikasi anda" 
  style="position: fixed; z-index:999; width: 70px; height: 70px; background-color: lightgreen; border-radius: 50%; padding: 18px; bottom: 20px; right: 20px;" 
  target="_blank">
  <span style="position: fixed; z-index: 1000; color: rgba(0,0,0,.8); font-weight:600;bottom: 50px; right: 100px; ">Saya Berminat Aplikasi anda</span>
    <i style="font-size: 35px; color: white" class="fa fa-whatsapp my-float"></i>
  </a>
  
    <div class="site-wrap">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>


        <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

            <div class="container-fluid">
                <div class="d-flex align-items-center">
                    <div class="site-logo mr-auto"><a href="index.html"><?= $sekolah->nama_sekolah ?></a></div>

                    <div class="mx-auto text-center">
                        <nav class="site-navigation position-relative text-right" role="navigation">
                            <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                                <li><a href="#home-section" class="nav-link">Home</a></li>
                                <li><a href="#courses-section" class="nav-link">Gelombang</a></li>
                                <li><a href="#programs-section" class="nav-link">Kelas</a></li>
                                <li><a href="#teachers-section" style="margin: 0 20px 0 0" class="nav-link">Alumni</a></li>
                                <a style="color: lightgreen;" href="<?= base_url('Dashboard/files') ?>">Files</a>
                            </ul>
                        </nav>
                    </div>

                    <div class="ml-auto w-25">
                        <nav class="site-navigation position-relative text-right" role="navigation">
                            <ul
                                class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                                <li class="cta"><a href="#contact-section" class="nav-link"><span>Hubungi
                                            Kami</span></a></li>
                            </ul>
                        </nav>
                        <a href="#"
                            class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span
                                class="icon-menu h3"></span></a>
                    </div>
                </div>
            </div>

        </header>

        <div class="intro-section" id="home-section">

            <div class="slide-1" style="background-image: url('<?= base_url('build/landing/') ?>images/hero_1.jpg');"
                data-stellar-background-ratio="0.5">
                <div class="container container-1">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="row align-items-center">
                                <div class="col-lg-12" style="text-align: center;">
                                    <h1 class="header_text">
                                        <?= $sekolah->nama_sekolah ?></h1>
                                    <p class="mb-4">
                                        Untuk peserta didik baru bisa mendaftar dibawah ini, atau jika sudah memiliki
                                        akun bisa langsung klik tombol login
                                    </p>
                                    <div class="btn-group">
                                        <p><a href="<?= base_url('auth') ?>" class="btn btn-primary"
                                                style="border-radius: 10px 0 0 10px;">Masuk</a></p>
                                        <p><a href="<?= base_url('auth/register') ?>" class="btn btn-success"
                                                style="border-radius: 0 10px 10px 0; color: white;">Daftar</a></p>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div class="site-section courses-title" id="courses-section">
            <div class="container">
                <div class="row mb-5 justify-content-center">
                    <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
                        <h2 class="section-title">Gelombang</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-section courses-entry-wrap" data-aos="fade-up" data-aos-delay="100">
            <div class="container">
                <div class="row">

                    <div class="owl-carousel col-12 nonloop-block-14">

                        <?php foreach($gelombang as $show_glb) { ?>
                        <div class="course bg-white h-100 align-self-stretch">
                            <figure class="m-0">
                                <a href="course-single.html"><img
                                        src="<?= base_url('build/landing/') ?>images/img_1.jpg" alt="Image"
                                        class="img-fluid"></a>
                            </figure>
                            <div class="course-inner-text py-4 px-4">
                                <span class="course-price"><?= 'Rp. '.number_format($show_glb->harga,0,'','.') ?></span>
                                <h3><a href="#"><?= $show_glb->nama ?></a></h3>
                                <p style="margin-bottom: 0">Mulai : <?= date('d F Y', strtotime($show_glb->mulai)) ?>
                                </p>
                                <p>Akhir : <?= date('d F Y', strtotime($show_glb->akhir)) ?></p>
                            </div>
                        </div>
                        <?php } ?>

                    </div>



                </div>
                <div class="row justify-content-center">
                    <div class="col-7 text-center">
                        <button class="customPrevBtn btn btn-primary m-1">Prev</button>
                        <button class="customNextBtn btn btn-primary m-1">Next</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="site-section" id="programs-section">
            <div class="container">
                <?php $i = 0;
                foreach($tipe_kelas as $show_kelas) { 
                    if($show_kelas->active == 1){ 
                        $i++;
                        if($i == 1){ ?>
                        <div class="row mb-5 justify-content-center">
                            <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
                                <h2 class="section-title">Kelas Kami</h2>
                                <p>Kelas yang kami sediakan dalam sekolah kami
                                </p>
                            </div>
                        </div>
                        <?php }  
                        if ($show_kelas->id == 1) { ?>
                        <div class="row mb-5 align-items-center">
                            <div class="col-lg-7 mb-5 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
                                <img src="<?= base_url('build/landing/') ?>images/undraw_teaching.svg" alt="Image"
                                    class="img-fluid">
                            </div>
                            <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
                                <h2 class="text-black mb-4"><?= $show_kelas->judul_kelas ?></h2>
                                <p class="mb-4"><?= $show_kelas->desc_singkat ?></p>

                                <div class="d-flex align-items-center custom-icon-wrap mb-3">
                                    <div>
                                        <h3 class="m-0"><?= $show_kelas->desc_lengkap ?></h3>
                                    </div>
                                </div>

                            </div>
                        </div>
                <?php } elseif ($show_kelas->id == 2) { ?>
                <div class="row mb-5 align-items-center">
                    <div class="col-lg-7 mb-5" data-aos="fade-up" data-aos-delay="100">
                        <img src="<?= base_url('build/landing/') ?>images/undraw_teacher.svg" alt="Image"
                            class="img-fluid">
                    </div>
                    <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
                        <h2 class="text-black mb-4"><?= $show_kelas->judul_kelas ?></h2>
                        <p class="mb-4"><?= $show_kelas->desc_singkat ?></p>

                        <div class="d-flex align-items-center custom-icon-wrap mb-3">
                            <div>
                                <h3 class="m-0"><?= $show_kelas->desc_lengkap ?></h3>
                            </div>
                        </div>

                    </div>
                </div>
                <?php }
                }} ?>
            </div>
        </div>

        <div class="site-section" id="teachers-section">
            <div class="container">

                <div class="row mb-5 justify-content-center">
                    <div class="col-lg-7 mb-5 text-center" data-aos="fade-up" data-aos-delay="">
                        <h2 class="section-title">Alumni Kami</h2>
                        <p class="mb-5">Kami memiliki lulusan yang terbaik, berikut berbagai lulusan dari sekolah kami.</p>
                    </div>
                </div>

                <div class="row">
                    <?php foreach($alumni as $show_alumni){ ?>
                    <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="teacher text-center">
                            <img src="<?= base_url('build/images/alumni/' . $show_alumni->image) ?>" alt="Image"
                                class="img-fluid w-50 rounded-circle mx-auto mb-4">
                            <div class="py-2">
                                <h3 class="text-black"><?= $show_alumni->nama ?></h3>
                                <p class="position"><?= $show_alumni->title ?></p>
                                <p><?= $show_alumni->desc ?></p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="site-section bg-image overlay" style="background-image: url('images/hero_1.jpg');">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-8 text-center testimony">
                        <img src="<?= base_url('build/images/alumni/' . $quotes->image) ?>" alt="Image"
                            class="img-fluid w-25 mb-4 rounded-circle">
                        <h3><?= $quotes->nama ?></h3>
                        <h5 class="mb-3"><?= $quotes->title ?></h5>
                        <blockquote>
                            <p><?= $quotes->desc ?></p>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-section pb-0">

            <div class="future-blobs">
                <div class="blob_2">
                    <img src="<?= base_url('build/landing/') ?>images/blob_2.svg" alt="Image">
                </div>
                <div class="blob_1">
                    <img src="<?= base_url('build/landing/') ?>images/blob_1.svg" alt="Image">
                </div>
            </div>
            <div class="container">
                <div class="row mb-5 justify-content-center" data-aos="fade-up" data-aos-delay="">
                    <div class="col-lg-7 text-center">
                        <h2 class="section-title">Kenapa Memilih Kami ?</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto align-self-start" data-aos="fade-up" data-aos-delay="100">

                        <div class="p-4 rounded bg-white why-choose-us-box">
                        <?php foreach($kelebihan as $show_kelebihan){ ?>
                            <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                                <div class="mr-3"><span class="custom-icon-inner"><span
                                            class="icon icon-check"></span></span>
                                </div>
                                <div>
                                    <h3 class="m-0"><?= $show_kelebihan->kelebihan ?></h3>
                                </div>
                            </div>
                        <?php } ?>
                        </div>


                    </div>
                    <div class="col-lg-7 align-self-end" data-aos="fade-left" data-aos-delay="200">
                        <img src="<?= base_url('build/landing/') ?>images/person_transparent.png" alt="Image"
                            class="img-fluid">
                    </div>
                </div>
            </div>
        </div>





        <div class="site-section bg-light" id="contact-section">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-md-7">



                        <h2 class="section-title mb-3">Hubungi Kami</h2>
                        <p class="mb-5">Hubungi kami di whatsapp untuk menanyakan hal yang ingin anda tahu tentang kami.
                        </p>

                        <form method="post" action="<?= base_url('dashboard/whatsapp') ?>" data-aos="fade"
                            target="_blank">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input required name="nama" type="text" class="form-control" placeholder="Nama">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea name="text" class="form-control" id="" cols="30" rows="10"
                                        placeholder="Write your message here."></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">

                                    <input type="submit" style="color: white;"
                                        class="btn btn-success py-3 px-5 btn-block btn-pill"
                                        value="Kirim Pesan Whatsapp">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>


        <footer class="footer-section bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h3>About OneSchool</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro consectetur ut hic ipsum et
                            veritatis
                            corrupti. Itaque eius soluta optio dolorum temporibus in, atque, quos fugit sunt sit quaerat
                            dicta.</p>
                    </div>

                    <div class="col-md-3 ml-auto">
                        <h3>Links</h3>
                        <ul class="list-unstyled footer-links">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Gelombang</a></li>
                            <li><a href="#">Kelas</a></li>
                            <li><a href="#">Alumni</a></li>
                        </ul>
                    </div>

                    <div class="col-md-4">
                        <h3>Subscribe</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt incidunt iure iusto
                            architecto?
                            Numquam, natus?</p>
                        <form action="#" class="footer-subscribe">
                            <div class="d-flex mb-5">
                                <input type="text" class="form-control rounded-0" placeholder="Email">
                                <input type="submit" class="btn btn-primary rounded-0" value="Subscribe">
                            </div>
                        </form>
                    </div>

                </div>

                <div class="row pt-5 mt-5 text-center">
                    <div class="col-md-12">
                        <div class="border-top pt-5">
                            <p>
                                Copyright &copy;
                                <script>
                                document.write(new Date().getFullYear());
                                </script> | dharma-system 
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </footer>



    </div> <!-- .site-wrap -->

    <script src="<?= base_url('build/landing/') ?>js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url('build/landing/') ?>js/jquery-migrate-3.0.1.min.js"></script>
    <script src="<?= base_url('build/landing/') ?>js/jquery-ui.js"></script>
    <script src="<?= base_url('build/landing/') ?>js/popper.min.js"></script>
    <script src="<?= base_url('build/landing/') ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('build/landing/') ?>js/owl.carousel.min.js"></script>
    <script src="<?= base_url('build/landing/') ?>js/jquery.stellar.min.js"></script>
    <script src="<?= base_url('build/landing/') ?>js/jquery.countdown.min.js"></script>
    <script src="<?= base_url('build/landing/') ?>js/bootstrap-datepicker.min.js"></script>
    <script src="<?= base_url('build/landing/') ?>js/jquery.easing.1.3.js"></script>
    <script src="<?= base_url('build/landing/') ?>js/aos.js"></script>
    <script src="<?= base_url('build/landing/') ?>js/jquery.fancybox.min.js"></script>
    <script src="<?= base_url('build/landing/') ?>js/jquery.sticky.js"></script>
    <script src="<?= base_url('build/landing/') ?>js/main.js"></script>

</body>

</html>