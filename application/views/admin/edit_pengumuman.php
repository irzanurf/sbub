<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Pengumuman</h3></div>
                        <div class="row"><br>
        <div class="col-lg-8" style="float:none;margin:auto;">
        </div>
    </div>
    <div class="col-lg-8" style="float:none;margin:auto;">
    <!-- /.row -->
    <form action="<?= base_url('Admin/update_pengumuman');?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?=$v->id?>">
                                <textarea class="form-control" row="3" name="judul" placeholder="Judul" required=""><?=$v->judul?></textarea><br>
                                <div class="form-group">
                                <textarea name="content" id="editor" rows="20"><?=$v->pengumuman?></textarea><br/>
                                </div>

                                <div class="form-group">
                                    <button type="submit" id="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>

   
    <!-- /.row -->
                                </div>
</div>
        </div>

        <script>
                        CKEDITOR.replace( 'editor' );
                </script>