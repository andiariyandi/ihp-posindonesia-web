<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

<ul class="nav menu">

<?php if($this->session->userdata('level')=="ADMIN")
{?>

<li class="active"><a href="<?php echo base_url();?>home"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
<!-- <li class="active"><a href="<?php echo base_url();?>ticket/add"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg> New Ticket</a></li> -->
<li><a href="<?php echo base_url();?>list_ticket/ticket_list"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg> List Ticket  (<?php  echo $notif_list_ticket ?>)</a></li>
<li><a href="<?php echo base_url();?>user/user_list"><svg class="glyph stroked calendar"><use xlink:href="#stroked-male-user"></use></svg> User</a></li>
<li><a href="<?php echo base_url();?>kategori/kategori_list"><svg class="glyph stroked calendar"><use xlink:href="#stroked-app-window"></use></svg> Kategori</a></li>
<li><a href="<?php echo base_url();?>sub_kategori/sub_kategori_list"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-app-window"></use></svg> Sub Kategori</a></li>
<li><a href="<?php echo base_url();?>nopen/nopen_list"><svg class="glyph stroked location pin"><use xlink:href="#stroked-location-pin"/></use></svg> Kantor</a></li>
<!-- <li><a href="<?php echo base_url();?>kondisi/kondisi_list"><svg class="glyph stroked calendar"><use xlink:href="#stroked-hourglass"></use></svg> Kondisi</a></li> -->
<li><a href="<?php echo base_url();?>informasi/informasi_list"><svg class="glyph stroked sound on"><use xlink:href="#stroked-sound-on"/></svg> Informasi</a></li>

<li><a href="<?php echo base_url();?>informasi_view"><svg class="glyph stroked sound on"><use xlink:href="#stroked-sound-on"/></svg> News</a></li>

<?php
}else if($this->session->userdata('level')=="TEKNISI" || $this->session->userdata('level')=="USER"){?>

	<li class="active"><a href="<?php echo base_url();?>home"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
	<li><a href="<?php echo base_url();?>myassignment/myassignment_list"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg> My Assigment Ticket</a></li>
	<li><a href="<?php echo base_url();?>list_ticket/ticket_list"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg> List Ticket (<?php  echo $notif_list_ticket ?>)</a></li>

	<li><a href="<?php echo base_url();?>informasi_view"><svg class="glyph stroked sound on"><use xlink:href="#stroked-sound-on"/></svg> News</a></li>

<?php } else { ?>
	<li class="active"><a href="<?php echo base_url();?>ticket/add"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg> Buat Tiket Baru</a></li>
	<li><a href="<?php echo base_url();?>ticket/add"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg> Buat Tiket Baru</a></li>
<?php  } ?>

</ul>

	</div><!--/.sidebar-->
