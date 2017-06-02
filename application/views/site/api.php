<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div ng-controller="widgetsController">
<div class="row">
<div class="col-lg-12">
<div class="text-left">


<h3><i class="fa fa-list"></i> List Terms</h3>

<p>
Show All istilah, from this url:
</p>

<div class="panel panel-default">
<div class="panel-body">
<samp>
<a target="_blank" href="<?php echo base_url(); ?>api/listTerm"/><?php echo base_url(); ?>api/listTerm</a>
</samp>
</div>
</div>

<pre>
<code>
{
"success": 1,
"message": "Data retrieved successfully.",
"feed": 
[
{
"id_term": "1694",
"name": " bangunan ",
"description": "setiap struktur yang digunakan atau dimaksudkan untuk menunjang atau mewadahi suatu penggunaan atau kegiatan manusia",
"status": "1"
},
{
"id_term": "1",
"name": "3 R",
"description": "adalah menerapkan reuse, reduce, dan recycling artinya menggunakan kembali, mengurangi dan mendaur ulang sampah (SNI 3242:2008)",
"status": "1"
},
]
}
</code>
</pre>


<h3><i class="fa fa-eye"></i> Detail Term</h3>

<p>
Get detail istilah list, from this url:
</p>

<div class="panel panel-default">
<div class="panel-body">
<samp>
<a target="_blank" href="<?php echo base_url(); ?>api/getById/1"/><?php echo base_url(); ?>api/getById/1</a>
</samp>
</div>
</div>

<pre>
<code>
{
"success": 1,
"message": "Data retrieved successfully.",
"feed": 
{
"id_term": "338",
"name": "acuan tetap (fixed form)",
"description": "jenis acuan yang umumnya terbuat dari baja dan dipasang di lokasi penghamparan sebelum pengecoran beton semen",
"status": "Aktif"
}
}
</code>
</pre>

<h3><i class="fa fa-search"></i> Search Term</h3>

<p>
Get istilah list from a keyword, from this url:
</p>

<div class="panel panel-default">
<div class="panel-body">
<samp>
<a target="_blank" href="<?php echo base_url(); ?>api/searchTerm/mekanis"/><?php echo base_url(); ?>api/searchTerm/mekanis</a>
</samp>
</div>
</div>

<pre>
<code>
{
"success": 1,
"message": "Data retrieved successfully.",
"feed": [
{
"id_term": "2011",
"name": "Kriteria keruntuhan (failure criterion) ",
"description": "adalah spesifikasi kondisi mekanis jika material tidak berkesinambungan lagi atau telah berubah bentuk melampaui suatu kondisi batas tertentu. Kriteria ini didasarkan secara teoritis ataupun empiris dari kurva hubungan antara tegangan dan regangan yang menunjukkan telah terjadinya pola keruntuhan. ",
"status": "1"
},
{
"id_term": "1877",
"name": "pengendalian pemanfaatan ruang",
"description": "kegiatan pengendalian yang dilakukan dalam pelaksanaan pemanfaatan ruang
diselenggarakan melalui kegiatan pengawasan dan penertiban serta mekanisme perijinan 
",
"status": "1"
},
]
}
</code>
</pre>


</div>
</div>
</div>
</div>