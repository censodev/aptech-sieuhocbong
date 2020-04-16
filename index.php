<?php
    session_start();

    require('../registry/formkey.php');

    if (!ini_get('date.timezone')) {
        date_default_timezone_set('GMT');
    }

    $formKey = new FormKey();

    if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
        require('../registry/registry.php');

        $reg = new AptechRegistry(array());
        $reg->registry($formKey);

        exit();
    }

    $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . strtok($_SERVER["REQUEST_URI"], '?');
    $version = '?v=' . time();

    // MODE
    // $mode = 'dev';
    $mode = 'prod';

    $ext = '';

    switch ($mode) {
        case 'prod': $ext = '.min'; break;
        case 'dev': $ext = ''; break;
    }

    $titlePage = 'Siêu học bổng - IT đánh bại Cô Vi';
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Hệ thống Đào tạo Lập trình viên Quốc tế Aptech tại Việt Nam hiện có 3 cơ sở chính thức tại 285 Đội Cấn & 54 Lê Thanh Nghị, Hà Nội; 212-214 Nguyễn Đình Chiểu, Tp. HCM">
    <meta name="author" content="vanhiep.ap@gmail.com">
    <link rel="shortcut icon" href="//aptechvietnam.com.vn/sites/all/themes/aptech_news_2/favicon.ico" />

    <title><?php echo $titlePage ?></title>
    
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="./dist/bootstrap/bootstrap.min.css">

    <!-- SWIPER -->
    <link rel="stylesheet" href="./dist/swiper.min.css">

    <!-- STYLE -->
    <link rel="stylesheet" href="dist/style<?php echo $ext ?>.css<?php echo $version; ?>" type="text/css" />

</head>

<body>
    <header id="header" class="bg-white navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/" target="_blank">
                <img src="./img/logo-min.png" class="mr-2" />
                <img src="./img/logo-second-min.png">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#siteNav" aria-controls="siteNav" aria-expanded="false">
                <span></span>
            </button>

            <div class="collapse navbar-collapse pt-3 pt-lg-0" id="siteNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active px-lg-3">
                        <a class="nav-link text-uppercase font-600 px-0 link-scroll text-center" href="#section-2">Tại sao chọn aptech</a>
                    </li>
                    <li class="nav-item px-lg-3">
                        <a class="nav-link text-uppercase font-600 px-0 link-scroll text-center" href="#section-4">Chương trình quốc tế</a>
                    </li>
                    <li class="nav-item pl-lg-3 pr-lg-0">
                        <div class="d-flex flex-nowrap justify-content-center py-3 py-lg-0">
                            <a class="nav-link p-0 nav-link-social mr-3" target="_blank" href="https://www.facebook.com/aptechvietnam.com.vn/">
                                <img src="./img/icon-fb-min.png" />
                            </a>
                            <a class="nav-link p-0 nav-link-social mr-3" target="_blank" href="https://www.youtube.com/user/aprotrainaptechvn">
                                <img src="./img/icon-youtube-min.png" />
                            </a>
                            <a class="btn btn-danger text-uppercase rounded px-4 link-scroll font-600" href="#form_1">Đăng ký</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <section id="section-banner" class="page-section">
        <img class="pc-banner" src="img/banner-pc-sieuhocbong-min.webp">
    </section>

    <section id="section-1" class="page-section">
        <div class="container">
            <h2 class="section-heading text-center" >Thời đại 4.0 - Thời đại của ngành lập trình</h2>
            <div class="row mb-4" >
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h5 class="font-weight-bold">Nhu cầu tuyển dụng ngành CNTT<br />tăng rất nhanh</h5>
                    <img src="./img/img-chart-min.png" class="img-chart mw-100 lazy" />
                </div>
                <div class="col-lg-6">
                    <h5 class="font-weight-bold text-center text-lg-left">
                        Mức lương trung bình theo cấp bậc
                    </h5>
                    <p class="mb-5 text-center text-lg-left">
                        Mức lương của dân Công nghệ luôn xếp trong Top những ngành có mức lương cao tại Việt Nam *
                    </p>
                    <div class="row mb-lg-4">
                        <div class="col-lg-6 mb-4 mb-lg-0 col-chart text-center text-lg-left">
                            <h5 class="font-weight-bold chart-money d-none d-lg-block">$802</h5>
                            <div class="d-inline-block d-lg-block mx-auto mx-lg-0">
                                <div class="media align-items-center">
                                    <div id="circleChart1" class="chart"></div>
                                    <div class="media-body small text-left">
                                        <h5 class="font-weight-bold chart-money d-block d-lg-none">$802</h5>
                                        <strong>Dưới 2 năm làm việc</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4 mb-lg-0 col-chart text-center text-lg-left">
                            <h5 class="font-weight-bold chart-money d-none d-lg-block">$1.160</h5>
                            <div class="d-inline-block d-lg-block mx-auto mx-lg-0">
                                <div class="media align-items-center">
                                    <div id="circleChart2" class="chart"></div>
                                    <div class="media-body small text-left">
                                        <h5 class="font-weight-bold chart-money d-block d-lg-none">$1.160</h5>
                                        <strong>Trên 2 năm làm việc</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-4 mb-lg-0 col-chart text-center text-lg-left">
                            <h5 class="font-weight-bold chart-money d-none d-lg-block">$1.840</h5>
                            <div class="d-inline-block d-lg-block mx-auto mx-lg-0">
                                <div class="media align-items-center">
                                    <div id="circleChart3" class="chart"></div>
                                    <div class="media-body small text-left">
                                        <h5 class="font-weight-bold chart-money d-block d-lg-none">$1.840</h5>
                                        <strong>Trên 5 năm làm việc</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4 mb-lg-0 col-chart text-center text-lg-left">
                            <h5 class="font-weight-bold chart-money d-none d-lg-block">$2.929</h5>
                            <div class="d-inline-block d-lg-block mx-auto mx-lg-0">
                                <div class="media align-items-center">
                                    <div id="circleChart4" class="chart"></div>
                                    <div class="media-body small text-left">
                                        <h5 class="font-weight-bold chart-money d-block d-lg-none">$2.929</h5>
                                        <strong>Trên 10 năm làm việc</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="font-italic text-center mb-0">
                * Báo cáo của TopDev và TopITworks
            </p>
        </div>
    </section>

    <section id="section-2" class="page-section">
        <div class="container">
            <h2 class="section-heading text-center" >
                Aptech Việt Nam – 20 Năm Tiên Phong Lập Trình
            </h2>
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0" >
                    <p class="font-weight-bold mb-4">
                        APTECH là tập đoàn đào tạo Lập trình viên của Ấn Độ
                    </p>
                    <div class="row mb-5 no-gutters icons-list">
                        <div class="col-6 col-lg-3 px-2 mb-3 mb-lg-0">
                            <div class="text-center px-2">
                                <img src="./img/icon-1-min.png" class="mb-3" />
                                <h5 class="font-weight-bold text-danger mb-0">31 năm</h5>
                                <p class="font-weight-bold">kinh nghiệm</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 px-2 mb-3 mb-lg-0">
                            <div class="text-center">
                                <img src="./img/icon-2-min.png" class="mb-3" />
                                <h5 class="font-weight-bold text-danger mb-0">1350</h5>
                                <p class="font-weight-bold">cơ sở đào tạo</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 px-2 mb-3 mb-lg-0">
                            <div class="text-center">
                                <img src="./img/icon-3-min.png" class="mb-3" />
                                <h5 class="font-weight-bold text-danger mb-0">40</h5>
                                <p class="font-weight-bold">quốc gia</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 px-2 mb-3 mb-lg-0">
                            <div class="text-center">
                                <img src="./img/icon-4-min.png" class="mb-3" />
                                <h5 class="font-weight-bold text-danger mb-0">6.5 triệu</h5>
                                <p class="font-weight-bold">sinh viên</p>
                            </div>
                        </div>
                    </div>
                    <p class="text-justify">
                        APTECH được trao nhiều giải thưởng uy tín: giải The Global Growth Company Award của Diễn đàn Kinh tế Thế giới, xếp trong danh sách Top 300 đơn vị có tốc độ tăng trưởng và hiệu quả hoạt động tốt nhất do tạp chí FORBES bình chọn, đạt danh hiệu Đơn vị đào tạo Công nghệ Thông tin (CNTT) số 1 tại các nước có nền CNTT phát triển trong nhiều năm liên tiếp...
                    </p>
                </div>
                <div class="col-lg-6"  data-aos-delay="50">
                    <div class="box-video">
                        <iframe name="ytFrame" src="" frameborder="0" allow="accelerometer;encrypted-media;gyroscope;picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="py-5 font-weight-bold text-center" >
                Có mặt tại Việt Nam từ năm 1999, qua các giải thưởng uy tín, Aptech khẳng định vị trí số 1 về đào tạo Lập trình.
            </div>
            <div class="row cup-list">
                <div class="col-lg-3 mb-4 mb-lg-0" >
                    <div class="bg-white border rounded p-3 text-center h-100">
                        <img src="./img/img-cup1-min.png" class="mw-100 mb-3 lazy" height="125" />
                        <h6 class="font-weight-bold text-uppercase">
                            CÚP TRƯỜNG ĐÀO TẠO CNTT SỐ 1 VIỆT NAM
                        </h6>
                        <p class="m-0">
                            Bộ Thông tin và<br />Truyền thông trao tặng
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 mb-4 mb-lg-0"  data-aos-delay="50">
                    <div class="bg-white border rounded p-3 text-center h-100">
                        <img src="./img/img-cup2-min.png" class="mw-100 mb-3 lazy" height="125" />
                        <h6 class="font-weight-bold text-uppercase">
                            CÚP ĐƠN VỊ ĐÀO TẠO CNTT XUẤT SẮC NHẤT VIỆT NAM
                        </h6>
                        <p class="m-0">
                            trong 17 năm liên tiếp<br />Hội Tin học TP. HCM trao tặng
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 mb-4 mb-lg-0"  data-aos-delay="100">
                    <div class="bg-white border rounded p-3 text-center h-100">
                        <img src="./img/img-cup3-min.png" class="mw-100 mb-3 lazy" height="125" />
                        <h6 class="font-weight-bold text-uppercase">
                            CÚP ĐƠN VỊ ĐÀO TẠO NHÂN LỰC CNTT SỐ 1 VIỆT NAM
                        </h6>
                        <p class="m-0">
                            Hiệp hội Phần mềm<br />Việt Nam trao tặng
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 mb-4 mb-lg-0"  data-aos-delay="150">
                    <div class="bg-white border rounded p-3 text-center h-100">
                        <img src="./img/img-cup4-min.png" class="mw-100 mb-3 lazy" height="125" />
                        <h6 class="font-weight-bold text-uppercase">
                            CÚP TINH HOA<br />VIỆT NAM
                        </h6>
                        <p class="m-0">
                            Hiệp hội Doanh nghiệp<br />Việt Nam trao tặng
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="section-3" class="page-section">
        <div class="container">
            <h2 class="section-heading text-white text-center" >
                6 Lợi Thế Khi Học Tại Aptech Việt Nam
            </h2>
            <div class="row pt-5 text-white" >
                <div class="col-lg-6 mb-5 mb-lg-4">
                    <div class="media align-items-center mb-2">
                        <img src="./img/icon-5-min.png" class="mr-4" />
                        <div class="media-body">
                            <h5 class="font-weight-bold m-0">Song bằng Quốc tế</h5>
                        </div>
                    </div>
                    <p class="m-0 lh-26 text-justify">
                        Bằng Lập trình viên Quốc tế (ADSE - Advanced Diploma in Software Engineering) và bằng Cao đẳng Anh quốc (L5DC - Level 5 Diploma in Computing). Thăng tiến trong sự nghiệp CNTT tại Việt Nam, mở rộng cơ hội làm việc tại nước ngoài và du học năm cuối tại các trường Đại học trên thế giới.
                    </p>
                </div>
                <div class="col-lg-6 mb-5 mb-lg-4">
                    <div class="media align-items-center mb-2">
                        <img src="./img/icon-6-min.png" class="mr-4" />
                        <div class="media-body">
                            <h5 class="font-weight-bold m-0">Bảo hành công nghệ trọn đời</h5>
                        </div>
                    </div>
                    <p class="m-0 lh-26 text-justify">
                        Sau khi tốt nghiệp, học viên được trở lại Aptech để học miễn phí các công nghệ mới cập nhật trong chương trình đào tạo.
                    </p>
                </div>
                <div class="col-lg-6 mb-5 mb-lg-4">
                    <div class="media align-items-center mb-2">
                        <img src="./img/icon-7-min.png" class="mr-4" />
                        <div class="media-body">
                            <h5 class="font-weight-bold m-0">Chương trình đào tạo toàn diện</h5>
                        </div>
                    </div>
                    <p class="m-0 lh-26 text-justify">
                        Kiến thức nền tảng chuyên sâu để quản trị dự án theo chuẩn quốc tế. Cập nhật công nghệ mới liên tục để bắt kịp nhu cầu doanh nghiệp. Trang bị tiếng Anh chuyên ngành và kỹ năng mềm.
                    </p>
                </div>
                <div class="col-lg-6 mb-5 mb-lg-4">
                    <div class="media align-items-center mb-2">
                        <img src="./img/icon-8-min.png" class="mr-4" />
                        <div class="media-body">
                            <h5 class="font-weight-bold m-0">Phương pháp đào tạo tiên tiến</h5>
                        </div>
                    </div>
                    <p class="m-0 lh-26 text-justify">
                        70% thực hành, 04 dự án lớn giúp trải nghiệm làm việc thực tế. Sĩ số 24 bạn/ lớp theo chuẩn toàn cầu, tăng tương tác với giảng viên. Giờ học linh hoạt phù hợp với 03 ca học tự chọn: sáng, chiều, tối.
                    </p>
                </div>
                <div class="col-lg-6 mb-5 mb-lg-4">
                    <div class="media align-items-center mb-2">
                        <img src="./img/icon-9-min.png" class="mr-4" />
                        <div class="media-body">
                            <h5 class="font-weight-bold m-0">Hỗ trợ năng lực học tập</h5>
                        </div>
                    </div>
                    <p class="m-0 lh-26 text-justify">
                        Học viên được tham gia miễn phí các lớp học bù, ôn tập, hội thảo công nghệ, tham quan doanh nghiệp, cuộc thi chuyên ngành…
                    </p>
                </div>
                <div class="col-lg-6">
                    <div class="media align-items-center mb-2">
                        <img src="./img/icon-10-min.png" class="mr-4" />
                        <div class="media-body">
                            <h5 class="font-weight-bold m-0">Cam kết hỗ trợ việc làm</h5>
                        </div>
                    </div>
                    <p class="m-0 lh-26 text-justify">
                        Được hỗ trợ việc làm tại các doanh nghiệp CNTT theo đúng năng lực học viên, hoàn toàn miễn phí và được hỗ trợ nhiều lần.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="section-4" class="page-section pb-0" >
        <div class="container">
            <h2 class="section-heading text-center text-white">
                CHƯƠNG TRÌNH LẬP TRÌNH VIÊN QUỐC TẾ
            </h2>
            <nav>
                <div class="nav nav-tabs justify-content-center flex-nowrap" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-hk1-tab" data-toggle="tab" href="#nav-hk1" role="tab" aria-controls="nav-hk1" aria-selected="true">Học kỳ 1</a>
                    <a class="nav-item nav-link" id="nav-hk2-tab" data-toggle="tab" href="#nav-hk2" role="tab" aria-controls="nav-hk2" aria-selected="false">Học kỳ 2</a>
                    <a class="nav-item nav-link" id="nav-hk3-tab" data-toggle="tab" href="#nav-hk3" role="tab" aria-controls="nav-hk3" aria-selected="false">Học kỳ 3</a>
                    <a class="nav-item nav-link" id="nav-hk4-tab" data-toggle="tab" href="#nav-hk4" role="tab" aria-controls="nav-hk4" aria-selected="false">Học kỳ 4</a>
                </div>
            </nav>
        </div>
        <div class="bg-white">
            <div class="container py-5">
                <div class="tab-content mb-4" id="nav-hkContent">
                    <div class="tab-pane fade show active" id="nav-hk1" role="tabpanel" aria-labelledby="nav-hk1-tab">
                        <div class="row align-items-center">
                            <div class="col-lg-6 text-center">
                                <img src="./img/img-hk1-min.png" class="mw-100 lazy" />
                            </div>
                            <div class="col-lg-6">
                                <div class="media align-items-center mb-2">
                                    <img src="./img/check-min.png" height="16" class="mr-3" />
                                    <div class="media-body">Nền tảng lập trình</div>
                                </div>
                                <div class="media align-items-center mb-2">
                                    <img src="./img/check-min.png" height="16" class="mr-3" />
                                    <div class="media-body">Thiết kế và quản trị Website</div>
                                </div>
                                <div class="media align-items-center mb-2">
                                    <img src="./img/check-min.png" height="16" class="mr-3" />
                                    <div class="media-body">Quản trị cơ sở dữ liệu</div>
                                </div>
                                <div class="media align-items-center mb-4">
                                    <img src="./img/check-min.png" height="16" class="mr-3" />
                                    <div class="media-body">Đồ án cuối kỳ: Xây dựng Website</div>
                                </div>
                                <div class="d-inline-block py-2 px-3 border border-success rounded mb-4 font-weight-bold">
                                    Kết quả đạt được sau khi hoàn thành học kỳ
                                </div>
                                <p class="mb-4 text-justify">
                                    Sinh viên có khả năng thiết kế, xây dựng website và một số dạng ứng dụng trên thiết bị di động
                                </p>
                                <div class="text-center text-lg-left">
                                    <a class="btn btn-danger text-uppercase rounded link-scroll font-600 px-4 py-2" href="#form_1">Đăng ký</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-hk2" role="tabpanel" aria-labelledby="nav-hk2-tab">
                        <div class="row align-items-center">
                            <div class="col-lg-6 text-center">
                                <img src="./img/img-hk2-min.png" class="mw-100" />
                            </div>
                            <div class="col-lg-6">
                                <div class="media align-items-center mb-2">
                                    <img src="./img/check-min.png" height="16" class="mr-3" />
                                    <div class="media-body">Phát triển ứng dụng Java trên PC</div>
                                </div>
                                <div class="media align-items-center mb-2">
                                    <img src="./img/check-min.png" height="16" class="mr-3" />
                                    <div class="media-body">Giới thiệu Điện toán đám mây</div>
                                </div>
                                <div class="media align-items-center mb-2">
                                    <img src="./img/check-min.png" height="16" class="mr-3" />
                                    <div class="media-body">Nghiên cứu về công nghệ Big Data</div>
                                </div>
                                <div class="media align-items-center mb-4">
                                    <img src="./img/check-min.png" height="16" class="mr-3" />
                                    <div class="media-body">Đồ án cuối kỳ: Xây dựng ứng dụng trên PC, Website</div>
                                </div>
                                <div class="d-inline-block py-2 px-3 border border-success rounded mb-4 font-weight-bold">
                                    Kết quả đạt được sau khi hoàn thành học kỳ
                                </div>
                                <p class="mb-4 text-justify">
                                    Sinh viên có khả năng lập trình, phát triển các ứng dụng, phần mềm trên máy tính
                                </p>
                                <div class="text-center text-lg-left">
                                    <a class="btn btn-danger text-uppercase rounded link-scroll font-600 px-4 py-2" href="#form_1">Đăng ký</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-hk3" role="tabpanel" aria-labelledby="nav-hk3-tab">
                        <div class="row align-items-center">
                            <div class="col-lg-6 text-center">
                                <img src="./img/img-hk3-min.png" class="mw-100" />
                            </div>
                            <div class="col-lg-6">
                                <div class="media align-items-center mb-2">
                                    <img src="./img/check-min.png" height="16" class="mr-3" />
                                    <div class="media-body">Phát triển các ứng dụng từ PC đến Website</div>
                                </div>
                                <div class="media align-items-center mb-2">
                                    <img src="./img/check-min.png" height="16" class="mr-3" />
                                    <div class="media-body">Phát triển các ứng dụng trên Web Azure, lập trình Điện toán đám mây</div>
                                </div>
                                <div class="media align-items-center mb-2">
                                    <img src="./img/check-min.png" height="16" class="mr-3" />
                                    <div class="media-body">Đồ án cuối kỳ: Xây dựng Website thương mại điện tử</div>
                                </div>
                                <div class="d-inline-block py-2 px-3 border border-success rounded mb-4 font-weight-bold">
                                    Kết quả đạt được sau khi hoàn thành học kỳ
                                </div>
                                <p class="mb-4 text-justify">
                                    Sinh viên được trang bị những nền tảng công nghệ mới nhất của Microsoft, khả năng phát triển ứng dụng, phần mềm trên các nền tảng từ máy tính đến web, khả năng phát triển các ứng dụng trên nền tảng điện toán đám mây
                                </p>
                                <div class="text-center text-lg-left">
                                    <a class="btn btn-danger text-uppercase rounded link-scroll font-600 px-4 py-2" href="#form_1">Đăng ký</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-hk4" role="tabpanel" aria-labelledby="nav-hk4-tab">
                        <div class="row align-items-center">
                            <div class="col-lg-6 text-center">
                                <img src="./img/img-hk4-min.png" class="mw-100" />
                            </div>
                            <div class="col-lg-6">
                                <div class="media align-items-center mb-2">
                                    <img src="./img/check-min.png" height="16" class="mr-3" />
                                    <div class="media-body">Bảo mật trên Internet</div>
                                </div>
                                <div class="media align-items-center mb-2">
                                    <img src="./img/check-min.png" height="16" class="mr-3" />
                                    <div class="media-body">Phát triển ứng dụng doanh nghiệp trên nền tảng Java</div>
                                </div>
                                <div class="media align-items-center mb-2">
                                    <img src="./img/check-min.png" height="16" class="mr-3" />
                                    <div class="media-body">Phát triển chuyên sâu ứng dụng trên thiết bị di động Android</div>
                                </div>
                                <div class="media align-items-center mb-4">
                                    <img src="./img/check-min.png" height="16" class="mr-3" />
                                    <div class="media-body">Đồ án cuối kỳ: Xây dựng ứng dụng trên thiết bị di động</div>
                                </div>
                                <div class="d-inline-block py-2 px-3 border border-success rounded mb-4 font-weight-bold">
                                    Kết quả đạt được sau khi hoàn thành học kỳ
                                </div>
                                <p class="mb-4 text-justify">
                                    Hết năm thứ hai, sinh viên có khả năng phát triển trên các ứng dụng lớn, tính chất đa nền tảng toàn cầu cho doanh nghiệp, đặc biệt là các hệ thống Ngân hàng, Bảo hiểm, Siêu thị, … Khả năng phát triển chuyên sâu các ứng dụng nền tảng di động
                                </p>
                                <div class="text-center text-lg-left">
                                    <a class="btn btn-danger text-uppercase rounded link-scroll font-600 px-4 py-2" href="#form_1">Đăng ký</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center text-lg-left">
                    <a href="https://www.aptechvietnam.com.vn/san-pham-hoc-vien" target="_blank" class="font-weight-bold text-danger">
                        <img src="./img/icon-arrow-right-min.png" class="mr-2" />
                        Xem thêm Sản phẩm học viên
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="section-5" class="page-section">
        <div class="container">
            <h2 class="section-heading text-center text-white" >
                Cơ hội việc làm
            </h2>
            <div class="row text-white align-items-center hiring-row" >
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <p class="text-justify mb-4">
                        Sinh viên Aptech được tuyển dụng freelance, parttime ngay trong quá trình học và fulltime sau khi tốt nghiệp với mức lương khởi điểm trung bình từ <strong class="text-success">8.000.000 đ</strong> trở lên.
                    </p>
                    <div class="font-italic">
                        Xem chi tiết tại
                        <a href="https://www.facebook.com/groups/JobAptech" target="_blank" class="ml-2">
                            <img src="./img/img-job-min.png" height="30" />
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="./img/img-hiring-min.png" class="mw-100 img-hiring  lazy" />
                </div>
            </div>
            <h5 class="text-white text-center mb-4 font-600" >
                Đối tác tuyển dụng
            </h5>
            <div class="swiper-button-outside" >
                <div class="swiper-inner">
                    <div class="swiper-container swiper-multi">
                        <div class="swiper-wrapper">
                            <?php
                            foreach (range(1, 24) as $number) {
                                ?>
                                <div class="swiper-slide">
                                    <div class="slide-item">
                                        <img src="./img/company/<?php echo $number; ?>-min.png" class="lazy" />
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next swiper-button-white"></div>
                <div class="swiper-button-prev swiper-button-white"></div>
            </div>
        </div>
    </section>

    <section id="section-6" class="page-section bg-light" >
        <div class="container">
            <h2 class="section-heading text-center mb-4">
                Liên thông du học
            </h2>
            <p class="mb-5 px-lg-5 mx-lg-5 text-center lh-26">
                Sau khi tốt nghiệp, sinh viên Aptech nếu muốn, có thể học chuyển tiếp năm cuối tại các trường Đại học ở Anh, Úc, Mỹ, Singapore… với chi phí tiết kiệm đáng kể so với việc du học ngay từ khi tốt nghiệp THPT.
            </p>
            <div class="swiper-button-outside">
                <div class="swiper-inner">
                    <div class="swiper-container swiper-multi">
                        <div class="swiper-wrapper">
                            <?php
                            foreach (range(1, 24) as $number) {
                                ?>
                                <div class="swiper-slide">
                                    <div class="slide-item">
                                        <img src="./img/school/<?php echo $number; ?>-min.png" />
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next swiper-button-white"></div>
                <div class="swiper-button-prev swiper-button-white"></div>
            </div>
        </div>
    </section>

    <section id="section-7" class="page-section">
        <div class="container">
            <h2 class="section-heading text-center text-white" >
                Aptech – trí lực song hành thể lực
            </h2>
            <div class="row text-white align-items-center" >
                <div class="col-lg-7 mb-4 mb-lg-0">
                    <img src="./img/img-ngoaikhoa-min.png" class="mw-100 lazy" />
                </div>
                <div class="col-lg-5">
                    <p class="text-justify lh-30 text-white mb-5">
                        Aptech tổ chức định kỳ hàng năm các hoạt động ngoại khóa thú vị giúp sinh viên tăng cường kỹ năng giao tiếp và đội nhóm như: thiện nguyện đầu xuân, du hè, Halloween, noel, thể thao, cuộc thi Lập trình…
                    </p>
                    <div class="d-flex flex-nowrap align-items-center">
                        <a href="https://www.aptechvietnam.com.vn/hoat-dong-ngoai-khoa " target="_blank" class="font-600 text-white">
                            <img src="./img/icon-arrow-right-min.png" class="mr-2 icon-arrow" />Hoạt động ngoại khóa
                        </a>
                        <a class="btn btn-danger text-uppercase rounded ml-3 link-scroll font-600" href="#form_1">Đăng ký</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="section-8" class="page-section" >
        <div class="container">
            <h2 class="section-heading text-center">
                Cảm nhận của sinh viên về Aptech
            </h2>
            <div class="swiper-button-outside mb-5 swiper-sinhvien">
                <div class="swiper-container swiper-double">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="sv-item">
                                <div class="item-inner d-flex flex-wrap">
                                    <div class="clearfix mb-3 w-100">
                                        <div class="avatar mb-4 mb-lg-0">
                                            <img src="./img/sinhvien/1-min.png" class="lazy" />
                                        </div>
                                        <h5 class="name text-center text-lg-left">Nguyễn Trung Nghĩa</h5>
                                        <p class="font-italic text-center text-lg-left">Gương mặt tiêu biểu Aptech 2018</p>
                                    </div>
                                    <div class="text-justify lh-30 font-italic mb-4">
                                        “Aptech là một nơi đặc biệt với những đứa trẻ thích gõ code hơn ngồi đọc sách. Nơi mà những thử thách thực tế về lập trình, hay những kinh nghiệm cần thiết ở doanh nghiệp không còn lạ lẫm với chúng em nữa. Khi nhắc đến Aptech, nhà tuyển dụng không còn lo lắng vấn đề thiếu kinh nghiệm làm việc thự`tế của ứng viên – vốn vẫn luôn là vấn đề chung của sinh viên mới ra trường.”
                                    </div>
                                    <a href="https://aptechvietnam.com.vn/BAI-DIEN-VAN-CHAM-VAO-TRAI-TIM-MOI-NGUOI" target="_blank" class="font-600 text-danger readmore">
                                        Xem thêm<img src="./img/icon-arrow-right-min.png" class="ml-2" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="sv-item">
                                <div class="item-inner item-inner d-flex flex-wrap align-items-start">
                                    <div class="clearfix mb-3 w-100">
                                        <div class="avatar mb-4 mb-lg-0">
                                            <img src="./img/sinhvien/2-min.png" class="lazy" />
                                        </div>
                                        <h5 class="name text-center text-lg-left">Lê Thị Sơn Ca</h5>
                                        <p class="font-italic text-center text-lg-left">Thủ khoa Aptech 2018</p>
                                    </div>
                                    <div class="text-justify lh-30 font-italic mb-4">
                                        “Thế mạnh của mình là về tư duy logic và tìm hiểu về công nghệ. Và mình cũng muốn được làm việc trong một ngành giúp mình có thể hiểu được thế giới đang phát triển theo những xu hướng nào. Đó là 2 nguyên nhân chính khiến mình quyết định theo đuổi CNTT và Aptech chính là cái tên đầu tiên mà mình lựa chọn.”
                                    </div>
                                    <a href="https://aptechvietnam.com.vn/HANH-TRINH-THEO-DUOI-DAM-ME-CUA-NU-THU-KHOA-APTECH" target="_blank" class="font-600 text-danger readmore">
                                        Xem thêm<img src="./img/icon-arrow-right-min.png" class="ml-2" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="sv-item">
                                <div class="item-inner item-inner d-flex flex-wrap align-items-start">
                                    <div class="clearfix mb-3 w-100">
                                        <div class="avatar mb-4 mb-lg-0">
                                            <img src="./img/sinhvien/5.jpg" class="lazy" />
                                        </div>
                                        <h5 class="name text-center text-lg-left">Nguyễn Hữu Quang</h5>
                                        <p class="font-italic text-center text-lg-left">Sinh viên Aptech, Giám đốc điều hành EXE Corp</p>
                                    </div>
                                    <div class="text-justify lh-30 font-italic">
                                        “Khi học tại Aptech, mình được thực hành trực tiếp ngay sau lý thuyết nên nhờ đó ứng dụng được rất nhanh những kiến thức đã học. Có thể nói quá trình học tại đây đã hỗ trợ mình rất nhiều cho những thành tựu ngày hôm nay”
                                    </div>
                                    <a href="https://aptechvietnam.com.vn/nguyen-huu-quang" target="_blank" class="font-600 text-danger readmore">
                                        Xem thêm<img src="./img/icon-arrow-right-min.png" class="ml-2" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="sv-item">
                                <div class="item-inner item-inner d-flex flex-wrap align-items-start">
                                    <div class="clearfix mb-3 w-100">
                                        <div class="avatar mb-4 mb-lg-0">
                                            <img src="./img/sinhvien/6.jpg" class="lazy" />
                                        </div>
                                        <h5 class="name text-center text-lg-left">Nguyễn Lương Bằng</h5>
                                        <p class="font-italic text-center text-lg-left">Sinh viên Aptech, cha đẻ Freaking Math & Wifi Chùa</p>
                                    </div>
                                    <div class="text-justify lh-30 font-italic">
                                        “Mình rất may mắn khi được học tại Aptech. Tại đây, mình được gặp bạn cùng đam mê, gặp thầy hướng dẫn nhiệt tình. Nếu không có những tháng ngày học tại Aptech, có lẽ mình đã không có được thành công hôm nay”
                                    </div>
                                    <a href="https://aptechvietnam.com.vn/nguyen-luong-bang-0" target="_blank" class="font-600 text-danger readmore">
                                        Xem thêm<img src="./img/icon-arrow-right-min.png" class="ml-2" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="sv-item">
                                <div class="item-inner item-inner d-flex flex-wrap align-items-start">
                                    <div class="clearfix mb-3 w-100">
                                        <div class="avatar mb-4 mb-lg-0">
                                            <img src="./img/sinhvien/4-min.png" class="lazy" />
                                        </div>
                                        <h5 class="name text-center text-lg-left">Ngô Thị Thu Huyền</h5>
                                        <p class="font-italic text-center text-lg-left">Sinh viên Aptech, kỹ sư cầu nối của FPT Software 5 năm liền tại Nhật Bản</p>
                                    </div>
                                    <div class="text-justify lh-30 font-italic">
                                        “Khi học ở Aptech, mình được tham gia thực hiện các bài tập, dự án theo tiêu chuẩn thực tế cùng thầy và các chuyên gia. Những kiến thức mình học được ở Aptech rất thực tế, có thể áp dụng vào công việc ngay. Aptech đào tạo nền tảng, luôn cập nhật công nghệ mới nên khi đi phỏng vấn, việc mình học tại Aptech cũng là một thuận lợi.”
                                    </div>
                                    <a href="https://aptechvietnam.com.vn/ngo-thu-huyen-manh-ghep-xinh-dep-tren-ban-do-aptech" target="_blank" class="font-600 text-danger readmore">
                                        Xem thêm<img src="./img/icon-arrow-right-min.png" class="ml-2" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="sv-item">
                                <a class="item-inner item-inner d-flex flex-wrap align-items-start">
                                    <div class="clearfix mb-3 w-100">
                                        <div class="avatar mb-4 mb-lg-0">
                                            <img src="./img/sinhvien/3-min.png" class="lazy" />
                                        </div>
                                        <h5 class="name text-center text-lg-left">Cao Anh Quân</h5>
                                        <p class="font-italic text-center text-lg-left">Sinh viên Aptech – Giảng viên tổ hợp giáo dục ColorMe</p>
                                    </div>
                                    <div class="text-justify lh-30 font-italic">
                                        “Với những kiến thức được học tại Aptech cộng với kinh nghiệm thực tiễn từ các thầy, ý tưởng của mình đã rất nhanh chóng được hiện thực hóa. Chưa bao giờ mình thấy từng lời thầy giảng trên lớp, những lần thầy chỉ ra chỗ code sai lại hữu dụng đến vậy”
                                    </div>
                                    <a href="https://aptechvietnam.com.vn/cao-anh-quan" target="_blank" class="font-600 text-danger readmore">
                                        Xem thêm<img src="./img/icon-arrow-right-min.png" class="ml-2" />
                                    </a>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next swiper-button-white"></div>
                <div class="swiper-button-prev swiper-button-white"></div>
            </div>

            <br />
            <h2 class="section-heading text-center pt-5">
                Aptech dưới góc nhìn báo chí
            </h2>
            <div class="swiper-button-outside swiper-baochi">
                <div class="swiper-container swiper-double">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="baochi-item">
                                <div class="logo px-4 py-3">
                                    <img src="./img/baochi/1-min.png" height="28" />
                                </div>
                                <div class="p-4 item-content position-relative">
                                    <div class="text-justify lh-30">
                                        “Giữa thị trường nhân lực ngành CNTT vô cùng khan hiếm, chương trình đào tạo của APTECH với chất lượng ổn định là điểm sáng quan trọng, giúp các bạn trẻ có được lựa chọn tốt khi theo học ngành CNTT.”
                                    </div>
                                    <a href="https://aptechvietnam.com.vn/Aptech-nhan-Cup-Vang-Don-vi-Dao-tao-CNTT-hang-dau-2018" target="_blank" class="font-600 text-danger readmore">
                                        Xem thêm<img src="./img/icon-arrow-right-min.png" class="ml-2" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="baochi-item">
                                <div class="logo px-4 py-3">
                                    <img src="./img/baochi/2-min.png" height="28" />
                                </div>
                                <div class="p-4 item-content position-relative">
                                    <div class="text-justify lh-30">
                                        “Với chương trình học chú trọng thực tiễn, Aptech trở thành bệ phóng giúp các bạn sinh viên thỏa mãn đam mê, rèn kỹ năng và tạo ra các sản phẩm của riêng mình.”
                                    </div>
                                    <a href="https://aptechvietnam.com.vn/Nganh-CNTT-va-nhung-noi-oan-kho-giai" target="_blank" class="font-600 text-danger readmore">
                                        Xem thêm<img src="./img/icon-arrow-right-min.png" class="ml-2" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="baochi-item">
                                <div class="logo px-4 py-3">
                                    <img src="./img/baochi/kenh_14-min.png" height="28" />
                                </div>
                                <div class="p-4 item-content position-relative">
                                    <div class="text-justify lh-30">
                                        “Ngoài việc giúp người học “nhúng mình trong môi trường doanh nghiệp thực tiễn, Aptech còn tạo cơ hội để các bạn sinh viên, học sinh THPT có thêm lựa chọn mới như đi du học nước ngoài và nhận 2 bằng CNTT giá trị toàn cầu”
                                    </div>
                                    <a href="https://aptechvietnam.com.vn/Hoc-song-bang-quoc-te-Loi-the-vuon-cao-cho-sinh-vien-CNTT" target="_blank" class="font-600 text-danger readmore">
                                        Xem thêm<img src="./img/icon-arrow-right-min.png" class="ml-2" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="baochi-item">
                                <div class="logo px-4 py-3">
                                    <img src="./img/baochi/24h-min.png" height="28" />
                                </div>
                                <div class="p-4 item-content position-relative">
                                    <div class="text-justify lh-30">
                                        “Hai thập kỷ hoạt động tại Việt Nam là 20 năm Aptech liên tục thay đổi đế mang đến những kiến thức cập nhật, đón đầu xu hướng công nghệ, tăng cường năng lực cho nhân sự CNTT”
                                    </div>
                                    <a href="https://aptechvietnam.com.vn/Aptech-dot-pha%3A-Hoc-hai-nam-nhan-hai-bang-lap-trinh-quoc-te" target="_blank" class="font-600 text-danger readmore">
                                        Xem thêm<img src="./img/icon-arrow-right-min.png" class="ml-2" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next swiper-button-white"></div>
                <div class="swiper-button-prev swiper-button-white"></div>
            </div>
        </div>
    </section>

    <section id="section-9" class="page-section py-5" >
        <div class="container">
            <div class="row align-items-start">
                <div class="col-lg-7">
                    <h3 class="section-heading text-white text-center text-lg-left mb-0">
                        Siêu học bổng IT đánh bại Cô Vi
                    </h3>
                    <div class="panel lazy d-flex flex-wrap panel-1">
                        <img src="./img/img-quatang-2-min.png?v1" class="mw-100 mb-lg-0" />
                        <div class="d-flex flex-column justify-content-center">
                            <p class="text-white">Khi nhập học trước</p>
                            <p class="text-white"><b>20/04/2020</b></p>
                            <br>
                            <p class="text-white">Chú ý: Áp dụng cho</p>
                            <ul class="pl-3">
                                <li class="yellow text-white"><b>Khai giảng đợt 1: 04/2020</b></li>
                                <li class="yellow text-white"><b>Khai giảng đợt 2: 09/2020</b></li>
                            </ul>
                        </div>
                        <div>
                            <p class="text-white">Dịch Cô Vi đang hoành hành khắp thế giới, mọi người lùi lại phía sau nhưng Công nghệ 4.0 đang kết nối thế giới với nhau. Chính những anh hùng IT đang giải cứu thế giới thoát khỏi sự sợ hãi để sẵn sàng chuyển sang phong cách sống mới. Để chắp thêm đôi cánh cho những chiến binh đang sôi sục tham gia cộng đồng IT, cùng giải cứu thế giới, lần đầu tiên trong lịch sử 30 năm, Tập đoàn Aptech đã lập Quỹ hỗ trợ Siêu Học bổng "IT đánh bại Cô Vi" để giúp hàng trăm nghìn bạn trẻ thế giới thực hiện được ước mơ thành chiến binh công nghệ.</p>
                        </div>
                        <div class="d-flex align-items-center p-2 btn btn-to-detail mb-4">
                            <div class="white-circle">
                                <img src="./img/arrow-next.png" alt="">
                            </div>
                            <div class="text-white pl-3"><i>Chi tiết Siêu Học bổng</i></div>
                        </div>
                    </div>
                    <div class="panel panel-2 lazy d-none flex-column text-white">
                        <h5 class="pt-3 text-bold">Gói Siêu Học bổng - IT đánh bại Cô Vi sẽ là công cụ giúp bạn trở thành người hùng.</h5>
                        <br>
                        <p>Tổng giá trị học bổng lên tới <span class="text-bold">42.000.000 VNĐ</span> bao gồm:</p>
                        <ul class="p-0">
                            <li class="pb-1">✔ Laptop thời thượng <span class="text-bold">Mac Air 13”</span>, 128GB trị giá <span class="text-bold">25.290.000 VNĐ</span></li>
                            <li class="pb-1">✔ Đồng hồ <span class="text-bold">Apple Watch</span> chính hãng VN/A.</li>
                            <li class="pb-1">✔ Điện thoại Iphone chính hãng VN/A.</li>
                            <li class="pb-1">✔ <span class="text-bold">60%</span> học bổng tiếng Anh Quốc tế với giảng viên nước ngoài trị giá <span class="text-bold">14.000.000 VNĐ.</span></li>
                            <li class="pb-1">✔ <span class="text-bold">100%</span> học bổng bộ kỹ năng mềm lãnh đạo bản thân trị giá <span class="text-bold">2.400.000 VNĐ.</span></li>
                            <li class="pb-1">✔ Ba lô và đồng phục Aptech thời trang.</li>
                        </ul>
                        <p>Đồng thời, học viên được hưởng chương trình “Tín dụng Giáo dục – Lãi suất <span class="text-bold">0%</span>” của các ngân hàng, chỉ cần đóng trước từ <span class="text-bold">793.000 VNĐ.</span></p>
                        <div class="d-flex align-items-center p-2 btn btn-backup mb-4">
                            <div class="white-circle">
                                <img src="./img/x-back.png" alt="">
                            </div>
                            <div class="text-white text-bold pl-3"><i>Đóng</i></div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-5">
                    <h3 class="section-heading text-center text-white">
                        Chất lượng Quốc tế<br>Học phí Việt Nam
                    </h3>
                    <form id="form_1" name="form_1" class="form-horizontal" method="POST" action="">
                        <input type="hidden" id="subject" name="subjectmail" value="Đăng ký Hỗ trợ Siêu học bổng - It đánh bại Cô Vi">
                        <input type="hidden" id="web_path" name="web_path" value="<?php echo $url; ?>">
                        <?php $formKey->outputKey(); ?>
                        <div class="form-group">
                            <input type="text" id="txtName" class="form-control w-100" name="name" placeholder="Họ tên" required />
                        </div>
                        <div class="form-group">
                            <input type="text" id="txtYear" class="form-control w-100" name="year" placeholder="Năm sinh" birthday required />
                        </div>
                        <div class="form-group">
                            <select id="slCenter" name="center" class="form-control" required>
                                <option selected value="">Chọn địa điểm học</option>
                                <option value=aptech1@aprotrain.com>Tòa nhà Aptech, 285 Đôi Cấn, Ba Đình, Hà Nội</option>
                                <option value=aptech3@aprotrain.com>Tòa nhà Aptech, 54 Lê Thanh Nghị, Hai Bà Trưng, Hà Nội</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" id="txtPhone" class="form-control w-100" name="phone" placeholder="Điện thoại" required phonenumber />
                        </div>
                        <div class="form-group">
                            <input type="email" id="txtEmail" class="form-control w-100" name="email" placeholder="Email" required />
                        </div>
                        <div class="mt-3 text-center">
                            <button type="submit" class="btn btn-danger text-uppercase text-white px-4">
                                Nhập thông tin học bổng
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-white text-md-left text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8 order-12 order-lg-1">
                    <h4 class="text-uppercase mb-3 footer-heading font-weight-bold">Hệ thống đào tạo lập trình viên quốc tế Aptech</h4>
                    <table border="0" class="w-100">
                        <tr>
                            <td class="font-weight-bold pr-3">Hà Nội:</td>
                            <td><strong>54 Lê Thanh Nghị</strong>, Q. Hai Bà Trưng</td>
                            <td class="font-weight-bold px-3">Tel: <a href="tel:1800 1141" class="text-whtie">1800 1141</a></td>
                            <td>Email: <a href="mailto:aptech1@aprotrain.com" target="_blank" class="text-white">aptech1@aprotrain.com</a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><strong>285 Đội Cấn</strong>, Q. Ba Đình</td>
                            <td class="font-weight-bold px-3">Tel: <a href="tel:1800 1147" class="text-whtie">1800 1147</a></td>
                            <td>Email: <a href="mailto:aptech3@aprotrain.com" target="_blank" class="text-white">aptech3@aprotrain.com</a></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold pr-3 pt-3" rowspan="2">TP.HCM:</td>
                            <td class="pt-0 pt-md-3"><strong>212 - 214 Nguyễn Đình Chiểu</strong>, P.6, Q.3</td>
                            <td class="font-weight-bold px-3 pt-0 pt-md-3">Tel: <a href="tel:1800 1779" class="text-whtie">1800 1779</a></td>
                            <td class="pt-0 pt-md-3">Email: <a href="mailto:aptech2@aprotrain.com" target="_blank" class="text-white">aptech2@aprotrain.com</a></td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-3 col-md-4 mb-4 mb-md-0 order-1 order-lg-12">
                    <a href="/" target="_blank" class="logo-footer text-center text-md-left">
                        <img src="img/logo-white-min.png" class="mw-100" />
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <div id="overlay"></div>
    <a href="#header" class="link-scroll btn-scroll-top">
        <img src="./img/icon-arrow-up-min.png" />
    </a>




    <!-- JQUERY + BOOTSTRAP -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script async src="./dist/bootstrap/util.min.js"></script>
    <script async src="./dist/bootstrap/tab.min.js"></script>
    <script async src="./dist/bootstrap/button.min.js"></script>
    <script async src="./dist/bootstrap/collapse.min.js"></script>
    
    <!-- SWEETALERT2 -->
    <script defer src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <!-- SWIPER -->
    <script defer src="./dist/swiper.min.js"></script>

    <!-- JQUERY FORM -->
    <script defer src="./dist/jquery-form.min.js"></script>

    <!-- JQUERY VALIDATE -->
    <script defer src="./dist/jquery-validation.min.js"></script>

    <!-- CIRCLE CHART -->
    <script src="./dist/circle-chart.min.js"></script>

    <!-- SCRIPT -->
    <script defer type="text/javascript" src="dist/script<?php echo $ext ?>.js<?php echo $version; ?>" async></script>
</body>

</html>