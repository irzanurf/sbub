                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Pengumuman</h1>
                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        
                        <div class="card-body">
                        <a href="<?=base_url('Admin/tambah_pengumuman');?>"><button class='btn btn-info'><i class="fa fa-plus"></i> Tambah</button></a>
                        <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tgl</th>
                                            <th>Judul</th>
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
                                    $date = date('d-m-Y', strtotime($v->date));
                                        ?>
                                        <tr>
                                            <td><?= $date ?></td>
                                            <td><?= $v->judul ?></td>
                                            <td>
                                                <form style="display:inline-block;" method="get" action="<?= base_url('Admin/edit_pengumuman');?>">
                                                <input type='hidden' name="id" value="<?= $v->id ?>">
                                                <button type="Submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Data Akademik">
                                                <i class="fas fa-fw fa-pen" style="color:white"></i>
                                                </button>
                                                </form>

                                                <form style="display:inline-block;" method="post" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?');" action="<?= base_url('Admin/delete_pengumuman');?>">
                                                <input type='hidden' name="id" value="<?= $v->id ?>">
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