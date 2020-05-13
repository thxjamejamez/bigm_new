$('#quotation-table').DataTable({
    processing: true,
    ajax: {
        type: 'GET',
        url: '/api/quotation',
        success: function (data) {
            console.log(data);
        }
    },
    // columns: [{
    //         data: 'material_no',
    //         render: function (data, type, row, meta) {
    //             if (type === 'display') {
    //                 data = 'M' + numeral(data).format('000000');
    //             }
    //             return data
    //         }
    //     },
    //     {
    //         data: 'material_name',
    //         name: 'material_name'
    //     },
    //     {
    //         data: 'type_name',
    //         name: 'type_name'
    //     },
    //     {
    //         data: 'material_no',
    //         render: function (data, type, row, meta) {
    //             if (type === 'display') {
    //                 data = "<a class='btn btn-block btn-info btn-sm' href='javascript:;' onclick='edit(" + data + ")'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> แก้ไข</a>";
    //             }
    //             return data
    //         }
    //     },
    //     {
    //         data: 'material_no',
    //         render: function (data, type, row, meta) {
    //             if (type === 'display') {
    //                 data = "<a class='btn btn-block btn-danger btn-sm' href='javascript:;' onclick='del(" + data + ")'><i class='fa fa-trash' aria-hidden='true'></i> ลบ</a>";
    //             }
    //             return data
    //         }
    //     },
    // ],
});

function gotourl(type) {
    window.location = '/quotation/add/' + type
}
