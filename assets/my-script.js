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

$('#tambahMapel, #tambahJampel, #tambahGuru, #tambahSiswa, #tambahKelas, #tambahJadwal').on('hidden.bs.modal', function() {
    location.reload();
})

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
        dropdownParent: $('#tambahSiswa, #tambahJadwal')
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

$('.tombolSimpanMapel').on('click', function() {
    const namaMapel = document.getElementById('namaMapel').value;
    const kodeMapel = document.getElementById('kodeMapel').value;
    const kelompok = document.getElementById('kelompok').value;

    const toastLiveExample = document.getElementById('liveToast');
    $.ajax({
        type:'post',
        url:baseURL+'insert/subject',
        data:{namaMapel,kodeMapel,kelompok},
        dataType: 'json',
        success:function(data){
   
            if (data == 'success') {
                // alert('sukses')
                var toast = new bootstrap.Toast(toastLiveExample)

                toast.show()
            }

            if (data == 'duplicated') {
                Swal.fire(
                    'Terjadi duplikasi kode mapel!',
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



$('.semuaDataMapel').on('click', function() {
    Swal.fire({
        title: 'Konfirmasi Hapus data',
        text: 'Yakin akan menghapus semua data Mapel ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = baseURL+'delete/all_subjects'
        }
    })
})

$('#dataTables').on('click', ('.tombolHapusMapel'), function() {
    const id = $(this).data('id');
    const subName = $(this).attr('subName');
    console.log(id)

    Swal.fire({
        title: 'Konfirmasi Hapus data',
        text: 'Yakin akan menghapus data Mapel ' + subName + ' ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: baseURL + 'delete/subject',
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

$('#dataTables').on('click', '.tombolUbahMapel', function(){
    const id = $(this).data('id')
    
    $.ajax({
        url: baseURL + 'get/subject',
        type: 'post',
        data: {id},
        dataType: 'json',
        success: function(data) {
            $('#ubahMapel').modal('show');
            $("#ubahDataMapel [name='idUbahMapel']").val(data[0]['id'])
            $("#ubahDataMapel [name='ubahNamaMapel']").val(data[0]['namaMapel'])
            $("#ubahDataMapel [name='ubahKodeMapel']").val(data[0]['kodeMapel'])
            $("#ubahDataMapel [name='ubahKelompok']").val(data[0]['kelompok'])
        },
        error: function(){
            alert('error')
        }
    })
})

$('.tombolSimpanUbahMapel').on('click', function(){
    const namaMapel = document.getElementById('ubahNamaMapel').value
    const kodeMapel = document.getElementById('ubahKodeMapel').value
    const kelompok = document.getElementById('ubahKelompok').value
    const id = document.getElementById('idUbahMapel').value
    
    $.ajax({
        url: baseURL + 'edit/subject',
        type: 'post',
        data: {id,namaMapel,kodeMapel,kelompok},
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

$('.tombolSimpanJampel').on('click', function() {
    const jamKe = document.getElementById('jamKe').value;
    const waktuMulai = document.getElementById('waktuMulai').value;
    const waktuSelesai = document.getElementById('waktuSelesai').value;

    const toastLiveExample = document.getElementById('liveToast');
    $.ajax({
        type:'post',
        url:baseURL+'insert/timing',
        data:{jamKe,waktuMulai,waktuSelesai},
        dataType: 'json',
        success:function(data){
   
            if (data == 'success') {
                // alert('sukses')
                var toast = new bootstrap.Toast(toastLiveExample)

                toast.show()
            }

            if (data == 'duplicated') {
                Swal.fire(
                    'Terjadi duplikasi jam pelajaran!',
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

$('.semuaDataJampel').on('click', function() {
    Swal.fire({
        title: 'Konfirmasi Hapus data',
        text: 'Yakin akan menghapus semua data jam pelajaran ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = baseURL+'delete/all_timing'
        }
    })
})

$('#dataTablesSiswa').on('click', ('.tombolHapusJampel'), function() {
    const id = $(this).data('id');
    const timeName = $(this).attr('timeName');
    console.log(id)

    Swal.fire({
        title: 'Konfirmasi Hapus data',
        text: 'Yakin akan menghapus data jam pelajaran ke ' + timeName + ' ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: baseURL + 'delete/timing',
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

$('#dataTablesSiswa').on('click', '.tombolUbahKelas', function(){
    const id = $(this).data('id')
    
    $.ajax({
        url: baseURL + 'get/timing',
        type: 'post',
        data: {id},
        dataType: 'json',
        success: function(data) {
            $('#ubahJampel').modal('show');
            $("#ubahDataTiming [name='idUbahJampel']").val(data[0]['id'])
            $("#ubahDataTiming [name='ubahjamKe']").val(data[0]['jamKe'])
            $("#ubahDataTiming [name='ubahWaktuMulai']").val(data[0]['waktuMulai'])
            $("#ubahDataTiming [name='ubahWaktuSelesai']").val(data[0]['waktuSelesai'])
        },
        error: function(){
            alert('error')
        }
    })
})

$('.tombolSimpanUbahJampel').on('click', function(){
    const jamKe = document.getElementById('ubahjamKe').value
    const waktuMulai = document.getElementById('ubahWaktuMulai').value
    const waktuSelesai = document.getElementById('ubahWaktuSelesai').value
    const id = document.getElementById('idUbahJampel').value
    
    $.ajax({
        url: baseURL + 'edit/timing',
        type: 'post',
        data: {id,jamKe,waktuMulai,waktuSelesai},
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

 $(document).ready(function(){
    var myDiv = document.getElementById("div_chats");
    myDiv.scrollTop = myDiv.scrollHeight;
 });

 $('.tombolSimpanJadwal').on('click', function() {
    const id_teacher = document.getElementById('namaGuruSc').value;
    const id_subject = document.getElementById('namaMapelSc').value;
    const id_day = document.getElementById('hariSc').value;
    const id_class = document.getElementById('kelasSc').value;
    const id_start_timing = document.getElementById('jamMulaiSc').value;
    const id_end_timing = document.getElementById('jamSelesaiSc').value;

    const toastLiveExample = document.getElementById('liveToast');
    $.ajax({
        type:'post',
        url:baseURL+'insert/scedule',
        data:{id_teacher,id_subject,id_day,id_class,id_start_timing,id_end_timing },
        dataType: 'json',
        success:function(data){  
            if (data == 'success') {
                var toast = new bootstrap.Toast(liveToast)
                toast.show()
            }

            if (data == 'duplicated') {
                Swal.fire(
                    'Terjadi duplikasi jadwal pelajaran!',
                    '',
                    'error',
                )
            }

            if (data == 'err') {
                Swal.fire(
                    'Terjadi kesalahan input jam pelajaran!',
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

$('.semuaDataJadwal').on('click', function() {
    Swal.fire({
        title: 'Konfirmasi Hapus data',
        text: 'Yakin akan menghapus semua data jadwal pelajaran ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = baseURL+'delete/all_scedules'
        }
    })
})

$('#dataTablesSiswa').on('click', ('.tombolHapusJadwal'), function() {
    const id = $(this).data('id');
    const scedName = $(this).attr('scedName');
    console.log(id)

    Swal.fire({
        title: 'Konfirmasi Hapus data',
        text: 'Hapus data jam pelajaran ' + scedName + ' ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: baseURL + 'delete/scedule',
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

$('#dataTablesSiswa').on('click', '.tombolUbahJadwal', function(){
    const id = $(this).data('id')
    
    $.ajax({
        url: baseURL + 'get/scedule',
        type: 'post',
        data: {id},
        dataType: 'json',
        success: function(data) {
            $('#ubahJadwal').modal('show');
            $("#ubahDataJadwal [name='idUbahJadwal']").val(data[0]['id'])
            $("#ubahDataJadwal [name='ubahnamaGuruSc']").val(data[0]['id_teacher'])
            $("#ubahDataJadwal [name='ubahnamaMapelSc']").val(data[0]['id_subject'])
            $("#ubahDataJadwal [name='ubahhariSc']").val(data[0]['id_day'])
            $("#ubahDataJadwal [name='ubahkelasSc']").val(data[0]['id_class'])
            $("#ubahDataJadwal [name='ubahjamMulaiSc']").val(data[0]['id_start_timing'])
            $("#ubahDataJadwal [name='ubahjamSelesaiSc']").val(data[0]['id_end_timing'])
        },
        error: function(){
            alert('error')
        }
    })
})

$('.tombolSimpanUbahJadwal').on('click', function(){
    const id = document.getElementById('idUbahJadwal').value
    const id_teacher = document.getElementById('ubahnamaGuruSc').value;
    const id_subject = document.getElementById('ubahnamaMapelSc').value;
    const id_day = document.getElementById('ubahhariSc').value;
    const id_class = document.getElementById('ubahkelasSc').value;
    const id_start_timing = document.getElementById('ubahjamMulaiSc').value;
    const id_end_timing = document.getElementById('ubahjamSelesaiSc').value;
    
    $.ajax({
        url: baseURL + 'edit/scedule',
        type: 'post',
        dataType: 'json',
        data: {id,id_teacher,id_subject,id_day,id_class,id_start_timing,id_end_timing},
        success: function(data) {
            console.log(data)
            if (data == 'success') {
                Swal.fire(
                    'Data berhasil di diubah!',
                    '',
                    'success',
                )
                window.setTimeout(function() {
                    location.reload();
                }, 1500);
            }

            if (data == 'duplicated') {
                Swal.fire(
                    'Terjadi duplikasi jadwal pelajaran!',
                    '',
                    'error',
                )
            }

            if (data == 'err') {
                Swal.fire(
                    'Terjadi kesalahan input jam pelajaran!',
                    '',
                    'error',
                )
            }

        },
        error: function(e) {
            console.log(e)
        }
    })
})