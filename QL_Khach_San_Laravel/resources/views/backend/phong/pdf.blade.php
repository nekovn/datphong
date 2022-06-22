
<!DOCTYPE html>
<html>

<head>
    <title>Danh sách Phòng</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        * {
            font-family: DejaVu Sans, sans-serif;
        }

        body {
            font-size: 10px;
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
</head>

<body>
    <div class="row">
        <table border="0" align="center">
            <tr>
                <td class="companyInfo">
                    Công ty Hotel Pham Tuan<br />
                    phamtuanhtell.com/<br />
                    092 127 7127<br />
                    <img src="{{ asset('img/log.jpg') }}" class="companyImg" />
                </td>
            </tr>
        </table>
        <br />
        <br />
        <?php 
        $tongSoTrang = ceil(count($danhsachsanpham)/5);
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
            @foreach ($danhsachsanpham as $p)
            <tr>
                <td align="center">{{ $loop->index + 1 }}</td>
                <td align="center">
                    <img class="hinhSanPham" src="{{ asset('storage/photos/' . $p->p_hinh) }}" />
                </td>
                <td align="left">{{ $p->p_ten }}</td>
                <td align="right">{{ $p->p_giaGoc }}</td>
                <td align="right">{{ $p->p_giaBan }}</td>
                @foreach ($danhsachloai as $l)
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
                <th>Giá gốc</th>
                <th>Giá bán</th>
                <th>Loại phòng</th>
            </tr>
            @endif
            @endforeach
        </table>
    </div>
</body>

</html>