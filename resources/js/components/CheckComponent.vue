<template>
    <div>
        <b-card-text @click="checkclass"><b-link href=''><h5 class="mb-0">Check Class</h5></b-link></b-card-text>
    </div>
</template>

<script>
export default {
    data() {
        return {
            word: [{ one: 'หนึ่ง' },{two: 'สอง'},{three: 'สาม'},{four: 'สี่'},{five: 'ห้า'},{six: 'หก'}],
            random: [],
            namedict: [],
            testing: [],
            score: 0,
            texttest: 'Texttest'


        }
    },
    methods: {
        async checkclass() {
            for (let index = 0; this.random.length != 5 ; index++) {
                var item = this.word[(Math.random()*this.word.length)|0];
                if(( this.random.includes(item) ) == false) {
                    this.random.push(item);
                    this.namedict.push(Object.getOwnPropertyNames(item));
                    for (var key in item){
                        this.testing.push(item[key]);
                    }
                }
            }
            const { value: formValues } = await this.$swal.fire({
            title: 'Multiple inputs',
            html:
                `${this.namedict[0][0]}`+
                '<input id="swal-input1" class="swal2-input">' +
                `${this.namedict[1][0]}`+
                '<input id="swal-input2" class="swal2-input">' +
                `${this.namedict[2][0]}`+
                '<input id="swal-input3" class="swal2-input">' +
                `${this.namedict[3][0]}`+
                '<input id="swal-input4" class="swal2-input">' +
                `${this.namedict[4][0]}`+
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
            });

            if (formValues) {
                console.log(formValues);
                for (let index = 0; index < formValues.length; index++) {
                    if( formValues[index] ==  this.testing[index]){
                        console.log(formValues[index] +'=='+ this.testing[index]);
                        this.score = this.score+1;

                    }
                }
                if(this.score == 5){
                    axios.get('/checkword', {

                    })
                    .then(function (response) {
                        console.log(response);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                    // window.location.href = 'http://localhost:8000/checkword/0/check';
                }
            // this.$swal.fire(JSON.stringify(formValues));
            this.$swal.fire('Good job!','success');
            this.random = [];
            }
        }
    },


}
</script>
