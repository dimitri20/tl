require('./bootstrap');

// require('jquery');

// import bootstrap from 'bootstrap';
// import 'bootstrap';
require('./bootstrap4/bootstrap');
require('admin-lte/dist/js/adminlte.min.js')
import '@fortawesome/fontawesome-free/js/all.js';
require('jquery-ui-dist/jquery-ui.js')

$(document).ready(function() {


    $('.deletePost').submit(function() {
        var c = confirm("Are you sure?");
        return c; //you can just return c because it will be true or false
    });

    $('#postImageInput').change(e => {
        let file = $(e.target).get(0).files[0]
        if (file) {
            let reader = new FileReader()
            reader.onload = () => {
                $('#postImage').attr('src', reader.result)
            }

            reader.readAsDataURL(file)
        }


    })

    // if (file) {
    //     let reader = new FileReader()
    //     reader.onload = () => {
    //         if ($(element).parent().parent().find('.image-container').length === 0) {
    //             $($(".images-input-container").get(i)).append(`
    //                 <div class="image-container w-100">
    //                     <div class="delete-image my-2 btn btn-danger d-none"><i class="bi bi-x"></i> remove </div>
    //                     <img
    //                             src="${reader.result}"
    //                             alt="image 2"
    //                             class="w-100 mt-3">
    //                 </div>
    //             `);
    //         } else {
    //             $($(element).parent().parent().find('img').get(0)).attr('src', reader.result)
    //         }

    //         imageDeleteButtons = $('#images .delete-image');
    //         imageDeleteButtons.each((index, element) => {
    //             $(element).click(() => {
    //                 $($(element).parent().parent().find('input').get(0)).val("")
    //                 $(element).parent().remove()
    //             })
    //         })
    //     }
    //     reader.readAsDataURL(file)
    // }


    $.ajaxSetup({
        headers: {
            Accept: 'application/json',
            Authorization: "Bearer " + getCookie('api_token'),
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    })

    $('.removable-file-btn').click((e) => {

        console.log($(e.target).attr("data-path"))
        $.post('/api/deleteFile', {
            path: $(e.target).attr("data-path")
        }).done(() => {
            $(e.target).parent('.removable-file').remove()

            console.log($('#editPostMainForm').attr('data-id'))
            console.log(JSON.stringify($('.removable-file-btn').toArray().map(x => parseInt($(x).attr('data-id')))))

            $.post('/api/updatePostFileIds', {
                postId: $('#editPostMainForm').attr('data-id'),
                newData: JSON.stringify($('.removable-file-btn').toArray().map(x => parseInt($(x).attr('data-id'))))
            })


        })


    })


    console.log($('#postImageInput').val())
    $('#postImage').val('src', $('#postImageInput').val())
});

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }
