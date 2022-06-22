@extends('print.layouts.paper')

@section('title')
Biểu mẫu Phiếu in danh sách sản phẩm
@endsection

@section('paper-size') A4 @endsection
@section('paper-class') A4 @endsection

@section('custom-css')
<style type="text/css">
        

        body {
            font-size: 15px;
        }

        table {
            border-collapse: collapse;
        }

        td {
            vertical-align: middle;
        }

        caption {
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }

        .hinhSanPham {
            width: 100px;
            height: 100px;
        }

        .companyInfo {
            font-size: 13px;
            font-weight: bold;
            text-align: center;
        }

        .companyImg {
            width: 200px;
            height: 200px;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</style>
@endsection
@section('content')
<section class="sheet padding-10mm">
    <article>
        <table border="0" align="center" cellspacing="0">
            <tr>
                <td class="companyInfo">
                    Công ty Hotel Pham Tuan<br />
                    phamtuanhotel.com<br />
                    092 127 7127<br />
                    <img src="{{ asset('img/log.jpg') }}" class="companyImg"width="100" height="100" />
                </td>
            </tr>
        </table>
        <br />
        <br />
        <?php 
        $tongSoTrang = ceil(count($db)/5);
            ?>
          <table border="1" align="center" cellpadding="5">
            <caption>Danh sách phòng</caption>
            <tr>
                <th colspan="6" align="center">Trang 1 / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
                <th>STT</th>
                <th>Hình phòng</th>
                <th>Tên phòng</th>
                <th>Giá gốc</th>
                <th>Giá bán</th>
                <th>Loại phòng</th>
            </tr>
            @foreach ($db as $p)
            <tr>
                <td align="center">{{ $loop->index + 1 }}</td>
                <td align="center">
                    <img class="hinhSanPham" src="{{ asset('/storage/photos/' . $p->lp_hinh) }}" width="200" height="200"/>
                </td>
                <td align="left">{{ $p->p_ten }}</td>
                <td align="right">{{ $p->lp_giaBan }}.000VND</td>
                @foreach ($db as $l)
                @if ($p->lp_ma == $l->lp_ma)
                <td align="left">{{ $l->lp_ten }}</td>
                @endif
                @endforeach
            </tr>
            @if (($loop->index + 1) % 5 == 0)
        </table>
        <div class="page-break"></div>
        <table border="1" align="center" cellpadding="5">
            <tr>
                <th colspan="6" align="center">Trang {{ 1 + floor(($loop->index + 1) / 5) }} / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
                 <th>STT</th>
                <th>Hình phòng</th>
                <th>Tên phòng</th>
                <th>Giá bán</th>
                <th>Loại phòng</th>
            </tr>
            @endif
            @endforeach
        </table>

    </article>
</section>
@endsection

