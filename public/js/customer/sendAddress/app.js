var app = new Vue({
    el: '#app',
    data: {
        action: {
            set_modal: {
                header: '',
                btn_save: '',
                btn_cancel: 'ยกเลิก'
            }
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
            } else {
                el.action.set_modal.header = 'แก้ไขข้อมูลการติดตั้ง'
                el.action.set_modal.btn_save = 'บันทึกการแก้ไข'
            }
            $('#form-sendAddress').modal()
        },

        callProvince() {
            axios
                .get('https://api.coindesk.com/v1/bpi/currentprice.json')
                .then(response => (this.info = response))
        }
    }
})
