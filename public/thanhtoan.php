<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/index.css" />
    <link rel="stylesheet" href="../src/css/tour-du-lich.css">
    <link rel="stylesheet" href="../src/css/thanhtoan.css">
    <link rel="stylesheet" href="../src/css/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../src/css/hide.js">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <?php include("./nav.php"); ?>
            <section class="link ">
                <p>Thông tin chi tiết về tour du lịch</p>
            </section>
            <section class="product">
                <div class="product-image">
                    <img src="../src/images/dulich.jpg" alt="">
                </div>
                <div class="product-content">
                    <div class="rate">
                        <span>9</span>
                        <h4>Rất tốt</h4>
                    </div>
                    <div class="title">
                        Sapa - Bản Cát Cát - Fansipan - Ninh Bình - Tràng An - Bái Đính - Tuyệt Tịnh Cốc - Hạ Long - Đảo Titốp - Yên Tử 
                    </div>
                    <div class="entry">
                        <span>Khởi hành  <b>20/5/2022</b></span>
                        <span>Thời gian   <b>6 ngày</b></b></span>
                        <span>Nơi khởi hành   <b>TP. Hồ Chí Minh</b></span>
                        <span> Số chỗ còn nhận   <b>6</b></span>
                    </div>
                </div>
            </section>
                <section class="total">
                    <div class="col-md-8 col-12 left">
                        <h2>Tổng quan về chuyến đi</h2>
                        <h3>Thông tin liên lạc</h3>
                        <div class="customer-contact mb-3">
                            <form class="customer-contact-inner" action="#" method="get" id="form">
                                <div class="name">
                                    <label>Họ và Tên <b>*</b></label>
                                    <input class="form-control" id="contact_name" name="Fullname" type="text" value="">
                                </div>
                                <div class="mail">
                                    <label>Email <b>*</b></label>
                                    <input class="form-control" id="email" name="Email" type="text" value="">
                                </div>
                                <div class="phone">
                                    <label>Số điện thoại <b>*</b></label>
                                    <input class="form-control" id="mobilephone" name="Telephone" onkeypress="return funCheckInt(event)" type="text" value="">
                                </div>
                                <div class="addess">
                                    <label>Địa chỉ</label>
                                    <input class="form-control" id="address" name="Address" type="text" value="">
                                </div>
                            </form>
                        </div>
                        <div class="customer">
                            <h3>Hành khách</h3>
                            <div class="change">
                                <div class="change-title">
                                    <h4>Người lớn</h4>
                                    <p>&gt; 12 tuổi</p>
                                </div>
                                <div class="change-number">
                                    <span class="minus btn-click"><i onclick="Minus1()" class="fal ti-arrow-circle-down" aria-hidden="true" id="adultMinus"></i></span>
                                    <span class="number" id="adult">0</span>
                                    <span class="plus btn-click"><i onclick="Plus1()" class="fal ti-arrow-circle-up" aria-hidden="true" id="adultPlus"></i></span>
                                </div>
                            </div>
                            <div class="change">
                                <div class="change-title">
                                    <h4>Trẻ em</h4>
                                    <p>Từ 5 - 11 tuổi</p>
                                </div>
                                <div class="change-number">
                                    <span class="minus btn-click"><i onclick="Minus2()" class="fal ti-arrow-circle-down" id="childrenMinus"></i></span>
                                    <span class="number" id="children">0</span>
                                    <span class="plus btn-click"><i onclick="Plus2()"  class="fal ti-arrow-circle-up" id="childrenPlus"></i></span>
                                </div>
                            </div>
                            <div class="change">
                                <div class="change-title">
                                    <h4>Trẻ nhỏ</h4>
                                    <p>Từ 2 - 4 tuổi</p>
                                </div>
                                <div class="change-number">
                                    <span class="minus btn-click"><i  onclick="Minus3()" class="fal ti-arrow-circle-down" id="smallchildrenMinus"></i></span>
                                    <span class="number" id="smallchildren">0</span>
                                    <span class="plus btn-click"><i onclick="Plus3()" class="fal ti-arrow-circle-up" id="smallchildrenPlus"></i></span>
                                </div>
                            </div>
                            <div class="change">
                                <div class="change-title">
                                    <h4>Em bé</h4>
                                    <p>Từ 0 - 2 tuổi</p>
                                </div>
                                <div class="change-number">
                                    <span class="minus btn-click"><i onclick="Minus4()" class="fal ti-arrow-circle-down" id="babyMinus"></i></span>
                                    <span class="number" id="baby">0</span>
                                    <span class="plus btn-click"><i onclick="Plus4()" class="fal ti-arrow-circle-up" id="babyPlus"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="customer-notice">
                            <div class="customer-notice-left">
                            Người lớn sinh trước ngày <b>18/05/2010</b><br>
                            Trẻ nhỏ sinh từ <b>19/05/2017</b> đến <b>18/05/2020</b>
                            </div>
                            <div class="customer-notice-right">
                            Trẻ em sinh từ <b>19/05/2010</b> đến <b>18/05/2017</b><br>
                            Em bé sinh từ <b>19/05/2020</b> đến <b>20/05/2022</b>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="form-check checkbox-input-search d-inline-flex  align-items-center">
                                <input class="form-check-input me-3" type="radio" onclick="hide(1)" checked id="radListCus" name="flexCheckDefault">
                                <input type="hidden" value="Input" id="Option">
                                <label class="form-check-label mt-1 small" for="flexCheckDefault_Option1" style="margin-left: 10px;">
                                Nhập danh sách khách hàng
                                </label>
                            </div>
                            <div class="form-check checkbox-input-search d-inline-flex  align-items-center">
                                <input class="form-check-input me-3" type="radio" onclick="hide(0)" id="radSupport" name="flexCheckDefault">
                                <input type="hidden" value="NotInput" id="Option">
                                <div class="col-11">
                                    <label class="form-check-label mt-1 small" for="flexCheckDefault_Option1" style="margin-left: 10px;">
                                        Tôi cần được nhân viên tư vấn
                                        Vietravel trợ giúp nhập thông tin đăng ký dịch vụ
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div id="cus" class="detail-customer">
                            <div class="list">
                                <h3>Thông tin hành khách</h3>
                                <form class="customer-contact-inner-2" action="" method="get" id="formMember">
                                    <div class="b-persion block">
                                        <h4>Người lớn</h4>
                                        <div class="group-info" id="ListInfoAdult">
                                            <div class="group-info-name">
                                                <span>Họ tên</span>
                                                <input value="1" data-val="true" data-val-number="The field persontype must be a number." data-val-required="The persontype field is required." name="[0].persontype" type="hidden">
                                                <input class="form-control" name="[0].fullname" placeholder="Vui lòng nhập Họ tên" required="required" type="text" value="">
                                            </div>
                                            <div class="group-info-sex">
                                                <span>Giới tính</span>
                                                <select class="form-control" data-val="true" data-val-number="The field gender must be a number." data-val-required="The gender field is required." name="[0].gender" placeholder="Vui lòng chọn giới tính" required="required"><option selected="selected" value="-1">Giới tính</option>
                                                    <option value="0">Nữ</option>
                                                    <option value="1">Nam</option>
                                                </select>
                                            </div>
                                            <div class="group-info-birthday">
                                                <span>Ngày sinh</span>
                                                <select class="form-control" name="[0].day" placeholder="Vui lòng chọn ngày" required="required"><option value="">Ngày</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                    <option value="24">24</option>
                                                    <option value="25">25</option>
                                                    <option value="26">26</option>
                                                    <option value="27">27</option>
                                                    <option value="28">28</option>
                                                    <option value="29">29</option>
                                                    <option value="30">30</option>
                                                    <option value="31">31</option>
                                                </select>
                                            </div>
                                            <div class="group-info-month">
                                                <span>&nbsp;</span>
                                                <select class="form-control" name="[0].month" placeholder="Vui lòng chọn tháng" required="required"><option value="">Tháng</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>
                                            </div>
                                            <div class="group-info-year">
                                                <span>&nbsp;</span>
                                                <select class="form-control" name="[0].year" placeholder="Vui lòng chọn năm" required="required"><option value="">Năm</option>
                                                    <option value="1952">1952</option>
                                                    <option value="1953">1953</option>
                                                    <option value="1954">1954</option>
                                                    <option value="1955">1955</option>
                                                    <option value="1956">1956</option>
                                                    <option value="1957">1957</option>
                                                    <option value="1958">1958</option>
                                                    <option value="1959">1959</option>
                                                    <option value="1960">1960</option>
                                                    <option value="1961">1961</option>
                                                    <option value="1962">1962</option>
                                                    <option value="1963">1963</option>
                                                    <option value="1964">1964</option>
                                                    <option value="1965">1965</option>
                                                    <option value="1966">1966</option>
                                                    <option value="1967">1967</option>
                                                    <option value="1968">1968</option>
                                                    <option value="1969">1969</option>
                                                    <option value="1970">1970</option>
                                                    <option value="1971">1971</option>
                                                    <option value="1972">1972</option>
                                                    <option value="1973">1973</option>
                                                    <option value="1974">1974</option>
                                                    <option value="1975">1975</option>
                                                    <option value="1976">1976</option>
                                                    <option value="1977">1977</option>
                                                    <option value="1978">1978</option>
                                                    <option value="1979">1979</option>
                                                    <option value="1980">1980</option>
                                                    <option value="1981">1981</option>
                                                    <option value="1982">1982</option>
                                                    <option value="1983">1983</option>
                                                    <option value="1984">1984</option>
                                                    <option value="1985">1985</option>
                                                    <option value="1986">1986</option>
                                                    <option value="1987">1987</option>
                                                    <option value="1988">1988</option>
                                                    <option value="1989">1989</option>
                                                    <option value="1990">1990</option>
                                                    <option value="1991">1991</option>
                                                    <option value="1992">1992</option>
                                                    <option value="1993">1993</option>
                                                    <option value="1994">1994</option>
                                                    <option value="1995">1995</option>
                                                    <option value="1996">1996</option>
                                                    <option value="1997">1997</option>
                                                    <option value="1998">1998</option>
                                                    <option value="1999">1999</option>
                                                    <option value="2000">2000</option>
                                                    <option value="2001">2001</option>
                                                    <option value="2002">2002</option>
                                                    <option value="2003">2003</option>
                                                    <option value="2004">2004</option>
                                                    <option value="2005">2005</option>
                                                    <option value="2006">2006</option>
                                                    <option value="2007">2007</option>
                                                    <option value="2008">2008</option>
                                                    <option value="2009">2009</option>
                                                    <option value="2010">2010</option>
                                                </select>
                                            </div>
                                            <div class="group-info-room col-2">
                                                <span>Phòng riêng</span>
                                                <div>
                                                    <input type="hidden" value="1900000" id="phuthuphongdon_0">
                                                    <span class="check" checked="" id="idReadOnly"></span>1,900,000₫
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="customer-save">
                            <h3>Quý khách có ghi chú lưu ý gì, hãy nói với chúng tôi !</h3>
                            <div class="customer-save-inner">
                                <label class="checker">
                                    
                                    <input type="checkbox" class="note-more" value="hút thuốc">
                                    Hút thuốc
                                </label>
                                <label class="checker">
                                    
                                    <input type="checkbox" class="note-more" value="phòng tầng cao">
                                    Phòng tầng cao
                                </label>
                                <label class="checker">
                                   
                                    <input type="checkbox" class="note-more" value="trẻ em hiếu động">
                                    Trẻ em hiếu động
                                </label>
                                <label class="checker">
                                    
                                    <input type="checkbox" class="note-more" value="ăn chay">
                                    Ăn chay
                                </label>
                                <label class="checker">
                                    
                                    <input type="checkbox" class="note-more" value="có người khuyết tật">
                                    Có người khuyết tật
                                </label>
                                <label class="checker">
                                    
                                    <input type="checkbox" class="note-more" value="phụ nữ có thai">
                                    Phụ nữ có thai
                                </label>
                                <p>Ghi chú thêm</p>
                                <textarea style="width: 801px; height: 133px;" class="form-control" cols="20" id="note" name="note" placeholder="Vui lòng nhập nội dung lời nhắn bằng tiếng Anh hoặc tiếng Việt" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <section class="col-md-4 col-12 right">
                        <div class="group-checkout">
                            <h3>Tóm tắt chuyến đi</h3>
                            <p class="package-title">Tour trọn gói <span> (6 khách)</span></p>
                            <div class="product-1">
                                <div class="product-image-1">
                                    <img src="https://media.travel.com.vn/tour/tfd_220321044524_568017.jpg" class="img-fluid" alt="image">
                                </div>
                                <div class="product-content-1">
                                    <p class="title-1">Sapa - Bản Cát Cát - Fansipan - Ninh Bình - Tràng An - Bái Đính - Tuyệt Tịnh Cốc - Hạ Long - Đảo Titốp - Yên Tử </p>
                                </div>
                            </div>
                            <div class="go-tour">
                                <div class="start">
                                    <i class="fal fa-calendar-minus"></i>
                                    <div class="start-content">
                                        <h4>Bắt đầu chuyến đi</h4>
                                        <p class="time">T6, 20 Tháng 5, 2022</p>
                                        <p class="from"></p>
                                    </div>
                                </div>
                                <div class="end">
                                    <i class="fal fa-calendar-minus"></i>
                                    <div class="start-content">
                                        <h4>Kết thúc chuyến đi</h4>
                                        <p class="time">T4, 25 Tháng 5, 2022</p>
                                        <p class="from"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="detail">
                            <table style="width: 100%;">
                                <tbody style="width:425px;display: block;">
                                <tr>
                                    <th class="l1">Hành khách</th>
                                        <th class="l2 text-right">
                                        <i class="fal ti-user" id="AmoutPerson">1</i> <span></span>
                                        <p class="add-more"></p>
                                    </th>
                                </tr>
                                <tr>
                                    <td>Người lớn</td>
                                    <td class="t-price text-right" id="AdultPrice">1 x 9,590,000₫</td>
                                </tr>
                                <tr>
                                    <td>Trẻ em</td>
                                    <td class="t-price text-right" id="ChildrenPrice">0₫</td>
                                </tr>
                                    <tr>
                                    <td>Trẻ nhỏ</td>
                                    <td class="t-price text-right" id="SmallChildrenPrice">0₫</td>
                                </tr>
                                    <tr>
                                    <td>Em bé</td>
                                    <td class="t-price text-right" id="BabyPrice">0₫</td>
                                </tr>
                                    <tr class="pt">
                                    <td>Phụ thu phòng riêng</td>
                                    <td class="t-price text-right" id="txtPhuThu">0₫</td>
                                </tr>
                                <tr class="pt">
                                    <td>Giảm giá tour giờ chót</td>
                                    <td class="t-price text-right" id="txtGiamGiaLastMinute">còn <span id="remainLastMinuteGuest">6 </span> / <span id="totalLastMinuteGuest">7</span> chỗ</td>
                                </tr>
                                <tr>
                                    <td>Người lớn và trẻ em</td>
                                    <td class="t-price text-right" id="GiamGiaLastMinute">1 x 300,000₫</td>
                                </tr>
                                <tr class="cuppon">
                                    <td>Mã giảm giá </td>
                                    <td class="cp-form text-right">
                                        <form action="#">
                                            <input class="form-control-1" id="DiscountCode" name="DiscountCode" placeholder="Thêm mã" required="required" type="text" value="">
                                            <input type="hidden" id="hdDiscountCode">
                                            <input type="hidden" id="hdDiscountCode-Price" value="0"> &nbsp;
                                            <input type="button" class="btn btn-success" id="btnDiscountCode" value="Áp dụng">
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td><hr></td>
                                    <td><hr></td>
                                </tr>
                                <tr id="spanDiscountCode" style="display: none;">
                                    <td colspan="2">
                                        Mã <span id="txtDiscountCode" class="fw-bold">Fake</span> giảm <span id="txtDiscountCode-Price" class="fw-bold">0₫</span> sẽ áp dụng khi hoàn tất.
                                    </td>
                                </tr>
                                <tr class="total-1">
                                    <td>Tổng cộng</td>
                                    <td class="t-price text-right" id="TotalPrice">9,290,000₫</td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="order">
                                <input type="submit" class="btn btn-primary btn-order" style="width:90% " value="Đặt ngay"/>
                                
                            </div>
                        </div>
                    </div>
                </section>
        </div>
    </div>
    <script type='text/javascript'>
        function hide(x)
        {
            if(x == 0)
            {
                document.getElementById("cus").style.display = 'none'   
            }
            else
            {
                document.getElementById("cus").style.display = 'block' 
                return;
            }
        }
        var minus = document.getElementsByClassName("minus");
        var plus = document.getElementsByClassName("plus");
        function Minus1()
        {
            let number = document.getElementById("adult").innerText;
            let so = parseInt(number)
            if(so == 0)
            {
                so = 0;
            }
            else
            {
                so = so -1;
                document.getElementById("adult").innerHTML = so;
            }
        }
        function Plus1()
        {
            let number = document.getElementById("adult").innerText;
            let so = parseInt(number)
            so = so +1;
            document.getElementById("adult").innerHTML = so;
        }
        function Minus2()
        {
            let number = document.getElementById("children").innerText;
            let so = parseInt(number)
            if(so == 0)
            {
                so = 0;
            }
            else
            {
                so = so -1;
                document.getElementById("children").innerHTML = so;
            }
        }
        function Plus2()
        {
            let number = document.getElementById("children").innerText;
            let so = parseInt(number)
            so = so +1;
            document.getElementById("children").innerHTML = so;
        }
        function Minus3()
        {
            let number = document.getElementById("smallchildren").innerText;
            let so = parseInt(number)
            if(so == 0)
            {
                so = 0;
            }
            else
            {
                so = so -1;
                document.getElementById("smallchildren").innerHTML = so;
            }
        }
        function Plus3()
        {
            let number = document.getElementById("smallchildren").innerText;
            let so = parseInt(number)
            so = so +1;
            document.getElementById("smallchildren").innerHTML = so;
        }
        function Minus4()
        {
            let number = document.getElementById("baby").innerText;
            let so = parseInt(number)
            if(so == 0)
            {
                so = 0;
            }
            else
            {
                so = so -1;
                document.getElementById("baby").innerHTML = so;
            }
        }
        function Plus4()
        {
            let number = document.getElementById("baby").innerText;
            let so = parseInt(number)
            so = so +1;
            document.getElementById("baby").innerHTML = so;
        }
    </script>
</body>
</html>