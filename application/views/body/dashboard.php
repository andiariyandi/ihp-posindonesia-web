<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<!-- //dataPIE -->
		<?php
		$dataGeneral = array(

			array("label"=>"On Process", "y"=> $precent_ticket_process),
			array("label"=>"Waiting Technition", "y"=> $precent_ticket_app_tek),
			array("label"=>"Solved", "y"=> $precent_ticket_solved),
		)?>

		<?php
		$dataPusat = array(

			array("label"=>"On Process", "y"=> $precent_ticket_processPusat),
			array("label"=>"Waiting Technition", "y"=> $precent_ticket_app_tekPusat),
			array("label"=>"Solved", "y"=> $precent_ticket_solvedPusat),
		)?>
		<?php
		$dataKPC = array(

			array("label"=>"On Process", "y"=> $precent_ticket_processKPC),
			array("label"=>"Waiting Technition", "y"=> $precent_ticket_app_tekKPC),
				array("label"=>"Solved", "y"=> $precent_ticket_solvedKPC),
		)?>
		<?php
		$dataAGEN = array(

			array("label"=>"On Process", "y"=> $precent_ticket_processAGEN),
			array("label"=>"Waiting Technition", "y"=> $precent_ticket_app_tekAGEN),
				array("label"=>"Solved", "y"=> $precent_ticket_solvedAGEN),
		)?>




<?php
$dataGeneralALL = array(
	array("y" => $jml_ticket, "label" => "General" ),
	array("y" => $jml_ticketPusat, "label" => "KP Bandung 40000" ),
	array("y" => $jml_ticketKPC, "label" => "KP Cabang" ),
	array("y" => $jml_ticketAGEN, "label" => "KP AGEN" ),
);?>

<script>
window.onload = function() {

	var chartGeneral = new CanvasJS.Chart("chartContainerGeneral", {
		animationEnabled: true,
		title: {
			text: "Persentase Tiket"
		},
		subtitles: [{
			text: "General"
		}],
		data: [{
			type: "pie",
			yValueFormatString: "#,##0.00\"%\"",
			indexLabel: "{label} ({y})",
			dataPoints: <?php echo json_encode($dataGeneral, JSON_NUMERIC_CHECK); ?>
		}]
	});
	chartGeneral.render();

	var chartPusat = new CanvasJS.Chart("chartContainerPusat", {
		animationEnabled: true,
		title: {
			text: "Persentase Tiket"
		},
		subtitles: [{
			text: "Pusat"
		}],
		data: [{
			type: "pie",
			yValueFormatString: "#,##0.00\"%\"",
			indexLabel: "{label} ({y})",
			dataPoints: <?php echo json_encode($dataPusat, JSON_NUMERIC_CHECK); ?>
		}]
	});
	chartPusat.render();

	var chartKPC = new CanvasJS.Chart("chartContainerKPC", {
		animationEnabled: true,
		title: {
			text: "Persentase Tiket"
		},
		subtitles: [{
			text: "KPC"
		}],
		data: [{
			type: "pie",
			yValueFormatString: "#,##0.00\"%\"",
			indexLabel: "{label} ({y})",
			dataPoints: <?php echo json_encode($dataKPC, JSON_NUMERIC_CHECK); ?>
		}]
	});
	chartKPC.render();

	var chartAGEN = new CanvasJS.Chart("chartContainerAGEN", {
		animationEnabled: true,
		title: {
			text: "Persentase Tiket"
		},
		subtitles: [{
			text: "AGEN"
		}],
		data: [{
			type: "pie",
			yValueFormatString: "#,##0.00\"%\"",
			indexLabel: "{label} ({y})",
			dataPoints: <?php echo json_encode($dataAGEN, JSON_NUMERIC_CHECK); ?>
		}]
	});
	chartAGEN.render();


var chartGeneralALL = new CanvasJS.Chart("chartContainerGeneralALL", {
	animationEnabled: true,
	title:{
		text: "Tiket Masuk"
	},
	axisY: {
		title: "Jumlah"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.##",
		dataPoints: <?php echo json_encode($dataGeneralALL, JSON_NUMERIC_CHECK); ?>
	}]
});
chartGeneralALL.render();

}
</script>




		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Dashboard -- <?php echo $this->session->userdata('level');?></li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">General</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked email"><use xlink:href="#stroked-email"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $jml_ticket;?></div>
							<div class="text-muted">Total - General</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $jml_ticket_solved;?></div>
							<div class="text-muted">Total - Solved</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked dashboard dial"><use xlink:href="#stroked-dashboard-dial"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $jml_ticket_process;?></div>
							<div class="text-muted">Total - Prosess</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked clock"><use xlink:href="#stroked-clock"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $jml_ticket_app_tek;?></div>
							<div class="text-muted">Total - Waiting</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->

<div class="row">
	<div class="col-xs-6 col-md-6">
		<div class="panel panel-default">
			<div id="chartContainerGeneral" style="height: 370px; width: 100%;"></div>
		</div>
	</div>
	<div class="col-xs-6 col-md-6">
		<div class="panel panel-default">
			<div id="chartContainerGeneralALL" style="height: 370px; width: 100%;"></div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xs-6 col-md-6">
		<div class="panel panel-teal panel-widget">
			<div class="row no-padding">
				<div class="col-sm-3 col-lg-5 widget-left">
					<svg class="glyph stroked star"><use xlink:href="#stroked-star"/></svg>
				</div>
				<div class="col-sm-9 col-lg-7 widget-right">
					<div class="large"><?php echo ceil($jml_feedback_positiv);?>%</div>
					<div class="text-muted">Feedback Positiv</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-6 col-md-6">
		<div class="panel panel-red panel-widget">
			<div class="row no-padding">
				<div class="col-sm-3 col-lg-5 widget-left">
					<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"/></svg>
				</div>
				<div class="col-sm-9 col-lg-7 widget-right">
					<div class="large"><?php echo ceil($jml_feedback_negativ);?>%</div>
					<div class="text-muted">Feedback Negativ</div>
				</div>
			</div>
		</div>
	</div>
</div><!--/.row-->



		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Pusat - KPBD 40000</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-xs-6 col-md-6">
				<div class="panel panel-default">
					<div id="chartContainerPusat" style="height: 370px; width: 100%;"></div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked email"><use xlink:href="#stroked-email"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $jml_ticketPusat;?></div>
							<div class="text-muted">Total - Pusat</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $jml_ticket_solvedPusat;?></div>
							<div class="text-muted">Solved - Pusat</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked dashboard dial"><use xlink:href="#stroked-dashboard-dial"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $jml_ticket_processPusat;?></div>
							<div class="text-muted">Prosess - Pusat</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked clock"><use xlink:href="#stroked-clock"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $jml_ticket_app_tekPusat;?></div>
							<div class="text-muted">Waiting - Pusat</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->




		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">KPC</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-xs-6 col-md-6">
				<div class="panel panel-default">
					<div id="chartContainerKPC" style="height: 370px; width: 100%;"></div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked email"><use xlink:href="#stroked-email"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $jml_ticketKPC;?></div>
							<div class="text-muted">Total - KPC</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $jml_ticket_solvedKPC;?></div>
							<div class="text-muted">Solved - KPC</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked dashboard dial"><use xlink:href="#stroked-dashboard-dial"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $jml_ticket_processKPC;?></div>
							<div class="text-muted">Prosess - KPC</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked clock"><use xlink:href="#stroked-clock"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $jml_ticket_app_tekKPC;?></div>
							<div class="text-muted">Waiting - KPC</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->


		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">AGEN</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-xs-6 col-md-6">
				<div class="panel panel-default">
					<div id="chartContainerAGEN" style="height: 370px; width: 100%;"></div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked email"><use xlink:href="#stroked-email"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $jml_ticketAGEN;?></div>
							<div class="text-muted">Total - AGEN</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $jml_ticket_solvedAGEN;?></div>
							<div class="text-muted">Solved - AGEN</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked dashboard dial"><use xlink:href="#stroked-dashboard-dial"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $jml_ticket_processAGEN;?></div>
							<div class="text-muted">Prosess - AGEN</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked clock"><use xlink:href="#stroked-clock"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $jml_ticket_app_tekAGEN;?></div>
							<div class="text-muted">Waiting - AGEN</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->

			</div><!--/.col-->
		</div><!--/.row-->
	</div>	<!--/.main-->
