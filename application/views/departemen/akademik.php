<div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4"></div>
                        <div class="row"><br>
                            <div class="col-lg-8" style="float:none;margin:auto;">
                            </div>
                    </div>
<div class="col-md-18">
                                <div class="card">
                                    <div class="card-body">
                                        <nav aria-label="Page navigation">
                                        <h5 style="text-align:center; color:blue;">Semester<h6>
                                            <ul class="pagination justify-content-center">
                                            <?php
                                                foreach($semester as $s) {
                                                    $sem=$s->semester;
                                            ?>
                                                <li class="page-item">
                                                <form style="display:inline-block;" method="get" action="<?= base_url('Departemen/akademik_semester');?>">
                                                <input type='hidden' name="nim" value="<?= $nim ?>">
                                                <input type='hidden' name="semester_now" value="<?= $sem ?>">
                                                <button type="Submit" class="page-link">
                                                <?= $sem ?>
                                                </button>
                                                </form></li>
                                            <?php
                                                }
                                            ?>
                                        </nav>
                                        <hr>
                                    
                                </div>
                            </div></div>
        </div>
</div>
        

