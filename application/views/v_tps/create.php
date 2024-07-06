<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah TPS</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Tambah TPS</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <?php echo form_open('c_tps/store'); ?>
                        <div class="form-group">
                            <label for="nama_tps">Nama TPS</label>
                            <input type="text" name="nama_tps" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat_tps">Alamat TPS</label>
                            <input type="text" name="alamat_tps" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="kapasitas">Kapasitas</label>
                            <input type="number" name="kapasitas" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" class="form-control" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?php echo site_url('c_tps'); ?>" class="btn btn-secondary">Kembali</a>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
