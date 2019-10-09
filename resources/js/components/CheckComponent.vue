<template>
    <div>
        <b-card-text @click="checkclass"><b-link href=''><h5 class="mb-0">Check Class</h5></b-link></b-card-text>
    </div>
</template>

<script>
export default {
    data() {
        return {

        }
    },
    methods: {
        async checkclass() {
            const { value: formValues } = await this.$swal.fire({
            title: 'Multiple inputs',
            html:
                '<input id="swal-input1" class="swal2-input">' +
                '<input id="swal-input2" class="swal2-input">' +
                '<input id="swal-input3" class="swal2-input">' +
                '<input id="swal-input4" class="swal2-input">' +
                '<input id="swal-input5" class="swal2-input">',
            focusConfirm: false,
            preConfirm: () => {
                return [
                document.getElementById('swal-input1').value,
                document.getElementById('swal-input2').value,
                document.getElementById('swal-input3').value,
                document.getElementById('swal-input4').value,
                document.getElementById('swal-input5').value
                ]
            }
            })

            if (formValues) {
            // this.$swal.fire(JSON.stringify(formValues))
            this.$swal.fire('Good job!','success');
            }
        }
    },


}
</script>
