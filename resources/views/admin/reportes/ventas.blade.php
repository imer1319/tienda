<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Ventas</title>
    <style>
        body {
            font-family: sans-serif
        }

        tbody,
        tfoot,
        thead {
            text-align: center !important;
        }

        .text-white {
            color: #fff;
        }

        .text-gray-700 {
            color: #374151;
        }

        .uppercase {
            text-transform: uppercase;
        }

        .bg-blue-400 {
            background-color: #5e72e4;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: collapse;
            font-size: 13px;
            page-break-inside: auto;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
            padding: 10px 3px;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table tbody {
            page-break-inside: avoid;
            page-break-after: auto;
        }

        .table tbody+tbody {
            border-top: 2px solid #dee2e6;
        }

        table tfoot {
            display: table-row-group;
        }

        tfoot {
            position: fixed;
            bottom: 0;
            background-color: #f8f9fa;
            border-top: 2px solid #dee2e6;
        }

        body {
            margin-top: 1.2cm;
            margin-bottom: 2cm;
            margin-left: 1cm;
            margin-right: 1cm;
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 1cm;

            background-color: #5e72e4;
            color: white;
            text-align: center;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 1cm;
            right: 1cm;
            height: 1.5cm;
        }

        @page {
            margin: 0cm 0cm;
        }

        @media print {
            tfoot {
                display: table-row-group;
                page-break-before: always;
                bottom: 0;
            }
        }

        thead {
            display: table-header-group;
        }

        tfoot {
            display: table-footer-group;
        }

        tfoot {
            position: sticky;
            bottom: 0;
        }
    </style>
</head>

<body>
    <header>
        <table width="100%">
            <tr>
                <td align="center" style="width: 100%; font-size:16px; padding-top:7px">
                    <span>Listado de ventas</span>
                </td>
            </tr>
        </table>
    </header>
    <footer>
        <table width="100%" style="border-top: 2px solid #727272;">
            <tr style="vertical-align:bottom">
                <td align="left" style="width: 50%;  vertical-align:bottom; font-size:13px;">
                    <span class="text-gray-500">Usuario: {{ auth()->user()->name }}</span>
                </td>
                <td align="right" style="width: 50%;  vertical-align:bottom; font-size:13px;">
                    <span class="text-gray-500">Fecha de impresion: {{ date('d/m/Y') }}</span>
                </td>
            </tr>
        </table>
    </footer>
    <main>
        <table class="table table-bordered">
            <thead class="text-xs text-white uppercase bg-blue-400">
                <tr>
                    <th style="padding: 0.2rem">#</th>
                    <th style="padding: 0.2rem">Cliente</th>
                    <th style="padding: 0.2rem">Chofer</th>
                    <th style="padding: 0.2rem">Estado</th>
                    <th style="padding: 0.2rem">Tipo de pedido</th>
                    <th style="padding: 0.2rem">Items</th>
                    <th style="padding: 0.2rem">Fecha</th>
                    <th style="padding: 0.2rem">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ventas as $venta)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $venta->client->name }} {{ $venta->client->profile->apellido_paterno }}</td>
                        <td>{{ $venta->driver->name }} {{ $venta->driver->apellido_paterno }}</td>
                        <td>{{ $venta->status }}</td>
                        <td>{{ $venta->sale_type }}</td>
                        <td>{{ $venta->detalles->count() }}</td>
                        <td>{{ $venta->created_at->format('d-m-Y') }}</td>
                        <td>{{ number_format($venta->total, 2, ',', '.') }} Bs</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7" align="left"><b>Total:</b></td>
                    <td>{{ number_format($totales['total'], 2, ',', '.') }} Bs</td>
                </tr>
            </tfoot>
        </table>
    </main>
</body>

</html>
