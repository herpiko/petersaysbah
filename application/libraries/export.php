<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
* Excel library for Code Igniter applications
* Based on: Derek Allard, Dark Horse Consulting, www.darkhorse.to, April 2006
* Tweaked by: Moving.Paper June 2013
*/
class Export{
    
    function to_excel($array, $filename) {
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename='.$filename.'.xls');

        // Filter all keys, they'll be table headers
        $h = array();
        foreach($array as $row){
            foreach($row as $key=>$val){
                if(!in_array($key, $h)){
                 $h[] = $key;   
                }
                }
                }
                //echo the entire table headers
                echo '<table><tr>';
                // foreach($h as $key) {
                //     $key = ucwords($key);
                //     echo '<th>'.$key.'</th>';
                // }
                    echo '<th>No. Registrasi</th>';
                    echo '<th>Waktu pendaftaran</th>';
                    echo '<th>Email</th>';
                    echo '<th></th>';
                    echo '<th>Nama</th>';
                    echo '<th>Nama Panggilan</th>';
                    echo '<th>Jenis Kelamin</th>';
                    echo '<th>Tempat lahir</th>';
                    echo '<th>Tanggal lahir</th>';
                    echo '<th>Agama</th>';
                    echo '<th>Alamat</th>';
                    echo '<th>Asal sekolah</th>';
                    echo '<th>NIS</th>';
                    echo '<th>Nama Ayah</th>';
                    echo '<th>Nama Ibu</th>';
                    echo '<th>Pendidikan Ayah</th>';
                    echo '<th>Pendidikan Ibu</th>';
                    echo '<th>Pekerjaan Ayah</th>';
                    echo '<th>Pekerjaan Ibu</th>';
                    echo '<th>Alamat Ortu</th>';
                    echo '<th>No Telp</th>';
                    
                    // echo '<th>Nilai total</th>';
                    echo '<th>Nilai BI</th>';
                    echo '<th>Nilai MTK</th>';
                    echo '<th>Nilai EN</th>';
                    echo '<th>Nilai IPA</th>';
                    echo '<th>Nilai Avg UN</th>';
                    echo '<th>Nilai Avg Raport</th>';
                    echo '<th>Status</th>';
                    echo '<th>Alasan Diskualifikasi</th>';
                    echo '<th>Skor</th>';
                    
                echo '</tr>';
                
                foreach($array as $row){
                     echo '<tr>';
                    foreach($row as $val)
                         $this->writeRow($val);   
                }
                echo '</tr>';
                echo '</table>';
                
            
        }
    function writeRow($val) {
                echo '<td>'.utf8_decode($val).'</td>';              
    }

}