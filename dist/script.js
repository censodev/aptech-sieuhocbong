$(document).ready(function () {
    window.HTMLGUN = {
        formValidate: function () {
            $.validator.setDefaults({
                errorElement: "span",
                submitHandler: function (form) {
                    $(form).find('[type="submit"]').attr('disabled', true);
                    form.submit();
                }
            });

            $.validator.addMethod("phonenumber", function (value) {
                return /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/.test(value);
            }, 'Số điện thoại không hợp lệ');

            $.validator.addMethod("birthday", function (value) {
                return /^(19[5-9]\d|20[0-4]\d|2050)$/.test(value);
            }, 'Năm sinh không hợp lệ');

            $('#form_1').each(function () {
                $(this).validate({
                    rules: {
                        tel: {
                            required: true,
                            phonenumber: true
                        }
                    },
                    messages: {
                        name: {
                            required: "Vui lòng nhập họ tên"
                        },
                        year: {
                            required: "Vui lòng nhập năm sinh"
                        },
                        email: {
                            required: "Vui lòng nhập địa chỉ email",
                            email: "Địa chỉ email không hợp lệ"
                        },
                        center: {
                            required: "Vui lòng chọn địa điểm học"
                        },
                        phone: {
                            required: "Vui lòng nhập số điện thoại"
                        }
                    },
                    submitHandler: function (form) {
                        $(form).ajaxSubmit({
                            beforeSubmit: function () {
                                $(form).find('.form-control').attr('disabled', true);
                                $(form).find(':submit').attr('disabled', true).html('Đang gửi...');

                                return true;
                            },
                            success: function (res) {
                                if (res && res.status && res.status == "success") {
                                    window.location.href = "./dang-ky-thanh-cong";
                                } else {
                                    var msg = "Có lỗi trong lúc gửi thông tin đăng ký. Vui lòng thử lại!";

                                    if (res && res.msg) {
                                        msg = res.msg
                                    }

                                    Swal.fire({
                                        type: 'error',
                                        title: 'Oops...',
                                        text: 'Lỗi đăng ký!',
                                        footer: '<center>' + msg + '</center>'
                                    })
                                }

                                $(form).find('.form-control').attr('disabled', false);
                                $(form).find(':submit').attr('disabled', false).html('Gửi đăng ký');
                            },
                            error: function (e) {
                                Swal.fire({
                                    type: 'error',
                                    title: 'Oops...',
                                    text: 'Lỗi đăng ký!',
                                    footer: '<center>Có lỗi trong lúc gửi thông tin đăng ký. Vui lòng thử lại!</center>'
                                })

                                $(form).find('.form-control').attr('disabled', false);
                                $(form).find(':submit').attr('disabled', false).html('Gửi đăng ký');
                            }
                        });
                    }
                })
            })
        },

        responsiveBanner: function () {

        },

        init: function () {
            var self = this;

            $('#siteNav .nav-link').on('click', function () {
                $('#siteNav').collapse('hide')
            });

            $('.swiper-multi').each(function () {
				var swiper = $(this);
                new Swiper(swiper, {
                    navigation: {
                        nextEl: swiper.parents('.swiper-button-outside').find('.swiper-button-next'),
                        prevEl: swiper.parents('.swiper-button-outside').find('.swiper-button-prev'),
                    },
                    slidesPerView: 6,
                    spaceBetween: 15,
                });
            });

            $('.swiper-double').each(function () {
                var swiper = $(this);
                new Swiper(swiper, {
                    navigation: {
                        nextEl: swiper.parents('.swiper-button-outside').find('.swiper-button-next'),
                        prevEl: swiper.parents('.swiper-button-outside').find('.swiper-button-prev'),
                    },
                    slidesPerView: 2,
                    spaceBetween: 30,
                    breakpoints: {
                        640: {
                            slidesPerView: 1,
                            spaceBetween: 20,
                        }
                    }
                });
            });

            $(window).scroll(function () {
                $('.btn-scroll-top').toggleClass('visible', $(this).scrollTop() > 100);
            });

            $(window).on('resize', self.responsiveBanner)
            self.responsiveBanner();

            this.formValidate();

            //init chart
            var listCharts = [
                { id: 'circleChart1', value: 7 },
                { id: 'circleChart2', value: 80 },
                { id: 'circleChart3', value: 12 },
                { id: 'circleChart4', value: 1 }
            ];

            listCharts.forEach(function (chart) {
                Circles.create({
                    id: chart.id,
                    radius: 45,
                    value: chart.value,
                    width: 15,
                    text: function (value) { return '<strong>' + value + '%</strong><span>Vị trí</span>'; },
                    colors: ['#0a475a', '#befb01'],
                    duration: 400,
                    wrpClass: 'circles-wrp',
                    textClass: 'circles-text d-flex align-items-center justify-content-center flex-column',
                    styleWrapper: true,
                    styleText: false
                });
            });
        }
    };

    window.HTMLGUN.init()
    
    window.frames['ytFrame'].window.location.replace('https://www.youtube.com/embed/I-VEiZqVohQ');
	
	document.querySelector('.btn-to-detail').addEventListener('click', e => {
		document.querySelector('.panel-1').classList.remove('d-flex')
		document.querySelector('.panel-1').classList.add('d-none')
		document.querySelector('.panel-2').classList.remove('d-none')
		document.querySelector('.panel-2').classList.add('d-flex')
	})
	document.querySelector('.btn-backup').addEventListener('click', e => {
		document.querySelector('.panel-2').classList.remove('d-flex')
		document.querySelector('.panel-2').classList.add('d-none')
		document.querySelector('.panel-1').classList.remove('d-none')
		document.querySelector('.panel-1').classList.add('d-flex')
	})
});