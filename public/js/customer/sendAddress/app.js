new Vue({
    el: '#app',
    data: {
        action: {
            set_modal: {
                header: '',
                btn_save: '',
                btn_cancel: 'ยกเลิก'
            }
        },
        lib: {
            province: {},
            amphure: {},
            district: {}
        },
        form: {
            address: 'asdfasdfsdf',
            province: 0,
            amphure: 0,
            district: 0
        }
    },

    created: function () {
        this.callProvince()
    },

    methods: {
        showModal(action) {
            let el = this
            if (action == 'add') {
                el.action.set_modal.header = 'เพิ่มข้อมูลที่อยู่การติดตั้ง'
                el.action.set_modal.btn_save = 'บันทึก'
            } else {
                el.action.set_modal.header = 'แก้ไขข้อมูลการติดตั้ง'
                el.action.set_modal.btn_save = 'บันทึกการแก้ไข'
            }
            $('#form-sendAddress').modal()
        },

        async callProvince() {
            let el = this
            const response = await fetch('/api/list/province');
            const myJson = await response.json();
            if (myJson.status) {
                el.lib.province = myJson.data
            }
        },

        async callAmphure(province_id) {
            const response = await fetch('/api/list/amphure/' + province_id);
            const myJson = await response.json();
            if (myJson.status) {
                return myJson.data
            }
        },

        async callDistrict() {
            let el = this
            const response = await fetch('/api/list/district/' + form.amphure);
            const myJson = await response.json();
            if (myJson.status) {
                el.lib.district = myJson.data
            }
        }
    },

    computed: {
        list_amphure() {
            let el = this
            const result = {}
            el.callAmphure(el.form.province).then((data) => {
                result = data
                console.log(result);
            });

            return result;
        }
    },
})
