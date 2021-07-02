                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">List Daftar SBUB</h1>
                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        
                        <div class="card-body">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambah"> <i class="fa fa-plus"></i> Tambah</button>
                        <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Departemen/Prodi</th>
                                            <th>Angkatan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                    foreach($view as $v) { 
                                        ?>
                                        <tr>
                                            <td><?= $v->nama ?></td>
                                            <td><?= $v->prodi ?></td>
                                            <td><?= $v->angkatan ?></td>
                                            <td>
                                                <form style="display:inline-block;" method="get" action="<?= base_url('Admin/akademik_semester');?>">
                                                <input type='hidden' name="nim" value="<?= $v->nim ?>">
                                                <input type='hidden' name="semester_now" value="1">
                                                <button type="Submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Data Akademik">
                                                <i class="fas fa-fw fa-graduation-cap" style="color:white"></i>
                                                </button>
                                                </form>

                                                <form style="display:inline-block;" method="get" action="<?= base_url('Admin/pribadi');?>">
                                                <input type='hidden' name="nim" value="<?= $v->nim ?>">
                                                <button type="Submit" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Data Pribadi">
                                                <i class="fas fa-fw fa-user" style="color:white"></i>
                                                </button>
                                                </form>

                                                <form style="display:inline-block;" method="get" action="<?= base_url('Admin/akun_mhs');?>">
                                                <input type='hidden' name="nim" value="<?= $v->nim ?>">
                                                <button type="Submit" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Akun">
                                                <i class="fas fa-fw fa-lock" style="color:white"></i>
                                                </button>
                                                </form>

                                                <form style="display:inline-block;" method="post" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?');" action="<?= base_url('Admin/delete_mhs');?>">
                                                <input type='hidden' name="nim" value="<?= $v->nim ?>">
                                                <button type="Submit" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus">
                                                <i class="fas fa-fw fa-trash" style="color:white"></i>
                                                </button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
    <!-- Modal Tambah-->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form role="form" method="post" action="<?= base_url('Admin/tambah_mhs');?>">
                <div class="modal-body">
                <label>NIM</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                <input name="nim" class="form-control" value="" required><br>
                <label>Nama</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                <input name="nama" class="form-control" value="" required><br>
                <label>NIK</label>
                <input name="nik" class="form-control" value="" ><br>
                <label>Departemen/Program Studi</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                <select class="form-control" name="prodi" required="">
                    <option value="">Please Select</option>
                    <?php
                    foreach ($prodi as $p) {
                    ?>
                    <option value="<?php echo $p->id; ?>"><?php echo $p->prodi; ?> </option>
                    <?php
                    }
                    ?>
                </select><br>
                <label>Angkatan</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                <select class="form-control" name="angkatan">
                    <?php
                    for ($year = (int)date('Y'); 2000 <= $year; $year--): ?>
                    <option value="<?php echo $year; ?>"><?php echo $year; ?> </option>
                    <?php endfor; ?>
                </select><br>
                <label>Tempat Lahir</label>
                <textarea name="tempat_lahir" class="form-control" ></textarea><br>
                <label>Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" class="form-control" value=""><br>
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" ></textarea><br>
                <label>Email SSO</label>
                <input name="sso" class="form-control" value="" ><br>
                <label>Email Pribadi</label>
                <input name="email" class="form-control" value="" ><br>
                <label>No. HP</label>
                <input type="number" name="no_hp" class="form-control" value="" >        
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
            </div>
        </div>
    </div>
            <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin ingin melakukan Log Out?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Log Out" apabila Anda ingin mengakhiri season.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="<?= base_url('welcome/logout');?>">Log Out</a>
                </div>
            </div>
        </div>
    </div>

<footer class="bg-white sticky-footer">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>Copyright © Universitas Diponegoro 2021</span></div>
            </div>
        </footer>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/admin/vendor/jquery/jquery.min.js');?>"></script>
    <script src="<?= base_url('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/admin/vendor/jquery-easing/jquery.easing.min.js');?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/admin/js/sb-admin-2.min.js');?>"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/admin/vendor/datatables/jquery.dataTables.min.js');?>"></script>
    <script src="<?= base_url('assets/admin/vendor/datatables/dataTables.bootstrap4.min.js');?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/admin/js/demo/datatables-demo.js');?>"></script>

</body>

</html>