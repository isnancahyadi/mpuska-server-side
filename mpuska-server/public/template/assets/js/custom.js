/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

// datatables
$(document).ready( function () {
    $('#table1').DataTable();
} );

// modal confirmation
function submitDel(id) {
    $('#del-'+id).submit();
}

$(function() {
    $('.toggle-class').change(function() {
        var status_mbkm = $(this).prop('checked') == true ? '1' : '0';
        var niy_nip = $(this).data('id');
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "changeStatus",
            data: {'status_mbkm': status_mbkm, 'niy_nip': niy_nip},
            success: function(data){
                console.log('Success')
            }
        });
    })
});