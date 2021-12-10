import Swal from 'sweetalert2'

function sWa(){

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })
      
      swalWithBootstrapButtons.fire({
        title: 'プロフィールを変更しますか？',
        text: "はいをクリックしたら画面遷移します",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'はい',
        cancelButtonText: 'いいえ',
        reverseButtons: true
      })

}