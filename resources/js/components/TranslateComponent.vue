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
            translate(sentences,from_lang ='en', to_lang='th'){
            let textword = '';

            sentences = sentences.replace(/\n/g, '<br>')
            let endPoint = `https://translate.googleapis.com/translate_a/single?client=gtx&sl=${from_lang}&tl=${to_lang}&dt=t&ie=UTF-8&oe=UTF-8&q=${encodeURIComponent(sentences)}` ;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var jsonText = JSON.parse(this.responseText);
                textword = jsonText[0][0][0];
                textword = textword.replace(/<br>/g, '\n');
                this.textdata = textword;
            }
            };
            xhttp.open("GET", endPoint, true);
            xhttp.send();
            },
            showAlert() {
                const { value: text } = this.$swal.fire({
                    title: 'Translate',
                    input: 'text',
                    inputPlaceholder: 'Type your word here!!',
                    inputAttributes: {
                        'aria-label': 'Type your message here'
                    },
                    showCancelButton: true,
                    inputValidator: (value) => {
                        if (!value) {
                        return 'You need to write something!';
                        }
                    }
                    }).then(async (value) => {
                        if(value){
                            this.translate('hello');
                            console.log(this.textdata);
                            this.$swal.fire( `${this.textdata}` );
                        }
                    });
            }
        }
    }
</script>
