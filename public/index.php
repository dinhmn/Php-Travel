<?php
    session_start();
    error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <!-- Import CSS -->
    <link rel="stylesheet" href="../src/css/index.css" />
    <link rel="stylesheet" href="../src/css/search.css">
    <link rel="stylesheet" href="/src/css/vote-star.css">
    <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
    <link rel="stylesheet" href="../src/css/nghi-duong-phu-quoc.css">
    <link rel="stylesheet" href="../src/css/noi-tieng.css">
    <!-- Import Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <?php include("./nav.php"); ?>
            <section class="slides">
                <div class="slider">
                    <div class="slider-image">
                        <img src="https://images.unsplash.com/photo-1503457574462-bd27054394c1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                            alt="" />
                    </div>
                    <div class="slider-title">
                        <h1>Công ty mona travel</h1>
                        <h3>Chuyên tổ chức các tour du lịch trong nước</h3>
                        <small>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                            Similique nostrum eveniet fugit ad, omnis quasi repudiandae
                            blanditiis itaque veritatis repellat in ea tempore doloremque.
                            Corrupti sequi eveniet blanditiis? Quae, nulla.
                        </small>
                        <button type="button">Xem ngay</button>
                    </div>
                </div>
            </section>
            <!-- <section>
          <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'TimTour')">TÌM TOUR</button>
            <button class="tablinks" onclick="openCity(event, 'TimHotel')">TÌM HOTEL</button>
            <div id="TimTour" class="tabcontent">
              <div class="box-tour">
                <select name="Danhmuc" id="Danhmuc">
                  <option value="audi">Hảo đẹp trai</option>
                </select>
              </div>
              <div class="box-tour">
                <select name="Gia" id="Price">
                  <option value="audi">10000đ</option>
                </select>
              </div>
              <div class="box-tour">
                <select name="ngay" id="day">
                  <option value="audi">1</option>
                </select>
              </div>
              <div class="box-tour">
                <select name="khoihanh" id="adress-start">
                  <option value="audi">Cà Mau</option>
                </select>
              </div>
              <div class="box-tour-discount">
                <p>Giảm giá</p>
                <input type="checkbox" id="discount" value="Yes">
              </div>
            </div>
            <div id="TimHotel" class="tabcontent">
              <div class="box-tour">
                <select name="Danhmuc" id="Danhmuc">
                  <option value="audi">Hảo đẹp trai</option>
                </select>
              </div>
              <div class="box-tour">
                <select name="Gia" id="Price">
                  <option value="audi">10000đ</option>
                </select>
              </div>
              <div class="box-tour">
                <select name="ngay" id="day">
                  <option value="audi">1</option>
                </select>
              </div>
              <div class="box-tour">
                <select name="khoihanh" id="adress-start">
                  <option value="audi">Cà Mau</option>
                </select>
              </div>
              <div class="box-tour-discount">
                <p>Giảm giá</p>
                <input type="checkbox" id="discount" value="Yes">
              </div>
            </div>
          </div>
        </section> -->
            <section id="Tour-Hap-Dan">
                <h2>CÁC TOUR HẤP DẪN</h2>
                <p>Các tour du lịch hàng đầu được chú ý nhiều nhất.</p>
                <div class="element-tour">
                    <div class="box-element">
                        <h3>Sapa - Lào Cai</h3>
                        <div class="stars">
                            <form action="">
                                <input class="star star-1" id="star-1" type="radio" name="star" />
                                <label class="star star-1" for="star-1"></label>
                                <input class="star star-2" id="star-2" type="radio" name="star" />
                                <label class="star star-2" for="star-2"></label>
                                <input class="star star-3" id="star-3" type="radio" name="star" />
                                <label class="star star-3" for="star-3"></label>
                                <input class="star star-4" id="star-4" type="radio" name="star" />
                                <label class="star star-4" for="star-4"></label>
                                <input class="star star-5" id="star-5" type="radio" name="star" />
                                <label class="star star-5" for="star-5"></label>
                            </form>
                        </div>
                        <p>Giá tour : $500 </p>
                        <button>XEM NGAY</button>
                    </div>
                    <div class="box-element">
                        <h3>Sapa - Lào Cai</h3>
                        <div class="stars">
                            <form action="">
                                <input class="star star-1" id="star-1" type="radio" name="star" />
                                <label class="star star-1" for="star-1"></label>
                                <input class="star star-2" id="star-2" type="radio" name="star" />
                                <label class="star star-2" for="star-2"></label>
                                <input class="star star-3" id="star-3" type="radio" name="star" />
                                <label class="star star-3" for="star-3"></label>
                                <input class="star star-4" id="star-4" type="radio" name="star" />
                                <label class="star star-4" for="star-4"></label>
                                <input class="star star-5" id="star-5" type="radio" name="star" />
                                <label class="star star-5" for="star-5"></label>
                            </form>
                        </div>
                        <p>Giá tour : $500 </p>
                        <button>XEM NGAY</button>
                    </div>
                    <div class="box-element">
                        <h3>Sapa - Lào Cai</h3>
                        <div class="stars">
                            <form action="">
                                <input class="star star-1" id="star-1" type="radio" name="star" />
                                <label class="star star-1" for="star-1"></label>
                                <input class="star star-2" id="star-2" type="radio" name="star" />
                                <label class="star star-2" for="star-2"></label>
                                <input class="star star-3" id="star-3" type="radio" name="star" />
                                <label class="star star-3" for="star-3"></label>
                                <input class="star star-4" id="star-4" type="radio" name="star" />
                                <label class="star star-4" for="star-4"></label>
                                <input class="star star-5" id="star-5" type="radio" name="star" />
                                <label class="star star-5" for="star-5"></label>
                            </form>
                        </div>
                        <p>Giá tour : $500 </p>
                        <button>XEM NGAY</button>
                    </div>
                </div>
                <div class="element-tour">
                    <div class="box-element">
                        <h3>Sapa - Lào Cai</h3>
                        <div class="stars">
                            <form action="">
                                <input class="star star-1" id="star-1" type="radio" name="star" />
                                <label class="star star-1" for="star-1"></label>
                                <input class="star star-2" id="star-2" type="radio" name="star" />
                                <label class="star star-2" for="star-2"></label>
                                <input class="star star-3" id="star-3" type="radio" name="star" />
                                <label class="star star-3" for="star-3"></label>
                                <input class="star star-4" id="star-4" type="radio" name="star" />
                                <label class="star star-4" for="star-4"></label>
                                <input class="star star-5" id="star-5" type="radio" name="star" />
                                <label class="star star-5" for="star-5"></label>
                            </form>
                        </div>
                        <p>Giá tour : $500 </p>
                        <button>XEM NGAY</button>
                    </div>
                    <div class="box-element">
                        <h3>Sapa - Lào Cai</h3>
                        <div class="stars">
                            <form action="">
                                <input class="star star-1" id="star-1" type="radio" name="star" />
                                <label class="star star-1" for="star-1"></label>
                                <input class="star star-2" id="star-2" type="radio" name="star" />
                                <label class="star star-2" for="star-2"></label>
                                <input class="star star-3" id="star-3" type="radio" name="star" />
                                <label class="star star-3" for="star-3"></label>
                                <input class="star star-4" id="star-4" type="radio" name="star" />
                                <label class="star star-4" for="star-4"></label>
                                <input class="star star-5" id="star-5" type="radio" name="star" />
                                <label class="star star-5" for="star-5"></label>
                            </form>
                        </div>
                        <p>Giá tour : $500 </p>
                        <button>XEM NGAY</button>
                    </div>
                    <div class="box-element">
                        <h3>Sapa - Lào Cai</h3>
                        <div class="stars">
                            <form action="">
                                <input class="star star-1" id="star-1" type="radio" name="star" />
                                <label class="star star-1" for="star-1"></label>
                                <input class="star star-2" id="star-2" type="radio" name="star" />
                                <label class="star star-2" for="star-2"></label>
                                <input class="star star-3" id="star-3" type="radio" name="star" />
                                <label class="star star-3" for="star-3"></label>
                                <input class="star star-4" id="star-4" type="radio" name="star" />
                                <label class="star star-4" for="star-4"></label>
                                <input class="star star-5" id="star-5" type="radio" name="star" />
                                <label class="star star-5" for="star-5"></label>
                            </form>
                        </div>
                        <p>Giá tour : $500 </p>
                        <button>XEM NGAY</button>
                    </div>
                </div>
            </section>
            <section id="nghi-duong">
                <div class="content">
                    <h4>Giảm giá 30% </h4>
                    <div class="stars">
                        <form action="">
                            <input class="star star-1" id="star-1" type="radio" name="star" />
                            <label class="star star-1" for="star-1"></label>
                            <input class="star star-2" id="star-2" type="radio" name="star" />
                            <label class="star star-2" for="star-2"></label>
                            <input class="star star-3" id="star-3" type="radio" name="star" />
                            <label class="star star-3" for="star-3"></label>
                            <input class="star star-4" id="star-4" type="radio" name="star" />
                            <label class="star star-4" for="star-4"></label>
                            <input class="star star-5" id="star-5" type="radio" name="star" />
                            <label class="star star-5" for="star-5"></label>
                        </form>
                    </div>
                    <h2>NGHỈ DƯỠNG TẠI PHÚ QUỐC</h2>
                    <p>Từ 5/12 đến 30/12</p>
                    <button>XEM NGAY</button>
                </div>
            </section>
            <section id="tour-hut-khach">
                <div class="head">
                    <h2>NHỮNG TOUR HÚT KHÁCH</h2>
                    <p>Hảo đẹp trai siêu cấp vũ trụ vip pro best Aphelios và Jhin</p>
                </div>
                <div class="box-hut">
                    <div class="box-hut-element">
                        <div class="nd">
                            <h3>Sapa</h3>
                            <p>5 ngày 4 đêm</p>
                        </div>
                    </div>
                    <div class="box-hut-element">
                        <div class="nd">
                            <h3>Sapa</h3>
                            <p>5 ngày 4 đêm</p>
                        </div>
                    </div>
                    <div class="box-hut-element">
                        <div class="nd">
                            <h3>Sapa</h3>
                            <p>5 ngày 4 đêm</p>
                        </div>
                    </div>
                </div>
                <div class="box-hut">
                    <div class="box-hut-element">
                        <div class="nd">
                            <h3>Sapa</h3>
                            <p>5 ngày 4 đêm</p>
                        </div>
                    </div>
                    <div class="box-hut-element">
                        <div class="nd">
                            <h3>Sapa</h3>
                            <p>5 ngày 4 đêm</p>
                        </div>
                    </div>
                    <div class="box-hut-element">
                        <div class="nd">
                            <h3>Sapa</h3>
                            <p>5 ngày 4 đêm</p>
                        </div>
                    </div>
                </div>
                <div class="box-hut">
                    <div class="box-hut-element">
                        <div class="nd">
                            <h3>Sapa</h3>
                            <p>5 ngày 4 đêm</p>
                        </div>
                    </div>
                    <div class="box-hut-element">
                        <div class="nd">
                            <h3>Sapa</h3>
                            <p>5 ngày 4 đêm</p>
                        </div>
                    </div>
                    <div class="box-hut-element">
                        <div class="nd">
                            <h3>Sapa</h3>
                            <p>5 ngày 4 đêm</p>
                        </div>
                    </div>
                </div>
            </section>
            <section id="noi-tieng">
                <div class="head ">
                    <h2>NHỮNG ĐỊA ĐIỂM DU LỊCH NỔI TIẾNG</h2>
                    <p>Hảo đẹp trai siêu cấp vũ trụ vip pro best Aphelios và Jhin</p>
                </div>
                <div class="location">
                    <div class="location-element">
                        <div class="infor">
                            <div class="stars">
                                <form action="">
                                    <input class="star star-1" id="star-1" type="radio" name="star" />
                                    <label class="star star-1" for="star-1"></label>
                                    <input class="star star-2" id="star-2" type="radio" name="star" />
                                    <label class="star star-2" for="star-2"></label>
                                    <input class="star star-3" id="star-3" type="radio" name="star" />
                                    <label class="star star-3" for="star-3"></label>
                                    <input class="star star-4" id="star-4" type="radio" name="star" />
                                    <label class="star star-4" for="star-4"></label>
                                    <input class="star star-5" id="star-5" type="radio" name="star" />
                                    <label class="star star-5" for="star-5"></label>
                                </form>
                            </div>
                            <h2>BÀ NÀ HILLS</h2>
                            <h4>Đà Nẵng</h4>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                Similique nostrum eveniet fugit ad, omnis quasi repudiandae
                                blanditiis itaque veritatis repellat in ea tempore doloremque.
                                Corrupti sequi eveniet blanditiis? Quae, nulla.
                            </p>
                            <button>TÌM HIỂU</button>
                        </div>
                    </div>
                    <div class="location-element">
                        <div class="infor">
                            <div class="stars">
                                <form action="">
                                    <input class="star star-1" id="star-1" type="radio" name="star" />
                                    <label class="star star-1" for="star-1"></label>
                                    <input class="star star-2" id="star-2" type="radio" name="star" />
                                    <label class="star star-2" for="star-2"></label>
                                    <input class="star star-3" id="star-3" type="radio" name="star" />
                                    <label class="star star-3" for="star-3"></label>
                                    <input class="star star-4" id="star-4" type="radio" name="star" />
                                    <label class="star star-4" for="star-4"></label>
                                    <input class="star star-5" id="star-5" type="radio" name="star" />
                                    <label class="star star-5" for="star-5"></label>
                                </form>
                            </div>
                            <h2>BÀ NÀ HILLS</h2>
                            <h4>Đà Nẵng</h4>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                Similique nostrum eveniet fugit ad, omnis quasi repudiandae
                                blanditiis itaque veritatis repellat in ea tempore doloremque.
                                Corrupti sequi eveniet blanditiis? Quae, nulla.
                            </p>
                            <button>TÌM HIỂU</button>
                        </div>
                    </div>
                    <div class="location-element">
                        <div class="infor">
                            <div class="stars">
                                <form action="">
                                    <input class="star star-1" id="star-1" type="radio" name="star" />
                                    <label class="star star-1" for="star-1"></label>
                                    <input class="star star-2" id="star-2" type="radio" name="star" />
                                    <label class="star star-2" for="star-2"></label>
                                    <input class="star star-3" id="star-3" type="radio" name="star" />
                                    <label class="star star-3" for="star-3"></label>
                                    <input class="star star-4" id="star-4" type="radio" name="star" />
                                    <label class="star star-4" for="star-4"></label>
                                    <input class="star star-5" id="star-5" type="radio" name="star" />
                                    <label class="star star-5" for="star-5"></label>
                                </form>
                            </div>
                            <h2>BÀ NÀ HILLS</h2>
                            <h4>Đà Nẵng</h4>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                Similique nostrum eveniet fugit ad, omnis quasi repudiandae
                                blanditiis itaque veritatis repellat in ea tempore doloremque.
                                Corrupti sequi eveniet blanditiis? Quae, nulla.
                            </p>
                            <button>TÌM HIỂU</button>
                        </div>
                    </div>
                </div>
                <div class="head ">
                    <h2>CÁC THÀNH PHỐ DU LỊCH</h2>
                    <p>Hảo đẹp trai siêu cấp vũ trụ vip pro best Aphelios và Jhin</p>
                </div>
                <div class="body-du-lich ">
                    <div class="du-lich-left">
                        <div class="list-du-lich">
                            <div class="du-lich-elemet">
                                <div class="infor-list">
                                    <h3>Sapa</h3>
                                    <p>Giá: <span>300$</span> / người</p>
                                    <button>XEM NGAY</button>
                                </div>
                            </div>
                            <div class="du-lich-elemet">
                                <div class="infor-list">
                                    <h3>Sapa</h3>
                                    <p>Giá: <span>300$</span> / người</p>
                                    <button>XEM NGAY</button>
                                </div>
                            </div>
                        </div>
                        <div class="list-du-lich">
                            <div class="du-lich-elemet">
                                <div class="infor-list">
                                    <h3>Sapa</h3>
                                    <p>Giá: <span>300$</span> / người</p>
                                    <button>XEM NGAY</button>
                                </div>
                            </div>
                            <div class="du-lich-elemet">
                                <div class="infor-list">
                                    <h3>Sapa</h3>
                                    <p>Giá: <span>300$</span> / người</p>
                                    <button>XEM NGAY</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="du-lich-right">
                        <div class="infor-right">
                            <h2>Miền Bắc</h2>
                            <p>Du khách có thể đến và thưởng ngoạn các loài hoa
                                đầy sắc màu vào những ngày xuân thời tiết hơi se lạnh, hay
                                đắm chìm vào sắc vàng rực rỡ của những thửa ruộng bậc thang
                                đều thẳng tắp trong mùa thu, rồi thả mình vào những dòng sông dài tăm tắp trong ngày hè
                                oi bức.
                            </p>
                            <h4>Các thành phố</h4>
                            <ul>
                                <li>Hà Nội</li>
                                <li>Sa pa</li>
                                <li>Hạ Long</li>
                                <li>Điện biên</li>
                                <li>Quảng Bình</li>
                                <li>Thanh Hóa</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="body-du-lich">
                    <div class="du-lich-right">
                        <div class="infor-right">
                            <h2>Miền Nam</h2>
                            <p>Du lịch miền Tây Nam Bộ gắn liền với nhiều trải nghiệm
                                vô cùng hấp dẫn về miền sông nước, những vườn trái
                                cây trĩu quả, thiên nhiên xanh mát. Đây còn là địa phương
                                có nhiều văn hóa sinh hoạt độc đáo với những con người thân thiên,
                                giúp bạn hiểu thêm về các vùng miền trên khắp dải đất hình chữ S thân thương.
                            </p>
                            <h4>Các thành phố</h4>
                            <ul>
                                <li>Đà Lạt</li>
                                <li>Nha Trang</li>
                                <li>TP.HCM</li>
                                <li>Cần Thơ</li>
                                <li>Phú Quốc</li>
                                <li>Phan Thiết</li>
                            </ul>
                        </div>
                    </div>
                    <div class="du-lich-left">
                        <div class="list-du-lich">
                            <div class="du-lich-elemet">
                                <div class="infor-list">
                                    <h3>Sapa</h3>
                                    <p>Giá: <span>300$</span> / người</p>
                                    <button>XEM NGAY</button>
                                </div>
                            </div>
                            <div class="du-lich-elemet">
                                <div class="infor-list">
                                    <h3>Sapa</h3>
                                    <p>Giá: <span>300$</span> / người</p>
                                    <button>XEM NGAY</button>
                                </div>
                            </div>
                        </div>
                        <div class="list-du-lich">
                            <div class="du-lich-elemet">
                                <div class="infor-list">
                                    <h3>Sapa</h3>
                                    <p>Giá: <span>300$</span> / người</p>
                                    <button>XEM NGAY</button>
                                </div>
                            </div>
                            <div class="du-lich-elemet">
                                <div class="infor-list">
                                    <h3>Sapa</h3>
                                    <p>Giá: <span>300$</span> / người</p>
                                    <button>XEM NGAY</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <?php include("./footer.php") ?>
        </div>
    </div>
    <script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    </script>

</body>

</html>