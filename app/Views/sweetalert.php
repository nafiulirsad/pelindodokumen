<?php $alert = session()->getFlashdata('alert');
switch($alert){
    case 'berhasil_tambah':
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Yeay!',
                text: 'Berhasil menambahkan data penerimaan dokumen.',
            })
        </script>";
        session()->setFlashdata('alert', '');
        break;
    case 'berhasil_approve':
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Yeay!',
                text: 'Berhasil mengapprove data penerimaan dokumen.',
            })
        </script>";
        session()->setFlashdata('alert', '');
        break;
    case 'berhasil_hapus':
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Yeay!',
                text: 'Berhasil menghapus data penerimaan dokumen.',
            })
        </script>";
        session()->setFlashdata('alert', '');
        break;



    case 'gagal_coba_lagi':
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Ups!',
                text: 'Terjadi kegagalan. Silakan coba lagi atau laporkan ke admin.',
            })
        </script>";
        session()->setFlashdata('alert', '');
        break;
}

?>