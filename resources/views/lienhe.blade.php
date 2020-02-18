@extends('layouts.content')
@section('content')
    <div class="container" >
        <div id="lienhe">
            <h2>Liên hệ</h2>
            <div >
                <i class="glyphicon glyphicon-phone"></i>
                <span class=""> Gọi ngay 097 555 2480</span>
            </div>
        </div>
        <div><img src="{{asset('assets\frontend\images\dvkh.png')}}" style="width: 100%"></div>
        <div >

            <div class="contact" style="margin: 20px 0px">
                <div class="col-md-6 contact-left">
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.953190244123!2d108.18351751485847!3d16.067918688881804!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314218fe2f700d5b%3A0x1ea1fdac674fdde6!2zVGhhbmggVMOibiwgVGhhbmggS2jDqiwgxJDDoCBO4bq1bmc!5e0!3m2!1svi!2s!4v1581874346640!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                </div>
                <div class=" col-md-6 contact-right">
                    <div id="content_contact_right"><p>Mọi thắc mắc hoặc góp ý, quý khách vui lòng liên hệ trực tiếp với bộ phận chăm sóc khách hàng của chúng tôi bằng cách điền đầy đủ thông tin vào form bên dưới</p></div>
                    <table>
                        <tr>
                            <th>Tên đầy đủ <span>*</span></th>
                            <td><input type="text"></td>
                        </tr>
                        <tr>
                            <th>Email <span>*</span></th>
                            <td><input type="text"></td>
                        </tr>
                        <tr>
                            <th>Số điện thoại <span>*</span></th>
                            <td><input type="text"></td>
                        </tr>
                        <tr>
                            <th>Thông tin liên hệ <span>*</span></th>
                            <td><textarea></textarea></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td><button type="submit" class="btn-primary rounded-0">Gửi liên hệ</button></td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
    </div>

@endsection
