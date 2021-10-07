$(document).ready(function() {
    $('#dataTables').DataTable( {
        "lengthMenu": [[-1, 10], ["Semua Data", "10"]]
    } );
} );

$(document).ready(function() {
    $('#dataTablesSiswa').DataTable( {
        "lengthMenu": [[20,50,-1], ["20","50","Semua Data"]]
    } );
} );

$('.tombolSimpanKelas').on('click', function() {
    const namaKelas = document.getElementById('namaKelas').value;
    const kodeKelas = document.getElementById('kodeKelas').value;
    const tingkat = document.getElementById('tingkat').value;

    const toastLiveExample = document.getElementById('liveToast');
    $.ajax({
        type:'post',
        url:baseURL+'insert/class',
        data:{namaKelas,kodeKelas,tingkat},
        dataType: 'json',
        success:function(data){
            // alert('ok')
            // console.log(data);
            if (data == 'success') {
                // alert('sukses')
                var toast = new bootstrap.Toast(toastLiveExample)

                toast.show()
            }

            if (data == 'duplicated') {
                Swal.fire(
                    'Terjadi duplikasi kode kelas!',
                    '',
                    'error',
                )
            }
        },
        error:function(){
            alert('error attemp')
        }
    })
})

$('#tambahKelas').on('hidden.bs.modal', function() {
    location.reload();
})

$('.semuaDataKelas').on('click', function() {
    Swal.fire({
        title: 'Konfirmasi Hapus data',
        text: 'Yakin akan menghapus semua data kelas ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = baseURL+'delete/all_classes'

        }
    })
})

$('#dataTables').on('click', ('.tombolHapusKelas'), function() {
    const id = $(this).data('id');
    const clsName = $(this).attr('clsName');
    console.log(id)

    Swal.fire({
        title: 'Konfirmasi Hapus data',
        text: 'Yakin akan menghapus data kelas ' + clsName + ' ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: baseURL + 'delete/class',
                data: {
                    id
                },
                type: 'post',
                success: function(data) {
                    Swal.fire(
                        'Data berhasil di hapus!',
                        '',
                        'success',
                    )
                    window.setTimeout(function() {
                        location.reload();
                    }, 1000);
                },
                error: function(e) {
                    console.log(e)
                }
            })

        }
    })

})


$('#dataTables').on('click', '.tombolUbahKelas', function(){
    const id = $(this).data('id')
    
    $.ajax({
        url: baseURL + 'get/class',
        type: 'post',
        data: {id},
        dataType: 'json',
        success: function(data) {
            $('#ubahKelas').modal('show');
            $("#ubahDataKls [name='idUbahKelas']").val(data[0]['id'])
            $("#ubahDataKls [name='ubahNamaKelas']").val(data[0]['namaKelas'])
            $("#ubahDataKls [name='ubahKodeKelas']").val(data[0]['kodeKelas'])
            $("#ubahDataKls [name='ubahTingkat']").val(data[0]['tingkat'])
        },
        error: function(){
            alert('error')
        }
    })
})

$('.tombolSimpanUbahKelas').on('click', function(){
    const namaKelas = document.getElementById('ubahNamaKelas').value
    const kodeKelas = document.getElementById('ubahKodeKelas').value
    const tingkat = document.getElementById('ubahTingkat').value
    const id = document.getElementById('idUbahKelas').value
    
    $.ajax({
        url: baseURL + 'edit/class',
        type: 'post',
        data: {id,namaKelas,kodeKelas,tingkat},
        success: function(data) {
            Swal.fire(
                'Data berhasil di diubah!',
                '',
                'success',
            )
            window.setTimeout(function() {
                location.reload();
            }, 1500);
        },
        error: function(e) {
            console.log(e)
        }
    })
})


$(document).ready(function() {
    $('.select2').select2({
        dropdownParent: $('#tambahSiswa')
    });
});

$('.tombolSimpanSiswa').on('click', function() {
    const namaSiswa = document.getElementById('namaSiswa').value
    const kodeKelas = document.getElementById('kodeKelas').value
    const nisn = document.getElementById('nisn').value

    $.ajax({
        url : baseURL + 'insert/student',
        type: 'post',
        data: {namaSiswa,kodeKelas,nisn},
        success:function(data) {
            if (data == 1) {
                var toast = new bootstrap.Toast(simpanSiswaSukses)
                toast.show()
            }

            if(data == 0) {
                Swal.fire(
                    'Data gagal disimpan',
                    'NISN sudah digunakan',
                    'error'
                  )
            }
        },
        error:function(e) {
            console.log(e)
        }
    })
})

$('#tambahSiswa').on('hidden.bs.modal', function(){
    location.reload()
})

$('#dataTablesSiswa').on('click', '.tombolHapusSiswa', function() {
    const id = $(this).data('id')
    const namaSiswa = $(this).attr('namaSiswa')

    Swal.fire({
        title: 'Apakah anda yakin menghapus data ' +namaSiswa+ '?',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus !',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                url: baseURL + 'delete/student',
                type: 'post',
                data: {id},
                success: function(data){
                    Swal.fire(
                        'Data berhasil dihapus!',
                        '',
                        'success'
                      )
                    
                    window.setTimeout(function() {
                        location.reload()
                    }, 1000)
                },
                error: function() {

                }
            })
        }
      })

})

$('.semuaDataSiswa').on('click', function() {
    Swal.fire({
        title: 'Konfirmasi Hapus data',
        text: 'Yakin akan menghapus semua data siswa ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = baseURL+'delete/all_students'

        }
    })
})

$('#dataTablesSiswa').on('click', '.tombolUbahSiswa', function(){
    const id = $(this).data('id')
    
    $.ajax({
        url: baseURL + 'get/student',
        type: 'post',
        data: {id},
        dataType: 'json',
        success: function(data) {
            $('#ubahDataSiswa').modal('show');
            $("#formUbahDataSiswa [name='idUbahSiswa']").val(data[0]['id'])
            $("#formUbahDataSiswa [name='ubahNamaSiswa']").val(data[0]['namaSiswa'])
            $("#formUbahDataSiswa [name='ubahKodeKelas']").val(data[0]['kodeKelas'])
            $("#formUbahDataSiswa [name='ubahnisn']").val(data[0]['nisn'])
          
        },
        error: function(){
            alert('error')
        }
    })
})

$('.tombolSimpanUbahSiswa').on('click', function(){
    const namaSiswa = document.getElementById('ubahNamaSiswa').value
    const kodeKelas = document.getElementById('ubahKodeKelas').value
    const nisn = document.getElementById('ubahnisn').value
    const id = document.getElementById('idUbahSiswa').value
    
    $.ajax({
        url: baseURL + 'edit/student',
        type: 'post',
        data: {id,namaSiswa,kodeKelas,nisn},
        success: function(data) {
            Swal.fire(
                'Data berhasil di diubah!',
                '',
                'success',
            )
            window.setTimeout(function() {
                location.reload();
            }, 1500);
        },
        error: function(e) {
            console.log(e)
        }
    })
})

$('.tombolSimpanGuru').on('click', function() {
    const namaGuru = document.getElementById('namaGuru').value
    const nip = document.getElementById('nip').value
    const email = document.getElementById('email').value
    const password = document.getElementById('password').value
    const hp = document.getElementById('hp').value

    $.ajax({
        url : baseURL + 'insert/teacher',
        type: 'post',
        data: {namaGuru,nip,email,password,hp},
        success:function(data) {
            if (data == 1) {
                var toast = new bootstrap.Toast(simpanGuruSukses)
                toast.show()
            }

            if(data == 0) {
                Swal.fire(
                    'Data gagal disimpan',
                    'Email sudah digunakan',
                    'error'
                  )
            }
        },
        error:function(e) {
            console.log(e)
        }
    })
})

$('#tambahGuru').on('hidden.bs.modal', function(){
    location.reload()
})

$('.semuaDataGuru').on('click', function() {
    Swal.fire({
        title: 'Konfirmasi Hapus data',
        text: 'Yakin akan menghapus semua data guru ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = baseURL+'delete/all_teachers'
        }
    })
})

$('#dataTablesSiswa').on('click', '.tombolHapusGuru', function() {
    const id = $(this).data('id')
    const namaGuru = $(this).attr('tcName')

    Swal.fire({
        title: 'Apakah anda yakin menghapus data ' +namaGuru+ '?',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus !',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                url: baseURL + 'delete/teacher',
                type: 'post',
                data: {id},
                success: function(data){
                    Swal.fire(
                        'Data berhasil dihapus!',
                        '',
                        'success'
                      )
                    
                    window.setTimeout(function() {
                        location.reload()
                    }, 1000)
                },
                error: function() {

                }
            })
        }
      })

})

$('#dataTablesSiswa').on('click', '.tombolUbahGuru', function(){
    const id = $(this).data('id')
    
    $.ajax({
        url: baseURL + 'get/teacher',
        type: 'post',
        data: {id},
        dataType: 'json',
        success: function(data) {
            $('#ubahDataGuru').modal('show');
            $("#ubahDataGuru [name='idUbahGuru']").val(data[0]['id'])
            $("#ubahDataGuru [name='ubahNamaGuru']").val(data[0]['namaGuru'])
            $("#ubahDataGuru [name='ubahNipGuru']").val(data[0]['nip'])
            $("#ubahDataGuru [name='ubahEmailGuru']").val(data[0]['email'])
            $("#ubahDataGuru [name='ubahHpGuru']").val(data[0]['hp'])
        },
        error: function(){
            alert('error')
        }
    })
})

$('.tombolSimpanUbahGuru').on('click', function(){
    const namaGuru = document.getElementById('ubahNamaGuru').value
    const nip = document.getElementById('ubahNipGuru').value
    const password = document.getElementById('ubahPasswordGuru').value
    const hp = document.getElementById('ubahHpGuru').value
    const id = document.getElementById('idUbahGuru').value
    
    $.ajax({
        url: baseURL + 'edit/teacher',
        type: 'post',
        data: {id,namaGuru,nip,password,hp},
        success: function(data) {
            Swal.fire(
                'Data berhasil di diubah!',
                '',
                'success',
            )
            window.setTimeout(function() {
                location.reload();
            }, 1500);
        },
        error: function(e) {
            console.log(e)
        }
    })
})