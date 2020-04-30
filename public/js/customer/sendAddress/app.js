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
            address: '',
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
                el.form.address = ''
                el.form.province = 0
                el.form.amphure = 0
                el.form.district = 0
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
            let el = this
            const response = await fetch('/api/list/amphure/' + province_id);
            const myJson = await response.json();
            if (myJson.status) {
                el.lib.amphure = myJson.data
                let result = el.lib.amphure.find(({
                    id
                }) => id == el.form.amphure)
                if (!result) {
                    el.form.amphure = 0
                    el.form.district = 0
                }
            }
        },

        async callDistrict(amphure_id) {
            let el = this
            const response = await fetch('/api/list/district/' + amphure_id);
            const myJson = await response.json();
            if (myJson.status) {
                el.lib.district = myJson.data
                let result = el.lib.district.find(({
                    id
                }) => id == el.form.district)
                if (!result) {
                    el.form.district = 0
                }
            }
        }
    },

})
