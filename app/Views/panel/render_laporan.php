<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PDF</title>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js'
    integrity='sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=='
    crossorigin='anonymous'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js'
    integrity='sha512-qZvrmS2ekKPF2mSznTQsxqPgnpkI4DNTlrdUmTzrDgektczlKNRRhy5X5AAOnx5S09ydFYWWNSfcEqDTTHgtNA=='
    crossorigin='anonymous'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.8.2/jspdf.plugin.autotable.min.js'
    integrity='sha512-2/YdOMV+YNpanLCF5MdQwaoFRVbTmrJ4u4EpqS/USXAQNUDgI5uwYi6J98WVtJKcfe1AbgerygzDFToxAlOGEQ=='
    crossorigin='anonymous'></script>
</head>

<body>
  <table id="table">
    <thead>
      <tr>
        <th>Tanggal</th>
        <th>Keterangan</th>
        <th>Masuk</th>
        <th>Keluar</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $total_pemasukan = 0;
      $total_pengeluaran = 0;
      ?>

      <?php foreach ($data as $item) : ?>
      <?php
        if ($item['jenis'] == 'pemasukan') {
          $total_pemasukan += $item['nominal'];
        } elseif ($item['jenis'] == 'pengeluaran') {
          $total_pengeluaran += $item['nominal'];
        }
        ?>
      <tr>
        <td><?= $item['tanggal']; ?></td>
        <td><?= $item['keterangan']; ?></td>
        <?php if ($item['jenis'] == 'pemasukan') : ?>
        <td>Rp. <?= number_format($item['nominal'], 0, ',', '.'); ?></td>
        <td>Rp. 0</td>
        <?php elseif ($item['jenis'] == 'pengeluaran') : ?>
        <td>Rp. 0</td>
        <td>Rp. <?= number_format($item['nominal'], 0, ',', '.'); ?></td>
        <?php endif; ?>
      </tr>
      <?php endforeach ?>

      <tr>
        <td colspan="2">Total</td>
        <td>Rp. <?= number_format($total_pemasukan, 0, ',', '.'); ?></td>
        <td>Rp. <?= number_format($total_pengeluaran, 0, ',', '.'); ?></td>
      </tr>

      <tr>
        <td colspan="2">Sisa Saldo</td>
        <td colspan="2">Rp. <?= number_format($total_pemasukan - $total_pengeluaran, 0, ',', '.'); ?></td>
      </tr>
    </tbody>
  </table>

  <script>
  $(document).ready(function() {
    var doc = new jspdf.jsPDF();

    doc.setFontSize(20);
    doc.text(20, 20, 'Laporan Keuangan Bulanan');
    doc.setFontSize(12);

    doc.autoTable({
      html: '#table',
      theme: 'grid',
      columnStyles: {
        0: {
          halign: 'left',
        },
        1: {
          halign: 'left',
          columnWidth: 100
        }
      },
      margin: {
        top: 30
      }
    })

    doc.setProperties({
      title: 'Laporan Keuangan',
      subject: 'Laporan Bulanan',
      author: 'Admin',
      keywords: 'Laporan, Keuangan, Bulanan',
      creator: 'Admin'
    });

    var string = doc.output('datauristring', 'laporan.pdf');
    var iframe = "<iframe width='100%' height='100%' src='" + string + "'></iframe>"
    window.document.open();
    window.document.write(iframe);
    window.document.close();
  });
  </script>
</body>

</html>