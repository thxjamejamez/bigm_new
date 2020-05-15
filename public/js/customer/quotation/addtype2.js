const APP = new Vue({
    el: "#app",
    data: {
        controls: {
            product: [],
            modal: [],
            submit: false,
        },
        lib: {
            product_format: [],
        },
    },

    created() {
        let edata = JSON.parse(window.atob(data));
        this.lib.product_format = _.forEach(edata, function (value, key) {
            let path = value.img_path;
            if (value.img_path == "") {
                path = "/img/defualt_product.jpg";
            }
            return (value.img_path = path);
        });
    },

    mounted() {
        $("input[name='appointment_dt']").datetimepicker({
            locale: moment().local("th"),
            format: "dd-mm-yyyy hh:mm",
            autoclose: true,
            startDate: moment().add(3, "days").toDate(),
        });
    },

    methods: {
        toggleModal() {
            let choosed = _.map(this.controls.product, "pd_f_id");
            this.controls.modal = _.filter(this.lib.product_format, function (
                o
            ) {
                return !_.includes(choosed, o.pd_f_id);
            });
            $("#add-productformat").modal("toggle");
        },

        addProductFormat(data) {
            let el = this;
            el.controls.submit = true;
            el.controls.product.push({
                pd_f_id: data.pd_f_id,
                pd_f_img: data.img_path,
                pd_f_name: data.pd_f_name,
                pd_cate_name: data.pd_cate_name,
                pd_details: [
                    {
                        size: "",
                        qty: 0,
                    },
                ],
            });
            el.toggleModal();
        },
    },
});
