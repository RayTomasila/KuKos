<div class="container mt-4">
    <h5 class="mb-3">Data Member</h5>
    <table class="table table-striped table-bordered" id="tabelku">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Distrik</th>
                <th>WA</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($member as $key => $value): ?>
                <tr>
                    <td><?php echo $key+1; ?></td>
                    <td><?php echo htmlspecialchars($value['nama_member']); ?></td>
                    <td><?php echo htmlspecialchars($value['email_member']); ?></td>
                    <td><?php echo htmlspecialchars($value['nama_distrik_member']); ?></td>
                    <td><?php echo htmlspecialchars($value['wa_member']); ?></td>
                    <td>
                        <a href="<?php echo base_url('member/detail/'.$value['id_member']); ?>" class="btn btn-info btn-sm" style="background-color: #93d56b; border-color: #93d56b; color: white;">Detail</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
