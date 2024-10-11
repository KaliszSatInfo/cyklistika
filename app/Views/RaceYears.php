<?php

$this->extend("layout/template");

$this->section("content");

$table = new \CodeIgniter\View\Table();

$table->setHeading(['Název', 'Rok', 'Datum', 'Logo', 'Kategorie', 'Celková délka', 'Počet etap']);

$cesta_logo = 'img/logos/';

foreach ($raceYear as $row) {
    $endDate = $row->end_date;
    $startDate = $row->start_date;
    
    $endDateTimestamp = strtotime($endDate);
    $startDateTimestamp = strtotime($startDate);

    if ($endDate == $startDate) {
        $date = date('j.n.Y', $startDateTimestamp); 
    } else {
        $date = date('j.n.Y', $startDateTimestamp) . " - " . date('j.n.Y', $endDateTimestamp);
    }

    $logo = [
        'src' => $cesta_logo.$row->logo,
        'width' => '15%'
    ];

    $table->addRow($row->real_name, $row->year, $date, img($logo), $row->name, number_format($row->distance, 0, ',', ' ').' km', anchor('Stage/'.$row->id_race_year, $row->count));
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

echo $table->generate();?>

<?php

$this->endSection();
?>