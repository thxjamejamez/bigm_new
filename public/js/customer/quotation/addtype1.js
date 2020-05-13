const APP = new Vue({
    el: '#app',
    data: {
        controls: {
            // product: [{
            //     pd_f_id: 1,
            //     pd_f_img: '/img/defualt_product.jpg',
            //     pd_f_name: 'name',
            //     pd_details: [{
            //             size: '2814*252*300',
            //             qty: 5
            //         },
            //         {
            //             size: '200*20*300',
            //             qty: 6
            //         }
            //     ]
            // }, {
            //     pd_f_id: 2,
            //     pd_f_img: '/img/defualt_product.jpg',
            //     pd_f_name: 'name',
            //     pd_details: [{
            //             size: '3000*300*200',
            //             qty: 8
            //         },
            //         {
            //             size: '300*30*200',
            //             qty: 9
            //         }
            //     ]
            // }]

            product: [],
            modal: [{
                id: 2,
                pd_f_name: 'test01',
                img_path: '/img/defualt_product.jpg'

            }, {
                id: 1,
                pd_f_name: 'test02',
                img_path: '/img/defualt_product.jpg'
            }]
        },
        actions: {
            modal: false
        }
    },
    methods: {
        toggleModal() {
            $('#add-productformat').modal('toggle');
        },

        addProductFormat(data) {
            let el = this
            el.controls.product.push({
                pd_f_id: data.id,
                pd_f_img: data.img_path,
                pd_f_name: data.pd_f_name,
                pd_details: [{
                    size: '',
                    qty: 0
                }]
            })
            el.toggleModal()

        },

        addsize(data) {
            data.pd_details.push({
                qty: 0,
                size: ""
            })
        }
    }
})
