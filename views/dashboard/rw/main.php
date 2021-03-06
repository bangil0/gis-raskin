<div class="row">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="green">
                <i class="material-icons">description</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Kelola RW -
                    <small class="category">Sistem Pengolahan Data Pesebaran Keluarga Miskin</small>
                </h4>
                <hr>
                <p>Klik tombol di bawah untuk menambahkan RW baru :</p>
                <a href="?page=tambah-rw" class="btn btn-success">
                    <i class="material-icons">add</i> 
                    Tambah RW Baru
                </a><br><hr>
                <p>Berikut adalah tabel data RW yang berada pada Kelurahan Koto Panjang :</p>
                <div class="material-datatables">
                    <table id="data-rw" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <?php  
                            $list_data = [];
                            $query = "SELECT * FROM rw";
                            $procs = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_array($procs)) {
                                $list_data[] = $row;
                            }
                        ?>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama RW</th>
                                <th>Nama Ketua RW</th>
                                <th class="disabled-sorting">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list_data as $key => $value): ?>
                                <tr>
                                    <td><?php echo $key+1 ?></td>
                                    <td>RW <?php echo $value['nama_rw'] ?></td>
                                    <td><?php echo $value['ketua_rw'] ?></td>
                                    <td>
                                        <a href="?page=ubah-rw&id=<?php echo $value['id'] ?>" class="btn btn-round btn-simple btn-success btn-icon"><i class="material-icons">create</i></a>
                                        <a href="?page=hapus-rw&id=<?php echo $value['id'] ?>" class="btn btn-round btn-simple btn-danger btn-icon"><i class="material-icons">close</i></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <?php include 'views/partials/rightbar.php'; ?>
    </div>
</div>