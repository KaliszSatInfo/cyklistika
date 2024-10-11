<?=$this->extend("layout/template");?>

<?=$this->section("content");?>
<div class="row"> 
    <?php 
        $counter = 1; 
        $cesta_rider = 'img/riders/'
    ?>

    <?php foreach ($result as $row):  $rider = ['src' => $cesta_rider.$row->photo]; ?>
        

        <div class="col-xxl-4 col-sm-12 col-lg-6">
            <div class="card m-5">
                <h4 class="text-center"><?= $counter++ ?></h4>
                <p><?= 'Jméno: '.$row->first_name.' '.$row->last_name?></p>
                <p><?= 'Datum narození: '.date('j.n.Y', strtotime($row->date_of_birth))?></p>
                <p><?= 'Váha: '.$row->weight.' kg'?></p>
                <p><?= 'Výška: '.$row->height.' cm'?></p>
                <p class="text-center"><?= img($rider) ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?=$this->endSection();?>
