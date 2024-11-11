<?php

namespace App\Exports;

use App\Models\Pedido;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;

class VentaExport 
extends DefaultValueBinder
implements
    WithColumnFormatting,
    FromCollection,
    WithHeadings,
    WithCustomStartCell,
    WithMapping,
    ShouldAutoSize,
    WithStyles,
    WithEvents,
    WithCustomValueBinder
{
    protected $filters;

    public function __construct(array $filters)
    {
        $this->filters = $filters;
    }

    public function collection()
    {
        return Pedido::query()
            ->byChoferId($this->filters['chofer_id'] ?? null)
            ->byClienteId($this->filters['cliente_id'] ?? null)
            ->byTipoPedido($this->filters['tipo_pedido'] ?? null)
            ->byDesde($this->filters['desde'] ?? null)
            ->byHasta($this->filters['hasta'] ?? null)
            ->where('status', 'COMPLETADO')
            ->with(['client', 'detalles','driver'])
            ->latest()
            ->get();
    }

    public function styles(Worksheet $sheet)
    {
        return [
            2    => ['font' => ['bold' => true]],
            3    => ['font' => ['bold' => true]],
        ];
    }

    public function map($venta): array
    {
        return [
            $venta->id,
            $venta->client->name . ' ' . $venta->client->profile->apellido_paterno,
            $venta->driver->name . ' ' . $venta->driver->apellido_paterno,
            $venta->status,
            $venta->sale_type,
            $venta->created_at->format('d-m-Y'),
            $venta->detalles->count(),
            $venta->total,
        ];
    }

    public function columnFormats(): array
    {
        return [
            'I' => '#,##0.00'
        ];
    }
    public function headings(): array
    {
        return [
            [
                'Listado de ventas'
            ],
            [
                '#',
                'Cliente',
                'Chofer',
                'Estado',
                'Tipo de venta',
                'Fecha',
                'Items',
                'Total',
            ]
        ];
    }

    public function startCell(): string
    {
        return 'B2';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getDelegate()->mergeCells('B2:I2');
                $event->sheet->getDelegate()->getStyle('B2')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 14,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ]);
            },
        ];
    }
}
