<?php $this->load->view('header'); ?>

<div class="container">
    <table class="table table-dark table-striped mt-5">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Tempat Tanggal Lahir</th>
                <th scope="col">Alamat</th>
                <th scope="col">Status Pernikahan</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0;
            foreach ($customers as $cus) { ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $cus->Employee_Name ?></td>
                    <td><?= $cus->DOB ?></td>
                    <td><?= $cus->State . ', ' . $cus->CitizenDesc . ', ' . $cus->Zip ?></td>
                    <td><?= $cus->MaritalDesc ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php $this->load->view('footer'); ?>