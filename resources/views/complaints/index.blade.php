<!DOCTYPE html>
<html lang="en">
<head itemscope="" itemtype="http://schema.org/WebSite">
    <title itemprop="name">Şikayet Scraper</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css"
          integrity="sha256-3sPp8BkKUE7QyPSl6VfBByBroQbKxKG7tsusY2mhbVY=" crossorigin="anonymous"/>
    <style type="text/css">
        body {
            background: #f5f5f5;
            margin-top: 20px;
        }

        /* ===== Career ===== */
        .career-form {
            background-color: #4e63d7;
            border-radius: 5px;
            padding: 0 16px;
        }

        .career-form .form-control {
            background-color: rgba(255, 255, 255, 0.2);
            border: 0;
            padding: 12px 15px;
            color: #fff;
        }

        .career-form .form-control::-webkit-input-placeholder {
            /* Chrome/Opera/Safari */
            color: #fff;
        }

        .career-form .form-control::-moz-placeholder {
            /* Firefox 19+ */
            color: #fff;
        }

        .career-form .form-control:-ms-input-placeholder {
            /* IE 10+ */
            color: #fff;
        }

        .career-form .form-control:-moz-placeholder {
            /* Firefox 18- */
            color: #fff;
        }

        .career-form .custom-select {
            background-color: rgba(255, 255, 255, 0.2);
            border: 0;
            padding: 12px 15px;
            color: #fff;
            width: 100%;
            border-radius: 5px;
            text-align: left;
            height: auto;
            background-image: none;
        }

        .career-form .custom-select:focus {
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        .career-form .select-container {
            position: relative;
        }

        .career-form .select-container:before {
            position: absolute;
            right: 15px;
            top: calc(50% - 14px);
            font-size: 18px;
            color: #ffffff;
            content: '\F2F9';
            font-family: "Material-Design-Iconic-Font";
        }

        .filter-result .job-box {
            -webkit-box-shadow: 0 0 35px 0 rgba(130, 130, 130, 0.2);
            box-shadow: 0 0 35px 0 rgba(130, 130, 130, 0.2);
            border-radius: 10px;
            padding: 10px 35px;
        }

        ul {
            list-style: none;
        }

        .list-disk li {
            list-style: none;
            margin-bottom: 12px;
        }

        .list-disk li:last-child {
            margin-bottom: 0;
        }

        .job-box .img-holder {
            height: 65px;
            width: 65px;
            background-color: #4e63d7;
            background-image: -webkit-gradient(linear, left top, right top, from(rgba(78, 99, 215, 0.9)), to(#5a85dd));
            background-image: linear-gradient(to right, rgba(78, 99, 215, 0.9) 0%, #5a85dd 100%);
            font-family: "Open Sans", sans-serif;
            color: #fff;
            font-size: 22px;
            font-weight: 700;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            border-radius: 65px;
        }

        .career-title {
            background-color: #4e63d7;
            color: #fff;
            padding: 15px;
            text-align: center;
            border-radius: 10px 10px 0 0;
            background-image: -webkit-gradient(linear, left top, right top, from(rgba(78, 99, 215, 0.9)), to(#5a85dd));
            background-image: linear-gradient(to right, rgba(78, 99, 215, 0.9) 0%, #5a85dd 100%);
        }

        .job-overview {
            -webkit-box-shadow: 0 0 35px 0 rgba(130, 130, 130, 0.2);
            box-shadow: 0 0 35px 0 rgba(130, 130, 130, 0.2);
            border-radius: 10px;
        }

        @media (min-width: 992px) {
            .job-overview {
                position: -webkit-sticky;
                position: sticky;
                top: 70px;
            }
        }

        .job-overview .job-detail ul {
            margin-bottom: 28px;
        }

        .job-overview .job-detail ul li {
            opacity: 0.75;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .job-overview .job-detail ul li i {
            font-size: 20px;
            position: relative;
            top: 1px;
        }

        .job-overview .overview-bottom,
        .job-overview .overview-top {
            padding: 35px;
        }

        .job-content ul li {
            font-weight: 600;
            opacity: 0.75;
            border-bottom: 1px solid #ccc;
            padding: 10px 5px;
        }

        @media (min-width: 768px) {
            .job-content ul li {
                border-bottom: 0;
                padding: 0;
            }
        }

        .job-content ul li i {
            font-size: 20px;
            position: relative;
            top: 1px;
        }

        .mb-30 {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div id="snippetContent">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto mb-4">
                <div class="section-title text-center ">
                    <h1>Vitra</h1>
                    <h3 class="top-c-sep">Markası adına yapılan şikayetler</h3>
                    <p>Aşağıdaki listede vitra markası adına yapılan şikayetleri ürün, renk gibi özelliklerine göre
                        filtreleyebilirsiniz</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="career-search mb-60">
                    <form action="{{ route('list_complaints') }}" class="career-form mb-60">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 col-lg-4 my-3">
                                <div class="select-container">
                                    <select class="custom-select" name="color">
                                        <option value="">renk seç</option>
                                        @foreach($colors as $color)
                                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 my-3">
                                <div class="select-container">
                                    <select class="custom-select" name="product">
                                        <option value="">ürün tipi seç</option>
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 my-3">
                                <button type="submit" class="btn btn-lg btn-block btn-light btn-custom"
                                        id="contact-submit"> Şikayet Filtrele
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="filter-result">
                        <p class="mb-30 ff-montserrat mt-3"></p>

                        @foreach($complaints as $complaint)
                            <div class="job-box d-md-flex align-items-center justify-content-between mb-30">
                                <div class="job-left my-4 d-md-flex align-items-center flex-wrap">
                                    <div class="row">
                                        <div
                                            class="img-holder mr-md-4 mb-md-0 mb-4 mx-auto mx-md-0 d-md-none d-lg-flex col-md-1">
                                            ŞV
                                        </div>
                                        <div class="job-content col-md-10">
                                            <h5 class="text-center text-md-left">{{ $complaint->title }}</h5>
                                            <p>
                                                {{ $complaint->description }}
                                            </p>
                                            <ul class="d-md-flex flex-wrap text-capitalize ff-open-sans"
                                                style="padding-left: 0px">
                                                <li class="mr-md-4">
                                                    <i class="zmdi zmdi-pin mr-2"></i>Renk: {{ !is_null($complaint->color) ? $complaint->color->name : 'belirtilmemiş' }}
                                                </li>
                                                <li class="mr-md-4">
                                                    <i class="zmdi zmdi-pin mr-2"></i>Ürün: {{ !is_null($complaint->product) ? $complaint->product->name : 'belirtilmemiş' }}
                                                </li>
                                                <li class="mr-md-4">
                                                    <i class="zmdi zmdi-pin mr-2"></i> Şikayet Var
                                                </li>
                                                <li class="mr-md-4">
                                                    <i class="zmdi zmdi-time mr-2"></i> {{ $complaint->created_at }}
                                                </li>
                                            </ul>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        @endforeach
                        {{--                        {{ $complaints->links('vendor.pagination.bootstrap-4') }}--}}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>
