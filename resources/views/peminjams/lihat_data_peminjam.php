<div id="title m-b-md">
    <h2>Data Peminjam</h2>
    <?php
        if(!empty($peminjam)):?>
        <ul>
            <?php foreach($peminjam as $data):?>
                <li><?=$data ?></li>
            <?php endforeach ?>
        </ul>
    <?php
        else:
    ?>
    <p>Data peminjam kosong.</p>
    <?php endif ?>
</div>