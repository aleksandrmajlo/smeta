<template>
    <div class="wrapRoof">
        <select class="form-control mb-3" name="roofs" id="roofs" required @input="change">
            <option v-for="roof in roofs" :value="roof.id">{{roof.title}}</option>
        </select>
        <h6 class="mb-2 ms-3 font-weight-bold">Элементы</h6>
        <select class="form-control ms-3 mb-3">
            <option v-for="item in el_items" :value="item.id">{{item.title}} - {{item.price}} р.</option>
        </select>
        <h6 class="mb-2 ms-3 font-weight-bold">Комплектующие</h6>
        <div class="form-check ms-3" v-for="item in items">
            <input class="form-check-input" type="checkbox" checked :value="item.id" name="accessories[]" :id="'accessories'+item.id">
            <label class="form-check-label" :for="'accessories'+item.id">
                {{item.title}}
            </label>
        </div>
    </div>
</template>
<script>
    export default {
        name: "Roof",
        data() {
            return {
                items:[],
                el_items:[],
            }
        },
        props: ['roofs','roofelements'],
        mounted(){
            this.change();
        },
        methods: {
            change() {
                let v = $('#roofs').val();
                //установить элементы
                this.el_items=[];
                this.roofelements.forEach(element => {
                    if(element.roof_id==v){
                        this.el_items.push(element);
                    }
                });
                axios.post('/getAcc',{id:v})
                .then(res => {
                    this.items=res.data;
                })
                .catch(err => {
                    console.error(err);
                })
            }
        }
    }
</script>

