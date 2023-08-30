<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{ $periode }}</title>
    <script src="{{ asset('print/js/jquery.min.js') }}"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="{{ asset('print/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <a href="javascript:void(0)" class="btn btn-primary btn-sm btn-download"> Download PDF {{ $periode }} </a>

    <div id="invoice">
        <header>
            <h2>Rekap Piutang {{$periode}}</h2>
            <address>
                <p> ambplangobicketapang@gmail.com </p>
                <p> Kauman, Kec. Benua Kayong, Kabupaten Ketapang, Kalimantan Barat 78821, Indonesia</p>
                <p> Post: 78881 </p>
                <p> Business Number: +62 823-5046-0011 </p>
            </address>
            {{-- <span>
                <img alt="it" src="{{ asset('img/chat/5.jpg') }}" width="150">
            </span> --}}
        </header>
        <article>

            <table class="meta">
                <tr>
                    <th><span>Periode</span></th>
                    <td><span>{{$periode}}</span></td>
                </tr>
                <tr>
                    <th><span>Laporan</span></th>
                    <td><span>Piutang Data</span></td>
                </tr>
                                <tr>
                    <th><span>Tanggal</span></th>
                    <td><span>{{date('d-M-y')}}</span></td>
                </tr>
            </table>


            <table class="inventory">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px">#</th>
                        <th class="text-center" style="width: 100px">Kode </th>
                        <th>Tanggal</th>
                        <th>Nominal</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($piutang as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->kode }}</td>
                            <td>{{ $item->tgl }}</td>
                            <td>Rp {{ $item->nominal }}</td>
                            <td>{{ $item->keterangan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <table class="sign">
                <tr>
                    <td></td>
                </tr>
            </table>

            <table class="balance">
                <tr>
                    <th><span>Piutang Total</span></th>
                    <td><span data-prefix>Rp </span><span>{{$total}}</span></td>
                </tr>
            </table>
        </article>
        <aside>
            <h1><span>Catatan Tambahan</span></h1>
            <div>
                <p></p>
            </div>
        </aside>

    </div>








    <script src="{{ asset('print/js/jspdf.debug.js') }}"></script>
    <script src="{{ asset('print/js/html2canvas.min.js') }}"></script>
    <script src="{{ asset('print/js/html2pdf.min.js') }}"></script>



    <script>
        const options = {
            margin: 0.5,
            filename: 'invoice.pdf',
            image: {
                type: 'jpeg',
                quality: 500
            },
            html2canvas: {
                scale: 1
            },
            jsPDF: {
                unit: 'in',
                format: 'letter',
                orientation: 'portrait'
            }
        }

        $('.btn-download').click(function(e) {
            e.preventDefault();
            const element = document.getElementById('invoice');
            html2pdf().from(element).set(options).save();
        });


        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>



</body>

</html>
