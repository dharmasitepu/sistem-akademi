<style>
    #loader {
        border: 20px solid #f3f3f3;
        border-radius: 50%;
        border-top: 20px solid #444444;
        width: 150px;
        height: 150px;
        animation: spin 1s linear infinite;
        z-index: 9999;
    }

    @keyframes spin {
        100% {
            transform: rotate(360deg);
        }
    }

    .center {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
    }

    .bungkus {
        position: absolute;
        z-index: 999;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        visibility: hidden;
    }

    .text-loading {
        position: absolute;
        top: 65%;
        left: 50%;
        transform: translate(-50%, -50%);
        margin: auto;
        color: white;
        text-align: center;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
</style>
<div class="bungkus">
    <div id="loader" class="center"></div>
    <h3 class="text-loading">
        Importing...
        <br>
        Don't close this process
    </h3>
</div>
<div class="right_col" role="main" style="min-height: 2098px;">
    <?php if ($this->session->flashdata('berhasil')) { ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>" data-tipe="Berhasil"
        data-judul="Data Biaya PPDB"></div>
    <?php } if ($this->session->flashdata('gagal')) { ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('gagal'); ?>" data-tipe="Gagal"
        data-judul="Data Biaya PPDB"></div>
    <?php } ?>
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Import Data Guru</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div style="height: 600px" class="x_panel">
                    <div class="x_title">
                        <h2>Data Guru</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a href="javascript:history.back()" class="collapse-link">
                                    <h2><i class="fa fa-arrow-left"></i> Back</h2>
                                </a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <p class="text-muted font-13 m-b-30"></p>
                            <p><label>Format Import ? </label> - <a href="<?= base_url('Export/fullGuru/format') ?>">Klik Disini</a>
                            </p>
                            <form method="post" action="<?= base_url('importGuru/import') ?>"
                                enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Pilih File Excel</label>
                                    <input type="file" name="file" id="file" required accept=".xls, .xlsx" class="form-control"></p>
                                </div>
                                <button type="submit" id="import" name="import" class="btn btn-success" >Import</button>
                            </form>
                            <br />
                            <div class="table-responsive" id="customer_data">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#import").click(function () {
        if ($("#file")[0].files[0]) {
            document.querySelector(".bungkus").style.visibility = "visible";
        } 
    });
</script>
