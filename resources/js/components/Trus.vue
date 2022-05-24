<template>
    <div class="ms-3">
        <select name="trus" class="form-control">
            <option v-for="item in items"  :value="item.id" >{{item.title}}</option>
        </select>

<!--        <div class="form-check" v-for="item in items">-->
<!--            <input class="form-check-input" type="radio" name="trus" :id="'trus_'+item.id" :value="item.id" >-->
<!--            <label class="form-check-label" :for="'trus_'+item.id">-->
<!--                {{item.title}}-->
<!--            </label>-->
<!--        </div>-->
    </div>
</template>

<script>
export default {
    name: "Trus",
    data() {
        return {
          items:[]
        }
    },
    props: ['trus1', 'trus2'],
    created() {
        let self=this;
        $(document).ready(function () {
            $('[name="type_trus"]').change(function (e) {
                e.preventDefault();
                let v=$('input[name="type_trus"]:checked').val();
                self.setData(v);
            });
        });
        this.setData('1');
    },
    methods:{
        setData(type){
           if(type=='1'){
               this.items=this.trus1;
           }else{
               this.items=this.trus2;
           }
        }
    }
}
</script>

