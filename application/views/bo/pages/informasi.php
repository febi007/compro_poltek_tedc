<!-- Start Row -->
<?php $menu = ['Jenis_Informasi', 'Kategori_Informasi', 'Daftar_Informasi']; ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="row" style="display: flex;">
                <div class="col-md-5">
                    <ul class="nav nav-tabs tabs tabs-top">
                        <?php foreach ($menu as $val): ?>
                        <li class="tab">
                            <a href="#<?= $val ?>" data-toggle="tab" aria-expanded="false"
                                onclick="tabChange('<?= $val ?>')">
                                <span class="visible-xs"><i class="fa fa-home"></i></span>
                                <span class="hidden-xs"><?= str_replace(
                                    '_',
                                    ' ',
                                    $val
                                ) ?></span>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>

                </div>
                <div class="col-md-4" style="margin-left:auto;padding:10px;margin-right:10px">
                    <div class="input-group">
                        <input type="search" id="any" name="any" class="form-control"
                            onkeyup="return cari(event, $(this).val())" placeholder="Tulis dan tekan enter">
                        <span class="input-group-btn">
                            <button type="button" class="btn waves-effect waves-light btn-primary"><i
                                    class="fa fa-search"></i></button>
                            <button class="btn waves-effect waves-light btn-primary btn-add" onclick="add()"
                                style="margin-left:10px;"><i class="fa fa-plus"></i></button>

                        </span>

                    </div>
                </div>


            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="tab-content">
                        <?php foreach ($menu as $val): ?>
                        <div class="tab-pane active" id="<?= $val ?>">
                            <table class="table table-hover table-bordered" id="result-table-<?= $val ?>">
                            </table>
                        </div>
                        <div id="pagination_link_<?= $val ?>"></div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="text" id="page">
<?php $this->load->view('bo/pages/modals/' . $content . '/form-jenis.php'); ?>

<script src="<?= base_url() .
    'assets/' ?>js/pages/informasi.js" type="text/javascript"></script>
<script src="<?= base_url() .
    'assets/' ?>js/pages/informasi/jenis.js" type="text/javascript"></script>

<script type="text/javascript">
var menuActive = "";
$(document).ready(function() {
    // set_ckeditor("isi_informasi");
    tabChange("<?= $menu[0] ?>")
}).on("click", ".pagination li a", function(event) {
    event.preventDefault();
    var page = $(this).data("ci-pagination-page");
    load_data(page, {}, $("#page").val());
});
</script>