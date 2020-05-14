const APP = new Vue({
    el: '#app',
    data: {
        controls: {
            product: [],
            modal: []
        },
        lib: {
            product_format: []
        }
    },

    created() {
        let edata = JSON.parse(window.atob(data))
        this.lib.product_format = _.forEach(edata, function (value, key) {
            let path = value.img_path
            if (value.img_path == '') {
                path = '/img/defualt_product.jpg'
            }
            return value.img_path = path
        })
    },

    methods: {
        toggleModal() {
            let choosed = _.map(this.controls.product, 'pd_f_id')
            this.controls.modal = _.filter(this.lib.product_format, function (o) {
                return !_.includes(choosed, o.pd_f_id)
            })
            $('#add-productformat').modal('toggle');
        },

        addProductFormat(data) {
            let el = this
            el.controls.product.push({
                pd_f_id: data.pd_f_id,
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


    }
})
