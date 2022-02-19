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