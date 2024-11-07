<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Detalle de venta</title>
    <style>
        body {
            font-family: sans-serif
        }

        tbody,
        tfoot,
        thead {
            text-align: center !important;
        }

        .relative {
            position: relative;
        }

        .overflow-x-auto {
            overflow-x: auto;
        }

        .shadow-md {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Table settings */
        .w-full {
            width: 100%;
        }

        .text-sm {
            font-size: 0.875rem;
        }

        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .text-gray-500 {
            color: #6b7280;
        }

        /* Header settings */
        .text-xs {
            font-size: 0.75rem;
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

        .bg-gray-50 {
            background-color: #f9fafb;
        }

        .bg-blue-400 {
            background-color: #5e72e4;
        }

        /* Row and cell settings */
        .border-b {
            border-bottom-width: 1px;
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .px-2 {
            padding-left: 0.5rem;
            padding-right: 0.5rem;
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        .py-2 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .font-medium {
            font-weight: 500;
        }

        .text-gray-900 {
            color: #111827;
        }

        .whitespace-nowrap {
            white-space: nowrap;
        }

        .font-medium {
            font-weight: 500;
        }

        .text-blue-600 {
            color: #5e72e4;
        }

        .hover\:underline:hover {
            text-decoration: underline;
        }

        footer {
            position: fixed;
            bottom: 1cm;
            left: 0px;
            right: 0px;
            height: 10px;
        }
    </style>
</head>

<body>
    <footer>
        <table width="100%" style="border-top: 2px solid #000;">
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
    <table width="100%">
        <tr>
            <td style="width:50%; text-align:center; vertical-align: top;">
                <h1 class="text-gray-500">{{ config('app.name') }}</h1>
                <table style="width: 90%; margin: 0 auto;  text-align:center; margin-top:10px">
                    <tr>
                        <td class="text-gray-500">Cliente:</td>
                        <td class="text-gray-500" style="text-align: right">
                            {{ $venta->client->name }}{{ $venta->client->profile->apellido_paterno }}{{ $venta->client->profile->apellido_materno }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-gray-500">Domicilio:</td>
                        <td class="text-gray-500" style="text-align: right">{{ $venta->client->profile->ciudad }}</td>
                    </tr>
                    <tr>
                        <td class="text-gray-500">Chofer:</td>
                        <td class="text-gray-500" style="text-align: right">{{ $venta->driver->name }} {{ $venta->driver->apellido_paterno }}</td>
                    </tr>
                </table>
            </td>
            <td style="width:50%; text-align:center; vertical-align:top; padding-top:10px;">
                <table style="width: 80%; margin: 0 auto;  text-align:center; margin-top:10px">
                    <tr>
                        <td colspan="2" style="text-align: center">
                            <h3 class="text-gray-500">DETALLE DE LA VENTA</h3>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-gray-500">Nro.: </td>
                        <td class="text-gray-500" style="text-align:right">
                            {{ str_pad($venta->id, 5, '0', STR_PAD_LEFT) }}</td>
                    </tr>
                    <tr>
                        <td class="text-gray-500">Fecha</td>
                        <td class="text-gray-500" style="text-align:right">
                            {{ $venta->created_at->format('d/m/Y') }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <div class="relative overflow-x-auto shadow-md">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-white uppercase bg-blue-400">
                <tr>
                    <td colspan="5" align="center">
                        <p style="margin:0.5rem;">DETALLE DE LA VENTA</p>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-2">#</td>
                    <td class="px-6 py-2">Nombre</td>
                    <td class="px-6 py-2">Cantidad</td>
                    <td class="px-6 py-2">precio</td>
                    <td class="px-6 py-2">Subtotal</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($venta->detalles as $factura)
                    <tr class="odd:bg-white even:bg-gray-50 border-b">
                        <td class="px-2 py-4">{{ $loop->iteration }}</td>
                        <td class="px-2 py-4">{{ $factura->product->name }}</td>
                        <td class="px-2 py-4">{{ $factura->cantidad }}</td>
                        <td class="px-2 py-4">{{ $factura->product->price }}</td>
                        <td class="px-2 py-4">
                            {{ number_format($factura->product->price * $factura->cantidad, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Total</th>
                    <td colspan="3"></td>
                    <td class="px-2 py-2">
                        {{ number_format($venta->total, 2, ',', '.') }}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="relative overflow-x-auto shadow-md">
        <table width="100%">
            <tr>
                <td align="right">
                    <span class="text-gray-500">CANCELACION:
                        {{ number_format($venta->total, 2, ',', '.') }} Bs</span>
                </td>
            </tr>
        </table>
        <div>
            <span class="text-gray-500"><b>SON: {{ $numero_letra }}</b></span>
            <br>
            <span class="text-gray-500">Observaciones:</span>
            <br>
            <span class="text-gray-500">{{ $venta->observaciones }}</span>
        </div>
    </div>
</body>

</html>
