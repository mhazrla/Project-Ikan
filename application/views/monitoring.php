<!-- Begin Page Content -->
<div class="container">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <?php if ($this->session->userdata('role_id') == 1) : ?>
            <div class="input-group ">
                <span class="input-group-append">
                    <button class="btn btn-outline-muted border-0  ms-ns rounded-pill" type="button" data-bs-toggle="collapse" href="#tambahData" role="button" aria-expanded="false" aria-controls="tambahData" style="background-color: #E9ECEF; color: #333333;" data-bs-target="#tambahData">
                        <span class="material-symbols-outlined align-text-top">
                            add_circle
                        </span>
                        <span>Tambah Aquarium</span>
                    </button>
                </span>
            </div>
        <?php endif; ?>
        <form action="<?= base_url('monitoring/add') ?>" method="POST">
            <div class="collapse mt-3" id="tambahData">
                <div class="card card-body border-0 rounded-pill float-end d-flex justify-content-end pe-md-5 me-md-5 p-1 " style="background-color: #E9ECEF;">
                    <div class="row">
                        <div class="col-md-10">
                            <input class=" form-control border-end-0 border rounded-pill rounded-pill" type="text" placeholder="Masukkan nama..." name="nama" required>
                            <small class="text-danger"><?php echo form_error('nama') ?></small>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary rounded-4 border-0" style="background-color: #2196F3;" name="tambah">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="container">
        <div class="data"></div>


    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->