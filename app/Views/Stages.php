<?php

$this->extend("layout/template");

$this->section("content");

$table = new \CodeIgniter\View\Table();

$table->setHeading(['Číslo etapy', 'Datum etapy', 'Start etapy', 'Cíl etapy', 'Délka etapy', 'Typ etapy', 'Vertikální převýšení', 'Výsledky']);

foreach($stage as $row){
    $table->addRow($row->number, date('j.n.Y', strtotime($row->date)), $row->departure, $row->arrival, number_format($row->distance, 0, ',', ' ').' km', 
    $row->name, $row->vertical_meters.' m', anchor('Result/'.$row->id, 'Výsledky etapy'));
}

$template = [
    'table_open' => '<table class="table table-striped">',

    'thead_open'  => '<thead>',
    'thead_close' => '</thead>',

    'heading_row_start'  => '<tr>',
    'heading_row_end'    => '</tr>',
    'heading_cell_start' => '<th>',
    'heading_cell_end'   => '</th>',

    'tfoot_open'  => '<tfoot>',
    'tfoot_close' => '</tfoot>',

    'footing_row_start'  => '<tr>',
    'footing_row_end'    => '</tr>',
    'footing_cell_start' => '<td>',
    'footing_cell_end'   => '</td>',

    'tbody_open'  => '<tbody>',
    'tbody_close' => '</tbody>',

    'row_start'  => '<tr>',
    'row_end'    => '</tr>',
    'cell_start' => '<td>',
    'cell_end'   => '</td>',

    'row_alt_start'  => '<tr>',
    'row_alt_end'    => '</tr>',
    'cell_alt_start' => '<td>',
    'cell_alt_end'   => '</td>',

    'table_close' => '</table>',
];

$table->setTemplate($template);

echo $table->generate();

$this->endSection();
?>