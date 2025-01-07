<div class="container dashboard-custom container-custom">

  <div class="container-top">
    <div class="container-top-left">
      <div class="back-button">
        <a href="<?php echo base_url("kontrak") ?>">
          <img src="<?php echo base_url('../public/assets/member/dashboard/arrow-left.svg" alt="arrow back') ?>">
        </a>
      </div>
      <p class="page-title">Kontrak Sewa</p>
    </div>

    <a href="<?php echo base_url("kontrak/tambah/") ?>"
      class="btn btn--green btn-tambah">Tambah Kontrak</a>
  </div>

  <div style="overflow-x: auto;" class="table-responsive">
    <table id="tabelku" class="table table-hover">
      <thead>
        <tr>
          <th>Penyewa</th>
          <th>Kamar</th>
          <th>Tanggal Masuk</th>
          <th>Tanggal Keluar</th>
          <th>Lama Kontrak</th>
          <th>Total Bayar</th>
          <th>Status Bayar</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($kontrak as $key => $value): ?>
          <tr>
            <?php $value['id_kontrak'] ?>
            <td><?php echo $value['nama_penyewa'] ?></td>
            <td><?php echo $value['nomor_kamar'] ?></td>

            <td>
              <?php echo formatDateIndonesian($value['tanggal_mulai']); ?>
            </td>
            <td>
              <?php echo formatDateIndonesian($value['tanggal_selesai']); ?>
            </td>

            <td>
              <?php
              $tanggal_mulai = new DateTime($value['tanggal_mulai']);
              $tanggal_selesai = new DateTime($value['tanggal_selesai']);

              $interval = $tanggal_mulai->diff($tanggal_selesai);

              $lama_kontrak = $interval->y * 12 + $interval->m + ($interval->d > 0 ? 1 : 0);

              echo $lama_kontrak . " bulan";
              ?>
            </td>

            <td>
              <?php
              $value['jumlah_pembayaran'] = $value['harga_kamar'] * $lama_kontrak;
              echo number_format($value['jumlah_pembayaran'], 0, ',', '.')
              ?>
            </td>

            <td>
              <p class="js-card-status-pembayaran"><?php echo $value['status_pembayaran'] ?></p>
            </td>

            <td class="table-buttons">
              <a href="<?php echo base_url('kontrak/ubah/' . $value['id_kontrak']) ?>">
                <img src="../public/assets/member/kontrak/ubah1.png" alt="foto ubah kontrak">
              </a>
              <a href="<?php echo base_url('kontrak/hapus/' . $value['id_kontrak']) ?>">
                <img src="../public/assets/member/kontrak/hapus.png" alt="foto hapus kontrak">
              </a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>

  <section class="container " style="margin-top: 8%;">
    <div class="container-top">
      <p class="page-title">Laporan</p>
    </div>

    <div class="container-pemasukan">
      <div class="pemasukan-top">
        <div class="pemasukan-top-left">
          <div class="laporan-card-top">
            <p class="laporan-text-top">Jumlah Penyewa</p>
            <p class="laporan-text-mid"><?php echo $penyewaKontrak; ?> Orang</p>
          </div>
          <div class="laporan-card-top">
            <p class="laporan-text-top">Jumlah Kamar Terisi</p>
            <p class="laporan-text-mid"><?php echo $kamarKontrak; ?> kamar</p>
          </div>
        </div>

        <div class="pemasukan-top-right">
          <div class="laporan-card-top">
            <div id="grafik-pembayaran-bulan-ini"></div>
            <script src="https://code.highcharts.com/highcharts.js"></script>
            <script>
              Highcharts.chart('grafik-pembayaran-bulan-ini', {
                chart: {
                  type: 'pie'
                },
                title: {
                  text: '<p class="laporan-text-mid">Pembayaran Sewa Bulan Ini</p>',
                  useHTML: true
                },
                tooltip: {
                  pointFormat: '{series.name}: <b>{point.y} ({point.percentage:.1f}%)</b>'
                },
                plotOptions: {
                  pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                      enabled: true,
                      format: '<p class="laporan-text-top">{point.name}</p> <p class="laporan-text-top">{point.percentage:.1f}%</p>',
                      useHTML: true
                    }
                  }
                },
                series: [{
                  name: 'Jumlah',
                  colorByPoint: false,
                  data: [{
                      name: '<p class="laporan-text-top">Lunas</p>',
                      y: <?php echo $pembayaran_lunas_bulan_ini; ?>,
                      color: 'rgb(81, 208, 85)',
                      useHTML: true
                    },
                    {
                      name: '<p class="laporan-text-top">Belum Lunas</p>',
                      y: <?php echo $pembayaran_belum_lunas_bulan_ini; ?>, 
                      color: 'rgb(227, 83, 83)',
                      useHTML: true
                    }
                  ]
                }]
              });
            </script>
          </div>
        </div>

      </div>

      <div class="laporan-card-bottom">
        <canvas id="bar-chart" width="800" height="450"></canvas>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
          var incomeData = <?php echo json_encode($incomeData); ?>;

          var months = [];
          var bulanIndo = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

          for (var i = 5; i >= 0; i--) {
            var date = new Date();
            date.setMonth(date.getMonth() - i);
            var month = bulanIndo[date.getMonth()]; 
            months.push(month);
          }

          var dataPerBulan = incomeData.map(function(bulan) {
            return bulan.length > 0 ? bulan.reduce(function(sum, record) {
              return sum + record.jumlah_pembayaran;
            }, 0) : 0;
          });

          new Chart(document.getElementById("bar-chart"), {
            type: 'bar',
            data: {
              labels: months,
              datasets: [{
                label: "Jumlah Pembayaran Lunas",
                backgroundColor: "#3e95cd",
                data: dataPerBulan,
              }]
            },
            options: {
              responsive: true,
              legend: {
                display: false
              },
              title: {
                display: true,
                text: '<p class="laporan-text-top">Jumlah Pembayaran Lunas</p>',
                useHTML: true
              },
              scales: {
                y: {
                  beginAtZero: true,
                  grid: {
                    display: false 
                  },
                  ticks: {
                    callback: function(value) {
                      return 'Rp ' + value.toLocaleString();
                    }
                  }
                }
              }
            }
          });
        </script>
      </div>






    </div>

  </section>
</div>