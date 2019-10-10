<template>
    <div>
        <button @click="showAlert"><i class="fas fa-language fa-2x"></i></button>
    </div>

</template>

<script>
import { async } from 'q';
    export default {
        data() {
            return {
                data1: String,
                data2: String,
                textdata: '',
            }
        },
        methods: {
            showAlert() {
                const { value: formValues } = this.$swal.fire({
                    title: 'Multiple inputs',
                    html:
                        '<input id="swal-input1" class="swal2-input">' +
                        `<button id='tran'">En to TH</button>`+
                        '<input id="swal-input2" class="swal2-input">',
                    focusConfirm: false,
                    onBeforeOpen: () => {
                        const content = this.$swal.getContent();
                        const $ = content.querySelector.bind(content);
                        const tran = $('#tran');
                        tran.addEventListener('click', () => {
                           var a = document.getElementById('swal-input1').value;
                           var b = document.getElementById('swal-input2');
                           this.translate(a,b);
                        })
                    },
                    preConfirm: () => {
                        document.getElementById('swal-input1').value,
                        document.getElementById('swal-input2').value
                    }
                    });
            }
        }
    }
</script>
