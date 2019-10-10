<template>
    <div>
        <button type="button" v-b-modal="'my-modal'"><i class="fas fa-language fa-2x"></i></button>

        <b-modal id="my-modal" class="">
        <div>
                <input id='a' type="text" class="form-control"  placeholder="Enter Text To Translate">
        </div>
        <div class="mt-4 mb-2" style="text-align-last:center !important;">
            <button type="button" class="btn btn-outline-success btn-sm pr-1"
                @click="trans(from_lang='th',to_lang='en');">TH to EN
            </button>
            <button type="button" class="btn btn-outline-warning btn-sm pl-1"
                @click="trans(from_lang='en',to_lang='th')">En to TH</button>
        </div>
        <div>
                <label for="exampleInputEmail1">Meaning :</label>
                <textarea type="text" class="form-control" id="b" placeholder="Mean of Words"></textarea>
        </div>
        </b-modal>
    </div>
</template>

<script>
export default {
    data() {
        return {

        }
    },
    methods: {
        trans(from_lang,to_lang){
            this.translate(a.value, b, from_lang, to_lang);
        },

        translate(sentences, targetDiv, from_lang ='th', to_lang='en'){
            var text ='';
            sentences = sentences.replace(/\n/g, '<br>')
            let endPoint = `https://translate.googleapis.com/translate_a/single?client=gtx&sl=${from_lang}&tl=${to_lang}&dt=t&ie=UTF-8&oe=UTF-8&q=${encodeURIComponent(sentences)}` ;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var jsonText = JSON.parse(this.responseText);
                text = jsonText[0][0][0]
                text = text.replace(/<br>/g, '\n')
                targetDiv.innerHTML = "&nbsp;" + text;
            }
            };
            xhttp.open("GET", endPoint, true);
            xhttp.send();
        },
    },
}
</script>
