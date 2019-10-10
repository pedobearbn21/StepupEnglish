<template>
    <div>
        <b-card-text @click="checkclass"><b-link href=''><h5 class="mb-0">Check Class</h5></b-link></b-card-text>
    </div>
</template>

<script>
export default {
    data() {
        return {
            word: [{extract: 'สกัด' },{response: 'ตอบสนอง'},{confidential: 'ลับ'},{compose: 'ประกอบ'},{process: 'กระบวนการ'},{advantage: 'ความได้เปรียบ'},{interrupt: 'ขัดขวาง'},{institution: 'สถาบัน'},{electronic: 'อิเล็กทรอนิกส์'},{recipient: 'ผู้รับ'},
            {socialnetworking: 'เครือข่ายทางสังคม' },{content: 'เนื้อหา'},{indecent: 'หยาบคาย'},{interact: 'โต้ตอบ'},{effect: 'ผล'},{threaten: 'ขู่'},{cyberbullying: 'กลั่นแกล้งในโลกไซเบอร์' },{addiction: 'การเสพติด'},{follower: 'ผู้ติดตาม'},{copyright: 'ลิขสิทธ์'},
            {tabloid: 'จุลสาร' },{quarterly: 'ไตรมาส'},{staytuned: 'คอยติดตาม'},{abroad: 'ในต่างประเทศ'},{opinion: 'ความคิดเห็น'},{issue: 'ปัญหา'},{event: 'เหตุการณ์' },{notice: 'แจ้งให้ทราบ'},{commodity: 'สินค้า'},{horoscopeten: 'ดวงชะตา'},{budget: 'งบ'},{occasion: 'โอกาส'},{schedule: 'ตารางเวลา'},{obituary: 'ข่าวร้าย'},{fellowship: 'การคบหา'},
            {drop: 'ลดลง' },{remainsteady: 'คงที่'},{increase: 'เพิ่มขึ้น'},{decrease: 'ลดลง'},{fluctuate: 'ขึ้น ๆ ลง ๆ'},{dramatically: 'อย่างรวดเร็ว'},{remainstable: 'มั่นคง' },{grow: 'เติบโต'},{gradually: 'ค่อยๆ'},{slightly: 'เล็กน้อย'},
            {academic: 'วิชาการ' },{conference: 'การประชุม'},{bulletpoint: 'เครื่องหมายหัวข้อ'},{consist: 'ประกอบด้วย'},{integrate: 'รวบรวม'},{dynamic: 'ความคิดสร้างสรรค์'},{require: 'ต้องการ' },{offensive: 'ก้าวร้าว'},{relevant: 'ความเกี่ยวข้อง'},{achieve: 'บรรลุ'},
            {attribute: 'คุณลักษณะ' },{accomplishment: 'ความสำเร็จ'},{capability: 'ความสามารถ'},{applyfor: 'ขอ'},{scholarship: 'ทุนการศึกษา'},{demonstrate: 'สาธิต'},{contain: 'บรรจุ' },{affiliation: 'การติดต่อ'},{certification: 'ได้รับการรับรอง'},{organized: 'จัดตั้ง'},
            ],
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
                    this.$swal.fire({
                        type: 'success',
                        title: 'Your Class has been Checked',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }else{
                    this.$swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'You Failed..Try Agian!'
                    })
                }
            // this.$swal.fire(JSON.stringify(formValues));
            this.random = [];
            }else{
            this.random = [];
            }

        }
    },


}
</script>
