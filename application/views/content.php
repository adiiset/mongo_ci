<?php $this->load->view('header'); ?>

<div class="ui main text container">
    <h1 class="ui header">Demo penggunaan MongoDB di Codeigniter3</h1>
    <div><?php echo anchor('/penjualan/create', 'Create User'); ?></div>

    <table class="ui celled padded table" id="myTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tempat Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($customers as $cus) { ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $cus->Employee_Name ?></td>
                    <td><?= $cus->DOB ?></td>
                    <td><?= $cus->State . ', ' . $cus->CitizenDesc . ', ' . $cus->Zip ?></td>
                    <td><?= $cus->MaritalDesc ?></td>
                    <td><?php echo anchor('/penjualan/update/' . $cus->_id, 'Update'); ?>
                        <?php echo anchor('/penjualan/delete/' . $cus->_id, 'Delete', array('onclick' => "return confirm('Do you want delete this record')")); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="ui pagination menu" id="pagination">
        <a class="item" id="prev">
            <i class="left arrow icon"></i>
        </a>
        <a class="item" id="page1">1</a>
        <a class="item" id="page2">2</a>
        <a class="item" id="page3">3</a>
        <a class="item" id="next">
            <i class="right arrow icon"></i>
        </a>
    </div>
</div>

<?php $this->load->view('footer'); ?>