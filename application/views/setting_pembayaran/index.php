<div class="box">
  <div class="box-header">
    <div class="col-md-6" style="padding: 0;">
      <a href="<?php echo base_url(); ?>setting_pembayaran/add"><button class="form-control btn btn-primary" data-toggle="modal"><i class="glyphicon glyphicon-plus-sign"></i> New Create</button></a>
    </div>
  </div>
  <div class="msg" style="display:none;">
    <?php echo @$this->session->flashdata('msg'); ?>
  </div>
  <!-- /.box-header -->
  <div class="box-body" style="overflow: auto;">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Tahun Pelajaran</th>
          <th>Tipe Pembayaran</th>
          <!--<th>Jenis Kelamin</th>  -->
          <th>Kelas</th>
          <th>Nominal</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach ($setting_pembayaran as $k) {
        ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $k->tahun_ajaran; ?></td>
            <td><?php echo $k->tipe_pembayaran; ?></td>
            <!-- <td><?php echo $k->jenis_kelamin; ?></td> -->
            <td> <?php echo $k->nama_tipe_kelas; ?></td>
            <td>Rp. <?php echo number_format($k->nominal, '2', ',', '.'); ?></td>
            <td class="text-center" style="min-width:230px;">
              <!-- <a href="<?php echo base_url(); ?>setting_pembayaran/detail/<?php echo $k->id_setting_pembayaran; ?>">
              <button class="btn btn-info"><i class="glyphicon glyphicon-zoom-in"></i> Detail</button>
            </a> -->
              <a href="<?php echo base_url(); ?>setting_pembayaran/edit/<?php echo $k->id_setting_pembayaran; ?>">
                <button class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i> Update</button>
              </a>
              <a href="<?php echo base_url(); ?>setting_pembayaran/delete/<?php echo $k->id_setting_pembayaran; ?>" onclick="return confirm('Anda yakin akan menghapus data ini...!')">
                <button class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
              </a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>