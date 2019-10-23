
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Kantor</li>
			</ol>
		</div><!--/.row-->

	<br>

	<?php echo $this->session->flashdata("msg");?>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>
<a href="<?php echo base_url();?>nopen/add" style="text-decoration:none">Tambah Data Kantor</a></div>
					<div class="panel-body">
						<table data-toggle="table" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true"  data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th data-field="no" data-sortable="true" width="10px"> No</th>
						        <th data-field="id" data-sortable="true">Nopen</th>
										<th data-field="idd" data-sortable="true">Nama Kantor</th>
										<th data-field="iddd" data-sortable="true">Tipe</th>
						        <th>Aksi</th>
						    </tr>
                            </thead>
                            <tbody>
                           <?php $no = 0; foreach($datanopen as $row) : $no++;?>
						     <tr>
						        <td data-field="no" width="10px"><?php echo $no;?></td>
						        <td data-field="id"><?php echo $row->id_nopen;?></td>
										<td data-field="idd"><?php echo $row->nama;?></td>
										<td data-field="iddd"><?php echo $row->tipe;?></td>
						         <td>
<a class="ubah btn btn-primary btn-xs" href="<?php echo base_url();?>nopen/edit/<?php echo $row->id_nopen;?>"><span class="glyphicon glyphicon-edit" ></span></a>
<a data-toggle="modal"  title="Hapus Kontak" class="hapus btn btn-danger btn-xs" href="#modKonfirmasi" data-id="<?php echo $row->id_nopen;?>"><span class="glyphicon glyphicon-trash"></span></a>
</td>
						    </tr>
						    <?php endforeach;?>
						    </tbody>

						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->




						<script>
						    $(function () {
						        $('#hover, #striped, #condensed').click(function () {
						            var classes = 'table';

						            if ($('#hover').prop('checked')) {
						                classes += ' table-hover';
						            }
						            if ($('#condensed').prop('checked')) {
						                classes += ' table-condensed';
						            }
						            $('#table-style').bootstrapTable('destroy')
						                .bootstrapTable({
						                    classes: classes,
						                    striped: $('#striped').prop('checked')
						                });
						        });
						    });

						    function rowStyle(row, index) {
						        var classes = ['active', 'success', 'info', 'warning', 'danger'];

						        if (index % 2 === 0 && index / 2 < classes.length) {
						            return {
						                classes: classes[index / 2]
						            };
						        }
						        return {};
						    }
						</script>

<?php $this->load->view('konfirmasi');?>

<script type="text/javascript">
$(document).ready(function(){

$(".hapus").click(function(){
var id = $(this).data('id');

$(".modal-body #mod").text(id);

});

});
</script>



					</div>
				</div>
			</div>
		</div><!--/.row-->
