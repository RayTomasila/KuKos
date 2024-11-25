<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h5>Detail Member</h5>
            <table class="table table-bordered">

                <tr>
                    <td>Email </td>
                    <td><?php echo $member['nama_lengkap_member'] ?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><?php echo $member['nomor_telepon_member'] ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><?php echo $member['alamat_member'] ?></td>
                </tr>
                <tr>
                    <td>Kode_distrik</td>
                    <td><?php echo $member['kode_distrik_member'] ?></td>
                </tr>
                <tr>
                    <td>Nama_distrik</td>
                    <td><?php echo $member['nama_distrik_member'] ?></td>
                </tr>

            </table>
        </div>
    </div>
</div>