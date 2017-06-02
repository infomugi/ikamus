<table class="table table-bordered" style="margin-bottom: 10px">
    <tr>
        <th>NRP</th>
        <th>Nama</th>
    </tr>
    <?php $data = 6312001;  ?>
    <?php for ($i=1; $i <= 220; $i++) { 
        ?>
        <tr>
            <?php
            $nrp[$i] = $data + $i;
            $mahasiswa[$i] = json_decode(file_get_contents("http://api.lpkia.ac.id/v3/student/".$nrp[$i]."/"));
            if($mahasiswa[$i]->success){
                echo "<td>".$mahasiswa[$i]->data->code."</td>";
                echo "<td>".$mahasiswa[$i]->data->name."</td>";
            }else{
                echo "<td class='bg bg-warning'>NRP ".$nrp[$i]." Tidak Terdaftar</span></td>";
                echo "<td class='bg bg-warning'>Data ".$nrp[$i]." Tidak Terdaftar</span></td>";
            }
            ?>
        </tr>
        <?php } ?>
    </table>