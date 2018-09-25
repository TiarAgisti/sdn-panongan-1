<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Raport murid</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/stylereport.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/cssstyle.css"> -->
<!--     <link rel="stylesheet" href="style.css" media="all" /> -->
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <!-- <img src="sd.png"> -->
        <h1>SEKOLAH DASAR NEGERI PANONGAN</h1>
      </div>
      <h2>RAPORT MURID</h2>
      <div id="project" >
        <div><span>WALI KELAS</span><span>: &nbsp; <?php echo $dataku['nama_guru']; ?></span></div>
        <div><span>NAMA MURID</span><span>: &nbsp; <?php echo $dataku['nama_murid']; ?></span></div>
        <div><span>KELAS</span><span>: &nbsp; <?php echo $dataku['ket_kelas']; ?></span></div>
        <div><span>TAHUN AJARAN</span><span>: &nbsp; <?php echo $dataku['thn_ajaran']; ?></span></div>
      </div>
    </header>
    <main>
      <table border="1">
        <thead>
          <tr>
            <th>KODE MATA PELAJARAN</th>
            <th>NAMA MATA PELAJARAN</th>
            <th>NILAI KKM</th>
            <th>NILAI</th>
            <th>KETERANGAN</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($dataku['list_nilai'] as $row){;?>
                    <tr>
                        <td><?php echo $row->kode_mapel;?></td>
                        <td><?php echo $row->nama_mapel;?></td>
                        <td><?php echo $row->nilai_kkm;?></td>
                        <td><?php echo $row->nilai;?></td>
                        <td><?php echo $row->keterangan;?></td>
                    </tr>
                    <?php }; ?>
        </tbody>
      </table>

      <div id="project">
        <div><span>SAKIT</span><span>: &nbsp; <?php echo $dataku['sakit']; ?></span></div>
        <div><span>IZIN</span><span>: &nbsp; <?php echo $dataku['ijin']; ?></span></div>
        <div><span>ALPA</span><span>: &nbsp; <?php echo $dataku['alpa']; ?></span></div>
        <div><span>KETERANGAN</span><span>: &nbsp; <?php echo $dataku['keterangan']; ?></span></div>
      </div>
    </main>
  </body>
</html>