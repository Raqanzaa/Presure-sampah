<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Recycle</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data Recycle</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Data Recycle</h3>
                        <div class="card-tools">
                            <form action="#" method="get">
                                <div class="input-group input-group-sm" style="width: 300px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>

                    <div class="float-right ml-4 mb-3">
                        <a class="btn btn-success btn-sm" href="<?php echo base_url('c_recycle/tambah'); ?>">
                            <i class="fas fa-plus"></i> Tambah Data Recycle
                        </a>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: auto;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Jenis Sampah</th>
                                    <th>Berat (kg)</th>
                                    <th>Tanggal</th>
                                    <th>Nama TPS</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data_recycle as $data): ?>
                                    <tr>
                                        <td><?php echo $data->id_data; ?></td>
                                        <td><?php echo $data->jenis_sampah; ?></td>
                                        <td><?php echo $data->berat; ?></td>
                                        <td><?php echo $data->tanggal; ?></td>
                                        <td><?php echo $data->nama_tps; ?></td>
                                        <td class="project-actions">
                                            <a class="btn btn-primary btn-sm" href="<?php echo base_url('c_recycle/view/'.$data->id_data); ?>">
                                                <i class="fas fa-folder"></i> View
                                            </a>
                                            <a class="btn btn-info btn-sm" href="<?php echo base_url('c_recycle/edit/'.$data->id_data); ?>">
                                                <i class="fas fa-pencil-alt"></i> Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="<?php echo base_url('c_recycle/hapus/'.$data->id_data); ?>">
                                                <i class="fas fa-trash"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <div class="float-right">
                            <a class="btn btn-success btn-sm" href="<?php echo base_url('c_recycle/tambah'); ?>">
                                <i class="fas fa-plus"></i> Tambah Data Recycle
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->