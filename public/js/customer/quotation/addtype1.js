const APP = new Vue({
    el: '#app',
    data: {
        controls: {
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
        lib: {
            product_format: []
        }
    },

    created() {
        this.getProductFormat()
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
        },

        removesize(data, index) {
            delete data.pd_details[index];
            data.pd_details = data.pd_details.filter(function (element) {
                return element !== undefined;
            });
        },

        validKeyNumbers($event) {
            var iKeyCode = ($event.which) ? $event.which : $event.keyCode
            if ((iKeyCode < 48 || iKeyCode > 57) && iKeyCode !== 42) {
                $event.preventDefault();
            }
        },

        async getProductFormat() {
            let el = this
            const response = await fetch('/api/productformat/');
            const myJson = await response.json();
            if (myJson.status) {
                let data = myJson.data
                el.lib.product_format = data
            }
        }
    }
})
