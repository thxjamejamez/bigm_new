new Vue({
    el: '#app',
    data: {
        action: {
            set_modal: {
                type: '',
                header: '',
                btn_save: '',
                btn_cancel: 'ยกเลิก',
                form_action: ''
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
        showModal(action, id = false) {
            let el = this
            el.action.set_modal.type = action
            if (action == 'add') {
                el.action.set_modal.form_action = '/sendAddress'
                el.action.set_modal.header = 'เพิ่มข้อมูลที่อยู่การติดตั้ง'
                el.action.set_modal.btn_save = 'บันทึก'
                el.form.address = ''
                el.form.province = 0
                el.form.amphure = 0
                el.form.district = 0
            } else {
                el.action.set_modal.form_action = '/sendAddress/' + id
                el.getDetail(id)
                el.action.set_modal.header = 'แก้ไขข้อมูลการติดตั้ง'
                el.action.set_modal.btn_save = 'บันทึกการแก้ไข'
            }
            $('#form-sendAddress').modal()
        },

        removeAddress(id) {
            el = this
            Swal.fire({
                title: 'คุณต้องการลบที่อยู่การติดตั้ง ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ลบ',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.value) {
                    window.location.href = "/sendAddress/" + id + "/remove"
                }
            })
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
        },

        async getDetail(id) {
            let el = this
            const response = await fetch('/api/sendaddress/' + id);
            const myJson = await response.json();
            if (myJson.status) {
                let data = myJson.data
                el.form.address = data.address
                el.form.province = data.province_id
                el.form.amphure = data.amphure_id
                el.form.district = data.district_id
                el.callAmphure(data.province_id)
                el.callDistrict(data.amphure_id)
            }
        }
    },

})
